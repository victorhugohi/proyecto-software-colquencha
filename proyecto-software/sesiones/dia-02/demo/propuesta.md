<!-- ═══════════════════════════════════════════════════════════════════════
     Propuesta de proyecto - documento de ejemplo

     ⚠️ Este es el proyecto de ejemplo del módulo, no el tuyo.

     Se sigue el caso de la Panadería del Barrio, que es el cliente que se usó
     en Programación Web, para poder mostrar un documento completo y coherente.
     Tú escribes el mismo documento sobre tu cliente, el que elegiste el mes
     pasado.

     El documento crece día a día:
       Día 1  se elige el tipo de proyecto y se encuadra
       Día 2  formulación del problema
       Día 3  objetivos y justificación
       Día 4  factibilidad, alcances y límites
       Día 5  cronograma, resumen e introducción  -> se entrega el Lab 1

     Los comentarios como este explican por qué cada sección dice lo que dice.
     En un documento real no van: aquí están para aprender.
     ═══════════════════════════════════════════════════════════════════════ -->

# Sistema de gestión de pedidos para Panadería del Barrio

**Propuesta de Proyecto Integrador**
Programa Académico Desconcentrado "Técnico Superior en Informática"
UMSA · Sede Colquencha

Autor: [nombre del estudiante]
Fecha: noviembre de 2026

---

<!-- ── Qué tipo de proyecto es este (subtemas 1.1 a 1.5) ────────────────
     Antes de escribir una línea hay que saber qué se está escribiendo. Los
     cuatro tipos no se diferencian por el tema, sino por lo que producen y
     por cómo se los evalúa:

       Monografía            estudia un tema y lo expone. No construye nada.
                             Producto: un documento.

       Proyecto integrador   resuelve un problema real construyendo algo.
                             Producto: el software Y su documentación.
                             ← este es el de este módulo

       Proyecto de grado     igual, pero con exigencia de aporte original y
                             defensa formal ante tribunal.

       Investigación         responde una pregunta que nadie respondió antes,
                             con método y datos. Producto: conocimiento nuevo.

     La diferencia práctica: en una monografía se pregunta "¿qué se sabe de
     X?"; en un proyecto integrador, "¿qué le falta a este cliente y cómo se
     lo construyo?".

     Confundirlos es el error del Día 1: escribir una monografía sobre
     sistemas de pedidos, en vez de construir uno.                        -->

## Tipo de proyecto

**Proyecto integrador.** Se resuelve un problema concreto de un cliente real
construyendo un producto de software funcional, acompañado de la documentación
de ingeniería que respalda las decisiones tomadas.

No es una monografía: no se estudia el estado del arte de los sistemas de
pedidos, se construye uno. No es una investigación: no se responde una pregunta
abierta, se resuelve un problema conocido.

---

## El punto de partida

Este proyecto continúa el trabajo del módulo de Programación Web, en el que se
construyó el frontend: una página funcional, publicada, con los datos del
cliente en un archivo JSON.

Para completar el proyecto falta lo siguiente:

| Ya existe | Se construye este módulo |
|---|---|
| el frontend funcionando y publicado | la propuesta que lo justifica |
| los datos en un archivo JSON | una base de datos real |
| "funciona en mi máquina" | requerimientos, pruebas, costos y *deploy* (puesta en producción) |

<!-- ── El cliente ───────────────────────────────────────────────────────
     Todo lo que viene depende de esta sección. Un cliente vago produce un
     problema vago, objetivos vagos y requerimientos imposibles de verificar.

     Tres datos que no pueden faltar, y que hay que poder responder sin
     inventar:
       quién es (nombre, rubro, tamaño)
       qué hace hoy para resolver lo que se le va a resolver
       cómo se sabe (de dónde salió esa información)

     El tercero es el que separa un proyecto real de uno imaginado.         -->

## El cliente

**Panadería del Barrio**, Av. Principal 145, Colquencha. Negocio familiar de
tres personas, en funcionamiento desde 1998. Vende pan, salados y repostería
al público y por encargo.

