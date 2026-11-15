<!-- ═══════════════════════════════════════════════════════════════════════
     Plan de puesta en producción - proyecto de ejemplo

     ⚠️ Es el proyecto de ejemplo del módulo, no el tuyo.

     La distinción del día, dicha sin rodeos:
        Todo lo que construimos corre en LOCALHOST. Eso no es producción.
        Localhost es tu computadora hablándose a sí misma. Producción es un
        servidor al que puede llegar tu cliente desde su casa.

     Este documento no hace el deploy del sistema (eso excede el curso). Describe
     qué haría falta para hacerlo, para dejar claro que un proyecto
     no termina cuando funciona en su máquina: termina cuando alguien más lo
     puede usar. Esa diferencia suele pasarse por alto.
     ═══════════════════════════════════════════════════════════════════════ -->

# Plan de puesta en producción

## Sistema de gestión de pedidos - Panadería del Barrio

Basado en Orosz, *The Software Engineer's Guidebook*, cap. 17 (*Shipping to
Production*).

---

## 1. Localhost no es producción

Lo que se construyó corre en XAMPP, en una sola computadora. Para que el
cliente lo use de verdad, hacen falta tres cosas que en localhost venían
gratis:

| En localhost | En producción |
|---|---|
| la máquina es tuya | hace falta un **servidor** (hosting) que corra siempre |
| la URL es `localhost` | hace falta un **dominio** que la gente pueda escribir |
| solo entras tú | entra **cualquiera**, y eso cambia todo lo de seguridad |

<!-- La tercera fila es la más importante y la que menos se piensa. En
     localhost, la seguridad es opcional porque el único usuario eres tú. En
     producción, el endpoint del Día 12 queda expuesto a internet, y ahí los
     prepared statements dejan de ser una buena práctica y pasan a ser lo
     único que separa el sistema de ser vaciado. Todo lo del Día 12 se pone a prueba
     en este momento.                                                       -->

## 2. Los pasos, en orden

1. **Conseguir el hosting** con PHP y MySQL (hay opciones gratuitas para
   empezar, ver el presupuesto del Día 15).
2. **Subir el código** por el panel del hosting o por FTP.
3. **Crear la base de datos** en el servidor y correr `esquema.sql`.
4. **Cambiar `conexion.php`**: en el servidor, el usuario ya no es `root` sin
   contraseña. Es un usuario con permisos mínimos y su propia clave.
5. **Probar los tres estados** del Día 13 en el servidor, no solo en local.
6. **Configurar el respaldo automático** (ver `respaldo.sh`).

<!-- El paso 4 es en el que todos tropiezan. El conexion.php que funcionaba en
     localhost tiene root sin contraseña, y ningún hosting real permite eso.
     Hay que crear un usuario, darle permiso solo sobre esta base, y poner sus
     datos. Es el momento en que la advertencia del Día 12 ("esto sirve para
     aprender, no para un servidor real") se vuelve concreta.               -->

## 3. Lo que cambia en `conexion.php`

```php
// En localhost (lo que teníamos):
$usuario = 'root';
$clave   = '';

// En producción:
$usuario = 'panaderia_app';       // usuario propio, permisos mínimos
$clave   = '...';                 // una contraseña de verdad
```

Y el archivo con la contraseña real **no se sube a git**: se sube un
`conexion.ejemplo.php` con los campos vacíos, y en el servidor se completa. Es
la misma idea del Día 12: la contraseña es un dato que no se comparte.

## 4. Después del deploy: no termina ahí

Un sistema en producción hay que **vigilarlo**. Orosz lo llama la parte que
los que recién empiezan no ven: el trabajo no es solo que funcione el día del
lanzamiento, es que siga funcionando.

| Qué vigilar | Cómo, en un proyecto pequeño |
|---|---|
| ¿sigue en línea? | abrirlo cada tanto, o un servicio gratuito que avise si se cae |
| ¿hay errores? | revisar el log del servidor, no esperar a que se queje el cliente |
| ¿está respaldado? | que `respaldo.sh` corra solo cada noche |

<!-- La fila del respaldo conecta con el otro archivo del día. Como señala Orosz, un
     sistema en producción necesita mantenimiento continuo: el trabajo sigue
     después del día del deploy.           -->

## 5. La regla del rollback

Antes de cambiar algo en producción, tiene que haber forma de **volver atrás**
si el cambio rompe todo.

En un proyecto pequeño, el rollback es simple:

- el código anterior está en git (por eso se hace commit de cada día)
- los datos están en el respaldo de anoche

> Nunca se toca producción sin saber cómo deshacerlo. Es la diferencia entre
> un problema de diez minutos y una noche entera.

