# Guía de estudio N.° 6: recopilación de información

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 6 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después prepara tu instrumento en un archivo
nuevo, `instrumento.md`. Puedes avanzar a tu ritmo: cuando termines, sigue con la guía del día
siguiente. El cuestionario del final sirve para comprobar que entendiste; respóndelo con tus
propias palabras.

Antes de leer, saca las preguntas que usaste en la entrevista con tu cliente. Si todavía no lo
entrevistaste, escribe tres preguntas que le harías. Las vas a revisar con lo que sigue.

---

## Primera parte. Lectura

### 1. Para qué sirve el instrumento

Con esta guía empieza la Unidad 3. El instrumento es la herramienta con la que se consiguen los
datos del cliente: las preguntas de la entrevista, el plan de la observación y lo que se revisa de
sus registros. No va dentro de la propuesta; va en los anexos. Lo que va al documento son los
resultados que se obtienen con él.

### 2. Tres técnicas, tres preguntas distintas

| Técnica | Alcance | Qué responde |
|---|---|---|
| entrevista | pocas personas, mucha profundidad | ¿por qué hacen las cosas así? |
| encuesta | muchas personas, poca profundidad | ¿cuántos hacen o piensan algo? |
| observación | el proceso real | ¿cómo lo hacen en realidad? |

La técnica se elige según la pregunta que hay que responder. En un negocio familiar, con dos o
tres personas, una encuesta da menos información que una entrevista; por eso conviene explicar
también por qué no se usa. Eso muestra que la técnica se eligió, y no que se aplicaron todas por
costumbre.

### 3. La observación

Es la técnica que más información da y la que menos se usa. Lo que la gente hace no siempre
coincide con lo que dice que hace, no porque mienta, sino porque es difícil recordar con precisión
una rutina diaria.

La observación se registra en una tabla de tres columnas: el momento, lo que se observó y qué
contradice o confirma lo que se dijo en la entrevista. La tercera columna es la que convierte las
notas en hallazgos.

Como tu cliente es un familiar, cuida que la observación no se convierta en lo que ya crees saber:
anota solo lo que ves.

### 4. Cómo se escribe una buena pregunta

Una pregunta de entrevista cumple cuatro reglas:

| Regla | Ejemplo que la rompe | Por qué falla |
|---|---|---|
| es abierta, no de sí o no | "¿Le sirve el cuaderno?" | se responde "sí" y no aporta nada |
| no sugiere la respuesta | "¿No le parece grave perder pedidos?" | trae la respuesta adentro |
| pregunta una sola cosa | "¿Cuántos recibe y cómo los anota?" | se responde una y se olvida la otra |
| no usa jerga | "¿Qué requerimientos no funcionales prioriza?" | no significa nada para quien atiende |

Hay tres preguntas que conviene incluir siempre. La primera es una instrucción: *«muéstreme cómo lo
hace»*, porque las personas describen con poca precisión lo que hacen a diario, y cuando lo
muestran se ve cómo lo hacen en realidad. La segunda es sobre el contexto de uso: dónde está la
persona y con qué tiene las manos ocupadas cuando hace la tarea; de ahí salen requerimientos que
nadie pediría directamente. La tercera cierra la entrevista: *«¿hay algo que no le pregunté y que
debería saber?»*, que suele traer algo que no estaba en el guion.

Las preguntas se adaptan al tipo de sistema. En una barbería: *«¿cómo sabe hoy qué turnos tiene
mañana?»*; en una tienda: *«¿cómo sabe cuántas prendas le quedan de una talla?»*; en un servicio
técnico: *«¿cómo sabe en qué estado está cada equipo que recibió?»*.

### 5. El ejemplo de la Panadería del Barrio

En `instrumento.md` (en la carpeta del código del día), la observación de dos horas en el
mostrador encontró esto:

| Momento | Qué se observó | Qué contradice o confirma |
|---|---|---|
| 09:15 | pedido tomado por teléfono, anotado en un papel suelto y pasado al cuaderno 20 min después | contradice "siempre se anota en el cuaderno" |
| 10:40 | para saber qué preparar se revisan tres hojas hacia atrás | confirma los 15 a 20 minutos declarados |
| 11:05 | un pedido se anota sin el teléfono del cliente | "siempre se anota el teléfono" no se cumple |

Dos de las tres observaciones contradicen lo que se dijo en la entrevista. Eso es lo habitual.
Cada hallazgo, además, tiene un destino en el documento: el papel intermedio va a la formulación
del problema; la consulta por hojas, a un requerimiento funcional; las manos ocupadas, a un
requerimiento no funcional (pocos campos y botones grandes).

---

## Segunda parte. Trabajo en tu proyecto

Crea `instrumento.md` con:

1. **Las técnicas que vas a usar** (al menos dos), por qué cada una, y por qué descartaste las
   otras.
2. **La guía de entrevista**, de diez a quince preguntas, agrupadas en apertura, proceso actual,
   problemas, contexto de uso y cierre. Revisa cada una con las cuatro reglas e incluye las tres
   preguntas que conviene hacer siempre.
3. **El plan de observación**: qué momento del día, cuánto tiempo y qué vas a mirar. Si tu cliente
   no puede recibirte, pídele media hora en un momento de mucho movimiento; si aun así no se
   puede, escríbelo como límite del instrumento.
4. **La tabla de observación**, con sus tres columnas, cuando la apliques.
5. **La tabla de hallazgos**: cada hallazgo y la sección del documento donde se usa.

Aplica la entrevista y la observación lo antes posible: el marco teórico y los requerimientos se
escriben con esos datos.

Antes de dar por terminado el instrumento, revisa:

- [ ] Elegiste al menos dos técnicas y explicaste por qué, también las que no usas.
- [ ] Tus preguntas pasan las cuatro reglas.
- [ ] Están «muéstreme cómo lo hace», una pregunta sobre el contexto de uso y la pregunta de cierre.
- [ ] Tu tabla de observación tiene la tercera columna.

| Lo que te pasa | Qué hacer |
|---|---|
| tus preguntas se responden con sí o no | empiézalas con "cómo", "cuándo" o "qué pasa cuando" |
| no sabes qué observar | mira el momento del día en que ocurre el problema que formulaste |
| tienes treinta preguntas | quédate con quince; después de eso la gente responde cualquier cosa |
| no sabes si grabar | pide permiso; si no lo dan, toma notas y revísalas con tu cliente |

Al terminar, guarda tu avance (si usas git):

```bash
git add instrumento.md
git commit -m "docs: instrumento de recoleccion"
git push
```

---

## Cuestionario de repaso

1. ¿Qué diferencia hay entre lo que responde una entrevista y lo que responde una observación?
2. ¿Por qué no conviene hacer una encuesta a tres personas?
3. ¿Para qué sirve la tercera columna del registro de observación?
4. Reescribe estas preguntas para que cumplan las cuatro reglas:
   a. "¿Le sirve el cuaderno?"
   b. "¿No le parece grave perder pedidos?"
5. ¿Por qué «muéstreme cómo lo hace» da mejores resultados que «¿cómo lo hace?»?
6. ¿Qué tipo de requerimiento sale de una pregunta sobre el contexto de uso?
7. Escribe dos preguntas para tu cliente que sean propias de su tipo de negocio.

---

## Para la próxima clase

El Día 7 se escribe el marco teórico: qué se ha hecho antes para resolver el problema de tu
cliente. Para eso hacen falta los datos que produce este instrumento.
