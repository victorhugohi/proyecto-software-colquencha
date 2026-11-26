<?php
/* ═══════════════════════════════════════════════════════════════════════════
   Plantilla de conexion.php - proyecto de ejemplo

   Este es el archivo que SÍ va al repositorio. conexion.php, con el usuario
   y la contraseña de verdad, va en el .gitignore y no se sube nunca.

   Para usarlo: cópialo con el nombre conexion.php y completa los datos de tu
   base. En XAMPP, en tu computadora, el usuario es root y la clave va vacía;
   en un servidor real, un usuario propio con su contraseña (Día 16).
   ═══════════════════════════════════════════════════════════════════════════ */

$host    = 'localhost';
$base    = 'panaderia';
$usuario = '';          // completa: el usuario de tu base
$clave   = '';          // completa: su contraseña

$dsn = "mysql:host=$host;dbname=$base;charset=utf8mb4";

$opciones = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $usuario, $clave, $opciones);
} catch (PDOException $e) {
    http_response_code(500);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['error' => 'No se pudo conectar a la base de datos']);
    exit;
}

/* Es el mismo código de conexion.php, sin los datos de acceso. Las
   explicaciones de cada línea están en conexion.php. */
