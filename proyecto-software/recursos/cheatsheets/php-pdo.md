# PHP y PDO - lo que se usa en el módulo

Lo mínimo para que el backend funcione, desde el Día 12. **Imprimir y tener al lado del
teclado.** Todo lo de aquí está en la demo: `conexion.php` y `productos.php`.

> **Solo esto.** PHP es un lenguaje enorme y este módulo usa una esquina muy pequeña: leer de
> la base y devolver JSON. No hace falta más para aprobar ni para el proyecto.

## Lo básico de la sintaxis

```php
<?php                        // abre PHP. No se cierra al final del archivo.

$nombre = "Panadería";       // variable: siempre empieza con $
$precio = 8.50;
$stock  = 45;

echo $nombre;                // imprime
echo "Precio: $precio";      // las comillas DOBLES interpolan variables
echo 'Precio: $precio';      // las SIMPLES no: imprime el texto tal cual

$total = $precio * $stock;
```

**Los tipos que importan:** `string` (texto), `int` (entero), `float` (decimal),
`bool` (verdadero/falso), `array` (una lista de valores), `null` (nada).

```php
$fila['nombre']              // array asociativo: se lee por clave
$_GET['categoria']           // lo que llega por la URL: ?categoria=3
$_POST['nombre']             // lo que llega por un formulario
```

## El operador que evita el aviso

```php
$categoria = $_GET['categoria'] ?? null;
```

`??` significa **"si no existe, usa esto"**. Sin él, pedir `productos.php` sin parámetros
genera un aviso de PHP que **se imprime antes del JSON y lo rompe**. Es de las formas más
comunes de romper un endpoint sin darse cuenta.

## Conectarse a la base: siempre PDO

```php
$dsn = "mysql:host=localhost;dbname=panaderia;charset=utf8mb4";

$opciones = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $usuario, $clave, $opciones);
```

Las tres opciones, y las tres importan:

| Opción | Sin ella | Con ella |
|---|---|---|
| `ERRMODE_EXCEPTION` | un error de SQL no detiene nada: PDO devuelve `false` y sigue. Página en blanco sin pista | el error se ve |
| `FETCH_ASSOC` | cada dato viene **dos veces**, por nombre y por número: el JSON sale con el doble de campos | `$fila['nombre']` y nada más |
| `EMULATE_PREPARES => false` | PHP *imita* los prepared statements | los prepara MySQL de verdad, y la protección es real |

**`charset=utf8mb4` va en el DSN, no solo en la base.** Son dos configuraciones distintas:
la base puede guardar bien los acentos y la conexión traerlos mal. Si "Panadería" llega como
`PanaderÃ­a`, casi siempre falta esto.

## Consultar sin abrir la puerta

```php
$sql = "SELECT * FROM productos WHERE categoria_id = :categoria";

$consulta = $pdo->prepare($sql);
$consulta->bindValue(':categoria', $categoria, PDO::PARAM_INT);
$consulta->execute();

$filas = $consulta->fetchAll();     // todas las filas
$una   = $consulta->fetch();        // una sola
$n     = $consulta->rowCount();     // cuántas afectó (INSERT/UPDATE/DELETE)
```

⚠️ **Lo que nunca se escribe:**

```php
$sql = "SELECT * FROM productos WHERE categoria_id = $categoria";   // ⚠️ NUNCA
```

Esa línea pega el texto que mandó el visitante **dentro** de la consulta, así que el
visitante puede escribir consulta en vez de datos. Con `prepare` y `bindValue` la consulta
viaja por un lado y el dato por otro: el motor ya sabe la forma de la consulta antes de ver
el dato, y lo que llegue se trata como valor y nunca como instrucción. Aunque sea la palabra
`DROP`.

Es la vulnerabilidad más explotada de la web desde hace veinte años, y se evita escribiendo
dos líneas en vez de una.

**Los tipos de `bindValue`:** `PDO::PARAM_INT` · `PDO::PARAM_STR` · `PDO::PARAM_BOOL`.

## Devolver JSON

```php
header('Content-Type: application/json; charset=utf-8');

echo json_encode($filas, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
```

El `header` **es obligatorio y se olvida siempre**: sin él el navegador recibe el JSON como
si fuera HTML.

| Flag | Qué hace |
|---|---|
| `JSON_UNESCAPED_UNICODE` | deja `Panadería` en vez de `Panadería` |
| `JSON_PRETTY_PRINT` | lo indenta, para poder leerlo al depurar |

## Arreglar los tipos antes de mandar

**MySQL devuelve todo como texto.** Sin esto el JSON sale con comillas en los números:

```json
"precio": "0.50",  "stock": "120",  "disponible": "1"
```

Y en JavaScript `"0.50" + "1.50"` da `"0.501.50"`, porque suma textos. El bug aparece lejos
de aquí y cuesta encontrarlo.

```php
foreach ($filas as &$fila) {
    $fila['precio']     = (float) $fila['precio'];
    $fila['stock']      = (int)   $fila['stock'];
    $fila['disponible'] = (bool)  $fila['disponible'];
}
unset($fila);
```

El `&` hace que se modifique el array original y no una copia: **sin él este bloque no
cambia nada.** Y el `unset($fila)` del final no es adorno: después de un `foreach` por
referencia la variable sigue apuntando al último elemento, y el próximo `foreach` que use ese
nombre lo sobrescribe. Es un error clásico de PHP.

## Manejar el error sin regalar información

```php
try {
    $pdo = new PDO($dsn, $usuario, $clave, $opciones);
} catch (PDOException $e) {
    http_response_code(500);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['error' => 'No se pudo conectar a la base de datos']);
    exit;
}
```

**Por qué el `catch` no muestra `$e->getMessage()`:** ese mensaje trae el nombre de la base,
el usuario y a veces la ruta del servidor. Mostrárselo a quien visita la página es regalarle
información para atacarla. Al usuario se le dice que algo falló; el detalle va al log.

## Los códigos de respuesta que se usan

| Código | Cuándo |
|---|---|
| 200 | salió bien (es el que manda por defecto) |
| 400 | el visitante mandó algo mal formado |
| 404 | lo que pidió no existe |
| 500 | falló algo del lado del servidor |

## Cuando algo no sale

| Síntoma | Casi siempre es |
|---|---|
| página **en blanco**, sin error | falta `ERRMODE_EXCEPTION`: el error existe y nadie lo muestra |
| los acentos salen como `Ã­` | falta `charset=utf8mb4` en el DSN |
| el JSON tiene los campos **repetidos** | falta `FETCH_ASSOC` |
| los números vienen entre comillas | falta el bloque de conversión de tipos |
| `fetch` dice que no es JSON válido | un aviso de PHP se imprimió antes. Mira el archivo directo en el navegador |
| `undefined index` | falta el `?? null` |
| el navegador descarga el archivo en vez de mostrarlo | Apache no está interpretando PHP: no estás entrando por `http://localhost` |

> **Regla para depurar:** abre siempre el `.php` **directo en el navegador** antes de
> llamarlo con `fetch`. Si ahí se ve mal, el problema es de PHP y no de JavaScript.
