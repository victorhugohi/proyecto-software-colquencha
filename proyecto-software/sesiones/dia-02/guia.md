# Guía de estudio N.° 2: formulación del problema

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 2 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Antes de leer, escribe en una sola frase el problema de tu cliente, en dos
minutos y sin pensarlo mucho. Después lee el texto, revisa el ejemplo y trabaja en tu
`propuesta.md`. Puedes avanzar a tu ritmo: cuando termines, sigue con la guía del día siguiente. El
cuestionario del final sirve para comprobar que entendiste; respóndelo con tus propias palabras.

La explicación completa de este día está también en la **Guía de lectura N.° 1** (segunda parte).

---

## Primera parte. Lectura

### 1. Qué responde esta sección

La formulación del problema es la sección más importante de la propuesta, porque todo lo demás se
apoya en ella: los objetivos responden al problema, los requerimientos salen de él y las pruebas
comprueban si se resolvió. Responde dos preguntas: qué está mal hoy en el negocio del cliente y cómo
se sabe. No dice qué se va a construir ni con qué tecnología.

Revisa la frase que escribiste al empezar. Si aparecen palabras como "sistema", "aplicación",
"falta" o "no tiene", probablemente describe la falta de tu solución y no el problema del negocio.
"La panadería no tiene un sistema de pedidos" no dice qué le pasa a la panadería; lo que le pasa es
que se pierden pedidos, que se tarda en saber qué preparar y que no hay copia del registro.

### 2. Tres reglas

**No se menciona la solución.** De cada frase, pregúntate si sería verdad aunque el proyecto no
existiera. "Se perdieron 12 pedidos en marzo" es verdad haya o no sistema; "falta un sistema de
pedidos" solo tiene sentido si ya se pensó en construir uno.

**Se mide.** Una queja se convierte en problema cuando tiene un número, y el total importa: 12
pedidos perdidos de 140 no es lo mismo que 12 de 15.

| Queja | Problema medido |
|---|---|
| "se pierden pedidos" | "12 pedidos no entregados en marzo, sobre unos 140 encargos" |
| "tarda mucho" | "15 a 20 minutos diarios, según la propietaria" |

**Se indica de dónde sale cada dato.** Por ejemplo, "según la propietaria" o "entrevista del 13 de
noviembre". Si el cliente no lleva registros, casi siempre puede estimar: "la propietaria estima unos
15 pedidos por semana". Una estimación del cliente, citada como tal, es un dato válido; un número
inventado no lo es.

Las reglas valen para cualquier tipo de sistema:

| Negocio | Así no (describe la solución) | Así sí (problema medido y con fuente) |
|---|---|---|
| barbería | "no tiene un sistema de reservas" | "en octubre se cruzaron 6 turnos, sobre unas 200 atenciones, según el dueño" |
| tienda de ropa | "le falta un control de inventario" | "3 veces en el mes se vendió una prenda que ya no había, según la dueña" |
| pollería | "no tiene una app de pedidos" | "los sábados quedan sin anotar unos 5 pedidos de WhatsApp, según el dueño" |

### 3. El árbol de problemas

El árbol separa el problema de sus causas y de sus efectos:

```
        EFECTOS        ← lo que se nota
           ↑
    PROBLEMA CENTRAL   ← una sola frase
           ↑
        CAUSAS         ← por qué ocurre
```

Hay dos errores frecuentes: poner un efecto como problema central ("los clientes se quejan" es un
efecto; el problema es lo que lo produce), y poner como causa "no tienen un sistema", que de nuevo es
la solución.

### 4. La entrevista al cliente

Los datos de esta sección salen de una entrevista de unos 20 minutos, con las preguntas escritas.
Tres que suelen dar buen resultado: *«muéstreme cómo lo hace hoy»*, porque es mejor verlo que oírlo;
*«¿cuándo fue la última vez que salió mal?»*, de donde salen los números; y *«¿qué pasaría si no se
arregla?»*, de donde salen los efectos. A esas se agregan dos o tres propias de ese negocio.

Como tu cliente es de tu familia, es fácil dar por sabido lo que pasa en su negocio. Haz la
entrevista igual y anota sus respuestas con sus palabras. El plazo es el Día 5.

### 5. El ejemplo de la Panadería del Barrio

En `propuesta.md` (en la carpeta del código del día):

```
   EFECTOS      Clientes insatisfechos que no vuelven
                Pérdida de ingresos por pedidos no entregados
                          ↑
   PROBLEMA     El registro de pedidos por encargo no permite consultar
   CENTRAL      de forma confiable qué debe prepararse cada día
                          ↑
   CAUSAS       Los pedidos se anotan en orden de llegada, no por fecha
                El registro es único y no tiene copia
```

En toda la sección no aparece la palabra "sistema".

---

## Segunda parte. Trabajo en tu proyecto

Escribe en tu `propuesta.md`, después de la ficha del cliente:

1. **Dos o tres dificultades concretas**, cada una con su número y su fuente.
2. **Tu árbol de problemas**: efectos, problema central y causas.
3. **Tu problema central en una sola frase.**
4. **Las preguntas de tu entrevista**, y el día acordado con tu cliente.

Antes de dar por terminada la sección, revisa:

- [ ] Las palabras "sistema" o "aplicación" no aparecen en la sección.
- [ ] Cada dificultad tiene un número, y cada número su fuente.
- [ ] El problema central cabe en una frase.
- [ ] Un compañero que no conoce tu proyecto puede decir qué está mal hoy, sin saber qué vas a
      construir.

| Lo que te pasa | Qué hacer |
|---|---|
| tu frase dice "no tiene un sistema" | pregúntate qué le pasa hoy a tu cliente por no tenerlo |
| no tienes ningún número | estímalo con tu cliente y cítalo como estimación suya |
| tu problema central ocupa un párrafo | separa causas y efectos con el árbol |
| escribiste "los clientes se quejan" | es un efecto: pregúntate qué lo produce |
| tienes dos problemas centrales | elige uno; el otro va a los límites |

Al terminar, guarda tu avance (si usas git):

```bash
git add propuesta.md
git commit -m "docs: formulacion del problema"
git push
```

---

## Cuestionario de repaso

1. ¿Por qué "la panadería no tiene un sistema de pedidos" no es una buena formulación del problema?
2. ¿Qué diferencia hay entre una queja y un problema?
3. ¿Por qué importa el total (12 de 140) y no solo el número de fallas?
4. Clasifica como causa, problema central o efecto: (a) "los clientes reclaman porque su pedido no
   estaba listo"; (b) "los pedidos se anotan en orden de llegada"; (c) "el registro no permite saber
   qué preparar cada día".
5. ¿Es válido usar una estimación del cliente? ¿Cómo se escribe?
6. Escribe el problema central de tu cliente en una sola frase.

---

## Para la próxima clase

El Día 3 se escriben los objetivos y la justificación: ahí aparece por primera vez la solución.
Antes, acuerda con tu cliente el día de la entrevista.
