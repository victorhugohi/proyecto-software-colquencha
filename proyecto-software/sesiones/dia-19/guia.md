# Guía de estudio N.° 19: el documento final y la defensa

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 19 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después compila tu documento final y ensaya tu
defensa. El cuestionario del final sirve para comprobar que entendiste; respóndelo con tus propias
palabras.

El documento final y el sistema se congelan el lunes 7 a las 23:59.

---

## Primera parte. Lectura

### 1. El documento ya está escrito

Durante cuatro semanas escribiste el documento por partes, en distintos archivos. Hoy se ensambla:
se ordena, se numera y se revisa que las partes sean coherentes entre sí. Si parece imposible
terminarlo, casi siempre es porque falta una pieza de alguna semana, no porque compilar sea difícil.

### 2. El orden de lectura

El documento no sigue el orden en que se escribió, sino el orden en que lo necesita el lector. El
marco teórico se escribió el Día 7, pero va después del problema y los objetivos, porque el lector
necesita conocer el problema antes que el estado del arte. El índice se arma al final, cuando el
orden ya es definitivo.

| # | Sección | De dónde sale |
|---|---|---|
| - | Carátula e índice | se arman hoy |
| - | Resumen | Día 5 |
| 1 | Introducción | Día 5 |
| 2 | Formulación del problema | Día 2 |
| 3 | Objetivos | Día 3 |
| 4 | Justificación | Día 3 |
| 5 | Factibilidad, alcances y límites | Día 4 |
| 6 | Marco teórico | Día 7 |
| 7 | Metodología | Día 7 |
| 8 | Requerimientos | Día 9 |
| 9 | Historias de usuario | Día 10 |
| 10 | Diseño de la base de datos | Día 11 |
| 11 | Pruebas | Día 14 |
| 12 | Presupuesto | Día 15 |
| 13 | Conclusiones | Día 18 |
| 14 | Recomendaciones | Día 18 |
| - | Referencias | Día 8 |
| - | Anexos | se ordenan hoy |

### 3. Qué va en los anexos

La regla: si alguien necesita verlo para confiar en el trabajo, pero no para seguir el hilo, va al
anexo. El instrumento del Día 6 fue clave para conseguir los datos, pero el lector no necesita las
preguntas de la entrevista para entender el proyecto; por eso va al anexo. Lo mismo el código
completo: en el cuerpo va la explicación de por qué se diseñó así, y el código va en un anexo.

### 4. Los tres cruces de coherencia

Antes de entregar, se lee el documento completo de una vez, revisando tres cruces:

1. ¿Cada objetivo (Día 3) tiene su conclusión (Día 18)?
2. ¿Cada requerimiento (Día 9) tiene su prueba (Día 14)?
3. ¿El problema (Día 2) y las conclusiones (Día 18) hablan de lo mismo?

Si alguno no cierra, hay algo que corregir, y hoy todavía se puede. Conviene revisar también que el
documento hable de tu cliente: si quedó "la panadería" en algún lugar, es una parte copiada sin
adaptar.

### 5. El PDF

El documento se entrega como `documento-final.pdf` en tu repositorio, con carátula, índice y
secciones numeradas. Si lo escribiste en Markdown, puedes pasarlo a Word con
`pandoc documento-final.md -o documento-final.docx` y exportarlo como PDF desde Word o Writer.

### 6. La defensa

El examen final es una exposición de 10 minutos: 6 para mostrar el sistema funcionando, empezando
por el problema de tu cliente, y 4 para responder preguntas sobre tus decisiones. La pregunta
central es *«¿por qué lo hiciste así?»*, y la respuesta muestra si entiendes por qué tomaste cada
decisión. Casi siempre esa respuesta ya está escrita en tu documento.

Si te preguntan algo que no resolviste, dilo: *"eso lo dejé en las recomendaciones"* es una
respuesta válida. Inventar una respuesta es peor que reconocer lo que falta.

---

## Segunda parte. Trabajo en tu proyecto

### Compila tu documento

1. Arma el documento en el orden de la tabla anterior.
2. Pon en anexos el instrumento, el código completo, la corrida de pruebas y el plan de puesta en
   producción.
3. Revisa los tres cruces de coherencia y corrige lo que no cierre.
4. Busca y reemplaza cualquier dato que no sea de tu cliente.
5. Numera las secciones, arma el índice y saca `documento-final.pdf`.

### Ensaya tu defensa

1. Muestra tu proyecto en 6 minutos, sin leer, empezando por el problema de tu cliente.
2. Pídele a un compañero que te pregunte "¿por qué lo hiciste así?" sobre tres decisiones.
3. Si alguna no tiene respuesta, prepárala hoy.

Antes de dar por terminado el día, revisa:

- [ ] El documento está en el orden de lectura, con el código en anexo.
- [ ] Los tres cruces cierran, y no quedan datos que no sean de tu cliente.
- [ ] `documento-final.pdf` abre bien: carátula, índice y secciones numeradas.
- [ ] Puedes contar tu proyecto sin leer y responder "¿por qué?".

| Lo que te pasa | Qué hacer |
|---|---|
| te falta una sección | revisa la tabla y recupera esa pieza del día que corresponde |
| un objetivo no tiene conclusión | vuelve a la guía del Día 18 |
| un requerimiento no tiene prueba | vuelve a la guía del Día 14 |
| no tienes `pandoc` | está en la carpeta de programas de la memoria; o copia el texto a Writer y exporta |

Al terminar, guarda tu avance:

```bash
git add .
git commit -m "docs: compilacion del documento final y anexos"
git push
```

---

## Cuestionario de repaso

1. ¿Por qué el marco teórico va después de los objetivos, si se escribió después del problema?
2. ¿Qué regla decide si algo va en el cuerpo o en un anexo?
3. ¿Cuáles son los tres cruces de coherencia?
4. ¿Por qué el índice se arma al final?
5. ¿Cómo se reparten los 10 minutos de la defensa?
6. ¿Qué conviene responder si te preguntan algo que no resolviste?
7. Elige una decisión de tu proyecto y escribe por qué la tomaste.

---

## Para el examen final

El examen final es el martes 8 y el miércoles 9, en el orden del sorteo. Lleva el sistema
funcionando y el documento listo.
