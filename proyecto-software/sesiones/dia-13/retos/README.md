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
