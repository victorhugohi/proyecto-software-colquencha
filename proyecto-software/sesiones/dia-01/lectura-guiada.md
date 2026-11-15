# Guía de lectura N.° 1: tipos de proyecto y formulación del problema

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Docente: MSc Victor Hugo Huanca Ibarra · 11 de noviembre de 2026

**Instrucciones.** Lee el texto completo y después responde el cuestionario en una hoja de papel, a
mano, con tu nombre y la fecha. No hace falta copiar las preguntas: basta con escribir el número.
Responde con tus propias palabras; las respuestas copiadas del texto no se toman en cuenta.

---

## Primera parte. Tipos de trabajo académico

### 1. Del producto al proyecto

En el módulo de Programación Web cada uno construyó una página para un cliente. La página muestra sus
productos, tiene un formulario de pedido, se adapta al celular y está publicada. Es un producto
terminado y funciona.

Sin embargo, la página por sí sola no explica por qué se eligió a ese cliente, qué problema le
resuelve, cuánto cuesta mantenerla ni cómo se comprobó que funciona. Responder esas preguntas es parte
de un proyecto, y es el trabajo de este módulo: definir el problema, los objetivos, los
requerimientos, las pruebas, los costos y la entrega. Además, la página necesita una base de datos,
porque hasta ahora sus datos están guardados en un archivo JSON.

El sistema que se construya depende del negocio de cada cliente, y las opciones son muchas. Una
barbería puede necesitar reservas de turnos; una pollería, pedidos para llevar; una tienda de ropa,
ventas y control de inventario; un servicio técnico, el seguimiento de los equipos que recibe. El
ejemplo de este material es una panadería con pedidos por encargo, pero cada estudiante aplica los
mismos pasos a su propio caso.

### 2. Cuatro tipos de trabajo

En la universidad se habla de monografías, proyectos integradores, proyectos de grado y trabajos de
investigación. Los cuatro pueden tratar el mismo tema, por ejemplo los pedidos de un negocio, la salud
o un colegio. Lo que los distingue es lo que entregan al final.

La **monografía** estudia un tema a partir de fuentes y lo expone de forma ordenada. No construye
nada: el resultado es un documento. Por ejemplo, un estudio sobre cómo registran sus ventas los
comerciantes de un mercado.

El **proyecto integrador** resuelve un problema concreto de un cliente real construyendo algo, en
nuestro caso un sistema. El resultado es el software junto con la documentación que justifica cada
decisión. Por ejemplo, un sistema de pedidos para una panadería, con su documento de ingeniería.

El **proyecto de grado** se parece al integrador, pero exige un aporte original, es decir, algo que
no se limita a aplicar lo que ya se conoce. Además, se defiende ante un tribunal.

El **trabajo de investigación** busca responder una pregunta que todavía no tiene respuesta. Para eso
sigue un método y recoge datos, y el resultado es conocimiento nuevo. Por ejemplo, medir si los
recordatorios por mensaje aumentan la asistencia a las citas de una posta de salud.

| Tipo | Qué entrega | Qué pregunta responde |
|---|---|---|
| Monografía | un documento; no construye nada | ¿Qué se sabe sobre este tema? |
| Proyecto integrador | el software y su documentación | ¿Qué necesita este cliente y cómo se le construye? |
| Proyecto de grado | lo mismo, con aporte original y defensa ante tribunal | ¿Qué aporta que no existía? |
| Investigación | conocimiento nuevo, obtenido con un método y datos | ¿Por qué ocurre esto? ¿Qué pasa si...? |

El trabajo de este módulo es un proyecto integrador.

### 3. Un error frecuente

Es común pensar que un proyecto de grado es más difícil por su tema, como si unos temas fueran "de
grado" y otros fueran pequeños. En realidad, la diferencia está en el aporte original que se le exige
y en el tribunal que lo evalúa. Por eso un mismo sistema de pedidos puede ser un buen proyecto
integrador y, a la vez, un proyecto de grado insuficiente.

### 4. Este módulo y la Modalidad de Graduación

Este módulo no es la Modalidad de Graduación. En esa etapa, más adelante, cada estudiante elige cómo
se titula: con un trabajo de investigación, un proyecto, una pasantía u otra opción. En este módulo se
aprende a elaborar un proyecto completo, de principio a fin, y lo que se escriba este mes puede servir
de borrador para ese momento.

