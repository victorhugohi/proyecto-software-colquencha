# Guía de estudio N.° 3: objetivos y justificación

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 3 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después trabaja en tu `propuesta.md`. Puedes
avanzar a tu ritmo: cuando termines, sigue con la guía del día siguiente. El cuestionario del final
sirve para comprobar que entendiste; respóndelo con tus propias palabras.

---

## Primera parte. Lectura

### 1. Dónde aparece la solución

Hasta ahora la propuesta describió el problema del cliente sin mencionar la solución. En esta
sección la solución aparece por primera vez, pero con una forma precisa: los objetivos dicen qué
va a lograr el proyecto, y la justificación explica por qué vale la pena hacerlo y por qué de esa
manera.

### 2. El objetivo general

El objetivo general responde al problema central del Día 2. Si el problema era que *"el registro de
pedidos no permite consultar qué preparar cada día"*, el objetivo general propone lo contrario:
*"desarrollar un sistema que permita consultar los pedidos pendientes por fecha"*.

Es uno solo y empieza con un verbo en infinitivo que describe lo que hace quien desarrolla el
proyecto: desarrollar, implementar, diseñar. Si el verbo describe algo que depende de otras
personas, hay que cambiarlo. *"Mejorar la atención al cliente"* depende del cliente y de su
personal; *"desarrollar un sistema que..."* depende de ti.

### 3. Los objetivos específicos

Los objetivos específicos dividen el general en resultados concretos. Cada uno se revisa con una
pregunta: al terminar el proyecto, ¿se puede decir si se cumplió o no, sin discutirlo? Si hace
falta interpretarlo, hay que reescribirlo.

Hay tres errores frecuentes:

| Error | Ejemplo | Por qué no sirve |
|---|---|---|
| un deseo | "mejorar la gestión de pedidos" | no se puede decir si se cumplió |
| una tarea | "instalar XAMPP y crear la base de datos" | describe cómo se trabaja, no qué se logra |
| algo ajeno | "lograr que el cliente esté satisfecho" | no depende de quien hace el proyecto |

Lo habitual es tener entre tres y cinco objetivos específicos. Con ocho, probablemente la mitad son
tareas; con uno solo, probablemente repite el general. Además, uno de ellos debería ser verificar
que el sistema funciona, porque si la verificación no figura como objetivo, suele quedar para el
final y no llega a hacerse.

Cada objetivo específico tiene que atacar una causa del árbol de problemas del Día 2. Un objetivo
que no ataca ninguna causa no hace falta.

Algunas metas son deseables, pero no dependen del software: "capacitar al personal" o "aumentar
las ventas". No van en los objetivos; se escriben en las recomendaciones, al final del documento.

### 4. La justificación

La justificación explica por qué el proyecto vale la pena. Se puede escribir desde tres enfoques,
y con dos bien desarrollados suele ser suficiente:

| Enfoque | Qué responde | Con qué se escribe |
|---|---|---|
| práctico | qué mejora concretamente | los números de la formulación del problema |
| técnico | por qué esta solución y no otra | las condiciones del cliente |
| social | a quién más beneficia | si corresponde |

El error más común es empezar con un párrafo como *"En la actualidad, los sistemas de información
son fundamentales para toda organización moderna..."*. Ese párrafo podría estar en cualquier
proyecto, así que no dice nada del tuyo. Una forma sencilla de revisarlo es preguntarse si se
podría copiar tal cual en el proyecto de un compañero.

La justificación técnica es la que más se pregunta en una defensa. Cada "porque" tiene que
apoyarse en una condición del cliente, no en una preferencia de quien escribe.

### 5. El ejemplo de la Panadería del Barrio

En el documento de ejemplo (`propuesta.md`, en la carpeta del código del día) los objetivos
quedaron así:

