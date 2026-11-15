# Guía de estudio N.° 9: requerimientos

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 9 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después escribe tus requerimientos en un
archivo nuevo, `requerimientos.md`. Puedes avanzar a tu ritmo: cuando termines, sigue con la guía
del día siguiente. El cuestionario del final sirve para comprobar que entendiste; respóndelo con
tus propias palabras.

Con esta guía se completa el **Laboratorio 2**: el marco teórico y los requerimientos.

---

## Primera parte. Lectura

### 1. Qué responde la especificación de requerimientos

La especificación responde una pregunta: **qué tiene que hacer el sistema para que se pueda decir
que está terminado**. No dice cómo se hace; eso es diseño, y se ve desde el Día 11. Se escribe con
la plantilla de la norma IEEE 830, que ordena el documento en propósito, alcance, definiciones,
requerimientos funcionales y no funcionales.

La forma de un requerimiento es: *el sistema debe [verbo] [qué] [bajo qué condición]*.

### 2. Tres reglas

**Un requerimiento, una cosa.** Si dice "registrar y notificar", son dos, porque uno puede cumplirse
y el otro no. Se escriben en filas separadas.

**"Debe" y "debería" significan cosas distintas.** "Debe" es obligatorio; "debería", deseable. Si
todo es "debe", no hay forma de saber qué es prioritario cuando falte tiempo.

**Se puede verificar.** Para cada requerimiento se pregunta si se puede escribir un caso de prueba
que dé PASA o FALLA. Si no se puede, todavía es una intención y hay que reescribirlo. Los
requerimientos de hoy son las filas de la matriz de pruebas del Día 14: lo que hoy quede vago, allá
no se va a poder probar.

Cada requerimiento lleva además una columna de **origen**: el problema, la entrevista o la
observación de donde salió. Un requerimiento sin origen no se puede justificar, y suele ser el que
hace crecer el alcance sin control.

### 3. Los requerimientos no funcionales

Los funcionales dicen qué hace el sistema; los no funcionales, cómo tiene que ser: rápido, fácil de
usar, seguro. Aquí está el error más común, que es escribir deseos:

| Deseo | Requerimiento |
|---|---|
| "debe ser rápido" | "el registro debe completarse en no más de 60 segundos" |
| "debe ser fácil de usar" | "el formulario debe tener a lo sumo cuatro campos obligatorios" |
| "debe ser seguro" | "el acceso debe requerir usuario y contraseña" |

Un requerimiento no funcional lleva un número o un criterio observable, y una columna que dice cómo
se verifica. Estos requerimientos salen de las preguntas sobre el entorno de trabajo del Día 6: si
se trabaja con las manos ocupadas, el registro tiene que ser rápido y con pocos campos; si se usa
desde el celular, tiene que verse bien en una pantalla de 360 píxeles de ancho.

### 4. Las definiciones

La sección de definiciones no es un glosario. Define los términos que en este proyecto tienen un
significado preciso y que, sin definir, producen ambigüedad. En el ejemplo, "pendiente" parece
obvio, pero cada persona podría entender algo distinto, y entonces el requerimiento que lo usa no se
podría verificar.

La norma también tiene secciones que no aplican a todos los proyectos. En lugar de llenarlas con "no
aplica", se dice cuáles se omiten y por qué.

### 5. El ejemplo de la Panadería del Barrio

En `requerimientos.md` (en la carpeta del código del día):

| ID | Requerimiento | Prioridad | Origen |
|---|---|---|---|
| RF-01 | El sistema debe permitir registrar un pedido con cliente, producto, cantidad y fecha de entrega | alta | problema central |
| RF-02 | El sistema debe rechazar el registro si falta el nombre del cliente, el producto o la fecha de entrega | alta | observación del 18/11 |
| RF-07 | El sistema debería permitir buscar un pedido por nombre del cliente | baja | entrevista del 13/11 |

| ID | Requerimiento no funcional | Cómo se verifica |
|---|---|---|
| RNF-01 | El registro de un pedido debe completarse en no más de 60 segundos por un operador con capacitación mínima | cronometrar tres registros con la empleada |
| RNF-03 | El sistema debe ser usable desde un navegador móvil de 360 px de ancho sin desplazamiento horizontal | abrir en el emulador a 360 px |

La forma vale para cualquier sistema. Reservas: *"El sistema debe impedir registrar dos reservas
para el mismo barbero, día y hora"*. Ventas: *"El sistema debe descontar del stock la cantidad
vendida al registrar una venta"*.

---

## Segunda parte. Trabajo en tu proyecto

Crea `requerimientos.md` con:

1. **Propósito, alcance y definiciones**: los términos de tu proyecto que podrían entenderse de
   distintas maneras.
2. **Requerimientos funcionales**: de seis a ocho, que cubran tus objetivos del Día 3, uno por fila,
   con prioridad y origen. Al menos uno con "debería".
3. **Requerimientos no funcionales**: cada uno con un número o un criterio observable, y con la
   columna de cómo se verifica. Búscalos en tus notas de observación del Día 6.
4. **Secciones omitidas de la norma**, con el motivo.

Antes de dar por terminada la sección, revisa:

- [ ] Cada requerimiento dice qué, no cómo, y hay uno solo por fila.
- [ ] Al menos uno es "debería", y todos tienen origen.
- [ ] Cada no funcional tiene un número y la forma de verificarlo.
- [ ] Para cada requerimiento puedes imaginar un caso de prueba PASA o FALLA.

| Lo que te pasa | Qué hacer |
|---|---|
| tu requerimiento dice cómo | eso es diseño: déjalo para la semana 3 |
| no sabes qué número poner | mídelo con tu cliente: cronometra el proceso actual |
| todos tus requerimientos son "debe" | pregúntate cuál sacrificarías si falta tiempo: ese es "debería" |
| no encuentras el origen de uno | búscale respaldo en tus notas, o quítalo |
| escribiste "el sistema debe ser intuitivo" | pregúntate qué observarías para saber que lo es: eso es el requerimiento |

El Laboratorio 2 reúne el marco teórico (con su matriz, la fila de tu solución, la metodología y las
referencias) y estos requerimientos.

Al terminar, guarda tu avance:

```bash
git add requerimientos.md marco-teorico.md
git commit -m "docs: requerimientos IEEE 830 - Lab 2"
git push
```

---

## Cuestionario de repaso

1. ¿Qué pregunta responde la especificación de requerimientos?
2. ¿Cuál de estos se puede verificar, y por qué?
   a. "El sistema debe ser rápido."
   b. "El sistema debe ser fácil de usar."
   c. "El registro de un pedido debe completarse en no más de 60 segundos."
3. ¿Qué diferencia hay entre "debe" y "debería"?
4. ¿Por qué cada requerimiento necesita una columna de origen?
5. ¿De dónde salen los requerimientos no funcionales en este módulo?
6. ¿Por qué en el ejemplo se define "pendiente", si parece obvio?
7. Escribe un requerimiento funcional y uno no funcional de tu proyecto, con su origen y su forma de
   verificarlo.

---

## Para la próxima clase

El Día 10 es el primer parcial, y después se escriben las historias de usuario. Es el último día
dedicado solo al documento: desde el Día 11 se vuelve a programar.
