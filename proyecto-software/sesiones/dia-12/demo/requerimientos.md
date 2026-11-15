<!-- ═══════════════════════════════════════════════════════════════════════
     Especificación de requerimientos - documento de ejemplo

     ⚠️ Es el proyecto de ejemplo del módulo, no el tuyo.

     Sigue la estructura de la IEEE 830-1998, sección 5, adaptada al tamaño
     del proyecto. La norma completa tiene secciones que aquí no aplican
     (interfaces de hardware, requisitos de rendimiento en tiempo real): se
     usan las que sirven, y se dice cuáles se omiten.

     Un documento de requerimientos responde una pregunta:
        ¿qué tiene que hacer el sistema para que se pueda decir que está
         terminado?

     Y todo lo que diga cómo se hace, sobra. El cómo es diseño, y es la
     semana que viene.
     ═══════════════════════════════════════════════════════════════════════ -->

# Especificación de requerimientos

## Sistema de gestión de pedidos - Panadería del Barrio

Basado en IEEE 830-1998
Versión 1.0 · 23 de noviembre de 2026

---

## 1. Introducción

### 1.1 Propósito

Especificar los requerimientos funcionales y no funcionales del sistema de
gestión de pedidos, de modo que sea posible verificar objetivamente si el
sistema entregado los cumple.

### 1.2 Alcance

El sistema registra y consulta pedidos por encargo. No incluye facturación,
inventario ni notificaciones automáticas, conforme a los límites establecidos
en la propuesta.

### 1.3 Definiciones

| Término | Significado en este documento |
|---|---|
| **Pedido** | encargo de uno o más productos con fecha de entrega comprometida |
| **Pendiente** | pedido cuya fecha de entrega no ha pasado y no está marcado como entregado |
| **Operador** | persona que registra o consulta pedidos: propietaria o empleada |

<!-- Las definiciones no son un glosario general. Son los términos que en
     este proyecto tienen un significado preciso, y que sin definir producen
     ambigüedad. "Pendiente" es el caso típico: sin definirlo, cada quien
     entiende algo distinto y el requerimiento no se puede verificar.      -->

### 1.4 Referencias

Ver el marco teórico del proyecto.

---

<!-- ── Requerimientos funcionales ──────────────────────────────────────
     Qué tiene que hacer el sistema.

     La forma, y es la que hace verificable un requerimiento:

        El sistema debe [verbo] [qué] [bajo qué condición]

     Tres reglas:

     1. Un requerimiento, una cosa. Si dice "registrar y notificar", son dos.
        Se parten, porque uno puede cumplirse y el otro no.

     2. "Debe" no es adorno. La ISO 29148 distingue: "debe" es obligatorio,
        "debería" es deseable. Si todo es "debe", nada tiene prioridad.

     3. Se puede verificar. Ese es el filtro de la ISO 29148: si un
        requerimiento no se puede comprobar, hay que reescribirlo hasta que
        se pueda.

     La prueba: ¿puedo escribir un caso de prueba que dé PASA o FALLA sobre
     esto? Si no, está mal escrito. Y esa es exactamente la matriz del
     Día 14.                                                               -->

## 2. Requerimientos funcionales

| Id | Requerimiento | Prioridad | Origen |
|---|---|---|---|
| Rf-01 | El sistema **debe** permitir registrar un pedido con cliente, producto, cantidad y fecha de entrega | alta | problema central |
| rf-02 | El sistema **debe** rechazar el registro si falta el nombre del cliente, el producto o la fecha de entrega | alta | observación 18/11: pedidos anotados sin datos completos |
| rf-03 | El sistema **debe** listar los pedidos pendientes ordenados por fecha de entrega | alta | problema central |
| rf-04 | El sistema **debe** permitir filtrar los pedidos por una fecha determinada | alta | entrevista 13/11 |
| rf-05 | El sistema **debe** permitir marcar un pedido como entregado | alta | ciclo de vida del pedido |
| rf-06 | El sistema **debe** mostrar el total de pedidos pendientes para el día en curso | media | entrevista 13/11 |
| rf-07 | El sistema **debería** permitir buscar un pedido por nombre del cliente | baja | entrevista 13/11 |
| rf-08 | El sistema **debe** mostrar el catálogo de productos con su precio y si está disponible | alta | el pedido elige un producto |

<!-- Fíjate en rf-07: dice "debería", no "debe". Es lo deseable, no lo
     obligatorio. Si el tiempo alcanza se hace; si no, el sistema igual
     cumple. Poner todo como "debe" es lo mismo que no priorizar nada.

     Y fíjate en la columna origen. Cada requerimiento sale de algo que se
     documentó antes: el problema, la entrevista, la observación. Un
     requerimiento sin origen es un requerimiento inventado, y esos son los
     que hacen crecer el alcance sin control.                              -->

---

<!-- ── Requerimientos no funcionales ───────────────────────────────────
     Cómo tiene que comportarse el sistema. No qué hace, sino con qué
     cualidades.

     El problema de esta sección: casi todos escriben deseos.
        "El sistema debe ser rápido."
        "El sistema debe ser fácil de usar."
        "El sistema debe ser seguro."
     Nada de eso se puede verificar. ¿Rápido cuánto? ¿Fácil para quién?

     La regla: un requerimiento no funcional lleva un número o un criterio
     observable. Si no lo lleva, no se puede verificar.

     Además, casi todos los no funcionales de un proyecto real salen de
     las preguntas "laterales" del Día 6. "Se trabaja con las manos
     ocupadas" se convierte en un número: el registro en menos de 60
     segundos, con no más de cuatro campos.                                -->

## 3. Requerimientos no funcionales

| Id | Requerimiento | Cómo se verifica |
|---|---|---|
| RNF-01 | El registro de un pedido **debe** completarse en no más de **60 segundos** por un operador con capacitación mínima | cronometrar tres registros con la empleada |
| RNF-02 | El formulario de registro **debe** tener a lo sumo **cuatro campos obligatorios** | contar los campos |
| RNF-03 | El sistema **debe** ser usable desde un navegador móvil de **360 px** de ancho sin desplazamiento horizontal | abrir en el emulador a 360 px |
| RNF-04 | Los controles táctiles **deben** medir al menos **44 × 44 px** | medir en el inspector |
| RNF-05 | El sistema **debe** conservar los datos ante el cierre del navegador | cerrar y reabrir; los pedidos siguen |
| RNF-06 | El acceso al registro **debe** requerir usuario y contraseña | intentar entrar sin credenciales |

<!-- Cada uno tiene su columna de verificación, y esa columna es la que
     convierte una intención en un requerimiento. Si no se te ocurre cómo
     verificarlo, no está bien escrito.

     RNF-01 y RNF-02 salen directamente de la observación del Día 6: se
     trabaja con las manos ocupadas y con un cliente esperando. Eso es lo
     que hace que estos números no sean arbitrarios.                       -->

---

## 4. Requerimientos omitidos de la norma

La IEEE 830 contempla secciones que no aplican a este proyecto y se omiten
explícitamente:

- **interfaces de hardware**: el sistema no interactúa con dispositivos
- **requisitos de rendimiento en tiempo real**: no hay restricciones de
  latencia más allá de RNF-01
- **requisitos de portabilidad entre sistemas operativos**: al ser una
  aplicación web, el navegador resuelve la portabilidad

<!-- Declarar lo que se omite y por qué es lo que distingue usar una norma de
     copiarla. Una plantilla llena de secciones vacías con "No aplica" no
     demuestra criterio; decir cuáles no aplican y por qué, sí.            -->