> **Objetivo general.** Desarrollar un sistema web de registro y consulta de pedidos por encargo
> para la Panadería del Barrio, que permita consultar los pedidos pendientes por fecha de entrega
> y conservar el registro con respaldo.
>
> **Objetivos específicos.**
> 1. Diseñar la base de datos relacional que registre los productos y los pedidos de cada
>    cliente, con la fecha de entrega como criterio de consulta.
> 2. Implementar el registro de un pedido nuevo desde el navegador, con validación de los datos
>    obligatorios.
> 3. Implementar la consulta de pedidos pendientes filtrada por fecha de entrega.
> 4. Verificar el funcionamiento del sistema mediante una matriz de casos de prueba que cubra el
>    registro, la consulta y los casos de error.

Y la justificación técnica:

> Se elige una aplicación web y no una de escritorio porque el negocio ya tiene el frontend
> construido y publicado, y porque debe consultarse desde el celular del mostrador y desde la
> computadora de la trastienda sin instalar nada.

La forma es la misma para otros tipos de sistema. En una barbería, un objetivo específico podría
ser *"implementar el registro de reservas por día y hora, que no permita asignar dos clientes al
mismo turno"*. En una tienda: *"implementar el registro de ventas que descuente el stock de cada
prenda vendida"*.

---

## Segunda parte. Trabajo en tu proyecto

Escribe en tu `propuesta.md`, a continuación de la formulación del problema:

1. **Un objetivo general**: tu problema central del Día 2, propuesto como solución.
2. **Tres a cinco objetivos específicos**, cada uno verificable con sí o no, y cada uno ligado a
   una causa de tu árbol de problemas. Uno de ellos debe ser verificar que el sistema funciona.
3. **La justificación**, con al menos dos enfoques. En el práctico, usa tus números del Día 2; en
   el técnico, explica por qué elegiste ese tipo de sistema según las condiciones de tu cliente.

Antes de dar por terminada la sección, revisa:

- [ ] El objetivo general empieza con un verbo que describe lo que tú haces, y es uno solo.
- [ ] A cada objetivo específico se le puede responder sí o no al terminar.
- [ ] Ninguno es una tarea ("instalar", "configurar", "estudiar") ni depende de otros.
- [ ] La justificación no se podría copiar en el proyecto de un compañero.

Si tienes dudas, estos son los problemas más frecuentes:

| Lo que te pasa | Qué hacer |
|---|---|
| tu objetivo dice "mejorar" | pregúntate qué vas a construir para lograrlo |
| tus objetivos específicos son pasos | escribe el resultado de cada paso, no el paso |
| tu justificación suena a introducción de libro | reescríbela con los números de tu cliente |
| no sabes qué poner en la justificación técnica | responde por qué web, por qué ese tipo de sistema y qué condición de tu cliente lo pide |

Al terminar, guarda tu avance:

```bash
git add propuesta.md
git commit -m "docs: objetivos y justificacion"
git push
```

---

## Cuestionario de repaso

1. ¿Qué relación hay entre el problema central y el objetivo general?
2. ¿Por qué "mejorar la atención al cliente" no sirve como objetivo de un proyecto de software?
3. Indica si cada uno es un objetivo específico bien escrito, un deseo o una tarea, y explica por
   qué:
   a. "Instalar XAMPP y crear la base de datos."
   b. "Implementar la consulta de pedidos pendientes filtrada por fecha de entrega."
   c. "Mejorar la gestión de pedidos de la panadería."
4. ¿Por qué conviene que verificar el sistema sea uno de los objetivos específicos?
5. ¿Dónde se escribe "capacitar al personal", y por qué no va en los objetivos?
6. ¿Cómo puedes saber si tu justificación es demasiado general?
7. Escribe un "porque" de tu justificación técnica que se apoye en una condición de tu cliente.

---

## Para la próxima clase

El Día 4 trata la factibilidad, los alcances y los límites del proyecto: qué se va a hacer y qué
no. Conviene llegar con los objetivos escritos, porque el alcance se define a partir de ellos.
