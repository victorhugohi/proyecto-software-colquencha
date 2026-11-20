# Retos del Día 13 - Conectar el proyecto

---

## Nivel base - ¿Qué estado es?

Para cada situación, di **qué debe ver el usuario**:

1. El servidor tarda dos segundos en responder.
2. MySQL está apagado.
3. La consulta funciona pero no hay productos que cumplan el filtro.
4. El servidor responde, pero con un error 500.
5. Todo funciona y hay 20 productos.

¿Cuáles de estos cinco maneja una página que **solo** escribió el caso exitoso?

---

## Nivel medio - Tu proyecto completo

- [ ] Tu proyecto del módulo pasado copiado en `htdocs`
- [ ] El `fetch` apuntando a tu endpoint
- [ ] Servido por Apache: `http://localhost/tu-proyecto/`
- [ ] La tabla se llena con datos de **tu base**
- [ ] Los **tres estados** manejados

La prueba:

- [ ] Apaga MySQL y recarga. ¿Mensaje claro o pantalla en blanco?
- [ ] Enciéndelo y recarga. ¿Vuelve a funcionar?

---

## Nivel extra - El botón de reintentar

Cuando la carga falla, el usuario no tiene forma de volver a intentar sin recargar toda la
página. Agrégale una salida:

- [ ] En el estado de error, muestra un **botón "Reintentar"**
- [ ] Al hacer clic, vuelve a llamar a `cargarProductos()`

Fíjate en que **no hay que reescribir casi nada**: la carga ya es una función, justamente para
poder llamarla de nuevo.

Y responde:

> ¿Por qué la carga estaba escrita como una función `cargarProductos()` desde el principio, y no
> como código suelto que corre una sola vez?

Esa decisión, tomada antes de necesitarla, es lo que hace que agregar el botón sea trivial.

---

## Nivel extra 2 - La parte del dueño

**A. Cambiar la contraseña de ejemplo.** La contraseña `pan-del-barrio` está escrita en
`esquema.sql`: cualquiera que lea el repositorio la conoce.

- [ ] Genera el hash de una contraseña nueva desde la consola (en XAMPP, el botón **Shell**):
      `php -r "echo password_hash('otra-clave', PASSWORD_DEFAULT);"`
- [ ] Cámbiala en la base con un `UPDATE usuarios SET clave_hash = '...' WHERE usuario = 'duena';`
- [ ] Comprueba que la vieja ya no entra y la nueva sí

> ¿Por qué la contraseña nueva no se escribe en ningún archivo del repositorio, y la de ejemplo sí?

**B. El precio de entonces.** El total del panel usa el precio de hoy de cada producto.

- [ ] Cambia el precio de la Marraqueta en phpMyAdmin y recarga el panel. ¿Qué pasó con el total?
- [ ] Agrega a la tabla `pedidos` una columna `precio DECIMAL(10,2)` que guarde el precio al momento
      del pedido, y usa esa columna en `panel.php`

> El Día 11 se dijo «lo que se calcula no se guarda». ¿Por qué este precio sí se guarda?
