# Guía de estudio N.° 16: respaldo y puesta en producción

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 16 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después prepara el respaldo y el plan de puesta
en producción de tu sistema. Puedes avanzar a tu ritmo: cuando termines, sigue con la guía del día
siguiente. El cuestionario del final sirve para comprobar que entendiste; respóndelo con tus
propias palabras.

El material del día son dos archivos: `respaldo.sh`, un script que se ejecuta, y `deploy.md`, que
describe la puesta en producción.

---

## Primera parte. Lectura

### 1. Localhost y producción

Hasta ahora el sistema corre en tu computadora, que se habla a sí misma: eso es *localhost*. Que
funcione ahí es el primer paso; el proyecto está terminado cuando otra persona lo puede usar. Para
eso hace falta ponerlo en **producción**:

| En localhost | En producción |
|---|---|
| la máquina es tuya | un servidor que funcione todo el tiempo |
| la dirección es `localhost` | un dominio que la gente pueda escribir |
| solo entras tú | puede entrar cualquiera |

Lo último cambia la seguridad. En localhost, usar `root` sin contraseña daba igual, porque el único
usuario eras tú. En producción, el endpoint queda expuesto a internet: la base necesita un usuario
propio con contraseña, y los *prepared statements* del Día 12 se vuelven indispensables para
proteger los datos.

### 2. El respaldo

Tarde o temprano algo falla: un disco se daña, alguien borra datos por error, un equipo se pierde.
Por eso un sistema en producción necesita respaldo. Git guarda el código, pero no los datos que
carga el cliente; para eso está `mysqldump`, que copia la base de datos completa en un archivo
`.sql`.

Dos reglas:

- **El respaldo se prueba restaurándolo.** El error más común es descubrir que las copias estaban
  vacías justo el día que se necesitan. La prueba es restaurar el respaldo en una base nueva y
  contar los registros.
- **El respaldo se guarda en otro lugar.** Una copia en la misma máquina protege del borrado
  accidental, pero no de un incendio o un robo.

El orden también importa: el script crea primero el respaldo nuevo y recién después borra los
viejos. Si lo hiciera al revés y el respaldo fallara, te quedarías sin ninguna copia. Por eso empieza
con `set -euo pipefail`, que detiene el script si un paso falla.

### 3. Volver atrás: el *rollback*

Antes de cambiar algo en producción hay que saber cómo deshacerlo. Las dos piezas ya las tienes: el
código anterior en git y los datos en el respaldo de la noche anterior.

### 4. Lo que no va a git

Los respaldos llevan los datos del cliente, así que la carpeta `respaldos/` va en el `.gitignore`,
igual que `conexion.php` con la contraseña real.

### 5. El ejemplo de la Panadería del Barrio

`respaldo.sh` (en la carpeta del código del día) genera un archivo con la fecha, como
`respaldos/panaderia_2026-12-03-1830.sql`, y borra los respaldos viejos solo si el nuevo salió bien.
`deploy.md` describe lo que haría falta para poner el sistema en producción: el servidor, el dominio,
el usuario de la base con contraseña y los pasos para volver atrás.

---

## Segunda parte. Trabajo en tu proyecto

1. Copia `respaldo.sh`, cambia `BASE` por el nombre de tu base de datos y córrelo. Tiene que crear
   un archivo `.sql` con tus `CREATE TABLE` e `INSERT`.
2. **Prueba el respaldo**: crea una base nueva, restaura el respaldo en ella y cuenta los registros.
3. Agrega `respaldos/` a tu `.gitignore`, y revisa que `conexion.ejemplo.php` siga sin contraseña.
4. Escribe tu `deploy.md`: qué haría falta para que tu cliente use el sistema desde su casa
   (servidor, dominio, usuario propio de la base) y cómo volverías atrás si un cambio sale mal.

Antes de dar por terminada la sección, revisa:

- [ ] El respaldo genera un `.sql` con contenido.
- [ ] Lo restauraste en una base nueva y los datos estaban.
- [ ] La contraseña real no está en git, y `git status` no muestra la carpeta `respaldos/`.
- [ ] Tu plan de puesta en producción dice cómo volver atrás.

| Lo que te pasa | Qué hacer |
|---|---|
| `mysqldump: command not found` | está en la carpeta `bin` de XAMPP: usa la ruta completa |
| el respaldo sale vacío | revisa el nombre de la base y que MySQL esté encendido |
| "Access denied" al respaldar | revisa el usuario y la contraseña, igual que en `conexion.php` |
| al restaurar faltan datos | revisa si el respaldo dio algún error al crearse |

Al terminar, guarda tu avance (si usas git):

```bash
git add .gitignore respaldo.sh deploy.md
git commit -m "chore: respaldo y plan de puesta en produccion"
git push
```

---

## Cuestionario de repaso

1. ¿Qué diferencia hay entre localhost y producción?
2. ¿Por qué en producción la base de datos no puede usar `root` sin contraseña?
3. ¿Git sirve para recuperar los datos que cargó el cliente? ¿Por qué?
4. ¿Cómo se comprueba que un respaldo sirve?
5. ¿Por qué el script crea el respaldo nuevo antes de borrar los viejos?
6. ¿Qué dos piezas necesitas para volver atrás si un cambio rompe producción?
7. ¿Qué le falta a tu sistema para que tu cliente lo use desde su casa?

---

## Para la próxima clase

El Día 17 trata cómo se presenta el proyecto a alguien que no lo conoce, con el `README` como carta
de presentación. Ese día también se sortea el orden del examen final.
