<!-- ═══════════════════════════════════════════════════════════════════════
     PROPUESTA DE PROYECTO - documento de ejemplo

     ⚠️ ESTE ES EL PROYECTO DE EJEMPLO DEL MÓDULO, no el tuyo.

     Se sigue el caso de la Panadería del Barrio, que es el cliente que se usó
     en Programación Web, para poder mostrar un documento completo y coherente.
     Tú escribes el mismo documento sobre TU cliente, el que elegiste el mes
     pasado.

     El documento crece día a día:
       Día 1  se elige el tipo de proyecto y se encuadra
       Día 2  formulación del problema
       Día 3  objetivos y justificación
       Día 4  factibilidad, alcances y límites
       Día 5  cronograma, resumen e introducción  -> se entrega el Lab 1

     Los comentarios como este explican POR QUÉ cada sección dice lo que dice.
     En un documento real no van: aquí están para aprender.
     ═══════════════════════════════════════════════════════════════════════ -->

# Sistema de gestión de pedidos para Panadería del Barrio

**Propuesta de Proyecto Integrador**
Programa Académico Desconcentrado "Técnico Superior en Informática"
UMSA · Sede Colquencha

Autor: [nombre del estudiante]
Fecha: noviembre de 2026

---

<!-- ── QUÉ TIPO DE PROYECTO ES ESTE (subtemas 1.1 a 1.5) ────────────────
     Antes de escribir una línea hay que saber QUÉ se está escribiendo. Los
     cuatro tipos no se diferencian por el tema, sino por lo que producen y
     por cómo se los evalúa:

       Monografía            estudia un tema y lo expone. NO construye nada.
                             Producto: un documento.

       Proyecto integrador   resuelve un problema real construyendo algo.
                             Producto: el software Y su documentación.
                             ← ESTE ES EL DE ESTE MÓDULO

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

<!-- ── EL CLIENTE ───────────────────────────────────────────────────────
     Todo lo que viene depende de esta sección. Un cliente vago produce un
     problema vago, objetivos vagos y requerimientos imposibles de verificar.

     Tres datos que no pueden faltar, y que hay que poder responder sin
     inventar:
       QUIÉN es (nombre, rubro, tamaño)
       QUÉ hace hoy para resolver lo que se le va a resolver
       CÓMO se sabe (de dónde salió esa información)

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

<!-- ── FORMULACIÓN DEL PROBLEMA (subtema 2.3) ──────────────────────────
     ESTA SECCIÓN RESPONDE UNA SOLA PREGUNTA:
     ¿qué está mal hoy, y cómo se sabe?

     Las tres reglas, y las tres se rompen todo el tiempo:

     1. NO SE MENCIONA LA SOLUCIÓN. Ni una vez. En cuanto aparece "falta un
        sistema", ya no se está describiendo un problema: se está describiendo
        la ausencia de tu solución, que no es lo mismo.

     2. SE MIDE. "Se pierden pedidos" es una queja. "Se perdieron 12 pedidos
        en marzo, según el conteo de la dueña" es un problema. Si no hay
        número, hay que ir a buscarlo.

     3. SE DICE DE DÓNDE SALE. Cada dato con su fuente. Sin eso, el tribunal
        pregunta "¿y usted cómo sabe?" y no hay respuesta.

     La prueba para saber si está bien escrito: dárselo a leer a alguien que
     no conoce el proyecto. Si al terminar puede decir qué está mal HOY, sin
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

<!-- ── EL ÁRBOL DE PROBLEMAS ────────────────────────────────────────────
     Herramienta para no confundir el problema con sus causas ni con sus
     efectos. Se dibuja así:

              EFECTOS        ← lo que se ve, lo que duele
                 ↑
          PROBLEMA CENTRAL   ← una sola frase
                 ↑
              CAUSAS         ← por qué ocurre

     El error más común es poner un EFECTO como problema central. "Los
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

