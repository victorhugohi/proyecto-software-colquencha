<?php
/* ═══════════════════════════════════════════════════════════════════════════
   Endpoint de pedidos - proyecto de ejemplo

   productos.php lee el catálogo. Este archivo escribe: registra un pedido, lo
   lista y lo marca como entregado. Es el problema del proyecto - el cuaderno
   del mostrador - y el lugar donde se cumple lo que se dijo en el Día 20 del
   módulo pasado: la validación de verdad es la del servidor.

   Un solo archivo, seis usos:

       GET  pedidos.php                          pendientes de hoy           (con sesión)
       GET  pedidos.php?fecha=2026-11-25         pendientes de ese día       (con sesión)
       GET  pedidos.php?cliente=rosa             buscar por cliente          (con sesión)
       POST pedidos.php                          registrar un pedido (JSON)  (público)
       POST pedidos.php?accion=entregar&id=3     marcarlo como entregado     (con sesión)
       POST pedidos.php?accion=deshacer&id=3     volver a pendiente          (con sesión)
   ═══════════════════════════════════════════════════════════════════════════ */

require 'conexion.php';
require 'sesion.php';
header('Content-Type: application/json; charset=utf-8');

/* ── Responder y terminar ───────────────────────────────────────────────────
   Todas las salidas pasan por aquí. Así ninguna se olvida del código HTTP, y
   el frontend puede confiar en `respuesta.ok` igual que con productos.php.
   Un 400 dice "mandaste algo mal"; un 500, "falló algo de este lado". */

