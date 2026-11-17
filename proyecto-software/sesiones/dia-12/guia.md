# Guía de estudio N.° 12: PHP se conecta a la base de datos

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 12 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después escribe tu propio endpoint en PHP.
Puedes avanzar a tu ritmo: cuando termines, sigue con la guía del día siguiente. El cuestionario
del final sirve para comprobar que entendiste; respóndelo con tus propias palabras.

Necesitas XAMPP encendido y la base de datos del Día 11 cargada. El material del día son dos
archivos de ejemplo: `conexion.php` y `productos.php`.

---

## Primera parte. Lectura

### 1. Lo mismo, desde otro lado

En Programación Web tu página leía sus datos con `fetch('datos.json')`, un archivo fijo. Desde ahora
va a leerlos con `fetch('productos.php')`, un programa en PHP que consulta la base de datos y
devuelve JSON. Si el JSON tiene los mismos campos y los mismos tipos de antes, la página no se
entera del cambio: muestra la lista igual que siempre. Ese acuerdo sobre la forma de los datos se
llama **contrato**, y es lo que permite cambiar el backend sin tocar el frontend.

Un programa así, que recibe una petición y devuelve datos, se llama *endpoint*.

### 2. La conexión, en un archivo aparte

`conexion.php` hace una sola cosa: entregar una conexión a la base, lista para usar. Se separa del
resto para que, el día que cambie la contraseña, se cambie en un solo lugar. Configura tres opciones
de PDO, la biblioteca de PHP para hablar con bases de datos:

- **`ERRMODE_EXCEPTION`**: si una consulta falla, el error se detiene y se puede ver. Sin esta
  opción, la página queda en blanco sin ninguna pista.
- **`FETCH_ASSOC`**: cada fila llega una sola vez, con el nombre de cada columna. Sin esta opción,
  cada dato viene repetido y el JSON tiene el doble de campos.
- **`EMULATE_PREPARES => false`**: hace que la protección del punto siguiente sea real.

El juego de caracteres va también en la conexión: `charset=utf8mb4`. Si "Panadería" llega como
`PanaderÃ­a`, falta esto.

La contraseña real no se sube a git: `conexion.php` va en el `.gitignore`, y en su lugar se sube un
`conexion.ejemplo.php` con el usuario y la clave vacíos.

### 3. Los *prepared statements*

Lo que escribe el visitante nunca se pega dentro del texto de la consulta. Si se hiciera así:

```php
$sql = "SELECT ... WHERE categoria_id = $categoria";   // inseguro
```

alguien podría visitar `productos.php?categoria=1 OR 1=1` y recibir todos los productos, o algo peor:
con un `UNION` se puede leer otra tabla entera, por ejemplo los teléfonos de los proveedores, sin que
aparezca ningún error. Esto se llama **inyección de SQL**, y es una de las vulnerabilidades más
explotadas de la web.

La forma segura es preparar la consulta con un marcador (`:categoria`) y enviar el dato aparte con
`bindValue`. El motor conoce la forma de la consulta antes de ver el dato, así que lo que llegue se
trata como un valor, nunca como una instrucción.

### 4. Los tipos de los datos

MySQL devuelve todo como texto. Sin corregirlo, el precio llega como `"0.50"`, con comillas, y en
JavaScript `"0.50" + "1.50"` da `"0.501.50"` en lugar de 2.00. Por eso, después de la consulta, el
ejemplo recorre las filas con un `foreach` y convierte cada campo a su tipo: `(float)` para el precio,
`(int)` para el stock, `(bool)` para disponible. Si se omite, el error aparece en la página, lejos de
su causa.

### 5. El error no se le muestra al visitante

Si algo falla, el visitante recibe un mensaje general. El detalle técnico (`$e->getMessage()`) no se
muestra, porque trae el nombre de la base de datos y el usuario: información útil para atacarla.

### 6. El ejemplo de la Panadería del Barrio

`productos.php` (en la carpeta del código del día) arma la consulta, agrega el filtro solo si llegó
el parámetro y lo envía con `bindValue`:

```php
$categoria = $_GET['categoria'] ?? null;
...
if ($categoria !== null) {
    $sql .= " WHERE p.categoria_id = :categoria";
}
$consulta = $pdo->prepare($sql);
```

El `?? null` evita un aviso de PHP cuando no llega el parámetro; ese aviso se imprimiría antes del
JSON y lo rompería.

Tu endpoint depende de tu sistema: `reservas.php` en una barbería, `ventas.php` o `productos.php` en
una tienda. Las reglas son las mismas.

---

## Segunda parte. Trabajo en tu proyecto

1. Copia `conexion.php` y cambia el nombre de la base por el de la tuya. Agrégalo al `.gitignore` y
   sube en su lugar un `conexion.ejemplo.php` sin la contraseña.
2. Escribe tu endpoint, con la consulta de tu proyecto:
   - `header('Content-Type: application/json; charset=utf-8')` al principio;
   - un parámetro opcional (una categoría, una fecha, un estado), siempre con `prepare` y
     `bindValue`;
   - el `foreach` que convierte los números a su tipo.
3. Abre el endpoint en el navegador: tiene que verse un JSON con formato.
4. Abre tu página del módulo pasado, cambia el `fetch` para que apunte a tu endpoint y comprueba que
   funciona sin tocar nada más. Si tu página leía `datos.productos` y el endpoint devuelve solo la
   lista, cambia esa única línea.
5. Si te sobra tiempo, escribe el endpoint que guarda lo de tu problema (el pedido, la reserva, la
   venta), con el mismo `prepare` y `bindValue`, y validando los datos en el servidor.

Antes de dar por terminada la sección, revisa:

- [ ] El endpoint devuelve JSON con formato, y los acentos se ven bien.
- [ ] El precio sale sin comillas.
- [ ] Ningún parámetro está pegado en el SQL.
- [ ] Tu página consume el endpoint sin cambios en el render.

| Lo que te pasa | Qué hacer |
|---|---|
| página en blanco | revisa `ERRMODE_EXCEPTION` y el log de errores de Apache |
| se ve texto sin formato | falta el `header` de Content-Type |
| los acentos salen como `Ã­` | falta `charset=utf8mb4` en la conexión |
| el precio sale con comillas | falta el `foreach` que convierte los tipos |
| "Undefined array key" | falta el `?? null` |
| "Access denied for user" | revisa el usuario y la contraseña en `conexion.php` |

Al terminar, guarda tu avance (si usas git):

```bash
git add .gitignore conexion.ejemplo.php productos.php
git commit -m "feat: endpoint PHP que devuelve JSON con PDO"
git push
```

---

## Cuestionario de repaso

1. ¿Qué es el contrato entre el frontend y el backend, y por qué permite cambiar `datos.json` por
   `productos.php`?
2. ¿Por qué la conexión va en un archivo aparte, y por qué ese archivo no se sube a git?
3. ¿Qué pasaría si alguien visita `productos.php?categoria=1 OR 1=1` y la consulta pega ese texto
   tal cual?
4. ¿Cómo evita `bindValue` la inyección de SQL?
5. ¿Qué da `"0.50" + "1.50"` en JavaScript, y cómo lo evita el endpoint?
6. ¿Por qué no se le muestra al visitante el mensaje de error completo?
7. ¿Cómo se llama tu endpoint y qué parámetro opcional recibe?

---

## Para la próxima clase

El Día 13, el `fetch` de tu página se conecta a tu backend y se maneja el caso de error de red. Con
eso el proyecto queda completo: frontend y backend conectados.
