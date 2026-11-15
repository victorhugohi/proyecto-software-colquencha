<!-- ═══════════════════════════════════════════════════════════════════════
     Marco teórico - documento de ejemplo

     ⚠️ Es el proyecto de ejemplo del módulo, no el tuyo.

     El marco teórico crece en dos días:
       Día 7  estado del arte y matriz comparativa
       Día 8  referencias bibliográficas y citación

     Qué es y qué no es. El marco teórico no es un capítulo de definiciones
     copiadas. No es explicar qué es una base de datos ni qué es PHP.

     Es la respuesta a una pregunta concreta:
        ¿qué se ha hecho antes para resolver este problema,
         y por qué eso no me sirve tal cual?

     Lo que no responde esa pregunta no va en el marco teórico.
     ═══════════════════════════════════════════════════════════════════════ -->

# Marco teórico

## Sistema de gestión de pedidos para Panadería del Barrio

---

<!-- ── El error más frecuente en esta sección ─────────────────────────────────
     El marco teórico de un principiante empieza así:

        "Una base de datos es un conjunto de datos organizados..."
        "PHP es un lenguaje de programación del lado del servidor..."

     Eso es un glosario, y no aporta nada: quien lee el documento sabe qué
     es una base de datos, y quien no lo sabe no va a leer el documento.

     La prueba que lo detecta:
        ¿Este párrafo cambia alguna decisión del proyecto?
     Si no cambia ninguna, se quita.

     Lo que sí va: qué soluciones existen ya para este problema, cómo
     resuelven cada cosa, y por qué ninguna sirve tal cual para este cliente.
     De ahí sale la justificación de construir algo propio.               -->

## Introducción

El registro de pedidos por encargo es un problema resuelto en el mercado:
existen desde aplicaciones genéricas de gestión hasta sistemas específicos
para panaderías. Este apartado revisa cuatro alternativas disponibles y
establece por qué ninguna se ajusta a las condiciones de la Panadería del
Barrio, lo que fundamenta el desarrollo de una solución propia.

<!-- ── La matriz comparativa ────────────────────────────────────────────
     Es el corazón del marco teórico y lo que lo distingue de un resumen de
     Wikipedia.

     Las columnas se eligen con los criterios del proyecto, no genéricas.
     Aquí las columnas salen directamente de la factibilidad del Día 4 y de
     lo observado el Día 6:
       - costo, porque el cliente es un negocio pequeño
       - funciona sin internet, porque la conexión del local se corta
       - se usa desde el celular, porque se trabaja con las manos ocupadas
       - consulta por fecha, porque es el problema central

     Si una columna no sale de una condición del proyecto, sobra. Comparar
     por "tiene interfaz gráfica" no aporta si eso no decide nada.

     Además, la última fila es la solución propia,
     comparada con las mismas columnas. Sin ella, la matriz describe el
     mercado; con ella, argumenta una decisión.                           -->

## Estado del arte

### Alternativas existentes

| Solución | Costo | Sin internet | Desde celular | Consulta por fecha |
|---|---|---|---|---|
| **Cuaderno de papel** *(actual)* | Bs 0 | sí | no aplica | **no** |
| **Planilla de cálculo compartida** | Bs 0 | no | difícil de usar | sí, con filtros |
| **Software de gestión comercial** *(genérico)* | desde Bs 200/mes | según el producto | sí | sí, entre muchas funciones |
| **Sistema a medida para panaderías** | desde USD 400 inicial | sí | sí | sí |
| **Solución propuesta** | Bs 600/año | no *(requiere conexión)* | sí | sí |

### Análisis

**El cuaderno** es gratuito, no requiere nada y funciona sin electricidad. Su
límite es exactamente el problema formulado: no permite consultar por fecha de
entrega. Se mantiene como respaldo de contingencia.

**La planilla compartida** resuelve la consulta y no cuesta nada, pero exige
conexión permanente y su uso en un celular, en el mostrador y con prisa, es
impracticable: la observación del 18 de noviembre registró que el registro de un
pedido debe hacerse en menos de un minuto, entre atender a dos clientes.

**El software de gestión comercial** resuelve el problema y mucho más:
inventario, facturación, proveedores. Ese "mucho más" es su desventaja aquí. El
costo mensual no se justifica para un negocio que necesita una de sus veinte
funciones, y la curva de aprendizaje es desproporcionada.

**El sistema a medida** es la alternativa más cercana. Se descarta por costo:
USD 400 iniciales representan aproximadamente el margen de un mes del negocio,
según la estimación de la propietaria.

### Conclusión del estado del arte

Ninguna alternativa disponible combina las cuatro condiciones que impone el
caso: costo compatible con un negocio de tres personas, uso desde el celular en
el mostrador, consulta por fecha de entrega, y alcance limitado a lo que el
cliente necesita.

La solución propuesta acepta una desventaja frente al cuaderno actual: requiere
conexión a internet. Se mitiga manteniendo el cuaderno como respaldo de
contingencia, y se declara como una limitación del proyecto.

<!-- Ese último párrafo es el que da credibilidad a toda la sección. Una
     comparación donde la solución propia gana en todo pierde
     credibilidad. Reconocer una desventaja real y decir cómo se mitiga
     demuestra que se miró en serio.                                       -->