function responder(int $codigo, array $datos): void
{
    http_response_code($codigo);
    echo json_encode($datos, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

function fecha_valida(string $texto): bool
{
    if (!preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $texto, $partes)) {
        return false;
    }
    return checkdate((int) $partes[2], (int) $partes[3], (int) $partes[1]);
}

/* checkdate() y no solo la expresión regular: "2026-02-31" tiene la forma
   correcta y no existe. La forma se revisa con el patrón; la fecha, con PHP. */

function tipos(array $filas): array
{
    foreach ($filas as &$fila) {
        $fila['id']        = (int)  $fila['id'];
        $fila['cantidad']  = (int)  $fila['cantidad'];
        $fila['entregado'] = (bool) $fila['entregado'];
    }
    unset($fila);
    return $filas;
}

/* El mismo bloque de tipos de productos.php. Con la conexión de
   conexion.php los enteros ya llegan como número, pero `entregado` llega como
   0 o 1, no como true o false. Y con otra configuración del servidor (con
   EMULATE_PREPARES en true, por ejemplo) todo llegaría como texto, y en
   JavaScript "1" + "1" da "11". Convertir cada campo deja el JSON igual en
   cualquier servidor. */

$metodo = $_SERVER['REQUEST_METHOD'];

/* ── GET: listar ────────────────────────────────────────────────────────────── */

if ($metodo === 'GET') {
    exigir_login();
    $base = "
        SELECT pe.id, pe.cliente, pr.nombre AS producto,
               pe.cantidad, pe.fecha_entrega, pe.entregado
        FROM pedidos pe
        JOIN productos pr ON pr.id = pe.producto_id
    ";

    /* JOIN y no LEFT JOIN: `producto_id` es NOT NULL y tiene FOREIGN KEY, así
       que todo pedido tiene producto. Es la pregunta del Día 11: ¿puede faltar
       la pareja? En productos y proveedores, sí. Aquí, no. */

    if (isset($_GET['cliente'])) {
        $consulta = $pdo->prepare($base . "
            WHERE pe.cliente LIKE :cliente
            ORDER BY pe.fecha_entrega, pe.id
        ");
        $consulta->bindValue(':cliente', '%' . $_GET['cliente'] . '%');
    } else {
        $fecha = $_GET['fecha'] ?? null;
        if ($fecha !== null && !fecha_valida($fecha)) {
            responder(400, ['error' => 'La fecha tiene que tener la forma AAAA-MM-DD']);
        }
        $consulta = $pdo->prepare($base . "
            WHERE pe.fecha_entrega = COALESCE(:fecha, CURDATE())
              AND pe.entregado = FALSE
            ORDER BY pe.id
        ");
        $consulta->bindValue(':fecha', $fecha, $fecha === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
    }

    /* CURDATE() y no date() de PHP: "hoy" lo decide la base, igual que en los
       pedidos de ejemplo del esquema. Si PHP y MySQL tuvieran husos horarios
       distintos, "los pedidos de hoy" no coincidirían nunca. */

    $consulta->execute();
    responder(200, tipos($consulta->fetchAll()));
}

/* ── POST ?accion=entregar: marcar como entregado ───────────────────────────── */

if ($metodo === 'POST' && ($_GET['accion'] ?? '') === 'entregar') {
    exigir_login();
    $id = filter_var($_GET['id'] ?? '', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    if ($id === false) {
        responder(400, ['error' => 'Falta el número de pedido']);
    }

    $consulta = $pdo->prepare('UPDATE pedidos SET entregado = TRUE WHERE id = :id AND entregado = FALSE');
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);
    $consulta->execute();

    if ($consulta->rowCount() === 0) {
        responder(404, ['error' => 'Ese pedido no existe o ya estaba entregado']);
    }
    responder(200, ['ok' => true]);
}

/* Marcar como entregado es un cambio de estado: el pedido deja de ser
   pendiente y sale de la lista del día.

   Desde el Día 13, listar, entregar y deshacer empiezan con exigir_login() (sesion.php):
   la lista tiene los nombres de los clientes, y solo la dueña puede marcar
   un pedido como entregado. Registrar un pedido sigue siendo público: es el
   formulario que usa cualquier cliente. */

/* ── POST ?accion=deshacer: volver a pendiente ──────────────────────────────
   Si la dueña tocó "Entregado" por error, busca el pedido por el nombre del
   cliente y deshace la marca. Es la historia de usuario "marqué un pedido por
   error" del Día 10. */

if ($metodo === 'POST' && ($_GET['accion'] ?? '') === 'deshacer') {
    exigir_login();
    $id = filter_var($_GET['id'] ?? '', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    if ($id === false) {
        responder(400, ['error' => 'Falta el número de pedido']);
    }

    $consulta = $pdo->prepare('UPDATE pedidos SET entregado = FALSE WHERE id = :id AND entregado = TRUE');
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);
    $consulta->execute();

    if ($consulta->rowCount() === 0) {
        responder(404, ['error' => 'Ese pedido no existe o no estaba entregado']);
    }
    responder(200, ['ok' => true]);
}

/* ── POST: registrar un pedido ──────────────────────────────────────────────── */

if ($metodo === 'POST') {
    $datos = json_decode(file_get_contents('php://input'), true);
    if (!is_array($datos)) {
        responder(400, ['error' => 'Los datos no llegaron como JSON']);
    }

    /* php://input y no $_POST: el frontend manda JSON, y $_POST solo entiende
       lo que manda un formulario HTML clásico. */

    $cliente  = is_string($datos['cliente'] ?? null) ? trim($datos['cliente']) : '';
    $fecha    = is_string($datos['fecha_entrega'] ?? null) ? $datos['fecha_entrega'] : '';
    $producto = filter_var($datos['producto_id'] ?? '', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    $cantidad = filter_var($datos['cantidad'] ?? '', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 1000]]);

    /* is_string() antes de trim(): si alguien manda "cliente": ["a", "b"],
       trim() de un array imprime un aviso de PHP antes del JSON y lo rompe.
       Es la misma trampa del `?? null` de productos.php. */

    if ($cliente === '') {
        responder(400, ['error' => 'Falta el nombre del cliente', 'campo' => 'cliente']);
    }
    if ($producto === false) {
        responder(400, ['error' => 'Falta elegir el producto', 'campo' => 'producto_id']);
    }
    if ($cantidad === false) {
        responder(400, ['error' => 'La cantidad tiene que ser un número entero, de 1 a 1000', 'campo' => 'cantidad']);
    }
    if (!fecha_valida($fecha)) {
        responder(400, ['error' => 'Falta la fecha de entrega', 'campo' => 'fecha_entrega']);
    }
    $hoy = $pdo->query('SELECT CURDATE()')->fetchColumn();
    if ($fecha < $hoy) {
        responder(400, ['error' => 'La fecha de entrega no puede ser anterior a hoy', 'campo' => 'fecha_entrega']);
    }

    /* Hasta aquí: hay cliente, el producto es un entero desde 1, la cantidad va
       de 1 a 1000, y la fecha tiene forma, existe en el calendario y no es
       anterior a hoy. Cada una de estas reglas es una fila de la matriz de
       pruebas del Día 14.

       max_range 1000: la columna cantidad es INT, y un número enorme no cabe.
       Sin el tope, el motor lo rechazaría y la respuesta sería un 500 ("no se
       pudo guardar") en vez de un 400 que dice qué corregir. Y ningún encargo
       de una panadería de barrio pasa de mil unidades.

       "Hoy" lo decide la base con CURDATE(), igual que en el listado. Dos
       fechas AAAA-MM-DD se comparan bien como texto: "2026-11-24" < "2026-11-25". */

    $aviso  = null;
    $letras = preg_split('//u', $cliente, -1, PREG_SPLIT_NO_EMPTY);
    if (count($letras) > 100) {
        $cliente = implode('', array_slice($letras, 0, 100));
        $aviso   = 'El nombre era muy largo y se guardó cortado a 100 letras.';
    }

    /* Se cuentan letras, no bytes. strlen("Cuñapé") da 8 porque la ñ y la é
       ocupan dos bytes cada una en UTF-8. preg_split con /u parte por letra. */

    $consulta = $pdo->prepare('
        INSERT INTO pedidos (cliente, producto_id, cantidad, fecha_entrega)
        VALUES (:cliente, :producto, :cantidad, :fecha)
    ');
    $consulta->bindValue(':cliente',  $cliente);
    $consulta->bindValue(':producto', $producto, PDO::PARAM_INT);
    $consulta->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);
    $consulta->bindValue(':fecha',    $fecha);

    /* El mismo prepare + bindValue del Día 12, ahora para escribir. Un cliente
       llamado   Rosa'); DROP TABLE pedidos; --   se guarda como texto. */

    try {
        $consulta->execute();
    } catch (PDOException $e) {
        if ((int) ($e->errorInfo[1] ?? 0) === 1452) {
            responder(400, ['error' => 'Ese producto no existe', 'campo' => 'producto_id']);
        }
        error_log($e->getMessage());
        responder(500, ['error' => 'No se pudo guardar el pedido']);
    }

    /* 1452 es el error de la FOREIGN KEY del Día 11. El motor dice "ese
       producto no existe"; aquí solo se traduce a algo que entiende una
       persona. El resto de los errores va al log, nunca a la pantalla. */

    $respuesta = ['ok' => true, 'id' => (int) $pdo->lastInsertId()];
    if ($aviso !== null) {
        $respuesta['aviso'] = $aviso;
    }
    responder(201, $respuesta);
}

responder(405, ['error' => 'Método no permitido']);

