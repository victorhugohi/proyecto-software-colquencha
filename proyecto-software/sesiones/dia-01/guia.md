# Guía de estudio N.° 1: tipos de proyecto y punto de partida

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 1 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después empieza tu `propuesta.md`. Puedes
avanzar a tu ritmo: cuando termines, sigue con la guía del día siguiente. El cuestionario del final
sirve para comprobar que entendiste; respóndelo con tus propias palabras.

La explicación completa de este día está en la **Guía de lectura N.° 1** (primera parte). Aquí va un
resumen y el trabajo en tu proyecto.

---

## Primera parte. Lectura

### 1. Del producto al proyecto

La página que hiciste en Programación Web es un producto: funciona y está publicada. Pero no explica
por qué se eligió a ese cliente, qué problema le resuelve, cuánto cuesta mantenerla ni cómo se
comprobó que funciona. Responder esas preguntas es el trabajo de este módulo. Además, la página
necesita una base de datos, porque hasta ahora sus datos están en un archivo JSON.

### 2. Cuatro tipos de trabajo

| Tipo | Qué entrega | Qué pregunta responde |
|---|---|---|
| Monografía | un documento; no construye nada | ¿Qué se sabe sobre este tema? |
| Proyecto integrador | el software y su documentación | ¿Qué necesita este cliente y cómo se le construye? |
| Proyecto de grado | lo mismo, con aporte original y defensa ante tribunal | ¿Qué aporta que no existía? |
| Investigación | conocimiento nuevo, con un método y datos | ¿Por qué ocurre esto? ¿Qué pasa si...? |

Los cuatro pueden tratar el mismo tema; los distingue lo que entregan al final. El trabajo de este
módulo es un **proyecto integrador**. Un mismo sistema puede ser un buen proyecto integrador y, a la
vez, un proyecto de grado insuficiente, porque el proyecto de grado exige además un aporte original
y la defensa ante un tribunal.

Este módulo no es la Modalidad de Graduación: en esa etapa se elige cómo titularse. Aquí se aprende
a elaborar un proyecto completo, y lo que se escriba puede servir de borrador para ese momento.

### 3. Se continúa con el mismo proyecto

Cada uno sigue con el mismo cliente, el mismo repositorio y la misma página del módulo anterior. El
cliente es un **familiar**: el negocio o la actividad de alguien de tu familia, a quien puedas
entrevistar y volver a consultar durante el mes.

El sistema depende de lo que ese negocio necesita: reservas de turnos en una barbería, pedidos en una
pollería, ventas e inventario en una tienda, seguimiento de equipos en un servicio técnico. El
ejemplo de este material es una panadería con pedidos por encargo; tú aplicas los mismos pasos a tu
caso.

### 4. La ficha del cliente

La ficha registra tres datos: quién es (nombre, rubro, cuántas personas trabajan), qué hace hoy para
resolver lo que tu sistema le va a resolver, y de dónde salió esa información. El tercer dato es el
que más suele faltar, y es el que permite defender el proyecto, porque muestra que la información
viene del cliente y no de una suposición.

### 5. El ejemplo de la Panadería del Barrio

En `propuesta.md` (en la carpeta del código del día), la ficha del cliente dice:

> **Panadería del Barrio**, Av. Principal 145, Colquencha. Negocio familiar de tres personas, en
> funcionamiento desde 1998. Vende pan, salados y repostería al público y por encargo.
>
> **Cómo trabaja hoy:** los encargos se anotan en un cuaderno sobre el mostrador. Quien atiende
> escribe el nombre, el producto, la cantidad y la fecha de entrega. No hay copia ni respaldo.
>
> **Fuente de esta información:** entrevista con la propietaria, 12 de octubre de 2026, en el
> local. Se registró en notas y se validó con ella al día siguiente.

---

## Segunda parte. Trabajo en tu proyecto

Crea `propuesta.md` en **tu mismo repositorio del módulo pasado** (no abras uno nuevo). Si prefieres
Word, Writer o LaTeX, puedes usarlos: lee «Tu documento» en la guía del módulo.

1. **La portada**: título del proyecto, tipo, programa, tu nombre y la fecha.
2. **El tipo de proyecto**: en dos o tres oraciones, por qué el tuyo es un proyecto integrador y no
   una monografía ni una investigación.
3. **El punto de partida**: una tabla con lo que ya existe (tu página del módulo pasado) y lo que
   falta.
4. **La ficha de tu cliente**, con los tres datos, tu relación familiar con él y el tipo de sistema
   que necesita. Si no conoces algún dato, averígualo esta semana.

Antes de dar por terminada la sección, revisa:

- [ ] `propuesta.md` está en el repositorio del módulo pasado.
- [ ] Explicaste por qué tu proyecto es integrador.
- [ ] La ficha tiene los tres datos y el tipo de sistema.
- [ ] Puedes llamar a tu cliente esta semana.

Al terminar, guarda tu avance:

```bash
git add propuesta.md
git commit -m "docs: propuesta inicial y ficha del cliente"
git push
```

---

## Cuestionario de repaso

1. ¿Qué le falta a tu página del módulo pasado para ser un proyecto?
2. Si los cuatro tipos de trabajo pueden tratar el mismo tema, ¿qué los diferencia?
3. ¿Por qué un mismo sistema puede ser un buen proyecto integrador y un proyecto de grado
   insuficiente?
4. ¿Qué tres datos tiene la ficha del cliente, y por qué el tercero es el más importante?
5. ¿Qué tipo de sistema necesita tu cliente, y por qué?

---

## Para la próxima clase

El Día 2 trata la formulación del problema: qué está mal hoy en el negocio de tu cliente, y cómo se
sabe.
