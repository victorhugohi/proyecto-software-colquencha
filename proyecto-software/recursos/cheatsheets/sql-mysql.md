# SQL y MySQL - lo que se usa en el módulo

Desde el Día 11. **Imprimir y tener al lado del teclado.** Todo lo de aquí está en
`demo/esquema.sql`.

> **Ustedes ya aprobaron Base de Datos.** Esto no pretende enseñarles SQL: es la lista de lo
> que el proyecto necesita y de las cuatro decisiones de diseño que hay que **poder
> defender** en la defensa del Día 20. Si saben más, mejor - úsenlo.

## Crear la base con la codificación correcta

```sql
CREATE DATABASE IF NOT EXISTS panaderia
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE panaderia;
```

**`utf8mb4` y no `utf8`.** El `utf8` de MySQL es de 3 bytes y no guarda emoji ni algunos
caracteres; `utf8mb4` es el UTF-8 de verdad. En un proyecto con nombres en español conviene
desde el primer día: "Panadería" guardada en la codificación equivocada se ve como
`PanaderÃ­a`.

## Los tipos que se usan

| Tipo | Para | Nota |
|---|---|---|
| `INT` | enteros, ids, stock | con `AUTO_INCREMENT` en la llave primaria |
| `VARCHAR(n)` | texto corto: nombres, unidades | el `n` es el máximo, no reserva espacio |
| `DECIMAL(10,2)` | **dinero, siempre** | 10 dígitos en total, 2 decimales |
| `DATE` / `DATETIME` | fechas | `YYYY-MM-DD` |
| `TEXT` | texto largo: descripciones | no lleva longitud |
| `BOOLEAN` | sí/no | MySQL lo guarda como `TINYINT(1)` |

⚠️ **Para dinero, nunca `FLOAT`.** `FLOAT` es aproximado: `0.10` se guarda como
`0.10000000149…` y al sumar mil ventas la diferencia se ve. `DECIMAL` guarda el número exacto.
Es la regla más útil de todo el módulo.

## Crear tablas

```sql
CREATE TABLE categorias (
  id     INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE productos (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  nombre        VARCHAR(100)  NOT NULL,
  categoria_id  INT           NOT NULL,
  proveedor_id  INT,
  precio        DECIMAL(10,2) NOT NULL,
  stock         INT           NOT NULL DEFAULT 0,

  FOREIGN KEY (categoria_id) REFERENCES categorias(id),
  FOREIGN KEY (proveedor_id) REFERENCES proveedores(id)
);
```

| Restricción | Qué hace |
|---|---|
| `PRIMARY KEY` | identifica la fila. Única y no nula |
| `AUTO_INCREMENT` | el motor pone el número. No se escribe al insertar |
| `NOT NULL` | obliga a que haya un valor |
| `UNIQUE` | impide repetir. **Es lo que evita crear "Panes" dos veces** |
| `DEFAULT x` | si no se manda, va `x` |
| `FOREIGN KEY` | ver abajo |

## Las cuatro decisiones que hay que poder defender

**1. `DECIMAL` y no `FLOAT` para el precio.** Ver arriba.

**2. No existe la columna `disponible`.** En el `datos.json` del módulo pasado estaba, y era
`stock > 0`. Guardarla aparte permite que un día haya stock 0 con disponible true, y ahí la
base se contradice a sí misma.
→ **Si un dato se puede calcular desde otro, no se guarda.** Se consulta con `WHERE stock > 0`.

**3. `proveedor_id` acepta `NULL`, `categoria_id` no.** Todo producto tiene categoría, pero
lo que se hornea en casa no tiene proveedor. La diferencia la decide el negocio,
no la técnica. Y si el dato no existe, va `NULL`: un teléfono `0000000` parece un dato real,
mientras que un `NULL` se puede buscar y deja claro que falta.

