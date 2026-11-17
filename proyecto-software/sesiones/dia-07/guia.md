# Guía de estudio N.° 7: marco teórico y estado del arte

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 7 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después escribe tu marco teórico en un archivo
nuevo, `marco-teorico.md`. Puedes avanzar a tu ritmo: cuando termines, sigue con la guía del día
siguiente. El cuestionario del final sirve para comprobar que entendiste; respóndelo con tus
propias palabras.

---

## Primera parte. Lectura

### 1. Qué es un marco teórico, y qué no es

Muchos marcos teóricos son una lista de definiciones copiadas: qué es una base de datos, qué es
PHP, qué es un sistema de información. Eso no sirve, porque el lector del documento ya conoce las
definiciones básicas.

En un proyecto como este, el marco teórico responde una pregunta concreta: **qué se ha hecho antes
para resolver este problema, y por qué eso no sirve tal cual**. Esa parte se llama *estado del
arte*. Para detectar el relleno, se pregunta de cada párrafo si cambia alguna decisión del
proyecto. Si no cambia ninguna, no hace falta.

Compara estos dos párrafos:

- *"Una base de datos es un conjunto de datos organizados y relacionados entre sí, almacenados
  sistemáticamente para su posterior uso."*
- *"La planilla compartida resuelve la consulta por fecha, pero exige conexión permanente, lo que no
  se cumple en el local del cliente."*

El primero no cambia ninguna decisión: es una definición de glosario. El segundo descarta una
alternativa, y por eso pertenece al marco teórico.

### 2. Las alternativas

El estado del arte compara tres o cuatro alternativas, que salen de tres lugares: lo que el cliente
ya usa o intentó usar (el cuaderno también es una alternativa), lo que usan negocios parecidos, y
los productos comerciales del rubro.

Las alternativas cambian según el tipo de sistema. Para reservas: la agenda en papel, los turnos por
WhatsApp, Google Calendar o una aplicación de reservas. Para ventas e inventario: el cuaderno, una
planilla de Excel o un sistema de punto de venta comercial. Para pedidos: el cuaderno, los mensajes
de WhatsApp o una plataforma de delivery.

### 3. La matriz comparativa

Las alternativas se comparan en una tabla. Cada columna corresponde a una condición del proyecto,
que sale de la factibilidad del Día 4 o de lo observado el Día 6: si el costo importa, va una
columna de costo; si la conexión del local se corta, una de "funciona sin internet"; si se trabaja
con las manos ocupadas, una de "se usa desde el celular". Una columna genérica, como "tiene
interfaz gráfica", no ayuda a decidir.

La matriz lleva también la fila de la **solución propia**, comparada con las mismas columnas. Sin
esa fila, la tabla solo describe lo que existe; con ella, justifica la elección. Y la solución propia
tiene que perder en algo: si gana en todo, la comparación pierde credibilidad. Lo correcto es decir
en qué es peor y cómo se mitiga esa desventaja.

Si existiera una alternativa que cumpliera todas las condiciones, lo correcto sería usarla y no
construir otra. El estado del arte muestra que no la hay, y eso justifica el proyecto.

### 4. La metodología

La metodología de desarrollo también se fundamenta con las condiciones del proyecto. *"Uso Scrum
porque es ágil"* no fundamenta nada. *"Uso un enfoque incremental porque tengo cuatro semanas y
soy un solo desarrollador"* sí. Si alguien dice que usa Scrum, le van a preguntar quién es su
*Product Owner* (en Scrum, la persona que decide qué se construye y en qué orden); por eso conviene más un enfoque
incremental bien explicado que un Scrum que no se aplicó.

La metodología va acompañada de una tabla de herramientas: cuál, para qué y por qué esa.

### 5. El ejemplo de la Panadería del Barrio

En `marco-teorico.md` (en la carpeta del código del día), la matriz compara cuatro alternativas y la
solución propia:

| Solución | Costo | Sin internet | Desde celular | Consulta por fecha |
|---|---|---|---|---|
| Cuaderno de papel (actual) | Bs 0 | sí | no aplica | no |
| Planilla de cálculo compartida | Bs 0 | no | difícil de usar | sí, con filtros |
| Software de gestión comercial | desde Bs 200/mes | según el producto | sí | sí, entre muchas funciones |
| Sistema a medida para panaderías | desde USD 400 inicial | sí | sí | sí |
| Solución propuesta | Bs 600/año | no (requiere conexión) | sí | sí |

La solución propuesta pierde en "sin internet", y el documento lo dice:

> La solución propuesta acepta una desventaja frente al cuaderno actual: requiere conexión a
> internet. Se mitiga manteniendo el cuaderno como respaldo de contingencia.

---

## Segunda parte. Trabajo en tu proyecto

Crea `marco-teorico.md` con:

1. **Una introducción breve**: qué alternativas existen para el problema de tu cliente.
2. **La matriz comparativa**, con tres o cuatro alternativas y la fila de tu solución. Cada columna
   sale de una condición de tu proyecto (revisa tu factibilidad y tu observación).
3. **Un párrafo por alternativa**, con el dato de tu proyecto que la descarta.
4. **La conclusión del estado del arte**: por qué ninguna alternativa sirve tal cual, en qué pierde
   tu solución y cómo lo mitigas.
5. **La metodología**, fundamentada con las condiciones de tu proyecto, y la tabla de herramientas.

Antes de dar por terminada la sección, revisa:

- [ ] No hay definiciones de diccionario; cada párrafo cambia alguna decisión.
- [ ] Cada columna de la matriz sale de una condición de tu proyecto.
- [ ] Está la fila de tu solución, y dice en qué pierde y cómo lo mitigas.
- [ ] La metodología está fundamentada, no solo nombrada.

| Lo que te pasa | Qué hacer |
|---|---|
| tu marco teórico son definiciones | pregúntate de cada párrafo si cambia alguna decisión |
| no encuentras alternativas | lo que tu cliente hace hoy ya es una |
| no sabes qué columnas poner | búscalas en tu factibilidad del Día 4 |
| tu solución gana en todo | revisa costo, tiempo de aprendizaje y dependencia de internet |

Al terminar, guarda tu avance (si usas git):

```bash
git add marco-teorico.md
git commit -m "docs: estado del arte y metodologia"
git push
```

---

## Cuestionario de repaso

1. ¿Qué pregunta responde el estado del arte?
2. ¿Por qué una definición de "base de datos" no aporta al marco teórico de tu proyecto?
3. ¿De dónde salen las columnas de la matriz comparativa?
4. ¿Por qué hace falta la fila de la solución propia?
5. ¿Por qué conviene que la solución propia pierda en alguna columna?
6. ¿Qué diferencia hay entre nombrar una metodología y fundamentarla?
7. Nombra tres alternativas para el problema de tu cliente y una condición que descarte cada una.

---

## Para la próxima clase

El Día 8 trata las referencias bibliográficas y la integridad académica: todo lo que se citó en el
marco teórico tiene que decir de dónde salió.
