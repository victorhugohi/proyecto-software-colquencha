# Guía del módulo - Proyecto de Software

**Universidad Mayor de San Andrés** · Carrera de Informática
PAD "Técnico Superior en Informática" - Sede Colquencha · Convocatoria N.° 02/2026
Docente: Victor Hugo Huanca Ibarra

---

El módulo pasado construiste una aplicación web. Funciona, se ve bien y está publicada.

Y sin embargo **no es un producto todavía**. Los datos viven en un archivo que desaparece si
cambias de computadora. Nadie sabe cuánto costó hacerla. No hay forma de demostrar que
funciona más allá de "lo probé y funciona". Y si alguien te pregunta qué problema resuelve
exactamente, la respuesta está en tu cabeza, no escrita en ningún lado.

En este módulo, la página que hiciste en Programación Web se convierte en un proyecto de software completo.

## Y algo más importante

Este módulo es la antesala de tu **trabajo de grado**. Lo que escribas aquí -el
planteamiento del problema, los objetivos, el marco teórico, la metodología- es exactamente
la estructura que vas a necesitar para graduarte.

Si eliges bien y trabajas en serio, **este proyecto puede convertirse en tu proyecto de
grado**. No es un ejercicio más.

---

## De dónde partes

Lo que aprendiste y construiste en Programación Web es la base. El proyecto de este módulo va en un
**repositorio nuevo**, que se crea con la hoja «Tu repositorio de Proyecto de Software» (en las hojas de consulta).

| Traes del módulo 1 | Le agregas este módulo |
|---|---|
| Frontend funcionando | **Base de datos real** con PHP y MySQL |
| Datos en un archivo JSON | Especificación formal de requerimientos |
| "Lo probé y funciona" | Matriz de pruebas ejecutada |
| - | Costos, presupuesto y propuesta de valor |

### Tu cliente y tu sistema

Tu cliente es un **familiar**: el negocio o la actividad de alguien de tu familia, a quien puedas
entrevistar (Día 2), observar (Día 6) y volver a consultar durante el mes.

El sistema depende de lo que ese negocio necesita, y las opciones son muchas: **reservas** de turnos
(una barbería, un consultorio), **pedidos** (una pollería, una pastelería), **ventas e inventario**
(una tienda de ropa, una librería), **seguimiento** de trabajos (un servicio técnico), entre otras.
El ejemplo que sigue todo el material es una panadería con pedidos por encargo; tú aplicas los mismos
pasos a tu caso. Tu docente revisa contigo el alcance.

---

## Tu documento: en qué lo escribes y qué entregas

Durante el módulo escribes **un documento de ingeniería** sobre tu proyecto, por partes: una o dos
secciones por semana. Puedes escribirlo en la herramienta que prefieras:

| Herramienta | A favor | Ten en cuenta |
|---|---|---|
| **Markdown** (`.md`) en tu editor: **la recomendada** | Es la que usan las demos y las guías. Funciona sin internet, vive junto a tu código, y git muestra cada línea que cambiaste | Para el PDF final hay que convertirlo (ver abajo) |
| **Word o LibreOffice Writer** (`.docx`, `.odt`) | Es el formato con el que se presentan los trabajos de grado. Carátula, índice y numeración salen automáticos | Git guarda el archivo, pero no muestra qué cambió adentro |
| **LaTeX** (Overleaf o instalado) | El mejor acabado para un documento técnico | Overleaf necesita internet, y la del aula es muy lenta. Al final de cada clase, descarga el proyecto a tu repositorio |
| **Google Docs** u otra herramienta en línea | Escribir desde el celular | Necesita internet. Al final de cada clase, descarga el `.docx` a tu repositorio |

**Tres reglas, elijas lo que elijas:**

1. **El archivo vive en tu repositorio de Proyecto de Software**, el que se crea con la hoja «Tu repositorio de Proyecto de Software».
2. **Guardas tu avance al final de cada clase.** Con git es un commit, que es opcional y no cambia la
   nota, pero te deja volver a una versión anterior. Sin git, una copia con la fecha en tu memoria USB.
3. **La entrega final es un PDF** (`documento-final.pdf`) en tu repositorio, con carátula, índice y
   secciones numeradas, en el orden del Día 19. Los laboratorios se entregan por el formulario del curso,
   en tu memoria USB o con el enlace de GitHub, en el formato que elegiste: por dónde llegan no cambia
   la nota. Tu repositorio puede estar solo en tu computadora.

**Cómo sacas el PDF:**
- **Word o Writer:** Archivo → Exportar como PDF.
- **Overleaf:** Recompilar → Descargar PDF.
- **Markdown:** con `pandoc`, que viene en el kit. `pandoc documento-final.md -o documento-final.docx`
  te da un Word con tus títulos, tablas y listas: lo abres, le agregas la carátula y el índice
  automático, y lo exportas como PDF.

Lo que se califica es el **contenido**, no la herramienta: un PDF hecho en Markdown y uno hecho en Word
valen lo mismo.

---

## Cronograma

