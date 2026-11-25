# Guía de estudio N.° 18: conclusiones y recomendaciones

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 18 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después escribe las conclusiones y las
recomendaciones en tu `propuesta.md`. Puedes avanzar a tu ritmo: cuando termines, sigue con la guía
del Día 19, que se da el mismo día. El cuestionario del final sirve para comprobar que entendiste;
respóndelo con tus propias palabras.

---

## Primera parte. Lectura

### 1. Qué es una conclusión

Una conclusión responde a un objetivo. No resume lo que se hizo, ni da una opinión, ni describe el
esfuerzo. Responde la pregunta que el objetivo planteó: si se logró, y con qué evidencia.

Compara estas tres frases:

- *"El proyecto fue una experiencia enriquecedora."*
- *"Se implementó el registro con validación, como confirma el caso de prueba P-02."*
- *"Se trabajó mucho durante cuatro semanas."*

Solo la segunda es una conclusión: responde a un objetivo y trae evidencia. La primera es una
reflexión personal, y la tercera describe el esfuerzo.

### 2. Una conclusión por objetivo

Hay tantas conclusiones como objetivos específicos, en el mismo orden. Si sobra una, no respondía a
ningún objetivo; si falta, quedó un objetivo sin cerrar. Contar unas y otros es la revisión más
rápida.

### 3. La evidencia

Cada conclusión empieza con el objetivo cumplido y termina con la prueba: un caso de la matriz del
Día 14 o un resultado medido. La evidencia es lo que convierte una afirmación en un resultado.

### 4. Reconocer las fallas

Si un objetivo se cumplió solo en parte, se dice. Un proyecto que afirma que "todo salió perfecto"
probablemente no se probó lo suficiente. Reconocer lo que falta da más credibilidad que ocultarlo.

### 5. Conclusiones y recomendaciones

| Conclusión | Recomendación |
|---|---|
| mira hacia atrás: ¿se logró el objetivo? | mira hacia adelante: ¿qué conviene hacer después? |

Las recomendaciones son el lugar de lo que en el Día 3 no era un objetivo del software, como
"capacitar al personal", y de lo que quedó fuera del alcance. También respetan los límites del Día
4: recomendar diez módulos nuevos contradice el alcance que se fijó.

### 6. El ejemplo de la Panadería del Barrio

En `propuesta.md` (en la carpeta del código del día), las conclusiones siguen a los cuatro objetivos
del Día 3. Dos de ellas:

> 2. **Se implementó el registro de pedidos** con validación en el servidor: P-02, P-03, P-04 y P-19
>    confirman que no se guarda un pedido incompleto, con fecha pasada ni con una cantidad fuera de
>    rango. Dos de esas reglas faltaban en la primera corrida (P-03 y P-19); se agregaron y la segunda
>    corrida las confirma.
>
> 4. **Se verificó el sistema** con una matriz de veinte casos que cubre registro, consulta, casos de
>    error y seguridad. La primera corrida encontró tres fallas (P-03, P-10 y P-19); se corrigieron, y
>    la segunda corrida pasó completa.

La conclusión 2 no esconde lo que falló en el camino: dice qué encontró la primera corrida y cita el
caso que confirma el arreglo. Si en tu proyecto algo quedó a medias, se dice igual, con su caso.

---

## Segunda parte. Trabajo en tu proyecto

En tu `propuesta.md`, después del presupuesto:

1. Abre tus objetivos específicos del Día 3.
2. Escribe **una conclusión por cada objetivo**, en el mismo orden, y termina cada una con evidencia
   de tu matriz de pruebas.
3. Si un objetivo se cumplió a medias, dilo y explica por qué.
4. Escribe tus **recomendaciones**: qué conviene hacer después, respetando tus límites.
5. Cuenta tus objetivos y tus conclusiones: tienen que ser el mismo número.

Antes de dar por terminada la sección, revisa:

- [ ] Hay tantas conclusiones como objetivos específicos.
- [ ] Ninguna es una opinión o un relato del esfuerzo.
- [ ] Cada una termina con evidencia.
- [ ] Lo que quedó a medias está dicho, y las recomendaciones respetan los límites.

| Lo que te pasa | Qué hacer |
|---|---|
| tu conclusión dice "aprendí mucho" | eso es una reflexión personal: escribe si se logró el objetivo |
| tienes más conclusiones que objetivos | alguna no responde a un objetivo: quítala o muévela a recomendaciones |
| no sabes qué evidencia poner | búscala en tu matriz de pruebas del Día 14 |
| un objetivo no se cumplió | escríbelo: "se cumplió parcialmente porque..." |

Al terminar, guarda tu avance (si usas git):

```bash
git add propuesta.md
git commit -m "docs: conclusiones y recomendaciones"
git push
```

---

## Cuestionario de repaso

1. ¿A qué responde una conclusión?
2. ¿Por qué "el proyecto fue una experiencia enriquecedora" no es una conclusión?
3. ¿Cuántas conclusiones debe tener tu documento, y por qué?
4. ¿Qué evidencia puede cerrar una conclusión?
5. ¿Por qué conviene decir que un objetivo se cumplió a medias?
6. ¿Qué diferencia hay entre una conclusión y una recomendación?
7. Escribe la conclusión de uno de tus objetivos, con su evidencia.

---

## Para la próxima clase

El mismo lunes, después del descanso, se compila el documento final y se ensaya la defensa (Día 19).
