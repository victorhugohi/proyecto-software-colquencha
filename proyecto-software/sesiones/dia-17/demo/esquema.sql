-- ═══════════════════════════════════════════════════════════════════════════
-- Esquema de la base de datos - proyecto de ejemplo
--
-- ⚠️ Es el proyecto de ejemplo del módulo, no el tuyo.
--
-- De dónde sale este archivo: del `datos.json` del módulo pasado. Ese archivo
-- es una foto de los datos; este es la estructura que los sostiene.
--
-- El JSON servía para practicar `fetch`, y para eso estaba bien. Como base de
-- datos tiene tres problemas, y encontrarlos es el trabajo de hoy:
--
--    1. "Panes" aparece escrito 4 veces
--    2. "Lácteos del Valle" aparece escrito 4 veces
--    3. `disponible` se puede calcular desde `stock`, y sin embargo está
--       guardado aparte
--
-- Los tres son la misma clase de problema: un dato guardado en varios
-- lugares. Y siempre que un dato vive en varios lugares, tarde o temprano
-- esos lugares se contradicen.
-- ═══════════════════════════════════════════════════════════════════════════

CREATE DATABASE IF NOT EXISTS panaderia
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

-- utf8mb4 y no utf8: el `utf8` de MySQL es de 3 bytes y no guarda emoji ni
-- algunos caracteres. utf8mb4 es el UTF-8 de verdad. En un proyecto con
-- nombres en español conviene desde el primer día: "Panadería" con tilde
-- guardada en la codificación equivocada se ve como "PanaderÃ­a".

USE panaderia;

-- ── Categorías ─────────────────────────────────────────────────────────────
-- En el JSON las categorías eran un array de textos, y cada producto
-- repetía el suyo. Aquí son una tabla, y el producto guarda un número.
--
-- Qué se gana: si mañana "Panes" pasa a llamarse "Panes artesanales", se
-- corrige en una fila. Con el JSON había que corregir cuatro productos, y si
-- se olvidaba uno quedaban dos categorías donde había una.

CREATE TABLE categorias (
  id     INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL UNIQUE
);

-- UNIQUE en `nombre` es lo que impide crear "Panes" dos veces. Sin él,
-- la tabla no resuelve nada: solo cambia de lugar el problema.

-- ── Proveedores ────────────────────────────────────────────────────────────
-- Mismo caso, y aquí el argumento se ve todavía mejor: en el JSON el
-- proveedor era solo un nombre. Una tabla puede guardar su teléfono, y ese
-- teléfono queda en un solo lugar aunque le compre veinte productos.

CREATE TABLE proveedores (
  id       INT AUTO_INCREMENT PRIMARY KEY,
  nombre   VARCHAR(100) NOT NULL UNIQUE,
  telefono VARCHAR(20)
);

-- `telefono` no lleva NOT NULL: puede no saberse todavía, y una base de datos
-- que exige lo que no se tiene obliga a inventar. Un "0000000" es peor que un
-- NULL, porque el NULL se puede buscar y el cero mentiroso no.

-- ── Productos ──────────────────────────────────────────────────────────────

CREATE TABLE productos (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  nombre        VARCHAR(100)  NOT NULL,
  categoria_id  INT           NOT NULL,
  proveedor_id  INT,
  precio        DECIMAL(10,2) NOT NULL,
  unidad        VARCHAR(20)   NOT NULL,
  stock         INT           NOT NULL DEFAULT 0,

  FOREIGN KEY (categoria_id) REFERENCES categorias(id),
  FOREIGN KEY (proveedor_id) REFERENCES proveedores(id)
);

-- Tres decisiones que hay que poder defender:
--
-- 1. DECIMAL(10,2) y no FLOAT, para el precio.
--    FLOAT es aproximado: 0.10 se guarda como 0.10000000149... y al sumar mil
--    ventas de Bs 0.10 la diferencia se ve. DECIMAL guarda el número exacto.
--    Para dinero, siempre DECIMAL. Es la regla más útil de todo el día.
--
-- 2. No existe la columna `disponible`.
--    En el JSON estaba, y era `stock > 0`. Guardarla aparte permite que un
--    día haya stock 0 con disponible true, y ahí la base de datos se
--    contradice a sí misma.
--    La regla: si un dato se puede calcular desde otro, no se guarda.
--    Se consulta con   WHERE stock > 0
--
-- 3. `proveedor_id` acepta NULL, `categoria_id` no.
--    Todo producto tiene categoría, pero lo que se hornea en casa no tiene
--    proveedor. Esa diferencia sale de cómo funciona el negocio.

