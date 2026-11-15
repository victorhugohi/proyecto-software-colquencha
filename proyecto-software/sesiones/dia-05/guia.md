# Guía de estudio N.° 5: cronograma, resumen e introducción

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 5 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después trabaja en tu `propuesta.md`. Puedes
avanzar a tu ritmo: cuando termines, sigue con la guía del día siguiente. El cuestionario del final
sirve para comprobar que entendiste; respóndelo con tus propias palabras.

Con esta guía se completa la propuesta, que es el **Laboratorio 1**.

---

## Primera parte. Lectura

### 1. Primero se descompone, después se pone fecha

Si se empieza por el calendario, se ponen fechas sin saber todavía qué se va a entregar. Por eso
primero se descompone el trabajo en paquetes, y recién después se ubica cada paquete en el tiempo.
Esa descomposición se llama *WBS* (*Work Breakdown Structure*, la estructura de desglose del
trabajo).

La WBS se arma con sustantivos, no con verbos: "base de datos", no "hacer la base de datos". El
sustantivo nombra algo que va a existir al terminar; el verbo describe una actividad, y las
actividades sin un producto claro son las que se alargan sin fin. Los nombres dependen de cada
sistema: "agenda de turnos" en una barbería, "registro de ventas" y "control de stock" en una
tienda, "registro de pedidos" en la panadería del ejemplo.

Dos reglas prácticas: ningún paquete debería durar más de una semana (si dura más, conviene
dividirlo), y bastan dos o tres niveles; más abajo ya se están listando tareas del día.

### 2. El cronograma

El cronograma ubica los paquetes en las semanas del módulo, que son las fechas reales. Tiene una
columna que suele olvidarse: el **entregable**, es decir, qué queda hecho cuando termina esa fila.
Esa columna es la que permite verificar después si el cronograma se cumplió.

Al armar el cronograma se ve también si el alcance del Día 4 cabe en el tiempo que hay. Si no cabe,
todavía se puede volver a los límites y recortar.

### 3. El resumen

El resumen va en la primera página, pero se escribe al final, cuando ya existe lo que hay que
resumir. Si se escribió el Día 1, hay que reescribirlo entero.

Tiene entre 150 y 250 palabras y responde cuatro preguntas: qué problema hay, qué se hizo, cómo se
hizo y qué resultado se espera. No lleva citas ni subsecciones, ni fórmulas como "el presente
documento tiene por objeto". Muchos lectores solo leen el resumen, así que tiene que bastar para
entender de qué trata el proyecto.

### 4. La introducción

La introducción no repite el resumen. Presenta el proyecto con más detalle y anuncia cómo está
organizado el documento. El párrafo que la distingue es el último, el que dice algo como *"el
documento se organiza en cinco partes: la primera presenta la propuesta..."*.

### 5. El ejemplo de la Panadería del Barrio

En `propuesta.md` (en la carpeta del código del día), el cronograma tiene una fila por semana, cada
una con su entregable:

| Semana | Paquete | Entregable |
|---|---|---|
| 1 | 1.1 a 1.4 | Propuesta completa (Lab 1) |
| 2 | 2.1 a 2.4 | Marco teórico y requerimientos (Lab 2) |
| 3 | 3.1 a 3.3 | Sistema funcionando con base de datos (Lab 3) |
| 4 | 4.1 a 4.3 | Sistema respaldado y documento final |

Y el resumen, de 163 palabras, empieza por el problema del cliente:

> La Panadería del Barrio, negocio familiar de Colquencha en funcionamiento desde 1998, registra
> sus pedidos por encargo en un cuaderno físico. Entre el 1 y el 31 de marzo de 2026 no se
> entregaron 12 pedidos sobre un total aproximado de 140, y la revisión diaria del cuaderno toma
> entre 15 y 20 minutos.

---

## Segunda parte. Trabajo en tu proyecto

Escribe en tu `propuesta.md`:

1. **La WBS**: tu proyecto dividido en paquetes, con sustantivos, en dos o tres niveles.
2. **El cronograma**: los paquetes ubicados en las cuatro semanas del módulo, con la columna de
   entregables. Si tu alcance no cabe, vuelve a los límites del Día 4 y mueve algo.
3. **El resumen**, de 150 a 250 palabras, con las cuatro respuestas. Pídele a un compañero que lea
   solo el resumen y te cuente de qué trata tu proyecto.
4. **La introducción**, que termine anunciando la estructura del documento.

Con eso, la propuesta tiene las ocho secciones de la Unidad 2. Antes de entregarla, revisa que
estén todas y que no tengan los cinco errores que más se descuentan:

- [ ] resumen, introducción, formulación del problema, justificación, objetivos, factibilidad,
      alcances y límites, y cronograma
- [ ] el problema no menciona la solución ("no tiene un sistema")
- [ ] los objetivos no son tareas ni deseos
- [ ] la justificación habla de tu cliente y no serviría para cualquier proyecto
- [ ] cada límite dice por qué
- [ ] el resumen está escrito ahora y resume el documento completo

Si tienes dudas, estos son los problemas más frecuentes:

| Lo que te pasa | Qué hacer |
|---|---|
| tu WBS tiene verbos | reescríbela con sustantivos: ¿qué va a existir al terminar? |
| una fila del cronograma no tiene entregable | encuéntrale uno, o quítala |
| el cronograma no te alcanza | vuelve a los límites del Día 4 y mueve algo |
| tu resumen tiene 400 palabras | deja solo las cuatro respuestas |
| tu resumen empieza con "el presente documento" | empieza por el problema de tu cliente |

Al terminar, guarda tu avance:

```bash
git add propuesta.md
git commit -m "docs: propuesta completa - Lab 1"
git push
```

---

## Cuestionario de repaso

1. ¿Por qué la WBS se arma antes que el cronograma?
2. ¿Qué diferencia hay entre "base de datos" y "hacer la base de datos" como paquete de la WBS?
3. ¿Para qué sirve la columna de entregables del cronograma?
4. ¿Por qué el resumen se escribe al final, si va en la primera página?
5. ¿Qué cuatro preguntas responde el resumen?
6. ¿En qué se diferencia la introducción del resumen?
7. Escribe tres paquetes de la WBS de tu proyecto, con sustantivos.

---

## Para la próxima clase

El Día 6 empieza la Unidad 3, con la recopilación de información: cómo se construye el instrumento
con el que se consiguen los datos del cliente. Si todavía no hiciste la entrevista que preparaste
el Día 2, conviene hacerla antes, porque ese día se trabaja con lo que hayas conseguido.