### 5. Se continúa con el mismo proyecto

Cada uno sigue con el mismo cliente, el mismo repositorio y la misma página del módulo anterior. No se
empieza un proyecto nuevo.

| Lo que ya existe (Programación Web) | Lo que se hace en este módulo |
|---|---|
| la página funcionando y publicada | la propuesta que la justifica |
| los datos en un archivo JSON | una base de datos (PHP y MySQL) |
| "en mi computadora funciona" | requerimientos, pruebas, costos y puesta en producción |

Documentar un trabajo propio tiene una ventaja: cada decisión que se justifica en el documento es una
decisión que de verdad se tomó.

El módulo se organiza así. En la primera semana se escribe la propuesta (el problema, los objetivos,
la factibilidad, los alcances y el cronograma), que se entrega como Laboratorio 1 el miércoles 18 de
noviembre. En la segunda semana se trabajan el marco teórico y los requerimientos. En la tercera se
vuelve al código, con la base de datos y el servidor. En la cuarta se ven los costos, la entrega y la
defensa.

### 6. La ficha del cliente

Todo el proyecto depende del cliente. Si la descripción del cliente es vaga, el problema, los
objetivos y los requerimientos también lo serán. Por eso la ficha del cliente registra tres datos:

1. **Quién es:** el nombre del negocio, el rubro y cuántas personas trabajan ahí.
2. **Qué hace hoy:** cómo resuelve actualmente lo que el sistema le va a resolver. Por ejemplo,
   "anota los encargos en un cuaderno y no tiene copia" o "da los turnos por WhatsApp y a veces
   se le cruzan dos clientes a la misma hora".
3. **De dónde salió la información:** por ejemplo, "entrevista con la dueña, 12 de octubre, en el
   local".

El tercer dato es el que más suele faltar, y es el que permite defender el proyecto, porque muestra que
la información viene del cliente y no de una suposición. Una forma sencilla de comprobarlo es
preguntarse si uno puede llamar a su cliente esta semana.

El cliente es un familiar del estudiante: el negocio o la actividad de alguien de su familia. Eso
facilita lo que el proyecto necesita: entrevistarlo, observar cómo trabaja y volver a consultarle
durante el mes.

## Segunda parte. La formulación del problema

### 7. Qué responde esta sección

La formulación del problema es la sección más importante de la propuesta, porque todo lo demás se
apoya en ella: los objetivos responden al problema, los requerimientos salen de él y las pruebas
comprueban si se resolvió. Responde dos preguntas: qué está mal hoy en el negocio del cliente y cómo
se sabe. No dice qué se va a construir ni con qué tecnología.

El error más común es escribir algo como "la panadería no tiene un sistema de pedidos". Esa frase
describe la falta de la solución que se va a proponer, no lo que le pasa al negocio. Lo que le pasa
es otra cosa: que se pierden pedidos, que se tarda en saber qué hay que preparar, que no hay copia
del registro.

### 8. Tres reglas para escribirla

**No se menciona la solución.** Para revisar cada frase, conviene preguntarse si sería verdad aunque
el proyecto no existiera. "Se perdieron 12 pedidos en marzo" es verdad haya o no sistema; "falta un
sistema de pedidos" solo tiene sentido si ya se pensó en construir uno. Por eso, en esta sección no
deberían aparecer palabras como "sistema", "aplicación" o "no tiene".

**Se mide.** Una queja como "se pierden pedidos" se convierte en problema cuando tiene un número:
"12 pedidos no entregados en marzo, sobre unos 140 encargos". El total importa, porque 12 de 140 no
es lo mismo que 12 de 15. Lo mismo vale para otros negocios: en una barbería, "6 turnos cruzados en
octubre, sobre unas 200 atenciones"; en una tienda, "3 veces en el mes se vendió una prenda que ya
no había en stock".

**Se indica de dónde sale cada dato.** Por ejemplo: "según la propietaria" o "entrevista del 13 de
noviembre". Si el cliente no lleva registros, casi siempre puede estimar: "la propietaria estima unos
15 pedidos por semana". Una estimación del cliente, citada como tal, es un dato válido; un número
inventado no lo es.

### 9. El árbol de problemas