**El miércoles 11 se dan juntos los Días 1 y 2.** El jueves 12 no hay clases, pero cuenta como
asistencia para todos; el viernes 13 tampoco hay clases. Los Días 18 y 19 se dan juntos el lunes 7,
porque el examen final necesita dos días. **El documento final y el sistema se congelan el lunes 7 a
las 23:59.**

### Semana 1 - Del código al proyecto
- **Día 1** (mié 11 nov; turno mañana: guía de lectura) - Tipos de proyecto: monografía, proyecto integrador, proyecto de grado. Y miras
  tu aplicación con otros ojos.
- **Día 2** (mié 11 nov, junto con el 1) - **Formulación del problema.** Árbol de problemas: separar causas de síntomas.
  Y una entrevista real con tu cliente.
- **Día 3** (lun 16 nov) - **Objetivos SMART** y justificación.
- **Día 4** (mar 17 nov) - **Factibilidad** técnica, operativa y económica. Alcances y límites.
- **Día 5** (mié 18 nov) - Cronograma y WBS. **Entregas el Laboratorio 1: tu propuesta formal.**

### Semana 2 - Fundamentación y requerimientos
- **Día 6** (jue 19 nov) - Cómo recopilar información: entrevistas, encuestas, observación.
- **Día 7** (vie 20 nov) - **Marco teórico** y estado del arte: qué existe ya y en qué se diferencia lo tuyo.
- **Día 8** (lun 23 nov) - Referencias bibliográficas e integridad académica.
- **Día 9** (mar 24 nov) - **Requerimientos** funcionales y no funcionales, con el estándar **IEEE 830**.
  **Entregas el Laboratorio 2.**
- **Día 10** (mié 25 nov) - **Primer parcial** (45 min). Después: historias de usuario y modelado.

### Semana 3 - Construcción
- **Día 11** (jue 26 nov) - Diseño de la **base de datos** a partir de tus datos del módulo 1.
- **Día 12** (vie 27 nov) - **PHP y MySQL**: tu primer backend devolviendo JSON.
- **Día 13** (lun 30 nov) - **Conectas tu frontend del módulo 1 con tu propio backend.** Tu proyecto se completa.
- **Día 14** (mar 1 dic) - **Pruebas y calidad**: matriz de casos de prueba. **Entregas el Laboratorio 3.**
- **Día 15** (mié 2 dic) - **Segundo parcial** (45 min). Después: **cuánto cuesta** tu software.

### Semana 4 - Lanzamiento y cierre
- **Día 16** (jue 3 dic) - Deployment, monitoreo y distribución.
- **Día 17** (vie 4 dic) - **Marketing**: propuesta de valor y cómo se presenta un producto.
- **Día 18** (lun 7 dic) - Conclusiones y recomendaciones.
- **Día 19** (lun 7 dic, junto con el 18) - Anexos, documento final y ensayo de la defensa.
- **Día 20** (mar 8 y mié 9 dic) - **Examen final:** expones 10 minutos (6 mostrando tu sistema funcionando, empezando por el
  problema de tu cliente, y 4 respondiendo preguntas sobre tus decisiones). La tarde expone el martes; la
  mañana se reparte en los dos días por sorteo.

---

## Cómo se aprueba

| Componente | Puntos |
|---|---|
| Asistencia (1 pt por día: 20 días, incluido el jueves 12) | **20** |
| Laboratorios 1, 2 y 3 | **30** |
| Primer parcial (Día 10) | **10** |
| Segundo parcial (Día 15) | **15** |
| Examen final (Día 20): tu entrega final (15) + tu exposición (10) | **25** |
| **Total** | **100** |

Los tres laboratorios **son capítulos del mismo documento de ingeniería**, que entregas
completo el Día 20 junto con el software funcionando.

---

## Cinco consejos que deciden si te va bien

**1. Elige un problema real.** No inventes un sistema genérico. Si trabajaste el módulo pasado
con un negocio de verdad, ya tienes la mitad ganada: puedes ir, preguntar y volver con datos.
Un proyecto con un usuario real es mucho más fácil de documentar y de defender.

**2. La documentación avanza con el código, no después.** Si programas algo hoy, escribe hoy
su requerimiento y su caso de prueba. Dejar la redacción para la última semana es la forma
más segura de reprobar este módulo.

**3. Controla el alcance.** Tres funciones que corran perfectamente y sin errores en
producción valen más que un sistema enorme que se cae durante la demostración en vivo. Eso
es cierto en el examen y sigue siendo cierto en el trabajo.

**4. Avanza un poco en cada clase.** Un documento escrito entero la última noche se nota en la
defensa, cuando hay que explicar cada decisión. Si usas git, un commit por clase te deja volver atrás.

**5. Escribe pensando en tu tribunal de grado.** Si este proyecto termina siendo tu trabajo
de grado, el documento que escribas aquí es el borrador. Escríbelo bien desde ahora y te
ahorras rehacerlo entero después.

---

## Qué necesitas

- Tu **repositorio de Proyecto de Software**, en tu memoria USB
- El **contacto de tu cliente**, tu familiar: vas a necesitar hablar con esa persona varias veces
- **XAMPP** instalado (Apache + PHP + MySQL). Funciona sin internet.
- La lista de lo que **quedó pendiente** el módulo pasado: ese es tu punto de partida
