<?php
/* ═══════════════════════════════════════════════════════════════════════════
   CONEXIÓN A LA BASE DE DATOS - proyecto de ejemplo

   Este archivo hace UNA sola cosa: entregar una conexión lista para usar.
   Lo incluyen todos los demás y ninguno repite estos datos.

   POR QUÉ UN ARCHIVO APARTE: el día que cambie la contraseña, se cambia en un
   lugar. Con la conexión copiada en cada archivo, se cambia en todos y
   siempre queda uno sin cambiar.
   ═══════════════════════════════════════════════════════════════════════════ */

$host   = 'localhost';
$base   = 'panaderia';
$usuario = 'root';
$clave  = '';          // XAMPP viene sin contraseña para root

/* ⚠️ ESTO SIRVE PARA APRENDER Y NO PARA UN SERVIDOR REAL.
   En producción, root sin contraseña es una puerta abierta. Se crea un
   usuario con permisos mínimos y su propia contraseña, y este archivo NO se
   sube al repositorio: se sube un `conexion.ejemplo.php` con los campos
   vacíos, y cada quien completa el suyo.
   Es el mismo criterio del Día 8: decir de dónde salen las cosas. */

$dsn = "mysql:host=$host;dbname=$base;charset=utf8mb4";

/* charset=utf8mb4 EN EL DSN, no solo en la base de datos.
   La base guarda bien los acentos y la conexión los puede traer mal: son dos
   configuraciones distintas. Si "Panadería" llega como "PanaderÃ­a", casi
   siempre falta esto. */

$opciones = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

/* LAS TRES OPCIONES, y las tres importan:

   ERRMODE_EXCEPTION
     Sin esto, un error de SQL NO detiene nada: PDO devuelve false y el
     programa sigue como si todo estuviera bien. El resultado es una página
     en blanco sin ninguna pista. Con esto, el error se ve.

   FETCH_ASSOC
     Trae cada fila como array asociativo: $fila['nombre'].
     Sin esto PDO devuelve cada dato DOS veces, por nombre y por número, y el
     JSON sale con el doble de campos.

   EMULATE_PREPARES => false
     Hace que los prepared statements los prepare MySQL de verdad, y no PHP
     imitándolas. Es lo que hace que la protección de mañana sea real. */

try {
    $pdo = new PDO($dsn, $usuario, $clave, $opciones);
} catch (PDOException $e) {
    http_response_code(500);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['error' => 'No se pudo conectar a la base de datos']);
    exit;
}

/* POR QUÉ EL catch NO MUESTRA $e->getMessage():
   ese mensaje trae el nombre de la base, el usuario y a veces la ruta del
   servidor. Mostrárselo a quien visita la página es regalarle información
   para atacarla.
   Al usuario se le dice que algo falló; el detalle va al log del servidor. */