**4. La `FOREIGN KEY` la hace cumplir el motor:** no
deja insertar un producto con `categoria_id = 99` si no existe la categoría 99, y no deja
borrar una categoría que tenga productos. Es la diferencia entre *"acordamos que los datos
van a ser consistentes"* y *"el sistema no permite que dejen de serlo"*.

## Insertar

```sql
INSERT INTO categorias (nombre) VALUES ('Panes'), ('Salados');

INSERT INTO productos (nombre, categoria_id, proveedor_id, precio, stock)
VALUES ('Pan del día', 1, NULL, 0.50, 120);
```

El `id` no se escribe: lo pone `AUTO_INCREMENT`.

## Consultar

```sql
SELECT * FROM productos;
SELECT nombre, precio FROM productos WHERE stock > 0;
SELECT * FROM productos WHERE nombre LIKE '%pan%';
SELECT * FROM productos ORDER BY precio DESC LIMIT 10;
SELECT categoria_id, COUNT(*) FROM productos GROUP BY categoria_id;
```

| Cláusula | Para |
|---|---|
| `WHERE` | filtrar filas |
| `ORDER BY … ASC/DESC` | ordenar |
| `LIMIT n` | traer solo n |
| `GROUP BY` | agrupar, con `COUNT`, `SUM`, `AVG`, `MIN`, `MAX` |
| `LIKE '%x%'` | buscar por texto parcial |

## Unir tablas: el `JOIN` del proyecto

```sql
SELECT
  p.id, p.nombre,
  c.nombre AS categoria,
  p.precio, p.stock,
  (p.stock > 0) AS disponible,
  v.nombre AS proveedor
FROM productos p
JOIN      categorias  c ON c.id = p.categoria_id
LEFT JOIN proveedores v ON v.id = p.proveedor_id
ORDER BY p.id;
```

| | Qué trae |
|---|---|
| `JOIN` (inner) | solo las filas que tienen pareja en las dos tablas |
| `LEFT JOIN` | **todas** las de la izquierda, con `NULL` donde no hay pareja |

⚠️ **Por qué `proveedores` va con `LEFT JOIN`:** un producto sin proveedor **no debe
desaparecer del listado**. Con un `JOIN` normal desaparecería sin
ningún error, y es difícil notar lo que no se muestra.

Fíjate también en `(p.stock > 0) AS disponible`: el campo que **no** se guardó se calcula
aquí, y el frontend recibe exactamente la misma forma de datos que tenía con el JSON.

## Modificar y borrar

```sql
UPDATE productos SET precio = 9.00 WHERE id = 1;
DELETE FROM productos WHERE id = 1;
```

⚠️ **Sin `WHERE`, `UPDATE` y `DELETE` afectan la tabla entera.** Escribe primero el `WHERE`,
después el resto. O pruébalo como `SELECT` antes: si el `SELECT … WHERE` devuelve lo que
querías tocar, cambia `SELECT *` por `UPDATE`/`DELETE`.

## Cuando algo no sale

| Error | Casi siempre es |
|---|---|
| `Cannot add or update a child row` | una `FOREIGN KEY`: el id al que apuntas no existe |
| `Cannot delete or update a parent row` | otra fila depende de la que quieres borrar |
| `Duplicate entry 'x' for key 'nombre'` | el `UNIQUE` hizo su trabajo |
| `Field 'x' doesn't have a default value` | un `NOT NULL` sin `DEFAULT` que no mandaste |
| los acentos se ven como `Ã­` | falta `utf8mb4` - en la base **y** en la conexión |
| `Unknown database 'panaderia'` | falta correr el `CREATE DATABASE`, o el `USE` |

## phpMyAdmin, sin miedo

Se entra por `http://localhost/phpmyadmin`. Sirve para mirar, pero **el esquema se escribe en
`esquema.sql` y se corre desde la pestaña SQL**, no a mano en la interfaz: el archivo es lo
que se versiona, lo que se entrega y lo que permite rehacer la base desde cero si algo se
rompe la noche antes de la defensa.

```
phpMyAdmin → pestaña SQL → pegar el contenido de esquema.sql → Continuar
```
