<!-- ═══════════════════════════════════════════════════════════════════════
     DOCUMENTO FINAL: ÍNDICE Y GUÍA DE COMPILACIÓN - proyecto de ejemplo

     ⚠️ ES EL PROYECTO DE EJEMPLO DEL MÓDULO, no el tuyo.

     LO QUE PASA HOY: durante cuatro semanas se escribieron piezas sueltas.
     Hoy se juntan en UN documento. No se escribe nada nuevo: se ordena,
     se numera, y se revisa que las piezas se hablen entre sí.

     LA REVELACIÓN DEL DÍA, y alivia a todos: el documento final YA ESTÁ
     ESCRITO. Está repartido en los archivos de cada semana. Compilar es
     ensamblar, no redactar. Quien llega hoy con las piezas hechas, termina
     hoy.
     ═══════════════════════════════════════════════════════════════════════ -->

# Documento final - índice y guía de compilación

## Sistema de gestión de pedidos - Panadería del Barrio

---

## 1. El orden del documento final

El documento se arma en este orden. Cada parte ya existe: la columna "de dónde
sale" dice en qué día se escribió.

| # | Sección | De dónde sale |
|---|---|---|
| - | Carátula | se arma hoy |
| - | Índice | se arma hoy (al final, cuando el orden es definitivo) |
| - | Resumen | Día 5 (`propuesta.md`) |
| 1 | Introducción | Día 5 (`propuesta.md`) |
| 2 | Formulación del problema | Día 2 (`propuesta.md`) |
| 3 | Objetivos | Día 3 (`propuesta.md`) |
| 4 | Justificación | Día 3 (`propuesta.md`) |
| 5 | Factibilidad, alcances y límites | Día 4 (`propuesta.md`) |
| 6 | Marco teórico | Día 7 (`marco-teorico.md`) |
| 7 | Metodología | Día 7 (`marco-teorico.md`) |
| 8 | Requerimientos | Día 9 (`requerimientos.md`) |
| 9 | Historias de usuario | Día 10 (`historias.md`) |
| 10 | Diseño de la base de datos | Día 11 (`esquema.sql`, explicado) |
| 11 | Pruebas | Día 14 (`pruebas.md`) |
| 12 | Presupuesto | Día 15 (`presupuesto.md`) |
| 13 | Conclusiones | Día 18 (`propuesta.md`) |
| 14 | Recomendaciones | Día 18 (`propuesta.md`) |
| - | Referencias | Día 8 (`marco-teorico.md`) |
| - | Anexos | se ordenan hoy |

<!-- Este índice ES el trabajo del día. Verlo entero de un golpe muestra dos
     cosas: que ya está casi todo hecho (alivio), y en qué orden va (que no es
     el orden en que se escribió). El marco teórico se escribió el Día 7 pero
     va en la posición 6, después del problema y los objetivos, porque el
     lector necesita el problema ANTES que el estado del arte.              -->

## 2. Qué va en los anexos

El anexo es lo que **respalda** el documento pero rompería la lectura si
estuviera en el cuerpo. La regla: si alguien necesita verlo para confiar en el
trabajo pero no para seguir el hilo, va al anexo.

| Anexo | Qué es | De dónde sale |
|---|---|---|
| A | El instrumento de recolección | Día 6 (`instrumento.md`) |
| B | El código fuente completo | Días 11-13 (los archivos) |
| C | La corrida completa de pruebas | Día 14 (`pruebas.md`) |
| D | El plan de puesta en producción y respaldo | Día 16 |

<!-- El instrumento (Día 6) es el ejemplo perfecto de anexo: fue clave para
     conseguir los datos, pero nadie que lee el documento necesita ver las
     preguntas de la entrevista para entender el proyecto. Respalda, no narra.
     Por eso el Día 6 ya decía que ese documento "va en anexos".

     El código va en anexo, NO en el cuerpo. En el cuerpo va la EXPLICACIÓN
     del diseño (por qué estas tablas); el código entero es respaldo.       -->

## 3. La revisión de coherencia

Antes de entregar, se lee el documento entero de una vez, buscando que las
piezas se hablen. Los tres cruces que más fallan:

1. **¿Cada objetivo (sec. 3) tiene su conclusión (sec. 13)?** Mismo número,
   mismo orden.
2. **¿Cada requerimiento (sec. 8) tiene su prueba (sec. 11)?** Lo que se
   prometió, ¿se verificó?
3. **¿El problema (sec. 2) y la conclusión (sec. 13) hablan de lo mismo?** El
   círculo tiene que cerrar.

<!-- Estos tres cruces son la diferencia entre un documento y un montón de
     archivos juntos. Cada uno conecta dos días lejanos: el 3 con el 18, el 9
     con el 14, el 2 con el 18. Si alguno no cierra, el documento tiene un
     agujero que el compilado hace visible por primera vez.                 -->

## 4. Los detalles que se revisan al final

- **Numeración** de secciones y de páginas, consistente
- **El índice**, generado cuando el orden ya es definitivo (por eso va último)
- **Las referencias**, todas en la misma norma (Día 8)
- **Los guiones y la ortografía**, una pasada completa
- **Que no diga "el proyecto de ejemplo"** en tu documento: eso es del
  material, tu documento habla de TU cliente

---

*(Con el documento compilado y la defensa ensayada, el proyecto está listo
para la presentación del Día 20.)*
