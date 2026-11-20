<?php
/* ═══════════════════════════════════════════════════════════════════════════
   Iniciar y cerrar sesión - proyecto de ejemplo

   El catálogo y el formulario de pedidos son públicos: cualquiera los usa.
   La lista de pedidos, con los nombres de los clientes, y el resumen del día
   son de la dueña. Este archivo decide quién es la dueña.

       GET  login.php                   ¿hay sesión? responde el nombre, o 401
       POST login.php                   entrar: {"usuario": ..., "clave": ...}
       POST login.php?accion=salir      cerrar la sesión
   ═══════════════════════════════════════════════════════════════════════════ */

require 'conexion.php';
require 'sesion.php';

header('Content-Type: application/json; charset=utf-8');

function responder(int $codigo, array $datos): void
{
    http_response_code($codigo);
    echo json_encode($datos, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

$metodo = $_SERVER['REQUEST_METHOD'];

/* ── GET: ¿hay sesión? ──────────────────────────────────────────────────────
   panel.js pregunta esto al abrir la página: si ya hay sesión, muestra el
   panel directamente, sin pedir la contraseña otra vez. */

if ($metodo === 'GET') {
    exigir_login();
    responder(200, ['nombre' => $_SESSION['nombre']]);
}

/* ── POST ?accion=salir: cerrar la sesión ───────────────────────────────── */

if ($metodo === 'POST' && ($_GET['accion'] ?? '') === 'salir') {
    $_SESSION = [];
    session_destroy();
    responder(200, ['ok' => true]);
}

/* ── POST: entrar ──────────────────────────────────────────────────────────── */

if ($metodo === 'POST') {
    $datos = json_decode(file_get_contents('php://input'), true);
    $usuario = is_string($datos['usuario'] ?? null) ? trim($datos['usuario']) : '';
    $clave   = is_string($datos['clave'] ?? null) ? $datos['clave'] : '';

    if ($usuario === '' || $clave === '') {
        responder(400, ['error' => 'Escribe el usuario y la contraseña']);
    }

    $consulta = $pdo->prepare('SELECT id, nombre, clave_hash FROM usuarios WHERE usuario = :usuario');
    $consulta->bindValue(':usuario', $usuario);
    $consulta->execute();
    $fila = $consulta->fetch();

    /* La contraseña no se compara con ==. La base no la tiene: tiene su hash.
       password_verify() calcula el hash de lo que se escribió y lo compara con
       el guardado. Si alguien se roba la tabla usuarios, se lleva hashes, no
       contraseñas. */

    if ($fila === false || !password_verify($clave, $fila['clave_hash'])) {
        responder(401, ['error' => 'Usuario o contraseña incorrectos']);
    }

    /* El mismo mensaje si el usuario no existe y si la contraseña está mal.
       Con mensajes distintos, quien prueba nombres sabría cuáles existen. */

    session_regenerate_id(true);
    $_SESSION['usuario_id'] = (int) $fila['id'];
    $_SESSION['nombre']     = $fila['nombre'];

    /* session_regenerate_id(): al entrar, el número de la sesión cambia. Si
       alguien conocía el número de antes, ese número ya no sirve. */

    responder(200, ['ok' => true, 'nombre' => $fila['nombre']]);
}

responder(405, ['error' => 'Método no permitido']);