-- ── FOREIGN KEY: qué hace de verdad ────────────────────────────────────────
-- Una FOREIGN KEY es una restricción que hace cumplir el motor:
-- no deja insertar un producto con `categoria_id = 99` si no
-- existe la categoría 99, y no deja borrar una categoría que tenga productos.
--
-- Es la diferencia entre "acordamos que los datos van a ser consistentes" y
-- "el sistema no permite que dejen de serlo".

-- ── Datos iniciales ────────────────────────────────────────────────────────
-- Los mismos del `datos.json` del módulo pasado, ya normalizados.

INSERT INTO categorias (nombre) VALUES
  ('Panes'), ('Salados'), ('Dulces'),
  ('Tortas'), ('Bebidas'), ('Lácteos');

INSERT INTO proveedores (nombre, telefono) VALUES
  ('Lácteos del Valle',     '2 2789045'),
  ('Distribuidora Norte',   '2 2451200'),
  ('Mercado mayorista',     NULL),
  ('Granja avícola',        '7 1234567'),
  ('Distribuidora Sur',     '2 2334455'),
  ('Molino harinero',       '2 2901122');

-- "Mercado mayorista" entra con teléfono NULL. Es un dato que no se tiene, y
-- así queda dicho. Es preferible a inventar un teléfono.

INSERT INTO productos (nombre, categoria_id, proveedor_id, precio, unidad, stock) VALUES
  ('Pan del día',          1, NULL,   0.50, 'unidad', 120),
  ('Marraqueta',           1, NULL,   0.50, 'unidad', 200),
  ('Pan integral',         1, NULL,   1.50, 'unidad',  40),
  ('Pan de molde',         1, NULL,  12.00, 'unidad',   0),
  ('Empanada de queso',    2, NULL,   3.50, 'unidad',  30),
  ('Cuñapé',               2, NULL,   2.00, 'unidad',   0),
  ('Alfajor',              3, NULL,   4.00, 'unidad',  50),
  ('Rosquete',             3, NULL,   1.00, 'unidad',  60),
  ('Torta de chocolate',   3, NULL,  45.00, 'unidad',   2),
  ('Torta de cumpleaños',  4, NULL, 120.00, 'unidad',   1),
  ('Tres leches',          4, NULL,  60.00, 'unidad',   3),
  ('Selva negra',          4, NULL,  90.00, 'unidad',   2),
  ('Leche',                6,    1,   6.00, 'litro',   25),
  ('Yogurt',               6,    1,   9.50, 'litro',   18),
  ('Queso fresco',         6,    1,  35.00, 'kg',      12),
  ('Mantequilla',          6,    1,  14.00, 'unidad',  20);

-- 'Pan de molde' y 'Cuñapé' entran con stock 0. En el JSON además decían
-- `disponible: false`; aquí esa columna no existe y no hace falta.

-- ── La consulta que devuelve lo mismo que el JSON ──────────────────────────
-- Vale la pena correrla hoy: demuestra que no se perdió nada al normalizar.
-- Los datos siguen siendo los mismos; lo que cambió es dónde vive cada uno.

SELECT
  p.id,
  p.nombre,
  c.nombre AS categoria,
  p.precio,
  p.unidad,
  p.stock,
  (p.stock > 0) AS disponible,      -- calculado, no guardado
  v.nombre AS proveedor
FROM productos p
JOIN categorias  c ON c.id = p.categoria_id
LEFT JOIN proveedores v ON v.id = p.proveedor_id
ORDER BY p.id;

