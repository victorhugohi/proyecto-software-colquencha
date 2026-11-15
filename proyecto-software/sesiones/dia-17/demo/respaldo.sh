#!/usr/bin/env bash
# ═══════════════════════════════════════════════════════════════════════════
# Respaldo de la base de datos - proyecto de ejemplo
#
# ⚠️ Es el proyecto de ejemplo del módulo, no el tuyo.
#
# Por qué este archivo existe: un sistema en producción sin respaldo no está
# terminado, está esperando el día que se pierda todo. La pregunta no es "¿voy
# a perder los datos?", es "¿cuándo?". Un respaldo convierte esa pérdida de
# catástrofe en molestia.
#
# Qué hace: guarda una copia completa de la base en un archivo .sql con la
# fecha en el nombre, y borra las copias de más de 30 días para no llenar el
# disco.
# ═══════════════════════════════════════════════════════════════════════════

# set -euo pipefail: que el script se detenga si algo falla, en vez de seguir
# como si nada. Sin esto, si el mysqldump falla, el script borraría respaldos
# viejos igual y te quedarías sin ninguno. El orden importa: primero se crea
# el nuevo, y solo si salió bien se limpian los viejos.
set -euo pipefail

# ── Configuración ──────────────────────────────────────────────────────────
BASE="panaderia"
CARPETA="respaldos"
DIAS_A_CONSERVAR=30

# La fecha en el nombre del archivo permite tener muchas copias sin que se
# sobrescriban, y saber de un vistazo de cuándo es cada una.
# Formato AAAA-MM-DD-HHMM, que ordena bien alfabéticamente.
FECHA=$(date +%Y-%m-%d-%H%M)
ARCHIVO="$CARPETA/${BASE}_${FECHA}.sql"

# ── Crear el respaldo ──────────────────────────────────────────────────────
mkdir -p "$CARPETA"

echo "Respaldando '$BASE' en $ARCHIVO ..."

# mysqldump genera un archivo .sql con todo lo necesario para reconstruir la
# base desde cero: las tablas, las relaciones y los datos. Se escribe primero
# como .parcial y solo se renombra si terminó bien: un respaldo a medias nunca
# queda con el nombre de uno bueno, y la verificación de abajo lo detecta.
# --single-transaction: toma una foto consistente sin bloquear la base
#   mientras se usa. Sin esto, un respaldo de una base en uso puede quedar a
#   mitad de una operación.
mysqldump --single-transaction "$BASE" > "$ARCHIVO.parcial" && mv "$ARCHIVO.parcial" "$ARCHIVO"

# ── Verificar que el respaldo sirve ────────────────────────────────────────
# Un respaldo hay que probarlo. El error frecuente es confiar en
# copias que resultan estar vacías o corruptas justo el día que se necesitan.
# Aquí al menos se comprueba que el archivo no está vacío.
if [[ ! -s "$ARCHIVO" ]]; then
  echo "ERROR: el respaldo salió vacío. Algo falló." >&2
  exit 1
fi

TAMANO=$(du -h "$ARCHIVO" | cut -f1)
echo "Respaldo creado: $TAMANO"

# ── Limpiar respaldos viejos ───────────────────────────────────────────────
# Sin esta parte, la carpeta crece para siempre hasta llenar el disco. Se
# borran los .sql de este proyecto con más de 30 días.
#
# Esto corre solo si el respaldo nuevo salió bien (por el set -e de arriba):
# nunca se borra lo viejo antes de tener lo nuevo.
echo "Borrando respaldos de más de $DIAS_A_CONSERVAR días ..."
find "$CARPETA" -name "${BASE}_*.sql" -type f -mtime +$DIAS_A_CONSERVAR -delete

echo "Listo."