<!-- ── La metodología, que también va aquí ──────────────────────────────
     El programa pide identificar "la metodología, métodos, técnicas y
     herramientas de software". Va en el marco teórico porque es una decisión
     que hay que fundamentar.

     La regla: se elige una metodología y se dice por qué, con las
     condiciones del proyecto. "Uso Scrum porque es ágil" no fundamenta nada.
     "Uso un enfoque incremental porque tengo cuatro semanas y un solo
     desarrollador, y Scrum completo exige roles que no existen aquí", sí. -->

## Metodología de desarrollo

Se adopta un **enfoque incremental**, con entregas verificables al final de
cada semana, alineadas con los laboratorios del módulo.

No se aplica Scrum en su forma completa: requiere roles (Product Owner, Scrum
Master) y ceremonias que no tienen sentido en un proyecto de un solo
desarrollador y cuatro semanas. Sí se toman dos de sus prácticas: el trabajo en
incrementos que funcionan, y la revisión al cierre de cada uno.

| Herramienta | Uso | Por qué |
|---|---|---|
| Git y GitHub | control de versiones | ya en uso desde el módulo anterior |
| XAMPP | entorno local | funciona sin internet, requisito del aula |
| PHP 8 y MySQL | backend y datos | corren en hosting compartido de bajo costo |
| Matriz de casos de prueba | verificación | trazable contra los requerimientos |

---

<!-- ── Referencias bibliográficas (subtema 3.4) ────────────────────────
     Una referencia responde una sola pregunta: ¿dónde puede ir alguien a
     verificar esto?

     Todo lo demás (el formato, el orden de los apellidos, la coma o el
     punto) son convenciones. Importantes, pero secundarias frente a esa
     pregunta.

     La regla que simplifica todo: se elige una norma y se usa de forma
     consistente. APA es la más común en la región y es la que se usa aquí.
     No se mezclan dos normas en un mismo documento.

     APA en su forma mínima, que es lo que hace falta aquí:

       Libro
       Apellido, N. (año). *Título del libro* (edición). Editorial.

       Artículo o página web
       Apellido, N. (año). Título del artículo. *Sitio*. URL

       Norma o estándar
       Organismo. (año). *Título de la norma* (código). Editorial.

       Comunicación personal (entrevistas)
       no se listan en referencias. Se citan en el texto:
       (J. Pérez, comunicación personal, 13 de noviembre de 2026)

     Ese último es poco conocido, y es el que más se usa en estos
     proyectos: las entrevistas al cliente no van en la bibliografía.       -->

## Referencias bibliográficas

Hernández Sampieri, R., Fernández Collado, C., y Baptista Lucio, P. (2014).
*Metodología de la investigación* (6ª ed.). McGraw-Hill.

IEEE. (1998). *IEEE Recommended Practice for Software Requirements
Specifications* (IEEE Std 830-1998). Institute of Electrical and Electronics
Engineers.

ISO/IEC/IEEE. (2018). *Systems and software engineering - Life cycle processes
- Requirements engineering* (ISO/IEC/IEEE 29148:2018). ISO.

Nixon, R. (2024). *Learning PHP, MySQL & JavaScript* (7ª ed.). O'Reilly Media.

Patton, J. (2014). *User Story Mapping: Discover the Whole Story, Build the
Right Product*. O'Reilly Media.

<!-- Cinco referencias. No hacen falta veinte: hacen falta las que se usaron
     de verdad. Una bibliografía larga con fuentes que nadie leyó es más fácil
     de detectar de lo que parece: basta preguntar qué dice una de ellas.  -->

### Fuentes no bibliográficas

La información sobre el proceso actual de la panadería proviene de:

- entrevista con la propietaria, 13 de noviembre de 2026
- observación directa en el local, 18 de noviembre de 2026, 09:00 a 11:00
- revisión del cuaderno de pedidos de marzo de 2026

Estas fuentes se citan en el texto como comunicación personal y no se listan en
las referencias bibliográficas, conforme a la norma APA.

<!-- ── Integridad académica ─────────────────────────────────────────────
     Lo central: se puede usar el trabajo de otros, siempre que se
     diga de dónde salió cada cosa.

     Usar ideas de otros es lo normal y lo esperable: todo proyecto se apoya
     en trabajo previo. Lo que convierte eso en plagio es no decirlo.

     Tres formas de usar una fuente, y las tres son válidas si se cita:

       Cita textual     las palabras exactas, entre comillas, con página
       paráfrasis       la idea con palabras propias, citando igual
       resumen          varias páginas condensadas, citando igual

     El malentendido más frecuente: creer que parafrasear exime de citar.
     No. Cambiar las palabras y no citar sigue siendo plagio, porque la idea
     sigue siendo de otro autor.

     Y sobre la IA, que es la pregunta real de este año:
     Usarla para entender algo, para revisar redacción o para generar
     alternativas es una herramienta más, como buscar en internet.
     Entregar texto generado como propio, sin entenderlo, es lo mismo que
     copiar de un compañero, porque después no se puede
     explicar lo que se entregó.
     La prueba es siempre la misma, y es la del Día 20:
        "¿Por qué lo hiciste así?"                                        -->

## Nota sobre integridad académica

Este documento se apoya en fuentes externas, que están citadas donde
corresponde. Las decisiones de diseño, la formulación del problema y el
análisis del caso son propios y se fundamentan en la información recogida
directamente del cliente.

---

*(El marco teórico está completo. El documento continúa el Día 9 con los requerimientos.)*
