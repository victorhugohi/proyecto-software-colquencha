<?php
/* ═══════════════════════════════════════════════════════════════════════════
   ENDPOINT DE PEDIDOS - proyecto de ejemplo

   productos.php LEE el catálogo. Este archivo ESCRIBE: registra un pedido, lo
   lista y lo marca como entregado. Es el problema del proyecto - el cuaderno
   del mostrador - y el lugar donde se cumple lo que se dijo en el Día 20 del
   módulo pasado: LA VALIDACIÓN DE VERDAD ES LA DEL SERVIDOR.

   Un solo archivo, cinco usos:

       GET  pedidos.php                          pendientes de hoy
       GET  pedidos.php?fecha=2026-11-25         pendientes de ese día
       GET  pedidos.php?cliente=rosa             buscar por cliente
       POST pedidos.php                          registrar un pedido (JSON)
       POST pedidos.php?accion=entregar&id=3     marcarlo como entregado
   ═══════════════════════════════════════════════════════════════════════════ */

require 'conexion.php';

header('Content-Type: application/json; charset=utf-8');

/* ── RESPONDER Y TERMINAR ───────────────────────────────────────────────────
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

/* El mismo array de tipos de productos.php, por la misma razón: MySQL lo
   devuelve todo como texto, y en JavaScript "1" + "1" da "11". */

$metodo = $_SERVER['REQUEST_METHOD'];

/* ── GET: LISTAR ────────────────────────────────────────────────────────────── */

if ($metodo === 'GET') {
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

/* ── POST ?accion=entregar: MARCAR COMO ENTREGADO ───────────────────────────── */

if ($metodo === 'POST' && ($_GET['accion'] ?? '') === 'entregar') {
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
   pendiente y sale de la lista del día. */

/* ── POST: REGISTRAR UN PEDIDO ──────────────────────────────────────────────── */

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
    $cantidad = filter_var($datos['cantidad'] ?? '', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);

    /* is_string() antes de trim(): si alguien manda "cliente": ["a", "b"],
       trim() de un array imprime un aviso de PHP ANTES del JSON y lo rompe.
       Es la misma trampa del `?? null` de productos.php. */

    if ($cliente === '') {
        responder(400, ['error' => 'Falta el nombre del cliente', 'campo' => 'cliente']);
    }
    if ($producto === false) {
        responder(400, ['error' => 'Falta elegir el producto', 'campo' => 'producto_id']);
    }
    if ($cantidad === false) {
        responder(400, ['error' => 'La cantidad tiene que ser un número entero, al menos 1', 'campo' => 'cantidad']);
    }
    if (!fecha_valida($fecha)) {
        responder(400, ['error' => 'Falta la fecha de entrega', 'campo' => 'fecha_entrega']);
    }

    /* Hasta aquí: hay cliente, el producto y la cantidad son enteros desde 1, y
       la fecha tiene forma y existe en el calendario. ¿Falta revisar algo? Esa
       es la pregunta que hace la matriz de pruebas del Día 14. */

    $aviso  = null;
    $letras = preg_split('//u', $cliente, -1, PREG_SPLIT_NO_EMPTY);
    if (count($letras) > 100) {
        $cliente = implode('', array_slice($letras, 0, 100));
        $aviso   = 'El nombre era muy largo y se guardó cortado a 100 letras.';
    }

    /* Se cuentan LETRAS, no bytes. strlen("Cuñapé") da 8 porque la ñ y la é
       ocupan dos bytes cada una en UTF-8. preg_split con /u parte por letra. */

    $consulta = $pdo->prepare('
        INSERT INTO pedidos (cliente, producto_id, cantidad, fecha_entrega)
        VALUES (:cliente, :producto, :cantidad, :fecha)
    ');
    $consulta->bindValue(':cliente',  $cliente);
    $consulta->bindValue(':producto', $producto, PDO::PARAM_INT);
    $consulta->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);
    $consulta->bindValue(':fecha',    $fecha);

    /* El mismo prepare + bindValue del Día 12, ahora para ESCRIBIR. Un cliente
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