<!-- ── OBJETIVOS (subtema 2.5) ─────────────────────────────────────────
     Aquí SÍ aparece la solución, y por primera vez. Pero con una forma muy
     estricta.

     UN OBJETIVO GENERAL. Uno solo. Es el problema central en positivo:
     si el problema es "el registro no permite consultar", el objetivo es
     "desarrollar un sistema que permita consultar".

     Empieza con un VERBO EN INFINITIVO que describe lo que TÚ vas a hacer:
     desarrollar, implementar, diseñar. Nunca "mejorar la atención" ni
     "lograr que el cliente esté satisfecho": eso no depende de ti.

     LOS ESPECÍFICOS son los pasos para llegar al general. Y la prueba que
     los ordena: al terminar el proyecto, ¿se puede decir SÍ o NO a cada uno,
     sin discutir? Si hace falta interpretar, está mal escrito.

     SMART, aplicado a un proyecto de software:
       Specific    dice QUÉ, no "mejorar"
       Measurable  se puede verificar si se cumplió
       Achievable  con el tiempo y los recursos que hay
       Relevant    ataca una causa del árbol del Día 2
       Time-bound  cabe en el cronograma

     EL ERROR QUE HAY QUE DETECTAR: objetivos que son tareas ("instalar XAMPP")
     o que son deseos ("mejorar la eficiencia"). Un objetivo específico es un
     RESULTADO verificable, no una actividad ni una aspiración.            -->

## Objetivos

### Objetivo general

Desarrollar un sistema web de registro y consulta de pedidos por encargo para
la Panadería del Barrio, que permita consultar los pedidos pendientes por fecha
de entrega y conservar el registro con respaldo.

### Objetivos específicos

1. Diseñar la base de datos relacional que registre los productos y los
   pedidos de cada cliente, con la fecha de entrega como criterio de consulta.
2. Implementar el registro de un pedido nuevo desde el navegador, con
   validación de los datos obligatorios.
3. Implementar la consulta de pedidos pendientes filtrada por fecha de entrega.
4. Verificar el funcionamiento del sistema mediante una matriz de casos de
   prueba que cubra el registro, la consulta y los casos de error.

<!-- Cada específico se puede responder con sí o no al terminar. Ninguno dice
     "mejorar", "optimizar" ni "lograr que". Y el 4 no es relleno: verificar
     es parte del proyecto, no algo que se hace si sobra tiempo.

     Fíjate también en lo que NO está: "capacitar al personal", "aumentar las
     ventas". Son deseables y NO dependen del software. Van en las
     recomendaciones del Día 18, no aquí.                                  -->

<!-- ── JUSTIFICACIÓN (subtema 2.4) ─────────────────────────────────────
     Responde: ¿por qué vale la pena hacer esto, y por qué así?

     Tres ángulos, y con dos alcanza:
       práctico   qué mejora concretamente para el cliente
       técnico    por qué esta solución y no otra
       social     a quién más beneficia, si aplica

     LA TRAMPA DE ESTA SECCIÓN: escribir elogios de la tecnología.
     "En la actualidad, los sistemas de información son fundamentales para
     toda organización moderna" no justifica nada: sirve para cualquier
     proyecto del mundo, y por eso no sirve para el tuyo.

     La prueba: si el párrafo se puede copiar tal cual en el proyecto de otro
     compañero, sobra.                                                     -->

## Justificación

**Práctica.** Las tres dificultades descritas en la formulación del problema
tienen solución directa con un registro consultable: los 12 pedidos no
entregados en marzo estaban anotados pero no fueron revisados, y una consulta
por fecha de entrega los habría mostrado. El tiempo de revisión diaria, que la
propietaria estima entre 15 y 20 minutos, se reduce a una consulta.

**Técnica.** Se elige una aplicación web y no una de escritorio porque el
negocio ya tiene el frontend construido y publicado, y porque debe consultarse
desde el celular del mostrador y desde la computadora de la trastienda sin
instalar nada. Se usa PHP y MySQL porque funcionan sobre hosting compartido de
bajo costo, que es lo accesible para un negocio de este tamaño.

**Social.** El registro con respaldo elimina la reconstrucción manual de
pedidos, que en julio de 2025 obligó a llamar uno por uno a los clientes de una
semana.

---

<!-- ── FACTIBILIDAD (subtema 2.6) ──────────────────────────────────────
     Responde una pregunta incómoda: ¿esto se puede hacer de verdad?

     Tres dimensiones, y las tres se responden con evidencia, no con
     optimismo:

       TÉCNICA      ¿existe la tecnología, y sabemos usarla?
       OPERATIVA    ¿el cliente va a poder usarlo y mantenerlo?
       ECONÓMICA    ¿los costos son asumibles para ese cliente?

     LA OPERATIVA ES LA QUE MÁS SE SUBESTIMA y la que más proyectos hace fracasar.
     Un sistema técnicamente perfecto que el cliente no usa es un fracaso.
     Y la pregunta que la resuelve no es "¿le gusta?", sino "¿quién lo va a
     usar todos los días, y sabe hacerlo?".

     UNA FACTIBILIDAD HONESTA PUEDE DECIR QUE NO. Si la conclusión es que
     algo no se puede, eso no descalifica el proyecto: se ajusta el alcance.
     Decir que todo es factible sin haberlo mirado es lo que sí descalifica. -->

