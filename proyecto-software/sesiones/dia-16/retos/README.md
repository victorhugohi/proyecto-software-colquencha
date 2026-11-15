# Retos del Día 16 - Respaldo y deploy

---

## Nivel base - ¿Protege o no?

Para cada situación, di si los datos están **a salvo** o **en riesgo**, y por qué:

1. El respaldo se guarda en la misma carpeta que la base, en la misma computadora.
2. El código está en git, en GitHub. Los datos no se respaldan.
3. El respaldo corre cada noche y se copia a un disco externo.
4. Se hace un respaldo, pero nunca se probó restaurarlo.
5. El sistema corre en el hosting; el respaldo se descarga cada semana a la máquina del
   desarrollador.

---

## Nivel medio - Tu respaldo, probado

- [ ] Adapta `respaldo.sh` con el nombre de **tu** base
- [ ] Corre el script: genera `respaldos/tubase_FECHA.sql`
- [ ] Abre el `.sql`: ¿tiene tus tablas y datos?

Y la prueba de verdad:

- [ ] Crea una base nueva de prueba
- [ ] Restaura tu respaldo en ella
- [ ] Cuenta los registros: **¿están todos?**

---

## Nivel extra - Tu plan de puesta en producción

Escribe, para **tu** proyecto:

- [ ] La tabla localhost vs producción: qué te falta en cada fila
- [ ] Los pasos en orden para ponerlo en un servidor
- [ ] Qué cambia en tu `conexion.php`, y por qué `root` sin clave no va
- [ ] `respaldos/` en tu `.gitignore`, y `conexion.ejemplo.php` sin contraseña (el que sí va a git)
- [ ] Tu regla de rollback: si un cambio rompe todo, ¿cómo vuelves atrás?

Y responde:

> Si tu cliente te llama un domingo diciendo que el sistema "borró todo", **¿en cuánto tiempo lo
> tienes funcionando de nuevo, y qué necesitas para lograrlo?**

Si no puedes responder eso con un número y una lista, tu plan de recuperación todavía no existe.
