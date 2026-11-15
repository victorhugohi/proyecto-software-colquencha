# Retos del Día 12 - PHP y el endpoint

---

## Nivel base - ¿Seguro o inyectable?

Para cada línea, di si es **segura** o **inyectable**, y **por qué**:

1. `$sql = "SELECT * FROM productos WHERE id = $id";`
2. `$sql = "SELECT * FROM productos WHERE id = :id"; $c->bindValue(':id', $id);`
3. `$sql = "SELECT * FROM productos WHERE nombre = '$nombre'";`
4. `$sql = "SELECT * FROM productos ORDER BY $columna";` con `$columna` de `$_GET`
5. `$c = $pdo->prepare("SELECT * FROM productos WHERE stock > :min"); $c->bindValue(':min', $_GET['min']);`

*(El 4 tiene una trampa: `bindValue` no sirve para nombres de columna. Piensa por qué.)*

---

## Nivel medio - Tu endpoint

- [ ] `conexion.php` con tus datos y `charset=utf8mb4` en el DSN
- [ ] Las tres opciones de PDO
- [ ] Un endpoint que devuelva tus datos en JSON
- [ ] Un parámetro opcional, con `bindValue`
- [ ] El array de tipos numéricos
- [ ] `header('Content-Type: application/json; charset=utf-8')`

La prueba:

- [ ] Ábrelo en el navegador. ¿Se ve JSON formateado, con los acentos bien?

---

## Nivel extra - Respeta el contrato

- [ ] Abre tu página del módulo pasado
- [ ] Cambia solo el `fetch`, para que apunte a tu endpoint
- [ ] **¿Funciona sin tocar nada más del JavaScript?**

Si algo se rompe, casi siempre es una de dos:

- la **forma** del JSON no coincide (nombres de campos distintos)
- los **tipos** no coinciden (precio como texto, no número)

Arréglalo en el **PHP**, no en el JavaScript. El frontend ya estaba bien; el que tiene que
cumplir el contrato es el backend nuevo.

Y responde:

> Si mañana cambiaras la base de datos entera (otro motor, otra estructura interna) pero el
> endpoint siguiera devolviendo la misma forma de JSON, **¿tu página se enteraría?**

Esa respuesta es lo que hace valioso separar frontend de backend.
