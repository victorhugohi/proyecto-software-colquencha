# Guía de estudio N.° 13: la página se conecta al backend

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 13 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después conecta tu página a tu endpoint.
Puedes avanzar a tu ritmo: cuando termines, sigue con la guía del día siguiente. El cuestionario
del final sirve para comprobar que entendiste; respóndelo con tus propias palabras.

El material del día es `app.js`, con `index.html` y `estilos.css`. Necesitas XAMPP encendido y el
endpoint del Día 12.

---

## Primera parte. Lectura

### 1. Lo nuevo: la petición puede fallar

En Programación Web ya usaste `fetch`. Lo nuevo es qué hacer cuando falla. Con un archivo fijo como
`datos.json`, la petición no fallaba. Con un servidor sí puede fallar: puede estar apagado, la
consulta puede tener un error o la red puede cortarse. Manejar esa falla es el trabajo de este día.

### 2. Los tres estados de una pantalla

Toda pantalla que carga datos tiene tres estados:

| Estado | Qué se ve |
|---|---|
| cargando | un aviso mientras llegan los datos |
| cargó bien | los datos |
| algo falló | un mensaje claro y una forma de volver a intentar |

Lo habitual es escribir solo el segundo. Sin los otros dos, cuando el servidor está apagado el
usuario ve una pantalla en blanco y no sabe qué pasó.

### 3. `fetch` no falla con un error 500

`fetch` solo falla si no pudo conectarse. Si el servidor responde con un error 404 o 500, `fetch`
lo trata como una respuesta válida. Por eso hay que comprobar `respuesta.ok` a mano; sin esa
comprobación, el `.json()` falla después con un mensaje confuso, lejos de la causa.

### 4. El array vacío no es un error

Si el endpoint devuelve `[]`, no hay error: simplemente no hay datos. Pero una tabla vacía sin
mensaje parece rota. Por eso se trata aparte, con un mensaje como "No hay productos para mostrar".
Es el mismo caso vacío de las historias de usuario del Día 10.

### 5. El error va a la consola, no al usuario

Al usuario se le muestra un mensaje que entienda. El detalle técnico va a la consola del navegador,
con `console.error`: al usuario no le sirve y lo confunde.

### 6. Los tipos llegan del PHP

La página muestra el precio con `p.precio.toFixed(2)`. Eso funciona solo si el precio llega como
número; si llegara como texto, daría el error `toFixed is not a function`. Por eso el Día 12 se
convirtieron los tipos en el PHP: que los tipos lleguen bien es parte del contrato entre el
frontend y el backend.

### 7. La página se abre con Apache

La página tiene que abrirse desde el servidor, con una dirección como
`http://localhost/tu-proyecto/`, y no con doble clic sobre el archivo. Con doble clic se abre como
`file://`, y desde ahí `fetch` no puede pedir datos a un `.php`.

### 8. El ejemplo de la Panadería del Barrio

En `app.js` (en la carpeta del código del día), la carga de productos maneja los tres estados:

```js
async function cargarProductos() {
  mostrarCargando();
  try {
    const respuesta = await fetch(URL_DATOS);
    if (!respuesta.ok) {
      throw new Error(`El servidor respondió ${respuesta.status}`);
    }
    const productos = await respuesta.json();
    if (productos.length === 0) {
      mostrarError("No hay productos para mostrar.");
      return;
    }
    renderProductos(productos);
    ocultarEstado();
  } catch (error) {
    ...
```

El formulario de pedidos usa las mismas ideas, y el `fetch` además envía datos. El servidor vuelve
a validarlos, porque el `required` de un formulario se puede quitar con el inspector del navegador.

Si tu sistema es de reservas o de ventas, tus archivos se llaman distinto (`reservas.php`,
`ventas.php`), pero los tres estados de la pantalla son los mismos.

---

## Segunda parte. Trabajo en tu proyecto

1. Copia tu proyecto del módulo pasado dentro de la carpeta `htdocs` de XAMPP y ábrelo en
   `http://localhost/tu-proyecto/`.
2. Cambia el `fetch` para que apunte a tu endpoint y comprueba que la página se llena con los datos
   de tu base.
3. Agrega los tres estados: cargando, con datos y con error. Incluye la comprobación de `.ok` y el
   caso vacío con su propio mensaje.
4. Prueba el error: detén MySQL en el panel de XAMPP y recarga. Tiene que verse un mensaje, no una
   pantalla en blanco. Vuelve a encender MySQL y comprueba que todo funciona otra vez.
5. Conecta el formulario de tu problema (el pedido, la reserva, la venta) a tu endpoint que guarda.
   Quita el `required` de un campo con el inspector y envía el formulario vacío: el servidor tiene
   que rechazarlo igual.

Antes de dar por terminada la sección, revisa:

- [ ] La página carga datos de tu base, abierta desde Apache.
- [ ] Con MySQL apagado se ve un mensaje claro.
- [ ] Sin datos se ve un mensaje de "no hay", no un error.
- [ ] Los precios se ven como números formateados.

| Lo que te pasa | Qué hacer |
|---|---|
| "Failed to fetch" o un error de CORS | abriste la página con doble clic: ábrela con `http://localhost/...` |
| `toFixed is not a function` | el precio llega como texto: corrige los tipos en el PHP |
| pantalla en blanco al fallar | falta el `try/catch` o el mensaje de error |
| un error 500 da un mensaje confuso | falta la comprobación de `.ok` |
| no llegan datos y no hay error | revisa que MySQL esté encendido y que la dirección del endpoint sea correcta |

Al terminar, guarda tu avance:

```bash
git add .
git commit -m "feat: frontend conectado al backend propio"
git push
```

Con esto el sistema queda construido: la base de datos, el endpoint que la sirve y la página que lo
consume.

---

## Cuestionario de repaso

1. ¿Por qué con un servidor la petición puede fallar y con `datos.json` no?
2. ¿Cuáles son los tres estados de una pantalla que carga datos?
3. ¿Qué hace `fetch` cuando el servidor responde con un error 500, y cómo se detecta?
4. ¿Por qué el array vacío se trata aparte, si no es un error?
5. ¿Por qué el detalle del error va a la consola y no al usuario?
6. ¿Por qué la página no funciona si se abre con doble clic?
7. ¿Qué pasa en tu página cuando apagas MySQL? Descríbelo.

---

## Para la próxima clase

El Día 14 se prueba el sistema con una matriz de casos de prueba, y se entrega el Laboratorio 3.
