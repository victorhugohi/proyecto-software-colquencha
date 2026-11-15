<!-- ═══════════════════════════════════════════════════════════════════════
     Instrumento de recolección de información - documento de ejemplo

     ⚠️ Es el proyecto de ejemplo del módulo, no el tuyo.

     Este documento no va en la propuesta: es una herramienta de trabajo. Lo
     que va al documento final es lo que se obtiene con él, y eso alimenta el
     marco teórico (Día 7) y los requerimientos (Día 9).

     La entrevista del Día 2 fue exploratoria: sirvió para entender el
     problema. Esta es distinta: es sistemática, y busca datos que se puedan
     citar.
     ═══════════════════════════════════════════════════════════════════════ -->

# Instrumento de recolección - Panadería del Barrio

Proyecto: Sistema de gestión de pedidos
Fecha de aplicación: 18 de noviembre de 2026

---

<!-- ── Qué técnica se usa, y por qué ────────────────────────────────────
     Las tres que sirven en un proyecto de este tamaño:

       Entrevista    pocas personas, mucha profundidad.
                     Para entender por qué hacen las cosas como las hacen.

       Encuesta      muchas personas, poca profundidad.
                     Para contar cuántos piensan o hacen algo.

       Observación   mirar el proceso real, sin preguntar.
                     Para ver lo que la gente hace, que no siempre es lo que
                     dice que hace.

     Criterio: la técnica se elige según la pregunta,
     no por comodidad. Si la pregunta es "¿cuántos?", encuesta. Si es "¿por
     qué?", entrevista. Si es "¿cómo lo hacen de verdad?", observación.

     Es frecuente que la observación contradiga algo de la
     entrevista, porque es difícil recordar con precisión lo que se hace
     todos los días.                                -->

## Técnicas seleccionadas

| Técnica | A quién | Qué se busca | Por qué esta técnica |
|---|---|---|---|
| Entrevista semiestructurada | propietaria | el proceso completo y sus excepciones | requiere profundidad, y es una sola persona |
| Observación directa | mostrador, 2 horas | cómo se registra un pedido **de verdad** | lo que se hace no siempre es lo que se dice |
| Revisión documental | cuaderno de pedidos | volumen real y tipos de error | el dato ya existe, solo hay que contarlo |

No se aplica encuesta: el universo son dos personas, y una encuesta a dos
personas es una entrevista con menos información.

<!-- Ese último párrafo es importante: justificar por qué no se usa una
     técnica es tan válido como justificar por qué sí, y demuestra que se
     eligió en vez de aplicar todo por costumbre.                          -->

---

## Guía de entrevista

<!-- ── Cómo se escribe una pregunta ─────────────────────────────────────
     Cuatro reglas, y las cuatro se rompen:

     1. Abierta, no de sí o no. "¿Le sirve el cuaderno?" se responde con
        "sí" y no aporta nada. "¿Cómo usa el cuaderno?" abre.

     2. No sugiere la respuesta. "¿No le parece que perder pedidos es un
        problema grave?" ya trae la respuesta adentro. Eso es una pregunta
        dirigida, y contamina el dato.

     3. Una cosa por pregunta. "¿Cuántos pedidos recibe y cómo los anota?"
        son dos preguntas: se responde una y se olvida la otra.

     4. Sin jerga. "¿Qué requerimientos no funcionales considera
        prioritarios?" no significa nada para quien atiende un mostrador.

     Y la más útil de todas, que no es una pregunta:
        "Muéstreme cómo lo hace."                                          -->

**Apertura**

1. Cuénteme cómo es un día normal en la panadería, desde que abren.
2. ¿En qué momento del día aparecen los pedidos por encargo?

**El proceso actual**

3. Muéstreme cómo anota un pedido. *(observar, no interrumpir)*
4. ¿Qué datos anota siempre? ¿Cuáles a veces?
5. ¿Cómo sabe, en la mañana, qué tiene que preparar ese día?
6. ¿Qué pasa cuando la persona que anotó no está?

**Los problemas**

7. ¿Cuándo fue la última vez que un pedido salió mal? ¿Qué pasó?
8. ¿Con qué frecuencia le parece que ocurre algo así?
9. ¿Qué hace cuando eso pasa?

**El contexto de uso**

10. ¿Con qué tiene las manos ocupadas cuando llega un pedido?
11. ¿Quién más tendría que poder registrar o consultar?
12. ¿Usa el celular durante el trabajo? ¿Para qué?

**Cierre**

13. Si pudiera cambiar una sola cosa del proceso actual, ¿cuál sería?
14. ¿Hay algo que no le pregunté y que debería saber?

<!-- Las preguntas 10 a 12 parecen laterales y son las que más cambian el
     diseño. La 10 define si el formulario puede tener doce campos. La 12
     define si la solución puede ser web en el celular.

     Y la 14 es la que más veces salva un proyecto: casi siempre aparece algo
     que no estaba en el guion.                                            -->

---

## Registro de la observación

| Momento | Qué se observó | Qué contradice o confirma |
|---|---|---|
| 09:15 | pedido tomado por teléfono, anotado en un papel suelto y pasado al cuaderno 20 min después | contradice "siempre se anota en el cuaderno" |
| 10:40 | consulta de lo que hay que preparar: se revisan 3 hojas hacia atrás | confirma los 15-20 minutos declarados |
| 11:05 | un pedido se anota sin el teléfono del cliente | el dato "siempre se anota el teléfono" no se cumple |

<!-- La columna de la derecha es la que hace útil la observación. Registrar
     lo que se vio sin compararlo con lo que se dijo es solo tomar notas.

     El hallazgo del papel suelto de las 09:15 es el dato más útil de la
     observación: explica cómo se pierden los pedidos.                      -->

---

## Resultados que alimentan el documento

| Hallazgo | Dónde se usa |
|---|---|
| los pedidos telefónicos pasan por un papel intermedio | formulación del problema (causa) |
| se consulta hacia atrás por hojas, no por fecha | requerimiento funcional de consulta |
| el teléfono del cliente no siempre se registra | validación de campos obligatorios |
| se trabaja con las manos ocupadas | requerimiento **no funcional**: pocos campos, botones grandes |

