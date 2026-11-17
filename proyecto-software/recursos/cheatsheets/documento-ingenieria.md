# El documento de ingeniería - formas y reglas

Los tres laboratorios son capítulos del **mismo documento**, que se entrega completo como
**`documento-final.pdf`** en tu repositorio antes del freeze (lun 7 a las 23:59). Esto es la referencia
de las formas que se usan. **Imprimir y tener al lado.**

> **En qué lo escribes:** Markdown (la recomendada), Word, Writer o LaTeX. Lo que sea, con tres reglas:
> vive en tu repositorio, guardas el avance en cada clase, y al final un PDF con carátula, índice y
> secciones numeradas. Detalle en «Tu documento», en la guía del módulo.

> **No es una plantilla para llenar.** Es la lista de las pruebas que cada sección tiene que
> pasar. Si una sección no pasa su prueba, está mal escrita aunque tenga el formato correcto.

## El orden del documento final

El orden en que se **entrega** no es el orden en que se **escribe**.

| # | Sección | Se escribió el Día |
|---|---|---|
| - | Carátula · Índice | 19 |
| - | Resumen | 5 |
| 1 | Introducción | 5 |
| 2 | Formulación del problema | 2 |
| 3 | Objetivos | 3 |
| 4 | Justificación | 3 |
| 5 | Factibilidad, alcances y límites | 4 |
| 6 | Marco teórico | 7 |
| 7 | Metodología | 7 |
| 8 | Requerimientos | 9 |
| 9 | Historias de usuario | 10 |
| 10 | Diseño de la base de datos | 11 |
| 11 | Pruebas | 14 |
| 12 | Presupuesto | 15 |
| 13 | Conclusiones | 18 |
| 14 | Recomendaciones | 18 |
| - | Referencias | 8 |
| - | Anexos | 19 |

El marco teórico se escribe el Día 7 pero va en la posición 6: **el lector necesita el
problema antes que el estado del arte.**

## Objetivos

**Uno general, cuatro específicos.**

El objetivo general es **el problema en positivo**:

| Problema | Objetivo general |
|---|---|
| el registro **no permite consultar** qué preparar | **desarrollar** un sistema que permita consultar por fecha |

Verbo en infinitivo que describe **lo que tú haces**: desarrollar, implementar, diseñar.

Si el verbo describe algo que no depende de ti, cámbialo: *"mejorar la atención al cliente"*
depende del cliente; *"desarrollar un sistema que…"* depende de ti.

Cada objetivo específico se revisa así: al terminar, ¿se puede decir si se cumplió o no, sin
discutirlo? Si hay que explicar para responder, reescríbelo.

**SMART, aplicado a software:**

| | |
|---|---|
| **S**pecific | dice qué, no "mejorar" |
| **M**easurable | se puede verificar si se cumplió |
| **A**chievable | con el tiempo y los recursos que hay |
| **R**elevant | ataca **una causa del árbol del problema** |
| **T**ime-bound | cabe en el cronograma |

La **R** es la que más se olvida: un objetivo que no ataca ninguna causa del árbol no hace falta.

**Los tres tipos de objetivo mal escrito:** el **deseo** ("mejorar la atención"), la **tarea**
("instalar XAMPP") y el **ajeno** ("aumentar las ventas del cliente").

## Justificación

Tres ángulos; **con dos alcanza**:

| Ángulo | Responde |
|---|---|
| práctica | qué mejora concretamente para el cliente |
| técnica | por qué **esta** solución y no otra |
| social | a quién más beneficia, si aplica |

Un error frecuente: *"En la actualidad los sistemas de información son fundamentales para toda
organización moderna…"*. Ese párrafo podría estar en cualquier proyecto, así que no justifica el
tuyo. Cada "porque" se apoya en un dato de tu cliente.

## Requerimientos - IEEE 830

**La estructura:**

```
1. Introducción       1.1 Propósito · 1.2 Alcance · 1.3 Definiciones · 1.4 Referencias
2. Requerimientos funcionales
3. Requerimientos no funcionales
4. Requerimientos omitidos de la norma, y por qué
```

**Funcionales** - qué hace el sistema:

| ID | Requerimiento | Prioridad | Origen |
|---|---|---|---|
| RF-01 | El sistema **debe** permitir registrar un pedido con cliente, producto, cantidad y fecha | alta | problema central |
| RF-07 | El sistema **debería** permitir buscar un pedido por nombre del cliente | baja | entrevista 13/11 |

**No funcionales** - cómo se comporta. Llevan columna de verificación:

| ID | Requerimiento | Cómo se verifica |
|---|---|---|
| RNF-01 | El registro **debe** completarse en no más de **60 segundos** | cronometrar tres registros |
| RNF-03 | Usable desde un navegador móvil de **360 px** sin desplazamiento horizontal | abrir en el emulador |

Tres reglas que deciden si están bien escritos:

1. **`debe` ≠ `debería`.** `debe` es obligatorio; `debería` es deseable. Si todo es `debe`, no se
   sabe qué es prioritario.
2. **La columna `origen`.** Cada requerimiento sale de algo verificable: el problema central, una
   entrevista con fecha, una observación. Un requerimiento sin origen no se puede justificar.
3. **Si no se te ocurre cómo verificarlo, reescríbelo.** La forma de verificarlo es lo que
   distingue un requerimiento de una intención.

## Referencias - APA

```
LIBRO      Apellido, N. (año). Título del libro (edición). Editorial.
WEB        Apellido, N. (año). Título. Sitio. URL
NORMA      Organismo. (año). Título de la norma (código). Editorial.
```

**Elige una norma y úsala en todo el documento.** Mezclar normas es un error frecuente y muy visible.

> **Las entrevistas no van en la bibliografía.**
>
> Se citan en el texto - *(J. Pérez, comunicación personal, 13 de noviembre de 2026)* - y se
> declaran aparte, como **fuentes no bibliográficas**. Casi todos van a necesitar esto,
> porque casi todos los proyectos se apoyan en entrevistas.

Si no encuentras el año de una página web, pon **(s.f.)** - sin fecha. Es convención APA y es
mejor que inventar.

## Marco teórico

No es un glosario: responde *¿qué se hizo antes y por qué no me sirve tal cual?*

Para detectar el relleno, pregúntate si cada párrafo cambia alguna decisión. Si no, quítalo.

La **matriz comparativa**: las columnas salen de las condiciones de tu proyecto, no de una
lista genérica. Va una fila con tu solución propia - y **en qué pierde**, que es justamente
lo que le da credibilidad.

## Conclusiones y recomendaciones

| | |
|---|---|
| **Conclusión** | qué se logró, contra los objetivos específicos. Una por objetivo |
| **Recomendación** | qué haría el siguiente que tome esto. No es una disculpa por lo que faltó |

Una conclusión que no se puede leer al lado de su objetivo específico no es una conclusión.

## La revisión de coherencia, antes de entregar

- [ ] Cada objetivo específico tiene su conclusión
- [ ] Cada requerimiento funcional tiene su caso de prueba
- [ ] El problema del Día 2 y el objetivo general siguen siendo el mismo tema
- [ ] Todo lo citado en el texto está en Referencias, y nada más
- [ ] Las entrevistas están como fuentes no bibliográficas, no en la bibliografía
- [ ] El índice tiene los números de página reales
- [ ] Los anexos están numerados y **referidos desde el texto**
