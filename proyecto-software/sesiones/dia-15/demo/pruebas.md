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

## 1. Registrar un pedido (rf-01, rf-02, hu-01)

| Id | Entrada | Acción | Resultado esperado | Tipo |
|---|---|---|---|---|
| P-01 | cliente, producto, cantidad y fecha válidos | confirmar | el pedido se guarda y aparece confirmación | normal |
| P-02 | nombre del cliente vacío | confirmar | no guarda, señala el campo | error |
| P-03 | fecha de entrega anterior a hoy | confirmar | no guarda, explica por qué | borde |
| P-04 | cantidad = 0 | confirmar | no guarda, señala la cantidad | borde |
| P-05 | nombre con 200 caracteres | confirmar | guarda o corta con aviso, **no rompe** | borde |

<!-- Fíjate en la columna "tipo". Es común escribir solo casos
     "normal": lo que debería pasar cuando todo va bien. Pero las fallas
     suelen aparecer en los casos de borde y de error.

     La regla práctica: por cada caso normal, al menos uno de error o de
     borde. En esta tabla hay 1 normal y 4 de borde/error, y así debe ser.  -->

---

## 2. Ver los pedidos de hoy (rf-03, rf-06, hu-02)

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

## 3. Marcar como entregado (rf-05, hu-03)

| Id | Entrada | Acción | Resultado esperado | Tipo |
|---|---|---|---|---|
| P-09 | un pedido pendiente | marcar entregado | desaparece de pendientes | normal |
| P-10 | un pedido ya entregado | buscarlo | se encuentra y se puede revertir | error humano |

---

## 4. Seguridad (del Día 12)

| Id | Entrada | Acción | Resultado esperado | Tipo |
|---|---|---|---|---|
| P-11 | `?categoria=1 OR 1=1` en la URL | enviar | devuelve solo lo correcto, no todo | seguridad |
| P-12 | comilla simple en un campo de texto | guardar | se guarda como texto, no rompe la consulta | seguridad |

<!-- Estas dos prueban que los prepared statements del Día 12 funcionan. Es
     lo bueno de una matriz: la seguridad deja de ser "confío en que está
     bien" y pasa a ser una fila que PASA o FALLA como cualquier otra.      -->

---

## 5. Ver el catálogo (rf-08)

| Id | Entrada | Acción | Resultado esperado | Tipo |
|---|---|---|---|---|
| P-13 | hay productos disponibles y agotados | abrir el sistema | se ven todos, con su precio y si están disponibles | normal |

---

## Registro de una corrida

Se corre la matriz completa y se anota. Una corrida de ejemplo:

| Id | Resultado | Nota |
|---|---|---|
| P-01 | PASA | |
| P-02 | PASA | |
| P-03 | **FALLA** | guardó con fecha de ayer; falta la validación |
| P-04 | PASA | |
| P-05 | PASA | corta a 100, con aviso |
| P-06 | PASA | |
| P-07 | PASA | |
| P-08 | PASA | |
| P-09 | PASA | |
| P-10 | **FALLA** | no hay forma de revertir; hay que agregarla |
| P-11 | PASA | |
| P-12 | PASA | |
| P-13 | PASA | |

**Dos fallas, y las dos son hallazgos buenos:** una validación que falta (P-03)
y una función que no existe (P-10). La matriz no arregla el software, pero **indica qué hay
que arreglar**.

