# Guía de estudio N.° 14: pruebas y calidad

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 14 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después escribe y corre tu matriz de pruebas
en un archivo nuevo, `pruebas.md`. Puedes avanzar a tu ritmo: cuando termines, sigue con la guía
del día siguiente. El cuestionario del final sirve para comprobar que entendiste; respóndelo con
tus propias palabras.

Con esta guía se completa el **Laboratorio 3**: el sistema completo y la matriz de pruebas corrida.

---

## Primera parte. Lectura

### 1. De dónde salen las pruebas

Las pruebas no se inventan: se prueba lo que se especificó. Cada fila de la matriz sale de un
criterio de aceptación del Día 10 o de un requerimiento del Día 9. Por eso el Día 9 insistía en que
cada requerimiento se pudiera responder con PASA o FALLA: este es el día en que se comprueba.

### 2. Un caso de prueba

Un caso tiene una entrada concreta, una acción y un resultado esperado que se puede verificar sin
discutir. Si el resultado real coincide con el esperado, el caso pasa; si no, falla, y se anota qué
pasó. Si hace falta interpretar si pasó, hay que reescribir el caso.

Las pruebas de este módulo son de **caja negra**: se mira qué hace el sistema, con sus entradas y
salidas, sin mirar el código.

### 3. Los casos de borde y de error

Los errores suelen aparecer en los bordes y en los datos inválidos, no en el caso normal. Por eso la
regla es: por cada caso normal, al menos uno de error o de borde. La columna **tipo** de la matriz
(normal, error, borde, vacío, seguridad) ayuda a cumplirla; sin ella, la matriz se llena de casos en
los que todo sale bien.

Algunos bordes típicos: cantidad cero, una fecha de ayer, un texto larguísimo, un campo vacío. En un
sistema de reservas, intentar reservar un turno que ya está ocupado; en uno de ventas, vender más
unidades de las que hay en stock.

### 4. La seguridad también se prueba

Lo que se programó el Día 12 contra la inyección de SQL se puede comprobar sin mirar el código:
escribiendo `?categoria=1 OR 1=1` en la dirección del endpoint, o una comilla simple en un campo de
texto. Si el sistema devuelve solo lo correcto y guarda la comilla como texto, la protección
funciona.

### 5. Si todo pasa

Una matriz en la que todo pasa suele indicar que faltan casos de borde o de error. Encontrar fallas es justamente el propósito
de la matriz: no arregla nada, pero indica qué hay que arreglar. Una falla anotada no baja la nota de
la entrega; muestra que se probó en serio.

Según el libro *Software Engineering at Google*, el propósito de probar es hacer posible el cambio:
además de mostrar que hoy funciona, las pruebas permiten modificar el sistema mañana y saber si algo
se rompió.

### 6. El ejemplo de la Panadería del Barrio

En `pruebas.md` (en la carpeta del código del día), la primera sección tiene un caso normal y cuatro
de borde o error:

| ID | Entrada | Acción | Resultado esperado | Tipo |
|---|---|---|---|---|
| P-01 | cliente, producto, cantidad y fecha válidos | confirmar | el pedido se guarda y aparece confirmación | normal |
| P-02 | nombre del cliente vacío | confirmar | no guarda, señala el campo | error |
| P-03 | fecha de entrega anterior a hoy | confirmar | no guarda, explica por qué | borde |
| P-04 | cantidad = 0 | confirmar | no guarda, señala la cantidad | borde |
| P-05 | nombre con 200 caracteres | confirmar | guarda o corta con aviso, sin romperse | borde |

Al correr la matriz del ejemplo aparecen dos fallas, y se anotan.

---

## Segunda parte. Trabajo en tu proyecto

Crea `pruebas.md` con tu matriz:

1. **Una fila por cada criterio de aceptación** del Día 10, con las columnas ID, entrada, acción,
   resultado esperado y tipo.
2. **Por cada caso normal, al menos uno de error o de borde.**
3. **Al menos una prueba del caso vacío** (el del Día 13) y **una de seguridad** (una comilla o un
   `OR 1=1`).
4. **Córrela**: anota PASA o FALLA en cada fila y, en las que fallan, qué pasó. Si todo te da PASA,
   busca los bordes que no probaste.

Antes de dar por terminada la sección, revisa:

- [ ] Cada requerimiento tiene al menos una prueba.
- [ ] Cada caso da PASA o FALLA sin discutir.
- [ ] Hay casos de error y de borde, y al menos uno de seguridad.
- [ ] La matriz está corrida, con los resultados anotados.

El Laboratorio 3 reúne la base de datos (Día 11), el endpoint con *prepared statements* (Día 12), la
página conectada con sus tres estados (Día 13) y esta matriz corrida.

| Lo que te pasa | Qué hacer |
|---|---|
| todos tus casos son "normal" | por cada uno, pregúntate cómo podría salir mal |
| no sabes qué resultado esperar | vuelve a tu criterio de aceptación del Día 10 |
| todo te da PASA | prueba cantidad cero, fecha de ayer, texto larguísimo y campo vacío |
| encontraste una falla | anótala; si hay tiempo, corrígela y vuelve a correr ese caso |

Al terminar, guarda tu avance (si usas git):

```bash
git add pruebas.md
git commit -m "test: matriz de casos de prueba corrida - Lab 3"
git push
```

---

## Cuestionario de repaso

1. ¿De dónde salen los casos de la matriz de pruebas?
2. ¿Qué tiene un caso de prueba bien escrito?
3. ¿Por qué se escribe al menos un caso de error o de borde por cada caso normal?
4. ¿Qué es una prueba de caja negra?
5. ¿Cómo se prueba la protección contra la inyección de SQL sin mirar el código?
6. ¿Qué indica una matriz en la que todo pasa?
7. Escribe un caso de borde propio de tu sistema.

---

## Para la próxima clase

El Día 15 es el segundo parcial, y después se estima cuánto cuesta lo que construiste.
