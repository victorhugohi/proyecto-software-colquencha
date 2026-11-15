<?php
/* ═══════════════════════════════════════════════════════════════════════════
   Endpoint: devuelve los productos en JSON - proyecto de ejemplo

   Este archivo cierra el círculo del módulo anterior.

   El módulo pasado la página hacía:

       fetch('datos.json')

   y ese archivo era fijo: para cambiar un precio había que editarlo a mano.
   Desde mañana va a hacer:

       fetch('productos.php')

   y cada producto va a llegar con los mismos campos, pero salido de la base.
   El render no cambia: solo de dónde sale la lista (ya no datos.productos).

   Ese es todo el punto: el frontend no sabe ni le importa de dónde vienen los
   datos, mientras la forma sea la misma. A eso se le llama un contrato.
   ═══════════════════════════════════════════════════════════════════════════ */

require 'conexion.php';

header('Content-Type: application/json; charset=utf-8');

/* El Content-Type es obligatorio y se olvida siempre.
   Sin esta línea el navegador recibe el JSON como si fuera HTML. `fetch` lo
   trae igual, pero al abrir el archivo directo en el navegador se ve un
   texto plano y cuesta darse cuenta de que está bien.
   Con la línea, Chrome lo muestra formateado y plegable. */

/* ── El parámetro opcional ──────────────────────────────────────────────────
   productos.php               devuelve todos
   productos.php?categoria=3   devuelve solo los de esa categoría           */

$categoria = $_GET['categoria'] ?? null;

/* ?? null  es el operador "si no existe, usa esto".
   Sin él, pedir productos.php sin parámetros genera un aviso de PHP por
   índice indefinido, y ese aviso se imprime antes del JSON y lo rompe.
   Es una de las formas más comunes de romper un endpoint sin darse cuenta. */

$sql = "
    SELECT
      p.id,
      p.nombre,
      c.nombre AS categoria,
      p.precio,
      p.unidad,
      p.stock,
      (p.stock > 0) AS disponible,
      v.nombre AS proveedor
    FROM productos p
    JOIN categorias  c ON c.id = p.categoria_id
    LEFT JOIN proveedores v ON v.id = p.proveedor_id
";

/* Es la misma consulta del Día 11, con el mismo LEFT JOIN y por la misma
   razón: un producto sin proveedor no debe desaparecer del listado. */

if ($categoria !== null) {
    $sql .= " WHERE p.categoria_id = :categoria";
}

$sql .= " ORDER BY p.id";

$consulta = $pdo->prepare($sql);

if ($categoria !== null) {
    $consulta->bindValue(':categoria', $categoria, PDO::PARAM_INT);
}

$consulta->execute();
$filas = $consulta->fetchAll();

/* ═══ Esto es lo importante del día ═══

   Fíjate en lo que no se hizo. No se escribió esto:

       $sql = "SELECT ... WHERE categoria_id = $categoria";   // ⚠️ nunca

   Esa línea funciona perfectamente mientras nadie la ataque. El problema es que
   pega el texto que mandó el visitante dentro de la consulta, y entonces el
   visitante puede escribir consulta en vez de datos.

   Con `prepare` y `bindValue`, la consulta viaja por un lado y el dato por
   otro. El motor ya sabe cuál es la forma de la consulta antes de ver el
   dato, así que lo que llegue se trata como valor y nunca como instrucción.
   Eso incluye un valor como la palabra DROP.

   No es una precaución exagerada, porque es la vulnerabilidad más explotada de la
   web desde hace veinte años, y se evita escribiendo dos líneas en vez de
   una.                                                                      */

/* ── Arreglar los tipos ────────────────────────────────────────────────────
   MySQL devuelve todo como texto. Sin esto, el JSON sale así:

       "precio": "0.50",  "stock": "120",  "disponible": "1"

   con comillas. Y en JavaScript, "0.50" + "1.50" da "0.501.50", porque suma
   textos. Es un bug que aparece lejos de aquí y cuesta encontrar.            */

foreach ($filas as &$fila) {
    $fila['precio']     = (float) $fila['precio'];
    $fila['stock']      = (int)   $fila['stock'];
    $fila['disponible'] = (bool)  $fila['disponible'];
}
unset($fila);

/* El `&` de `&$fila` hace que se modifique el array original y no una
   copia. Sin él, este bloque no cambia nada y todo sigue como texto.

   Y el `unset($fila)` del final no es un adorno: después de un foreach por
   referencia, la variable sigue apuntando al último elemento, y el próximo
   foreach que use ese nombre lo sobrescribe. Es un error clásico de PHP y
   por eso se corta aquí. */

echo json_encode($filas, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

/* JSON_UNESCAPED_UNICODE
     Sin esto, "Panadería" se escribe "Panader\u00eda". Es válido y funciona,
     pero es ilegible al inspeccionar.

   JSON_PRETTY_PRINT
     Con saltos de línea y sangría. Ocupa más y es para aprender: en
     producción se saca. */

