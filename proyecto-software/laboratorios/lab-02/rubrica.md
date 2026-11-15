# Rúbrica - Laboratorio 2 (Marco teórico y requerimientos)

**10 puntos** · Se publica **el Día 6**, junto con el enunciado.

| Criterio | Excelente (100%) | En desarrollo (50%) | Insuficiente (0%) | Pts |
|---|---|---|---|---|
| **Estado del arte** | Compara soluciones reales; no es un glosario. Cada párrafo decide algo | Mezcla estado del arte con definiciones de diccionario | Puro glosario: "X es...", sin comparar nada | **2.0** |
| **Matriz comparativa** | Columnas que salen de las condiciones del proyecto; incluye la fila propia y **en qué pierde** | Matriz presente pero con columnas genéricas, o sin la fila propia | Sin matriz, o una que gana en todo | **2.5** |
| **Requerimientos funcionales** | Verificables (PASA/FALLA), con prioridad y origen; uno por fila | Presentes pero alguno vago, o sin origen, o todos "debe" | Requerimientos que no se pueden verificar, o son tareas | **2.5** |
| **Requerimientos no funcionales** | Cada uno con **número** o criterio observable, y cómo se verifica | Algunos con número, otros son deseos | "Debe ser rápido/fácil/seguro" sin medir | **1.5** |
| **Referencias** | Una sola norma consistente; entrevistas como fuentes no bibliográficas | Norma inconsistente, o entrevistas en la bibliografía | Sin referencias, o inventadas | **1.0** |
| **Metodología y forma** | Metodología fundamentada; tercera persona, sin guiones largos, commits en varios días | Metodología nombrada sin fundamentar, o forma inconsistente, o sin historial de commits | Sin metodología | **0.5** |

**Total: 10.0 puntos**

**Por dónde entregas no cambia la nota.** El laboratorio se entrega por el formulario del curso, en tu
memoria USB o con el enlace de GitHub, como te resulte posible. Tu repositorio puede estar solo en tu
computadora: lo que se revisa es el trabajo y su historial de commits.

## Cómo se revisa

**La matriz comparativa es el corazón del laboratorio.** El criterio que la separa de un cuadro
decorativo: *¿cada columna decide algo sobre el proyecto?* Una columna "está escrito en PHP" que
no cambia ninguna decisión sobra. Y la fila propia con su desventaja es lo que distingue análisis
de publicidad: pedir explícitamente *¿en qué es peor tu solución que lo que ya existe?*.

**Los requerimientos no funcionales son el error más común.** Casi todos escriben deseos ("debe
ser rápido"). El criterio: *¿puedo escribir un caso de prueba que dé PASA o FALLA sobre esto?*
Si no lleva un número o un criterio observable, no está bien escrito. Y estos requerimientos son
las filas de la matriz de pruebas del Lab 3: lo que quede vago aquí, allá no se puede probar.

**Las entrevistas no van en la bibliografía.** Es el error de referencias más común. Se citan en
el texto como comunicación personal y se declaran aparte. Verificarlo: si la bibliografía lista
"Entrevista con el cliente", está mal ubicada.

**Sobre el origen de los requerimientos.** Pedir la columna de origen (problema, entrevista,
observación). Un requerimiento sin origen es inventado, y esos son los que amplían el alcance sin
control. Es también la trazabilidad de la IEEE 830 aplicada.

