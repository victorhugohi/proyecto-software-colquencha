<!-- ═══════════════════════════════════════════════════════════════════════
     PRESUPUESTO Y ESTIMACIÓN DE COSTOS - proyecto de ejemplo

     ⚠️ ES EL PROYECTO DE EJEMPLO DEL MÓDULO, no el tuyo.

     LA IDEA CENTRAL, y va contra el instinto de todos:
        UN PRESUPUESTO NO ES UN NÚMERO. ES UN RANGO CON SUS SUPUESTOS.

     "Cuesta 3.500 Bs" es una respuesta que suena segura y es mentira: nadie
     sabe exactamente cuánto va a costar algo que todavía no hizo. "Entre
     3.000 y 4.500 Bs, suponiendo que el cliente entrega los datos a tiempo"
     es una respuesta honesta y más útil, porque dice de qué depende.

     DE DÓNDE SALE EL NÚMERO: no de la intuición. De DESCOMPONER el trabajo en
     partes bastante pequeñas como para estimarlas, y sumar. Es el método del
     Día 11 al 14 aplicado al revés: ya sabemos qué se construyó, ahora se le
     pone tiempo a cada parte.
     ═══════════════════════════════════════════════════════════════════════ -->

# Presupuesto y estimación de costos

## Sistema de gestión de pedidos - Panadería del Barrio

Basado en Dinwiddie, *Software Estimation Without Guessing*, cap. 2 y 3.

---

## 1. El método: descomponer y sumar

No se estima el proyecto entero de una vez ("¿cuánto tarda todo?"), porque a
esa pregunta nadie la puede responder bien. Se **descompone** en partes
pequeñas, se estima cada una, y se suma.

Las partes salen de lo que ya se construyó, del Día 11 al 14.

<!-- Dinwiddie llama a esto "decomposition for estimation" (cap. 3). La razón
     por la que funciona: es mucho más fácil estimar bien algo pequeño y
     conocido que algo grande y vago. Los errores de las partes pequeñas además
     tienden a compensarse entre sí; el error de una estimación monolítica no
     se compensa con nada.                                                   -->

## 2. Descomposición por funcionalidad

| Parte | Optimista | Probable | Pesimista |
|---|---:|---:|---:|
| Diseño de la base de datos | 3 h | 5 h | 8 h |
| Endpoint PHP con seguridad | 4 h | 6 h | 10 h |
| Frontend conectado y sus 3 estados | 5 h | 8 h | 14 h |
| Pruebas y correcciones | 3 h | 5 h | 9 h |
| Reuniones con el cliente | 2 h | 3 h | 5 h |
| Ajustes imprevistos | 2 h | 4 h | 8 h |
| **Total** | **19 h** | **31 h** | **54 h** |

<!-- TRES COLUMNAS, NO UNA. Esto es lo que convierte una adivinanza en una
     estimación. Para cada parte se piensa:
        optimista  = si todo sale bien
        probable   = lo más realista
        pesimista  = si aparecen problemas

     El rango del total (19 a 54 h) dice la verdad que un número solo esconde:
     esto puede tardar el doble de lo probable si las cosas se complican, y
     casi siempre algo se complica.

     LA FILA "AJUSTES IMPREVISTOS" se justifica porque en todo proyecto aparece
     algo que no se previó. Un presupuesto sin esa fila subestima el
     costo.            -->

## 3. De horas a dinero

El costo depende de una tarifa por hora. Para un proyecto formativo, se puede
usar el salario de referencia de un desarrollador junior en Bolivia.

Supuesto: **35 Bs por hora** (referencia, proyecto formativo).

| Escenario | Horas | Costo de mano de obra |
|---|---:|---:|
| Optimista | 19 h | 665 Bs |
| **Probable** | **31 h** | **1.085 Bs** |
| Pesimista | 54 h | 1.890 Bs |

<!-- El número que se comunica al cliente es el PROBABLE, pero SIEMPRE con el
     rango al lado. "Alrededor de 1.085 Bs, y hasta 1.890 si aparecen
     complicaciones" es honesto. "1.085 Bs" a secas es una promesa que no se
     puede cumplir.                                                          -->

## 4. Costos de infraestructura

La mano de obra no es todo. Un sistema que corre necesita dónde correr.

| Concepto | Costo mensual | Nota |
|---|---:|---|
| Hosting con PHP y MySQL | 30 a 60 Bs | o gratuito en la etapa de prueba |
| Dominio .bo | ~21 Bs/mes | 250 Bs al año, como en la factibilidad del Día 4 |
| Certificado HTTPS | 0 Bs | gratis con Let's Encrypt |
| **Total mensual** | **~50 a 80 Bs** | |

<!-- Este cuadro suele ser una sorpresa: casi nadie piensa que el software
     tiene un costo que sigue corriendo DESPUÉS de terminarlo. Un sistema no
     es como un mueble que se entrega y listo; es más como un auto, que
     además de comprarlo hay que mantenerlo en marcha.

     Y conviene el dato honesto: en la etapa de aprendizaje, casi todo esto
     es gratis (hosting de prueba, HTTPS de Let's Encrypt). El costo real
     aparece cuando el sistema se usa en serio.                             -->

## 5. Presupuesto final

| Concepto | Monto |
|---|---:|
| Desarrollo (escenario probable) | 1.085 Bs |
| Margen por imprevistos (ya incluido en el rango) | hasta 1.890 Bs |
| Infraestructura, primer año | ~600 Bs |
| **Total estimado, primer año** (del escenario probable al pesimista, más infraestructura) | **1.700 a 2.500 Bs** |

**Se comunica como rango, con el supuesto principal:** *"Entre 1.700 y 2.500
Bs el primer año, suponiendo que el cliente entrega los datos y las decisiones
a tiempo. La demora del lado del cliente es la causa más común de que un
proyecto se pase del presupuesto."*