## Factibilidad

**Técnica.** El sistema requiere un servidor con PHP 8 y MySQL, que es la
configuración estándar de cualquier hosting compartido. El desarrollo se hace
con XAMPP en local, que funciona sin conexión. El frontend ya está construido y
publicado. No se requiere ninguna tecnología que el equipo no haya usado antes.

**Operativa.** El sistema lo van a usar la propietaria y una empleada, ambas con
teléfono con navegador y experiencia usando aplicaciones de mensajería y banca
móvil. La operación diaria se reduce a registrar un pedido y consultar la lista
del día, dos acciones que se resuelven en una pantalla cada una.

*Riesgo identificado:* el registro depende de que se cargue el pedido en el
momento. Si se sigue anotando en el cuaderno "para pasarlo después", el sistema
no resuelve nada. Se mitiga dejando el registro accesible desde el celular del
mostrador, sin instalar nada.

**Económica.** El desarrollo se realiza como parte del módulo, sin costo para
el cliente. La operación anual estimada es:

| Concepto | Costo anual (Bs) |
|---|---|
| Hosting compartido con PHP y MySQL | 350 |
| Dominio .bo | 250 |
| **Total** | **600** |

Frente a eso, los 12 pedidos no entregados en marzo, a un ticket promedio de
Bs 35 según la propietaria, representan unos Bs 420 en un solo mes.

<!-- El último párrafo es el que convierte la factibilidad económica en un
     argumento. Un costo suelto no dice nada; un costo comparado con lo que
     se pierde hoy, sí. El detalle fino de costos es el Día 15.            -->

<!-- ── ALCANCES Y LÍMITES (subtema 2.7) ────────────────────────────────
     LA SECCIÓN MÁS CORTA Y LA QUE MÁS PROBLEMAS EVITA.

     Alcance  = lo que SÍ se va a entregar
     Límite   = lo que NO, y por qué

     Los límites no son una disculpa: son una decisión. Y hay que escribirlos
     ANTES de programar, no después, porque después se llaman "cosas que no
     me dio tiempo".

     LA REGLA: cada límite dice QUÉ queda fuera y POR QUÉ. Un límite sin
     razón parece una excusa; con razón, es una decisión de diseño.

     Y hay algo que se descubre escribiendo esta sección: si el alcance no
     cabe en el cronograma, hay que recortarlo AHORA. Ese es el objetivo real
     del ejercicio.                                                        -->

## Alcances y límites

### Alcance

El sistema entregado incluye:

- registro de un pedido con cliente, producto, cantidad y fecha de entrega
- consulta de los pedidos pendientes filtrados por fecha
- marcado de un pedido como entregado
- listado de productos, administrable desde la base de datos
- respaldo del registro mediante exportación de la base de datos

### Límites

El sistema **no** incluye, y en cada caso se indica por qué:

- **Cobros ni facturación.** La panadería factura con talonario manual, y la
  facturación electrónica en Bolivia exige integración con el sistema de
  Impuestos Nacionales, que excede el alcance de un módulo de cuatro semanas.
- **Gestión de inventario ni de insumos.** El problema formulado es la pérdida
  de pedidos, no el control de stock. Incluirlo duplicaría el tamaño del
  proyecto sin atacar el problema central.
- **Notificaciones automáticas al cliente.** Requiere integración con un
  servicio de mensajería de pago. Queda planteado como recomendación.
- **Múltiples sucursales.** El negocio tiene un solo local. El diseño de la
  base de datos no impide agregarlo después, pero no se implementa.

<!-- Fíjate en el patrón: cada límite dice qué queda fuera Y por qué. Y las
     razones son de tres tipos: no ataca el problema, excede el tiempo, o
     depende de algo externo. Ninguna dice "no me dio tiempo".             -->

---

<!-- ── CRONOGRAMA (subtema 2.8) ────────────────────────────────────────
     Antes del cronograma va la WBS: descomponer el trabajo en pedazos que
     se puedan estimar. La regla práctica es que ningún paquete pase de una
     semana; si pasa, todavía no se entiende bien y hay que partirlo.

     LA WBS SE ARMA CON SUSTANTIVOS, NO CON VERBOS. No es "hacer la base de
     datos", es "base de datos". Se describe lo que va a EXISTIR, no lo que
     se va a hacer. Eso evita que aparezcan actividades sin producto.

     El cronograma sale de la WBS. Si se empieza por el calendario, quedan
     fechas sin un entregable claro.

     LA COLUMNA QUE MÁS SE OLVIDA: el ENTREGABLE, es decir, qué queda hecho
     cuando esa fila termina. Una fila sin entregable no produce nada que se
     pueda revisar.                                 -->

