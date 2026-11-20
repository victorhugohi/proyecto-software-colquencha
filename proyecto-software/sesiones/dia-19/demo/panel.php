<?php
/* ═══════════════════════════════════════════════════════════════════════════
   Resumen del día - proyecto de ejemplo

   Lo primero que la dueña quiere saber al abrir la panadería: cuántos
   pedidos hay para hoy, cuánto suman y cuántos faltan entregar. Tres
   números. Solo para ella: sin sesión, 401.

       GET  panel.php     {"nombre": ..., "pedidos": 3, "total": 145.0, "pendientes": 2}
   ═══════════════════════════════════════════════════════════════════════════ */

require 'conexion.php';
require 'sesion.php';

header('Content-Type: application/json; charset=utf-8');

exigir_login();

/* Primera línea después de los require: si no hay sesión, el archivo termina
   aquí y la consulta de abajo nunca corre. */

$consulta = $pdo->query('
    SELECT COUNT(*)                                       AS pedidos,
           COALESCE(SUM(pe.cantidad * pr.precio), 0)      AS total,
           COALESCE(SUM(pe.entregado = FALSE), 0)         AS pendientes
    FROM pedidos pe
    JOIN productos pr ON pr.id = pe.producto_id
    WHERE pe.fecha_entrega = CURDATE()
');
$fila = $consulta->fetch();

/* query() y no prepare(): esta consulta no lleva ningún dato que venga del
   usuario. En cuanto lleve uno (una fecha elegida, por ejemplo), pasa a ser
   prepare() con su :parámetro, como en pedidos.php.

   COALESCE(..., 0): un día sin pedidos, SUM devuelve NULL, no 0. Sin el
   COALESCE el panel mostraría "null" en vez de "Bs 0.00".

   SUM(pe.entregado = FALSE): la comparación da 1 o 0 por cada pedido, y la
   suma cuenta los que no se entregaron. */

echo json_encode([
    'nombre'     => $_SESSION['nombre'],
    'pedidos'    => (int)   $fila['pedidos'],
    'total'      => (float) $fila['total'],
    'pendientes' => (int)   $fila['pendientes'],
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

/* Los mismos tipos del Día 12: sin (float), el total llegaría como "145.00"
   y el toFixed() de panel.js fallaría. */

