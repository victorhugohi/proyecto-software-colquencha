# Guía de estudio N.° 15: cuánto cuesta el software

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 15 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después estima el costo de tu proyecto en un
archivo nuevo, `presupuesto.md`. Puedes avanzar a tu ritmo: cuando termines, sigue con la guía del
día siguiente. El cuestionario del final sirve para comprobar que entendiste; respóndelo con tus
propias palabras.

Este día empieza con el segundo parcial. La guía es para después del parcial, o para quien quiera
adelantar.

---

## Primera parte. Lectura

### 1. Un presupuesto es un rango

Si se le pregunta a un grupo cuánto costaría hacer un sistema, cada uno da un número distinto. Eso
pasa porque un número solo, sin método, es una adivinanza. *"Cuesta 3.500 Bs"* suena seguro, pero
nadie sabe exactamente cuánto va a costar algo que todavía no se hizo. *"Entre 3.000 y 4.500 Bs, si
el cliente entrega los datos a tiempo"* dice de qué depende.

Por eso un presupuesto se expresa como un rango, con los supuestos de los que depende.

### 2. Descomponer y sumar

No se estima el proyecto entero de una vez. Se divide en partes pequeñas, se estima cada una y se
suman. Es más fácil acertar en algo pequeño y conocido que en algo grande y vago. Las partes ya las
tienes: son lo que construiste del Día 11 al 14.

Cada parte se estima con tres columnas:

| Optimista | Probable | Pesimista |
|---|---|---|
| si todo sale bien | lo más realista | si aparecen problemas |

Las tres columnas son las que permiten dar un rango. Si una parte genera mucha duda, todavía es
demasiado grande: hay que dividirla más.

### 3. La fila de imprevistos

Casi siempre aparece algo que no se previó. Por eso el presupuesto lleva una fila de ajustes
imprevistos. Sin ella parece más preciso, pero es menos realista, y deja mal a quien lo firmó.

### 4. De horas a dinero

Las horas se convierten en dinero con una tarifa por hora. Para un proyecto formativo se puede usar
como referencia el salario de un desarrollador junior; lo importante es el método, más que el número
exacto.

### 5. El costo de mantenerlo

El software sigue costando después de entregarlo, como un auto: además de comprarlo, hay que
mantenerlo. Un sistema necesita dónde correr: hosting, dominio y certificado HTTPS. Es un costo que
casi siempre se olvida.

### 6. El supuesto principal

La causa más común de que un proyecto se pase del presupuesto es la demora del lado del cliente:
datos que no llegan o decisiones que no se toman. Escribirlo como supuesto deja claro de qué depende
el plazo.

### 7. El ejemplo de la Panadería del Barrio

En `presupuesto.md` (en la carpeta del código del día):

| Parte | Optimista | Probable | Pesimista |
|---|---:|---:|---:|
| Diseño de la base de datos | 3 h | 5 h | 8 h |
| Endpoint PHP con seguridad | 4 h | 6 h | 10 h |
| Frontend conectado y sus 3 estados | 5 h | 8 h | 14 h |
| Pruebas y correcciones | 3 h | 5 h | 9 h |
| Reuniones con el cliente | 2 h | 3 h | 5 h |
| Ajustes imprevistos | 2 h | 4 h | 8 h |
| **Total** | **19 h** | **31 h** | **54 h** |

Con una tarifa de referencia de 35 Bs por hora y unos 600 Bs de infraestructura el primer año, el
total se comunica así:

> Entre 1.700 y 2.500 Bs el primer año, suponiendo que el cliente entrega los datos y las decisiones
> a tiempo.

---

## Segunda parte. Trabajo en tu proyecto

Crea `presupuesto.md` con:

1. **Las partes de tu proyecto**, a partir de lo que construiste, cada una con sus tres columnas.
2. **Una fila de imprevistos**, y el total de cada columna: ese es tu rango de horas.
3. **Una tarifa por hora** y el rango convertido a dinero.
4. **Una tabla de infraestructura mensual**: hosting, dominio, certificado.
5. **El total, como rango**, con el supuesto principal.

Antes de dar por terminada la sección, revisa:

- [ ] El presupuesto es un rango, no un número.
- [ ] Cada parte tiene sus tres columnas, y está la fila de imprevistos.
- [ ] Está la infraestructura.
- [ ] El total dice de qué depende.

| Lo que te pasa | Qué hacer |
|---|---|
| te sale un número solo | divide el proyecto en partes y estima cada una con tres columnas |
| no sabes qué tarifa poner | usa el salario de un desarrollador junior como referencia |
| una parte te da mucha duda | divídela más |
| olvidaste la infraestructura | pregúntate dónde va a correr el sistema cuando lo entregues |
| tu cliente quiere un solo número | dale el probable, pero deja el rango por escrito |

Al terminar, guarda tu avance:

```bash
git add presupuesto.md
git commit -m "docs: presupuesto y estimacion de costos"
git push
```

---

## Cuestionario de repaso

1. ¿Por qué un presupuesto se expresa como un rango y no como un número?
2. ¿Qué ventaja tiene descomponer el proyecto en partes para estimarlo?
3. ¿Qué representan las columnas optimista, probable y pesimista?
4. ¿Para qué sirve la fila de imprevistos?
5. ¿Por qué el software sigue costando después de entregarlo?
6. ¿Cuál es la causa más común de que un proyecto se pase del presupuesto?
7. ¿Cuál es el rango de horas de tu proyecto, y de qué parte tienes más duda?

---

## Para la próxima clase

El Día 16 trata la puesta en producción: qué pasa con el sistema después de terminarlo, cómo se
respalda y cómo se deshace un cambio si algo sale mal. El Día 17, cómo se presenta el proyecto.
