# Guía de estudio N.° 10: historias de usuario

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 10 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después escribe tus historias en un archivo
nuevo, `historias.md`. Puedes avanzar a tu ritmo: cuando termines, sigue con la guía del día
siguiente. El cuestionario del final sirve para comprobar que entendiste; respóndelo con tus
propias palabras.

Este día empieza con el primer parcial. La guía es para después del parcial, o para quien quiera
adelantar.

---

## Primera parte. Lectura

### 1. Requerimiento e historia

Compara estos dos textos:

- **RF-01:** *"El sistema debe permitir registrar un pedido con cliente, producto, cantidad y
  fecha."*
- **HU-01:** *"Como encargada del mostrador quiero registrar un pedido en menos de un minuto para no
  perder la venta mientras atiendo a otro cliente."*

El requerimiento dice qué hace el sistema. La historia de usuario agrega para quién es y para qué
sirve. Un requerimiento se puede cumplir al pie de la letra y aun así no servir, si nadie preguntó
para qué era; la historia obliga a decirlo.

### 2. La forma de una historia

```
Como [ROL]
quiero [ACCIÓN]
para [BENEFICIO]
```

**El rol** dice quién, de forma específica. "Como usuario" no sirve, porque todo sistema tiene
usuarios y distintos roles quieren cosas distintas. El rol es una función, no una persona: la misma
dueña puede ser "encargada del mostrador" en un momento y "propietaria" en otro, y querer cosas
diferentes.

**El «para»** es la parte que más se omite, y la única que no se deduce de las otras dos. Un error
frecuente es repetir la acción: *"quiero registrar pedidos para poder registrar pedidos"*. Para
encontrar el beneficio real, se pregunta "¿y para qué?" hasta llegar a algo que le importe al
cliente.

Otros ejemplos, según el sistema: *"Como barbero quiero ver las reservas del día al llegar para
organizar los cortes sin cruzar turnos"*; *"Como dueña de la tienda quiero ver qué prendas tienen
poco stock para reponerlas antes de que se agoten"*.

### 3. Los criterios de aceptación

Cada historia lleva criterios que dicen cuándo se considera cumplida:

```
Dado que [estado inicial]
cuando   [acción]
entonces [resultado observable]
```

El formato obliga a declarar el estado inicial, sin el cual una prueba no se puede repetir. Estos
criterios son la base de la matriz de pruebas del Día 14.

Los casos que más se olvidan son los vacíos, de error y de borde. Tres preguntas ayudan a
encontrarlos: ¿qué pasa si el campo está vacío?, ¿qué pasa si el usuario se equivoca?, ¿qué pasa si
no hay nada que mostrar? Una pantalla en blanco parece un error: el usuario no sabe si el sistema
falló o si no hay datos. Por eso cada historia lleva al menos un criterio de este tipo.

### 4. El mapa de historias

El mapa ordena las historias según el flujo del usuario, de izquierda a derecha, y en filas según
su importancia:

```
   FLUJO →    Recibir pedido      Preparar el día     Entregar
   MÍNIMO     registrar           ver hoy             marcar entregado
   MEJORAS    buscar cliente      total del día       revertir marca
   DESPUÉS    productos frec.     historial           aviso al cliente
```

Sirve para dos cosas. Para encontrar huecos, porque al ver el flujo completo se nota lo que falta. Y
para recortar el alcance con criterio: la fila MÍNIMO es la versión que ya resuelve el problema, y
si hay que recortar, se quita de abajo hacia arriba, no de la derecha, porque quitar un paso del
flujo deja el sistema sin funcionar.

### 5. El ejemplo de la Panadería del Barrio

En `historias.md` (en la carpeta del código del día):

> **HU-02 · Saber qué preparar hoy.** Como propietaria quiero ver de un vistazo los pedidos
> comprometidos para hoy para decidir qué hornear antes de abrir.

| # | Dado que... | Cuando... | Entonces... |
|---|---|---|---|
| 1 | hay pedidos para hoy y para otros días | abro la pantalla de consulta | veo solo los de hoy |
| 2 | no hay pedidos para hoy | abro la pantalla | veo un mensaje que lo dice, no una pantalla en blanco |
| 3 | quiero ver otro día | elijo una fecha | veo los pedidos de esa fecha |

El criterio 2 es el caso vacío. Cada historia indica también los requerimientos del Día 9 que cubre.

---

## Segunda parte. Trabajo en tu proyecto

Crea `historias.md` con:

1. **De tres a cinco historias de usuario**, cada una con un rol específico, la acción y un
   beneficio real. Con más de cinco, probablemente estás escribiendo tareas.
2. **Los requerimientos relacionados** de cada historia.
3. **De tres a cuatro criterios de aceptación** por historia, con al menos uno de error, vacío o
   borde.
4. **El mapa de historias**, ordenado por el flujo de tu usuario. Lo que quede en "después" debería
   coincidir con tus límites del Día 4.

Antes de dar por terminada la sección, revisa:

- [ ] Ningún rol dice "usuario" y ningún «para» repite la acción.
- [ ] Cada criterio tiene estado inicial, acción y resultado observable.
- [ ] Cada historia tiene al menos un caso de error, vacío o borde.
- [ ] La fila MÍNIMO de tu mapa resuelve el problema del Día 2.

| Lo que te pasa | Qué hacer |
|---|---|
| tu rol es "usuario" | pregúntate quién exactamente, y en qué momento |
| tu «para» repite la acción | pregúntate "¿y para qué?" hasta llegar a algo real |
| tienes doce historias | agrúpalas por lo que el usuario quiere lograr |
| no se te ocurren criterios de error | piensa qué pasa si está vacío, si se equivoca o si no hay datos |

Al terminar, guarda tu avance:

```bash
git add historias.md
git commit -m "docs: historias de usuario y criterios de aceptacion"
git push
```

---

## Cuestionario de repaso

1. ¿Qué información tiene una historia de usuario que no tiene un requerimiento?
2. ¿Por qué "como usuario" no sirve como rol?
3. ¿Qué tiene de malo el «para» de esta historia: "quiero registrar pedidos para poder registrar
   pedidos"?
4. ¿Para qué sirve el estado inicial ("dado que") en un criterio de aceptación?
5. ¿Por qué una pantalla en blanco es un problema, aunque el sistema funcione?
6. En el mapa de historias, ¿qué es la fila MÍNIMO y por qué se recorta de abajo hacia arriba?
7. Escribe una historia de tu proyecto con dos criterios de aceptación, uno de ellos de error o
   vacío.

---

## Para la próxima clase

El Día 11 se vuelve a programar: se instala el entorno con XAMPP y se diseña la base de datos a
partir del `datos.json` del módulo pasado.
