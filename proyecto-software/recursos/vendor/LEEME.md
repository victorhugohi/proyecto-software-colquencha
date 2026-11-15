# vendor - por qué está casi vacío

En Programación Web esta carpeta guarda jQuery, porque la Unidad 3 lo exige y **nada puede
depender de un CDN**.

**Este módulo no necesita ninguna librería.** El proyecto es HTML, CSS y JavaScript nativo
del lado del cliente, y PHP con PDO del lado del servidor - las dos cosas vienen con XAMPP.
No hay nada que vendorizar.

Si reutilizas el proyecto del módulo pasado y ese usaba jQuery, el archivo sigue estando en el
material de Programación Web (`recursos/vendor/jquery-3.7.1.min.js`). Cópialo a tu proyecto; no lo
enlaces desde un CDN.

**Lo que sí viaja en el pendrive** y no está en el repositorio:

| Qué | Por qué no está aquí |
|---|---|
| instalador de XAMPP (Windows y Linux) | ~150 MB por plataforma |
| documentación offline de PHP y MySQL | ~100 MB |
| `Nixon - Learning PHP, MySQL & JavaScript 7e` | derechos de autor |
