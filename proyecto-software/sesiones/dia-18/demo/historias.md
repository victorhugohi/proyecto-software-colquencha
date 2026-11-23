<!-- ═══════════════════════════════════════════════════════════════════════
     Historias de usuario y criterios de aceptación - documento de ejemplo

     ⚠️ Es el proyecto de ejemplo del módulo, no el tuyo.

     ¿Por qué esto, si ya hay requerimientos? Porque responden preguntas
     distintas:

        el requerimiento dice   qué tiene que hacer el sistema
        la historia dice        para quién y para qué

     Un requerimiento se puede cumplir al pie de la letra y ser inútil, si
     nadie preguntó para qué servía. La historia de usuario lo deja escrito.

     Y los criterios de aceptación son el puente hacia las pruebas del
     Día 14: son la matriz, escrita antes de programar.
     ═══════════════════════════════════════════════════════════════════════ -->

# Historias de usuario

## Sistema de gestión de pedidos - Panadería del Barrio

---

<!-- ── La forma de una historia ─────────────────────────────────────────
     La plantilla clásica, y las tres partes importan:

        Como [rol]
        quiero [acción]
        para [beneficio]

     El "para" es la parte que se omite y la única que no se puede deducir.
     Sin él, la historia es un requerimiento disfrazado.

     Esa parte también permite discutir el alcance: si el beneficio se puede
     conseguir de una forma más simple, la acción cambia. Esa conversación
     solo existe si el "para" está escrito.

     El rol no es "usuario". Decir "como usuario" es no decir nada: todo
     sistema tiene usuarios. El rol es quién específicamente, porque distintos
     roles quieren cosas distintas.                                        -->

## HU-01 · Registrar un pedido

> **Como** encargada del mostrador
> **quiero** registrar un pedido en menos de un minuto
> **para** no perder la venta mientras atiendo a otro cliente

**Requerimientos relacionados:** RF-01, RF-02, RNF-01, RNF-02

### Criterios de aceptación

| # | Dado que... | Cuando... | Entonces... |
|---|---|---|---|
| 1 | estoy en la pantalla de registro | completo cliente, producto, cantidad y fecha y confirmo | el pedido queda guardado y se muestra confirmación |
| 2 | dejo vacío el nombre del cliente | intento confirmar | el sistema no guarda y señala el campo faltante |
| 3 | elijo una fecha de entrega anterior a hoy | intento confirmar | el sistema no guarda y explica por qué |
| 4 | acabo de guardar un pedido | miro la pantalla | el formulario está limpio y listo para el siguiente |

<!-- El formato "dado / cuando / entonces" no es capricho: obliga a decir el
     estado inicial, la acción y el resultado observable. Sin el estado
     inicial, la mitad de las pruebas no se pueden repetir.

     Y fíjate en el criterio 4: no estaba en ningún requerimiento. Salió de
     pensar en el uso real, que es exactamente para lo que sirven las
     historias.                                                            -->

---

## HU-02 · Saber qué preparar hoy

> **Como** propietaria
> **quiero** ver de un vistazo los pedidos comprometidos para hoy
> **para** decidir qué hornear antes de abrir

**Requerimientos relacionados:** RF-03, RF-04, RF-06

### Criterios de aceptación

| # | Dado que... | Cuando... | Entonces... |
|---|---|---|---|
| 1 | hay pedidos para hoy y para otros días | abro la pantalla de consulta | veo solo los de hoy, ordenados por hora si la tienen |
| 2 | no hay pedidos para hoy | abro la pantalla | veo un mensaje que lo dice, no una pantalla en blanco |
| 3 | quiero ver otro día | elijo una fecha | veo los pedidos de esa fecha |

<!-- El criterio 2 es el que más se olvida: el caso vacío. Una pantalla
     en blanco parece un error, y el usuario no sabe si el sistema falló o si
     no hay nada. Los casos vacíos, de error y de borde son la mitad del
     valor de esta sección.                                                -->

---

## HU-03 · Cerrar un pedido entregado

> **Como** encargada del mostrador
> **quiero** marcar un pedido como entregado
> **para** que no siga apareciendo en la lista de pendientes

**Requerimientos relacionados:** RF-05, RF-03

### Criterios de aceptación

| # | Dado que... | Cuando... | Entonces... |
|---|---|---|---|
| 1 | un pedido está pendiente | lo marco como entregado | desaparece de la lista de pendientes |
| 2 | marqué un pedido por error | busco ese pedido | puedo encontrarlo y revertir la marca |

<!-- El criterio 2 salió de una pregunta que no estaba en la entrevista:
     "¿y si se equivocan?". Las historias son el momento de pensar en el
     error humano, que los requerimientos suelen ignorar.                  -->

---

<!-- ── El mapa de historias ─────────────────────────────────────────────
     Patton propone ordenar las historias por el flujo del usuario, no por
     prioridad ni por módulo. Se lee de izquierda a derecha como el recorrido
     real, y hacia abajo por importancia.

     Para qué sirve: para encontrar los huecos. Al ver el flujo
     completo, salta lo que falta.

     También sirve para recortar el alcance: la primera fila completa es la
     versión mínima que ya sirve para algo. Todo lo de abajo es mejora.
     Eso es "plan to build less", que es el capítulo 2 de Patton.          -->

## Mapa de historias

```
   FLUJO →    Recibir pedido      Preparar el día      Entregar

   MÍNIMO     HU-01 registrar     HU-02 ver hoy        HU-03 marcar
              (4 campos)          (lista simple)       entregado
              ─────────────────────────────────────────────────────
   MEJORAS    buscar cliente      total del día        revertir marca
              existente           (RF-06)              (HU-03 crit. 2)
              ─────────────────────────────────────────────────────
   DESPUÉS    productos           historial por        aviso al
              frecuentes          cliente              cliente
```

**La fila mínimo es el sistema que ya resuelve el problema formulado.** Todo lo
de abajo mejora la experiencia, y todo lo de "después" quedó fuera del alcance
en el Día 4.

