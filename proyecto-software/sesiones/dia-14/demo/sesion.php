<?php
/* ═══════════════════════════════════════════════════════════════════════════
   La sesión - proyecto de ejemplo

   HTTP no recuerda nada: cada petición llega sola, sin saber quién hizo la
   anterior. Para que el servidor sepa que quien pide panel.php ya escribió
   su contraseña hace un momento, existe la sesión.

   Cómo funciona, en tres pasos:
     1. session_start() le da al navegador un número largo al azar, en una
        cookie (PHPSESSID).
     2. El servidor guarda, del lado suyo, lo que corresponde a ese número:
        $_SESSION['usuario_id'], por ejemplo.
     3. En cada petición siguiente el navegador manda la cookie solo, y PHP
        recupera el $_SESSION de ese número.

   La contraseña se pide una vez; después viaja solo el número.
   ═══════════════════════════════════════════════════════════════════════════ */

session_set_cookie_params([
    'httponly' => true,     // JavaScript no puede leer la cookie
    'samesite' => 'Lax',    // otra página no puede usarla para enviar formularios
]);
session_start();

/* httponly: si alguna vez se cuela un <script> en la página (un nombre de
   cliente mal mostrado, por ejemplo), ese script no puede robar la cookie de
   la sesión. Es una segunda barrera, no la primera: la primera sigue siendo
   textContent. */

/* ── Exigir que haya sesión ─────────────────────────────────────────────────
   Se llama al principio de todo lo que es de la dueña. Si no hay sesión,
   corta ahí: responde 401 y no sigue. */

function exigir_login(): void
{
    if (!isset($_SESSION['usuario_id'])) {
        http_response_code(401);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['error' => 'Hay que iniciar sesión'], JSON_UNESCAPED_UNICODE);
        exit;
    }
}

/* 401 quiere decir "no sé quién eres": falta iniciar sesión. Es distinto de
   403, "sé quién eres y esto no te corresponde", que aparecería si hubiera
   usuarios con permisos distintos. Con una sola dueña, alcanza el 401. */
