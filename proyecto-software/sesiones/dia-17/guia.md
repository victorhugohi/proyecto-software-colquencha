# Guía de estudio N.° 17: el README como carta de presentación

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 17 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después escribe la presentación de tu proyecto
en un archivo nuevo, `LEEME.md`. Puedes avanzar a tu ritmo: cuando termines, sigue con la guía del
día siguiente. El cuestionario del final sirve para comprobar que entendiste; respóndelo con tus
propias palabras.

---

## Primera parte. Lectura

### 1. El taladro y el agujero

Hay una idea clásica de la gestión de productos: quien compra un taladro no busca el taladro, sino
el agujero en la pared. Con el software pasa lo mismo. Lo que lleva a alguien a usar un sistema es
lo que resuelve, más que lo que hace o la tecnología con la que está hecho.

Compara estas dos primeras líneas para el mismo proyecto:

- *"Aplicación web desarrollada en PHP y MySQL con arquitectura cliente-servidor."*
- *"Registra y consulta pedidos en menos de un minuto, para no perder ventas mientras se atiende a
  otro cliente."*

La primera describe el taladro; la segunda, el agujero. Es la segunda la que hace que el cliente
quiera usarlo.

### 2. El README es lo primero que se ve

El README es el archivo que ve quien llega a un proyecto: el cliente, un evaluador o alguien que
revisa tu GitHub para contratarte. Si en treinta segundos no entiende qué problema resuelve y para
quién, deja de leer.

### 3. La primera línea

Es lo más importante del README. Una sola oración que diga qué hace el sistema, para quién y por qué
importa, sin mencionar la tecnología. Otros ejemplos: *"Reserva turnos de corte en segundos y evita
que dos clientes lleguen a la misma hora"* (una barbería); *"Muestra qué prendas quedan en cada
talla para no vender lo que ya no hay"* (una tienda).

La forma de comprobarla es leérsela a alguien que no sepa programar. Si entiende qué hace el sistema
y para quién, la línea está bien.

### 4. Características y beneficios

Cada punto de "qué hace el sistema" empieza con un verbo y describe un beneficio, no una
característica técnica:

| Característica | Beneficio |
|---|---|
| "validación del lado del servidor" | "registra un pedido en cuatro campos" |
| "consulta filtrada por fecha" | "muestra qué hornear hoy" |
| "prepared statements" | no va en esta sección |

### 5. El orden del README

El README sigue el orden de las preguntas del lector: primero qué es y para qué sirve, después cómo
se usa, y al final cómo se instala. Un README que empieza con "clonar el repositorio" pierde al
lector que todavía no sabe si le interesa.

El README también dice el estado del proyecto y sus límites. Uno que promete de más pierde
credibilidad al primer intento de uso.

### 6. El contenido ya está escrito

Nada de esto es trabajo nuevo. El problema sale de la formulación del Día 2; lo que hace el sistema,
del «para» de tus historias del Día 10; los límites, del Día 4. Hoy se reescribe todo eso en el
lenguaje del cliente.

GitHub muestra en la portada del repositorio el archivo `README.md`, no `LEEME.md`. Por eso, al
principio de tu `README.md` se pone la primera línea del LEEME y un enlace a `LEEME.md`.

### 7. El ejemplo de la Panadería del Barrio

`LEEME.md` (en la carpeta del código del día) empieza así:

> **Registra y consulta pedidos por encargo en menos de un minuto, para no perder ventas mientras se
> atiende a otro cliente.**
>
> **Qué hace el sistema**
> - Registra un pedido en cuatro campos, eligiendo del catálogo de productos
> - Muestra de un vistazo los pedidos comprometidos para hoy
> - Marca los pedidos como entregados, para que no se acumulen

La parte técnica (PHP 8, MySQL, XAMPP) aparece recién en "Para instalarlo", al final.

---

## Segunda parte. Trabajo en tu proyecto

Crea `LEEME.md` con estas secciones, en este orden:

1. **La primera línea**: qué hace, para quién y por qué importa, sin tecnología.
2. **El problema**, en el lenguaje de tu cliente.
3. **Qué hace el sistema**: puntos que empiezan con verbo y describen beneficios.
4. **Cómo se usa**, para el usuario.
5. **Cómo instalarlo**, para quien tenga que ponerlo en marcha.
6. **El estado del proyecto y sus límites.**

Después, en tu `README.md`, agrega arriba de todo la primera línea y un enlace a `LEEME.md`. Lee la
primera línea a alguien que no sepa programar y reescríbela hasta que la entienda.

Antes de dar por terminada la sección, revisa:

- [ ] La primera línea no menciona ninguna tecnología.
- [ ] El problema está escrito en el lenguaje del cliente.
- [ ] Cada punto de "qué hace" es un beneficio.
- [ ] La instalación va al final, y los límites están.

| Lo que te pasa | Qué hacer |
|---|---|
| tu primera línea dice "PHP" o "aplicación web" | pregúntate qué resultado obtiene tu cliente |
| no sabes qué poner en el problema | parte de tu formulación del Día 2 y quítale lo técnico |
| tus puntos describen la tecnología | pregúntate de cada uno para qué le sirve al cliente |
| el README te quedó muy largo | deja arriba lo esencial: el lector decide en treinta segundos |

Al terminar, guarda tu avance:

```bash
git add LEEME.md README.md
git commit -m "docs: LEEME como carta de presentacion"
git push
```

---

## Cuestionario de repaso

1. ¿Qué significa la idea del taladro y el agujero aplicada a un README?
2. ¿Por qué la primera línea no menciona la tecnología?
3. ¿Cómo se comprueba que la primera línea está bien escrita?
4. ¿Qué diferencia hay entre una característica y un beneficio? Da un ejemplo de tu proyecto.
5. ¿Por qué la instalación va al final del README?
6. ¿De qué días anteriores sale el contenido del LEEME?
7. Escribe la primera línea de tu proyecto.

---

## Para la próxima clase

El Día 17 cierra con el sorteo del orden del examen final. El lunes se escriben las conclusiones y
se compila el documento final (Días 18 y 19).
