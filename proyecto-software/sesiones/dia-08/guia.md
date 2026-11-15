# Guía de estudio N.° 8: referencias bibliográficas e integridad académica

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 8 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después completa las referencias de tu
`marco-teorico.md`. Puedes avanzar a tu ritmo: cuando termines, sigue con la guía del día
siguiente. El cuestionario del final sirve para comprobar que entendiste; respóndelo con tus
propias palabras.

---

## Primera parte. Lectura

### 1. Para qué sirve una referencia

Una referencia responde una sola pregunta: dónde puede alguien verificar lo que se afirma. El resto
(el orden de los apellidos, la coma o el punto) son convenciones. Importan, pero menos que esa
pregunta.

Se elige una norma y se usa en todo el documento; mezclar normas es un error frecuente y muy
visible. En este módulo se usa APA, que es la más común en la región. Su forma mínima es esta:

```
LIBRO      Apellido, N. (año). Título del libro (edición). Editorial.
WEB        Apellido, N. (año). Título. Sitio. URL
NORMA      Organismo. (año). Título de la norma (código). Editorial.
```

Si una página web no tiene fecha, se escribe *(s.f.)*, sin fecha. Es la convención de APA, y es
mejor que inventar un año.

### 2. Las entrevistas no van en la bibliografía

Es un dato poco conocido y que todos van a necesitar, porque casi todos estos proyectos se apoyan en
entrevistas. Una entrevista se cita en el texto como comunicación personal:

> *(J. Pérez, comunicación personal, 13 de noviembre de 2026)*

Y se declara aparte, en una sección de **fuentes no bibliográficas**, junto con las observaciones y
los documentos del cliente. Aunque el cliente sea un familiar, se cita igual: nombre, tipo de
comunicación y fecha. En las fuentes no bibliográficas se puede indicar la relación, por ejemplo
"propietaria del negocio, tía del autor".

### 3. Pocas referencias, pero leídas

Una bibliografía larga con fuentes que no se leyeron se nota enseguida: basta preguntar qué dice
una de ellas. Es mejor tener cinco referencias que se usaron de verdad que veinte solo listadas.

### 4. La integridad académica

La regla es indicar de dónde salió cada cosa. Usar ideas de otros es lo normal, porque todo proyecto
se apoya en trabajo previo; es plagio cuando no se indica de dónde vienen.

| Forma | ¿Se cita? |
|---|---|
| cita textual (palabras exactas, entre comillas) | sí, con la página |
| paráfrasis (la idea con palabras propias) | sí |
| resumen (varias páginas condensadas) | sí |

El malentendido más frecuente es creer que una paráfrasis no se cita. Cambiar las palabras y no
citar sigue siendo plagio, porque lo que se toma de otro autor es la idea, aunque la redacción sea
propia. En cambio, una conclusión a la que llegaste con tus propios datos es tuya y no se cita.

### 5. Sobre la inteligencia artificial

| Es una herramienta | Es un problema |
|---|---|
| usarla para entender algo | entregar un texto que no se entiende |
| usarla para revisar la redacción | presentarlo como propio sin poder explicarlo |
| usarla para explorar alternativas | |

El Día 20 cada estudiante responde *«¿por qué lo hiciste así?»* sobre su propio proyecto. Quien usó
IA para aprender puede responder; quien la usó para evitar pensar, no. Lo mismo vale para lo copiado
de un compañero, de un libro o de un chat.

En Modalidad de Graduación, un trabajo con plagio detectado se rechaza. Este módulo es el momento de
acostumbrarse a citar, cuando un error todavía no tiene consecuencias graves.

### 6. El ejemplo de la Panadería del Barrio

`marco-teorico.md` (en la carpeta del código del día) cierra con cinco referencias y una sección de
fuentes no bibliográficas:

> Hernández Sampieri, R., Fernández Collado, C., y Baptista Lucio, P. (2014). *Metodología de la
> investigación* (6ª ed.). McGraw-Hill.
>
> **Fuentes no bibliográficas.** La información sobre el proceso actual de la panadería proviene
> de: entrevista con la propietaria, 13 de noviembre de 2026; observación directa en el local, 18
> de noviembre de 2026, de 09:00 a 11:00; revisión del cuaderno de pedidos de marzo de 2026.

---

## Segunda parte. Trabajo en tu proyecto

Completa tu `marco-teorico.md`:

1. **Las referencias bibliográficas**: solo las fuentes que usaste de verdad, todas en APA.
2. **Las fuentes no bibliográficas**: tu entrevista, tu observación y los documentos de tu cliente,
   con fecha.
3. **Una revisión del texto**: cada afirmación que no sea tuya tiene que decir de dónde salió, en
   el mismo párrafo.

Antes de dar por terminada la sección, revisa:

- [ ] Todas las referencias siguen la misma norma.
- [ ] Las entrevistas están en fuentes no bibliográficas, no en la bibliografía.
- [ ] Puedes decir de qué trata cada una de tus referencias.
- [ ] Cada afirmación que no es tuya tiene su origen.

Al terminar, guarda tu avance:

```bash
git add marco-teorico.md
git commit -m "docs: referencias bibliograficas"
git push
```

---

## Cuestionario de repaso

1. ¿Qué pregunta responde una referencia?
2. Tres versiones de un párrafo tomado de un libro: (a) copiado sin comillas ni cita; (b) dicho con
   tus palabras, sin cita; (c) dicho con tus palabras, con cita. ¿Cuáles son plagio, y por qué?
3. ¿Dónde se cita la entrevista a tu cliente, y dónde se declara?
4. ¿Por qué es mejor tener cinco referencias leídas que veinte listadas?
5. ¿Cuándo usar IA es una herramienta y cuándo es un problema?
6. Escribe en formato APA la referencia de un libro que hayas usado.
7. Escribe la cita de tu entrevista como comunicación personal.

---

## Para la próxima clase

El Día 9 se escriben los requerimientos del sistema con la plantilla IEEE 830, y se entrega el
Laboratorio 2. Conviene llegar con el marco teórico y las referencias completos.