## Cronograma de actividades

### Descomposición del trabajo

```
1. Propuesta
   1.1 Formulación del problema
   1.2 Objetivos y justificación
   1.3 Factibilidad, alcances y límites
   1.4 Cronograma

2. Análisis
   2.1 Instrumento de recolección y entrevista
   2.2 Marco teórico
   2.3 Requerimientos funcionales y no funcionales
   2.4 Historias de usuario

3. Construcción
   3.1 Modelo de datos y base de datos creada
   3.2 Endpoints de registro y consulta
   3.3 Frontend conectado al backend

4. Verificación y cierre
   4.1 Matriz de casos de prueba ejecutada
   4.2 Respaldo y plan de puesta en producción
   4.3 Documento final y defensa
```

### Cronograma

| Semana | Paquete | Entregable |
|---|---|---|
| 1 | 1.1 a 1.4 | Propuesta completa **(Lab 1)** |
| 2 | 2.1 a 2.4 | Marco teórico y requerimientos **(Lab 2)** |
| 3 | 3.1 a 3.3 | Sistema funcionando con base de datos **(Lab 3)** |
| 4 | 4.1 a 4.3 | Sistema respaldado y documento final |

<!-- Cuatro semanas, cuatro entregables. El cronograma no inventa fechas: usa
     las del módulo, que son las reales. Un cronograma que no coincide con el
     tiempo que existe es una declaración de deseos.                       -->

<!-- ── RESUMEN E INTRODUCCIÓN (subtemas 2.1 y 2.2) ─────────────────────
     SE ESCRIBEN AL FINAL, aunque vayan al principio. Es la única forma de
     que resuman algo: no se puede resumir lo que todavía no existe.

     EL RESUMEN: entre 150 y 250 palabras, y responde cuatro cosas:
       qué problema · qué se hizo · cómo · qué resultado se espera
     Sin citas, sin secciones, sin "el presente documento tiene por objeto".

     LA INTRODUCCIÓN: presenta el proyecto y anuncia la estructura del
     documento. Es más larga y más suelta que el resumen.

     LA PRUEBA DEL RESUMEN: si alguien lee solo eso, ¿entiende de qué se
     trata el proyecto? Es lo único que muchos van a leer.                -->

## Resumen

La Panadería del Barrio, negocio familiar de Colquencha en funcionamiento desde
1998, registra sus pedidos por encargo en un cuaderno físico. Entre el 1 y el 31
de marzo de 2026 no se entregaron 12 pedidos sobre un total aproximado de 140,
y la revisión diaria del cuaderno toma entre 15 y 20 minutos.

Este proyecto desarrolla un sistema web de registro y consulta de pedidos que
permite consultar por fecha de entrega y conserva el registro con respaldo. Se
construye sobre el frontend desarrollado en el módulo de Programación Web,
agregando una base de datos MySQL y una capa de acceso en PHP.

La solución se verifica mediante una matriz de casos de prueba que cubre el
registro, la consulta y los casos de error. Se espera que la consulta por fecha
elimine los pedidos no revisados y que el respaldo evite la reconstrucción
manual del registro, que en julio de 2025 obligó a llamar a los clientes de una
semana completa.

*(163 palabras)*

## Introducción

El presente documento describe el desarrollo de un sistema de gestión de pedidos
para la Panadería del Barrio, elaborado como proyecto integrador del módulo
Proyecto de Software del Programa Académico Desconcentrado "Técnico Superior en
Informática" de la UMSA, Sede Colquencha.

El proyecto continúa el trabajo iniciado en el módulo de Programación Web, donde
se construyó y publicó la interfaz web del negocio. Aquella primera versión
almacenaba la información en un archivo estático, lo que permitía mostrar los
productos pero no registrar operaciones. Este módulo completa el sistema con una
base de datos y la lógica de servidor necesaria para registrar y consultar
pedidos.

El documento se organiza en cinco partes. La primera presenta la propuesta: el
problema, los objetivos, la justificación y el alcance. La segunda desarrolla el
marco teórico y la recopilación de información. La tercera detalla el desarrollo:
requerimientos, metodología, construcción y pruebas. La cuarta aborda los
aspectos de puesta en producción y costos. La quinta presenta las conclusiones y
recomendaciones.