-- ¿Por qué `JOIN` para categoría Y `LEFT JOIN` para proveedor?
-- JOIN devuelve solo las filas que tienen pareja. LEFT JOIN devuelve todas
-- las de la izquierda, con NULL donde no hay pareja.
--
-- `categoria_id` es NOT NULL, así que ahí los dos dan lo mismo.
-- `proveedor_id` acepta NULL, y ahí está la diferencia: con un JOIN normal,
-- un producto sin proveedor desaparece del listado. Sin error, sin aviso:
-- simplemente no está.
--
-- En esta panadería se nota enseguida: de los 16 productos, 12 se hornean en
-- casa y no tienen proveedor. Con JOIN el catálogo muestra 4 productos; con
-- LEFT JOIN, los 16. Nadie ve un error: ve un catálogo al que le faltan cosas.

-- ── Pedidos ────────────────────────────────────────────────────────────────
-- Hasta aquí, el catálogo: qué vende la panadería. Esta tabla es el problema
-- del proyecto: quién encargó qué y para cuándo. Es el cuaderno del mostrador,
-- convertido en tabla.

CREATE TABLE pedidos (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  cliente       VARCHAR(100) NOT NULL,
  producto_id   INT          NOT NULL,
  cantidad      INT          NOT NULL,
  fecha_entrega DATE         NOT NULL,
  entregado     BOOLEAN      NOT NULL DEFAULT FALSE,
  creado        TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- Dos decisiones de esta tabla, y también hay que poder defenderlas:
--
-- 1. `cliente` es texto, no una tabla aparte.
--    Parece contradecir lo de hoy: si alguien encarga tres veces, su nombre
--    queda escrito tres veces. Pero en una panadería de barrio el cliente de
--    un encargo no tiene cuenta ni datos que mantener: es un nombre en el
--    cuaderno. Se normaliza cuando hace falta: si un día hay que
--    guardar su teléfono, se crea la tabla `clientes`.
--
-- 2. `entregado` sí se guarda, aunque `disponible` no.
--    `disponible` se calcula desde `stock`. Que un pedido se entregó no se
--    calcula desde nada: pasó en el mostrador, y alguien tiene que marcarlo.

INSERT INTO pedidos (cliente, producto_id, cantidad, fecha_entrega) VALUES
  ('María López',    10,  1, CURDATE()),
  ('Juan Pérez',      2, 50, CURDATE()),
  ('Ana García',     11,  1, CURDATE() + INTERVAL 1 DAY),
  ('Luis Torres',     5, 12, CURDATE() + INTERVAL 2 DAY);

-- CURDATE() y no una fecha escrita a mano: así "los pedidos de hoy" existen
-- el día que se corre el script, y no solo el día en que se escribió.

-- ── Usuarios ───────────────────────────────────────────────────────────────
-- Desde el Día 13 el sistema tiene una parte privada: el panel de la dueña.
-- Aquí se guarda quién puede entrar. La contraseña NO se guarda: se guarda
-- su hash, un resumen del que no se puede volver a la contraseña.

CREATE TABLE usuarios (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  usuario    VARCHAR(40)  NOT NULL UNIQUE,
  nombre     VARCHAR(100) NOT NULL,
  clave_hash VARCHAR(255) NOT NULL
);

-- VARCHAR(255) aunque el hash de hoy mide 60: password_hash() puede pasar a
-- un método más fuerte y más largo en una versión futura de PHP.

-- La dueña, con una contraseña DE EJEMPLO, para probar en clase:
--     usuario: duena      contraseña: pan-del-barrio
-- Al instalar el sistema para el cliente se cambia por una nueva, y la nueva
-- no se escribe en ningún archivo del repositorio. El hash se generó con:
--     php -r "echo password_hash('pan-del-barrio', PASSWORD_DEFAULT);"
--
-- Para cambiarla, se genera el hash de la nueva con esa misma línea (con la
-- contraseña nueva en lugar de pan-del-barrio) y se guarda, por ejemplo en la
-- pestaña SQL de phpMyAdmin:
--     UPDATE usuarios SET clave_hash = 'EL-HASH-QUE-SALIÓ' WHERE usuario = 'duena';

INSERT INTO usuarios (usuario, nombre, clave_hash) VALUES
  ('duena', 'Elena Rivas', '$2y$12$xL0k5ulKs5.50EQ5.5LzRuJQyp5m4EvaGiMG17IooKGJmQvvod/5C');

