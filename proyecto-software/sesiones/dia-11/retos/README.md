# Retos del Día 11 - Base de datos

---

## Nivel base - Encontrar lo repetido

Para cada caso, di **qué tabla nueva** hace falta y **por qué**:

1. Una tabla `alumnos` donde cada fila guarda `curso_nombre` en texto, y hay 40 alumnos en
   "Sistemas".
2. Una tabla `ventas` con `producto_nombre`, `producto_precio` y `cantidad`.
3. Una tabla `usuarios` con `nombre`, `email` y `edad`, donde `edad` es un número.
4. Una tabla `pedidos` con `total` y también `precio_unitario` y `cantidad`.

**La pregunta:** ¿qué está guardado en más de un lugar, o se puede calcular?

---

## Nivel medio - Tu esquema

- [ ] Mira los datos de **tu** proyecto y anota qué está escrito más de una vez
- [ ] Cada cosa repetida es **una tabla**
- [ ] Cada tabla con `id INT AUTO_INCREMENT PRIMARY KEY`
- [ ] `UNIQUE` donde no deba repetirse
- [ ] **`DECIMAL(10,2)` en todo lo que sea dinero**
- [ ] `NOT NULL` solo donde el negocio lo exija
- [ ] `FOREIGN KEY` en cada relación
- [ ] `CHARACTER SET utf8mb4`

Y la revisión que importa:

- [ ] **¿Hay alguna columna que se pueda calcular desde otra?** Quítala.

---

## Nivel extra - Romperla a propósito

Sobre tu propia base de datos, comprueba que las reglas **se hacen cumplir**:

- [ ] Inserta una fila con una `FOREIGN KEY` que **no existe**. Anota el error.
- [ ] Intenta borrar una fila de la que dependan otras. Anota el error.
- [ ] Inserta dos veces el mismo valor en una columna `UNIQUE`. Anota el error.

Si alguna de las tres no falla, esa restricción no está funcionando. Averigua por qué.

Y después, el bug silencioso:

- [ ] Carga un registro que tenga una **FOREIGN KEY opcional en NULL**
- [ ] Consúltalo con `JOIN` y cuenta las filas
- [ ] Consúltalo con `LEFT JOIN` y cuenta las filas
- [ ] Compara con `SELECT COUNT(*)` de la tabla

Responde:

> ¿Cuál de las dos consultas te habría hecho perder datos **sin mostrarte ningún error**?