**Cómo trabaja hoy:** los encargos se anotan en un cuaderno sobre el mostrador.
Quien atiende escribe el nombre, el producto, la cantidad y la fecha de
entrega. No hay copia ni respaldo.

**Fuente de esta información:** entrevista con la propietaria, 12 de octubre de
2026, en el local. Se registró en notas y se validó con ella al día siguiente.

---

<!-- ── Formulación del problema (subtema 2.3) ──────────────────────────
     esta sección responde una sola pregunta:
     ¿qué está mal hoy, y cómo se sabe?

     Las tres reglas, y las tres se rompen todo el tiempo:

     1. No se menciona la solución. Ni una vez. En cuanto aparece "falta un
        sistema", ya no se está describiendo un problema: se está describiendo
        la ausencia de tu solución, que no es lo mismo.

     2. Se mide. "Se pierden pedidos" es una queja. "Se perdieron 12 pedidos
        en marzo, según el conteo de la dueña" es un problema. Si no hay
        número, hay que ir a buscarlo.

     3. Se dice de dónde sale. Cada dato con su fuente. Sin eso, el tribunal
        pregunta "¿y usted cómo sabe?" y no hay respuesta.

     La prueba para saber si está bien escrito: dárselo a leer a alguien que
     no conoce el proyecto. Si al terminar puede decir qué está mal hoy, sin
     saber todavía qué vas a construir, está bien.                        -->

## Formulación del problema

La Panadería del Barrio registra los pedidos por encargo en un cuaderno físico
ubicado sobre el mostrador. Quien atiende anota el nombre del cliente, el
producto, la cantidad y la fecha de entrega.

Este registro presenta tres dificultades documentadas durante la entrevista del
13 de noviembre de 2026:

**Pérdida de pedidos.** Entre el 1 y el 31 de marzo de 2026 se registraron 12
pedidos que no fueron preparados en la fecha comprometida, sobre un total
aproximado de 140 encargos del mes. La propietaria identificó los casos al
recibir reclamos de clientes; en 9 de los 12 el pedido estaba anotado pero no
fue revisado el día correspondiente.

**Imposibilidad de consulta.** Para saber qué hay que hornear un día
determinado, es necesario recorrer el cuaderno hoja por hoja, porque los
pedidos se anotan en orden de llegada y no por fecha de entrega. La propietaria
estima entre 15 y 20 minutos diarios en esta revisión.

**Ausencia de respaldo.** El cuaderno es el único registro. En julio de 2025 se
mojó parcialmente y se perdieron los encargos de una semana, que hubo que
reconstruir llamando a los clientes.

<!-- ── El árbol de problemas ────────────────────────────────────────────
     Herramienta para no confundir el problema con sus causas ni con sus
     efectos. Se dibuja así:

              Efectos        ← lo que se ve, lo que duele
                 ↑
          problema central   ← una sola frase
                 ↑
              causas         ← por qué ocurre

     El error más común es poner un efecto como problema central. "Los
     clientes se quejan" es un efecto; el problema es lo que lo produce.

     Y el segundo error: poner como causa "no tienen un sistema". Eso es,
     otra vez, la ausencia de la solución.                                -->

### Árbol de problemas

```
   EFECTOS      Clientes insatisfechos que no vuelven
                Pérdida de ingresos por pedidos no entregados
                Tiempo del personal dedicado a reconstruir información
                          ↑
   PROBLEMA     El registro de pedidos por encargo no permite consultar
   CENTRAL      de forma confiable qué debe prepararse cada día
                          ↑
   CAUSAS       Los pedidos se anotan en orden de llegada, no por fecha
                El registro es único y no tiene copia
                La revisión diaria depende de que alguien se acuerde
```

### Problema central

> El registro de pedidos por encargo de la Panadería del Barrio no permite
> consultar de forma confiable qué debe prepararse cada día, lo que ocasiona
> pedidos no entregados y tiempo dedicado a revisar información dispersa.

---

*(Este documento continúa el Día 3 con los objetivos y la justificación.)*
