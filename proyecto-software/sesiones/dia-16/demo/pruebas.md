<!-- ═══════════════════════════════════════════════════════════════════════
     Matriz de casos de prueba - proyecto de ejemplo

     ⚠️ Es el proyecto de ejemplo del módulo, no el tuyo.

     De dónde sale cada fila: de los criterios de aceptación del Día 10 y de
     los requerimientos del Día 9. No se inventan pruebas: se prueba lo que
     se prometió. Por eso el Día 9 insistía en que un requerimiento tiene que
     poder dar PASA o FALLA: hoy es el día en que eso se pone a prueba.

     Qué es caja negra: se prueba qué hace el sistema mirando entradas y
     salidas, sin mirar el código por dentro. Es lo que puede hacer cualquiera,
     y es lo que corresponde a este curso. La caja blanca (mirar el código)
     viene después, en materias de testing.
     ═══════════════════════════════════════════════════════════════════════ -->

# Matriz de casos de prueba

## Sistema de gestión de pedidos - Panadería del Barrio

Basado en los requerimientos del Día 9 y los criterios de aceptación del Día 10.

---

## Cómo se lee esta tabla

Cada fila es **un caso**: una entrada concreta, una acción, y un resultado que
se puede verificar sin discutir. Si el resultado real coincide con el esperado,
**PASA**; si no, **FALLA** y se anota qué pasó.

Un caso mal escrito es el que necesita que tú interpretes si pasó o no. Si hay
que discutir, la prueba no sirve.

---

## 1. Registrar un pedido (RF-01, RF-02, HU-01)

| Id | Entrada | Acción | Resultado esperado | Tipo |
|---|---|---|---|---|
| P-01 | cliente, producto, cantidad y fecha válidos | confirmar | el pedido se guarda y aparece confirmación | normal |
| P-02 | nombre del cliente vacío | confirmar | no guarda, señala el campo | error |
| P-03 | fecha de entrega anterior a hoy | confirmar | no guarda, explica por qué | borde |
| P-04 | cantidad = 0 | confirmar | no guarda, señala la cantidad | borde |
| P-05 | nombre con 200 caracteres | confirmar | guarda o corta con aviso, **no rompe** | borde |
| P-19 | cantidad = 5000 | confirmar | no guarda, señala la cantidad (el tope es 1000) | borde |

<!-- Fíjate en la columna "tipo". Es común escribir solo casos
     "normal": lo que debería pasar cuando todo va bien. Pero las fallas
     suelen aparecer en los casos de borde y de error.

     La regla práctica: por cada caso normal, al menos uno de error o de
     borde. En esta tabla hay 1 normal y 5 de borde/error, y así debe ser.

     P-19 se agregó después de la primera corrida: una cantidad enorme no
     cabía en la columna y el servidor respondía 500 en vez de 400. Un caso
     que encuentra una falla se queda en la matriz para siempre.          -->

---

## 2. Ver los pedidos de hoy (RF-03, RF-06, HU-02)

| Id | Entrada | Acción | Resultado esperado | Tipo |
|---|---|---|---|---|
| P-06 | hay pedidos para hoy y para otros días | abrir la vista | se ven solo los de hoy, ordenados | normal |
| P-07 | no hay pedidos para hoy | abrir la vista | mensaje "no hay pedidos", no pantalla en blanco | vacío |
| P-08 | el servidor está caído | abrir la vista | mensaje de error claro, no se congela | error |

<!-- P-07 y P-08 son los tres estados del Día 13 convertidos en pruebas. Los
     casos que ya se manejaron en el código son exactamente los que hay que
     verificar aquí. Si el Día 13 se hizo bien, estas dos pasan solas; si se
     saltó un estado, esta tabla lo encuentra.                              -->

---

## 3. Marcar como entregado (RF-05, HU-03)

| Id | Entrada | Acción | Resultado esperado | Tipo |
|---|---|---|---|---|
| P-09 | un pedido pendiente | marcar entregado | desaparece de pendientes | normal |
| P-10 | un pedido ya entregado | buscarlo | se encuentra y se puede revertir | error humano |

---

## 4. Seguridad (del Día 12)

| Id | Entrada | Acción | Resultado esperado | Tipo |
|---|---|---|---|---|
| P-11 | `?categoria=1 OR 1=1` en la URL | enviar | 400, no devuelve ningún producto (nunca todo el catálogo) | seguridad |
| P-12 | comilla simple en un campo de texto | guardar | se guarda como texto, no rompe la consulta | seguridad |
| P-20 | `?categoria=abc` en la URL | enviar | 400 con un mensaje claro, no una lista vacía | error |

<!-- Estas dos prueban que los prepared statements del Día 12 funcionan. Es
     lo bueno de una matriz: la seguridad deja de ser "confío en que está
     bien" y pasa a ser una fila que PASA o FALLA como cualquier otra.      -->

---

## 5. Ver el catálogo (RF-08)

| Id | Entrada | Acción | Resultado esperado | Tipo |
|---|---|---|---|---|
| P-13 | hay productos disponibles y agotados | abrir el sistema | se ven todos, con su precio y si están disponibles | normal |

---

## 6. La parte de la dueña (RNF-06 y RF-06)

| Id | Entrada | Acción | Resultado esperado | Tipo |
|---|---|---|---|---|
| P-14 | sin sesión | abrir `pedidos.php` o `panel.php` en el navegador | 401, no se ve ningún pedido | seguridad |
| P-15 | contraseña equivocada, o un usuario que no existe | entrar | no entra, y el mensaje es el mismo en los dos casos | error |
| P-16 | usuario y contraseña correctos | entrar | se ve el panel con los números del día | normal |
| P-17 | tres pedidos para hoy, uno ya entregado | abrir el panel | pedidos, total en Bs y por entregar coinciden con la base | normal |
| P-18 | ningún pedido para hoy | abrir el panel | 0, Bs 0.00 y 0, no «null» ni pantalla en blanco | vacío |

<!-- P-14 es la prueba que importa: la protección vive en el servidor, y por
     eso se prueba pidiendo el endpoint directo, sin pasar por la página. -->

---

## Registro de las corridas

Se corre la matriz completa y se anota. La **primera corrida** del ejemplo se hizo
sobre una versión anterior del código, y encontró tres fallas:

| Id | Resultado | Nota |
|---|---|---|
| P-03 | **FALLA** | guardó con fecha de ayer; faltaba la validación |
| P-10 | **FALLA** | no había forma de revertir; faltaba la función |
| P-19 | **FALLA** | con cantidad 5000 respondió 500, no 400; faltaba el tope |
| las demás | PASA | P-05 corta a 100 letras, con aviso |

Las tres se corrigieron en `pedidos.php` (la fecha anterior a hoy y la cantidad
de más de 1000 se rechazan con 400, y existe `accion=deshacer`) y en `panel.js`
(el botón "Deshacer" en los pedidos entregados). Después se corrió **la matriz
completa otra vez**, no solo las tres filas:

| Id | Resultado | Nota |
|---|---|---|
| P-01 a P-20 | PASA | segunda corrida, con el código de esta carpeta |

**Tres fallas, y las tres fueron hallazgos buenos:** dos validaciones que faltaban
(P-03 y P-19) y una función que no existía (P-10). La matriz no arregla el software,
pero **indica qué hay que arreglar**, y la segunda corrida comprueba que el arreglo
no rompió otra cosa. En tu proyecto, la primera corrida es la que se anota tal
como salió.