---

<!-- ═══════════════════════════════════════════════════════════════════════
     CONCLUSIONES Y RECOMENDACIONES (Unidad 5) - se agregan el Día 18

     LA REGLA QUE ORDENA TODO: una conclusión responde a un objetivo. No es un
     resumen de lo que se hizo ("se desarrolló un sistema..."), ni una opinión
     ("el proyecto fue muy enriquecedor"). Es la respuesta a la pregunta que
     el objetivo planteó: ¿se logró, sí o no, y con qué evidencia?

     Por eso hay EXACTAMENTE tantas conclusiones como objetivos específicos.
     Si sobra una conclusión, no respondía a ningún objetivo. Si falta,
     quedó un objetivo sin cerrar.

     Basado en Sampieri cap. 11 (el reporte de resultados: qué se encontró,
     medido contra lo que se buscaba).
     ═══════════════════════════════════════════════════════════════════════ -->

## Conclusiones

Cada conclusión responde a un objetivo específico y se apoya en evidencia del
propio proyecto.

1. **Se diseñó la base de datos relacional** con categorías, proveedores,
   productos y pedidos, con la fecha de entrega como criterio de consulta. El
   cliente quedó como un dato del pedido y no como tabla propia. El caso P-13
   confirma que el catálogo completo sale de la base.

2. **Se implementó el registro de pedidos** con validación de los campos
   obligatorios: P-02 y P-04 confirman que no se guarda un pedido incompleto.
   Se cumplió a medias: una fecha anterior a hoy todavía se acepta (P-03).

3. **Se implementó la consulta de pendientes por fecha.** El sistema muestra
   los pedidos del día ordenados, y distingue el caso de que no haya ninguno
   (P-06 y P-07), en lugar de mostrar una pantalla vacía.

4. **Se verificó el sistema** con una matriz de trece casos que cubre registro,
   consulta, casos de error y seguridad. La corrida encontró dos fallas, que
   quedaron documentadas para su corrección.

<!-- Fíjate en el patrón: cada conclusión empieza con el objetivo cumplido y
     TERMINA con la evidencia (el caso de prueba, el resultado medido). Una
     conclusión sin evidencia es una afirmación; con evidencia, es un
     resultado.

     Y la conclusión 4 dice que se encontraron DOS FALLAS. Eso no debilita el
     trabajo: lo hace creíble. Un proyecto que dice "todo salió perfecto"
     miente o no probó. Reconocer lo que falta es más fuerte que ocultarlo.

     LO QUE NO SON CONCLUSIONES:
       "El proyecto fue una gran experiencia de aprendizaje."  (opinión)
       "Se trabajó mucho para lograr el sistema."              (esfuerzo)
       "El software es muy útil para la panadería."            (sin medir)
     Nada de eso responde a un objetivo ni se apoya en evidencia.           -->

## Recomendaciones

Las recomendaciones describen lo que quedó fuera del alcance del proyecto y
conviene hacer más adelante.

1. **Capacitar al personal** en el uso del sistema antes de reemplazar el
   cuaderno por completo. La transición conviene gradual: usar los dos en
   paralelo durante una semana.

2. **Agregar el respaldo automático diario** en un servidor real cuando el
   sistema se ponga en producción, con la copia fuera del local.

3. **Evaluar, más adelante, un módulo de facturación**, que quedó fuera del
   alcance de este proyecto (ver los límites). Solo si el negocio lo necesita:
   no agregar funciones por agregarlas.

<!-- LA DISTINCIÓN CLAVE del día: conclusión vs recomendación.
       - la conclusión mira HACIA ATRÁS: ¿se logró el objetivo?
       - la recomendación mira HACIA ADELANTE: ¿qué sigue?

     Y las recomendaciones son el lugar correcto para lo que en el Día 3 NO
     entró como objetivo: "capacitar al personal", "aumentar las ventas". Son
     deseables, no dependen solo del software, y por eso son recomendaciones,
     no conclusiones. El material del Día 3 ya anticipaba esto.

     La recomendación 3 tiene una frase importante: "no agregar funciones por
     agregarlas". Es el antídoto contra el instinto de prometer un sistema que
     hace todo. El alcance del Día 4 se respeta hasta el final. -->

---

*(La propuesta está completa, con sus conclusiones y recomendaciones. El
documento final se compila el Día 19 con todas sus partes y los anexos.)*
