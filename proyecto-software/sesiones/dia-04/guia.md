# Guía de estudio N.° 4: factibilidad, alcances y límites

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 4 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después trabaja en tu `propuesta.md`. Puedes
avanzar a tu ritmo: cuando termines, sigue con la guía del día siguiente. El cuestionario del final
sirve para comprobar que entendiste; respóndelo con tus propias palabras.

Antes de leer, intenta esto: en cinco minutos, escribe cinco cosas que tu sistema **no** va a
hacer. Si solo te salen dos, es normal, y la lectura explica por qué.

---

## Primera parte. Lectura

### 1. La factibilidad

Que al cliente le guste la idea no significa que el proyecto sea factible. La factibilidad revisa
tres dimensiones, y cada una se responde con datos del cliente, no con optimismo:

| Dimensión | Pregunta | Se responde con |
|---|---|---|
| técnica | ¿existe la tecnología, y se sabe usar? | qué se necesita y qué ya se domina |
| operativa | ¿el cliente va a poder usarlo? | quién lo usa y si ya sabe hacerlo |
| económica | ¿los costos son asumibles para ese cliente? | números, comparados con lo que se pierde hoy |

### 2. La factibilidad operativa

Es la que más proyectos hace fracasar: un sistema que el cliente no usa no resuelve el problema.
Casi todos escriben que su cliente "puede usarlo sin problema", pero esa frase no muestra nada. Lo
que hay que responder es quién lo va a usar todos los días, si ya sabe hacerlo y qué pasa si esa
persona no está.

Esta sección incluye al menos un **riesgo**, con su mitigación: algo que podría hacer que el
sistema, aun funcionando, no se use. En el ejemplo de la panadería, el riesgo es que se siga
anotando en el cuaderno "para pasarlo después". En una barbería, podría ser que el barbero no
revise las reservas del día y siga atendiendo por orden de llegada; en una tienda, que no se
registre cada venta y el stock deje de coincidir con lo que hay.

La factibilidad también puede concluir que algo no se puede. En ese caso el proyecto sigue, pero se
ajusta el alcance. Lo que no se acepta es declarar todo factible sin haberlo revisado.

### 3. La factibilidad económica

Un costo solo no dice mucho. *"La operación cuesta Bs 600 al año"* se vuelve un argumento cuando se
compara con lo que el cliente pierde hoy: *"Bs 600 al año, frente a unos Bs 420 perdidos en un solo
mes por pedidos no entregados"*. El detalle de los costos se ve el Día 15; aquí basta con el orden
de magnitud.

### 4. El alcance y los límites

El **alcance** es la lista de lo que el sistema sí va a entregar, y cada punto es algo que se puede
ver funcionando. Los **límites** son lo que queda fuera, y cada uno dice por qué. Hay tres razones
válidas para un límite:

1. no ataca el problema formulado;
2. excede el tiempo del módulo;
3. depende de algo externo, como un servicio de pago o una integración con otra institución.

*"No me dio tiempo"* no es una razón válida: los límites se deciden al planificar, antes de
programar. Si se dejan para el final, terminan siendo la lista de lo que no se alcanzó a hacer.

Los límites escritos también sirven más adelante. En la semana 3 suele aparecer la tentación de
agregar una pantalla más; con los límites escritos se puede mostrar que eso quedó fuera del
alcance desde el principio.

### 5. Ajustar el alcance a tiempo

Al escribir esta sección se descubre si el proyecto cabe en el tiempo que hay. Si no cabe, se
recorta ahora, moviendo puntos del alcance a los límites. Es incómodo, pero es mucho mejor que
descubrirlo el Día 13, con el sistema a medias.

### 6. El ejemplo de la Panadería del Barrio

En `propuesta.md` (en la carpeta del código del día), la factibilidad operativa dice quién usa el
sistema y cuál es el riesgo:

> El sistema lo van a usar la propietaria y una empleada, ambas con teléfono con navegador y
> experiencia usando aplicaciones de mensajería y banca móvil.
>
> *Riesgo identificado:* el registro depende de que se cargue el pedido en el momento. Si se
> sigue anotando en el cuaderno "para pasarlo después", el sistema no resuelve nada. Se mitiga
> dejando el registro accesible desde el celular del mostrador, sin instalar nada.

Y uno de los límites, con su razón:

> **Gestión de inventario ni de insumos.** El problema formulado es la pérdida de pedidos, no el
> control de stock. Incluirlo duplicaría el tamaño del proyecto sin atacar el problema central.

Observa que en otro proyecto el inventario sí podría estar en el alcance: en una tienda de ropa,
el control de stock suele ser justamente el problema central. El alcance depende del problema de
cada cliente.

---

## Segunda parte. Trabajo en tu proyecto

Escribe en tu `propuesta.md`, a continuación de la justificación:

1. **La factibilidad técnica**: qué necesita tu sistema y qué ya sabes usar.
2. **La factibilidad operativa**: quién lo va a usar todos los días, si ya sabe hacerlo, y al
   menos un riesgo con su mitigación.
3. **La factibilidad económica**: el costo de operación aproximado, comparado con lo que tu
   cliente pierde hoy.
4. **El alcance**: la lista de lo que tu sistema va a hacer.
5. **Los límites**: lo que no va a hacer, cada uno con una de las tres razones válidas.

Después pregúntate, con sinceridad: ¿esto lo puedo terminar en las semanas que quedan? Si la
respuesta es no, mueve puntos del alcance a los límites.

Antes de dar por terminada la sección, revisa:

- [ ] La operativa dice quién usa el sistema y si ya sabe hacerlo.
- [ ] Hay al menos un riesgo, con su mitigación.
- [ ] La económica compara el costo con lo que se pierde hoy.
- [ ] Cada límite dice qué queda fuera y por qué, y ninguno dice "no me dio tiempo".
- [ ] El alcance cabe en el tiempo que queda.

Si tienes dudas, estos son los problemas más frecuentes:

| Lo que te pasa | Qué hacer |
|---|---|
| solo se te ocurren dos límites | escribe primero el alcance: lo que no está ahí es un límite |
| no se te ocurre ningún riesgo | pregúntate qué tendría que pasar para que tu sistema no se use |
| tu cliente no va a pagar hosting | escríbelo: es un dato real y cambia la solución |
| tu alcance es enorme | mueve a los límites lo que no ataca el problema central |

Al terminar, guarda tu avance:

```bash
git add propuesta.md
git commit -m "docs: factibilidad, alcances y limites"
git push
```

---

## Cuestionario de repaso

1. ¿Por qué el hecho de que al cliente le guste la idea no demuestra que el proyecto es factible?
2. ¿Qué tiene que responder la factibilidad operativa?
3. ¿Para qué sirve escribir un riesgo, si parece jugar en contra del proyecto?
4. ¿Por qué el costo de operación se compara con lo que el cliente pierde hoy?
5. ¿Cuáles son las tres razones válidas para un límite? Da un ejemplo de cada una con tu proyecto.
6. ¿Por qué "no me dio tiempo" no es una razón válida?
7. En la panadería, el inventario es un límite. ¿En qué tipo de negocio podría ser parte del
   alcance, y por qué?

---

## Para la próxima clase

El Día 5 se completa la propuesta con el cronograma, el resumen y la introducción, y se entrega el
Laboratorio 1. Conviene llegar con la factibilidad, el alcance y los límites escritos.