El árbol de problemas ayuda a separar el problema de sus causas y de sus efectos. Arriba van los
efectos, lo que se nota (clientes insatisfechos, pérdida de ingresos); en el centro, el problema
central, en una sola frase; abajo, las causas, es decir, por qué ocurre (los pedidos se anotan en
orden de llegada y no por fecha de entrega, el cuaderno es el único registro).

En el ejemplo de la Panadería del Barrio, el problema central queda así: "El registro de pedidos por
encargo no permite consultar de forma confiable qué debe prepararse cada día, lo que ocasiona pedidos
no entregados y tiempo dedicado a revisar información dispersa".

Hay dos errores frecuentes al armar el árbol. El primero es poner un efecto como problema central:
"los clientes se quejan" es un efecto, y el problema es lo que lo produce. El segundo es poner como
causa "no tienen un sistema", que de nuevo es la solución.

### 10. La entrevista al cliente

Los datos de esta sección salen de una entrevista con el cliente, de unos 20 minutos. Conviene
llevar las preguntas escritas. Tres que suelen dar buen resultado son: "¿me muestra cómo lo hace
hoy?", porque es mejor verlo que oírlo; "¿cuándo fue la última vez que salió mal?", de donde salen
los números; y "¿qué pasaría si no se arregla?", de donde salen los efectos. A esas se agregan dos o
tres preguntas propias, pensadas para ese negocio.

El plazo para la entrevista es el miércoles 18 de noviembre.

---

## Cuestionario

**Primera parte**

1. Si los cuatro tipos de trabajo pueden tratar el mismo tema, ¿qué los diferencia?
2. Nombra tres cosas que le faltan a tu página de Programación Web para ser un proyecto.
3. ¿Por qué un mismo sistema puede ser un buen proyecto integrador y un proyecto de grado
   insuficiente?
4. Indica qué tipo de trabajo es cada uno de los siguientes y explica por qué, en una línea:
   a. "Análisis comparativo de los sistemas de inventario que usan los comercios de La Paz."
   b. "Sistema web de reservas para la peluquería Estilo, con panel de administración."
   c. "¿Influyen los recordatorios por WhatsApp en la asistencia a citas médicas? Estudio en tres
      postas de salud."
   d. "Aplicación de control de asistencia para un colegio, con reporte mensual y un algoritmo propio
      para detectar patrones de ausentismo."
   e. "Historia y situación actual del comercio electrónico en Bolivia."
5. ¿Qué tipo de trabajo es tu propio proyecto? Explica por qué no es ninguno de los otros tres y qué
   le faltaría para ser un proyecto de grado.
6. Escribe la ficha de tu cliente con sus tres datos y qué relación familiar tienes con él. Si
   todavía no conoces alguno de los datos, anota "todavía no lo sé". Indica también qué tipo de
   sistema necesita (pedidos, reservas, ventas, inventario u otro).

**Segunda parte**

7. ¿Por qué "la panadería no tiene un sistema de pedidos" no es una buena formulación del problema?
   Reescríbela como problema.
8. ¿Qué diferencia hay entre una queja y un problema? Da un ejemplo de cada uno con el negocio de tu
   cliente.
9. Clasifica cada frase como causa, problema central o efecto:
   a. "Los clientes reclaman porque su pedido no estaba listo."
   b. "Los pedidos se anotan en orden de llegada y no por fecha de entrega."
   c. "El registro de pedidos no permite saber con certeza qué preparar cada día."
   d. "El cuaderno es el único registro y no tiene copia."
10. Dibuja el árbol de problemas de tu cliente, con al menos dos efectos y dos causas, y escribe el
    problema central en una sola frase. Si te falta algún dato, escribe qué le preguntarías.
11. Escribe las preguntas que llevarías a la entrevista con tu cliente: las tres de la sección 10,
    adaptadas a su negocio, y dos o tres propias.

---

## Antes del lunes 16

- El jueves 12 y el viernes 13 no hay clases. Son días para hablar con el cliente: confirmarle que el
  proyecto continúa y acordar con él los 20 minutos de la entrevista, a más tardar el miércoles 18.
- El cliente del proyecto es un familiar con un negocio o una actividad real, a quien se pueda
  entrevistar. Desde el lunes 16 ya no se cambia de cliente.
