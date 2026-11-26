# Guía de estudio N.° 11: entorno y base de datos

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Día 11 · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Lee el texto, revisa el ejemplo y después diseña tu base de datos en un archivo
nuevo, `esquema.sql`. Puedes avanzar a tu ritmo: cuando termines, sigue con la guía del día
siguiente. El cuestionario del final sirve para comprobar que entendiste; respóndelo con tus
propias palabras.

Desde este día se vuelve al código. Necesitas XAMPP instalado (está en la carpeta de programas de
la memoria) y tu carpeta de Proyecto de Software con tu página del módulo pasado copiada adentro (con
su `datos.json`). Dónde va cada archivo y cómo se trabaja con XAMPP: hoja "Tu carpeta del proyecto".

---

## Primera parte. Lectura

### 1. De dónde salen las tablas

Ya aprobaste Base de Datos, así que la sintaxis de SQL no es lo nuevo. Lo nuevo es de dónde salen
las tablas: del `datos.json` que usó tu página en Programación Web.

Ese archivo tiene un problema: hay datos escritos más de una vez. En el ejemplo de la panadería, la
categoría "Panes" aparece cuatro veces y el proveedor "Lácteos del Valle", otras cuatro. Si el
dueño decide que "Panes" ahora se llama "Panes artesanales", hay que corregirlo en cuatro lugares, y
cuando un dato está guardado en varios lugares, con el tiempo esos lugares terminan
contradiciéndose. El JSON sirvió para practicar `fetch`, pero no sirve como base de datos.

La regla es sencilla: **cada cosa que se repite es una tabla**. "Panes" pasa a ser una fila de la
tabla `categorias`, y los productos la referencian por su número. Si cambia el nombre, se corrige en
una sola fila.

Las tablas dependen del tipo de sistema. La panadería tiene `productos`, `categorias` y `pedidos`;
una barbería tendría `servicios`, `clientes` y `reservas` (con fecha y hora); una tienda, `productos`
con su `stock`, `ventas` y el detalle de cada venta. Además de lo que se repite, siempre hay una
tabla para lo que el cliente hoy anota en papel: los pedidos, las reservas o las ventas.

### 2. Lo que se puede calcular no se guarda

El `datos.json` del ejemplo tenía un campo `disponible`, que vale verdadero cuando hay stock. Ese
dato se puede calcular a partir de otro (`stock > 0`), así que no se guarda en una columna: se
consulta con `WHERE stock > 0`. Si se guardara aparte, un día podría haber `stock = 0` con
`disponible = true`, y la base de datos tendría dos datos contradictorios.

### 3. Cuatro decisiones del diseño

**El dinero se guarda como `DECIMAL`.** `FLOAT` es aproximado: 0.10 se guarda como
0.10000000149..., y al sumar mil ventas la diferencia se nota. `DECIMAL(10,2)` guarda el número
exacto.

**La `FOREIGN KEY` la hace cumplir el motor.** No deja insertar un producto con una categoría que no
existe (da el error 1452), ni borrar una categoría que tiene productos (error 1451). La consistencia
de los datos no depende de que todos la recuerden.

**`NULL` cuando el dato no existe.** El teléfono de un proveedor puede no saberse; por eso acepta
`NULL`. Si la base de datos exige un dato que no se tiene, hay que inventarlo, y un `"0000000"`
parece un dato real. Un `NULL` se puede buscar y deja claro que falta. Por eso `NOT NULL` se usa
solo donde el negocio lo exige de verdad.

**`utf8mb4` en la base y en la conexión**, para que los acentos y la ñ se guarden bien.

### 4. El ejemplo de la Panadería del Barrio

En `esquema.sql` (en la carpeta del código del día), los productos quedan así:

```sql
CREATE TABLE productos (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  nombre        VARCHAR(100)  NOT NULL,
  categoria_id  INT           NOT NULL,
  proveedor_id  INT,
  precio        DECIMAL(10,2) NOT NULL,
  unidad        VARCHAR(20)   NOT NULL,
  stock         INT           NOT NULL DEFAULT 0,

  FOREIGN KEY (categoria_id) REFERENCES categorias(id),
  FOREIGN KEY (proveedor_id) REFERENCES proveedores(id)
);
```

`categoria_id` es obligatorio (`NOT NULL`) porque todo producto tiene categoría; `proveedor_id`
acepta `NULL` porque lo que se hornea en casa no tiene proveedor. Al final del archivo hay una consulta que une
las tablas y devuelve los mismos 16 productos que tenía el JSON: es la prueba de que al dividir los
datos en tablas no se perdió nada.

---

## Segunda parte. Trabajo en tu proyecto

### Prepara el entorno

1. Instala XAMPP y ábrelo. En el panel, enciende **Apache** y **MySQL**: los dos tienen que quedar
   en verde.
2. Abre `http://localhost` en el navegador: tiene que aparecer la página de XAMPP.
3. Abre `http://localhost/phpmyadmin`.
4. Carga el `esquema.sql` del ejemplo y comprueba que la consulta final devuelve 16 productos y que
   `SELECT * FROM pedidos;` devuelve 4 pedidos. Prueba también a insertar un pedido con
   `producto_id = 99`: tiene que dar el error 1452.

5. Copia tu carpeta de Proyecto de Software a `C:\xampp\htdocs\` (queda
   `C:\xampp\htdocs\proyecto-software`). Si todavía no tiene tu página de Programación Web, cópiala
   adentro ahora, sin su carpeta `.git`. Desde hoy se trabaja en la copia de `htdocs`, y al terminar se
   copia de vuelta a tu memoria (hoja "Tu carpeta del proyecto").

### Diseña tu base de datos

Crea tu propio `esquema.sql`, en tu carpeta de Proyecto de Software, junto a tus documentos y tu página:

1. Revisa los datos de tu proyecto y anota qué está escrito más de una vez. Cada cosa repetida es
   una tabla.
2. Agrega la tabla de tu problema: lo que tu cliente hoy anota en papel.
3. Cada tabla con `id INT AUTO_INCREMENT PRIMARY KEY`; `UNIQUE` donde no deba repetirse;
   `DECIMAL(10,2)` para el dinero; `FOREIGN KEY` en cada relación; `CHARACTER SET utf8mb4`.
4. Quita cualquier columna que se pueda calcular desde otra.
5. Agrega algunos datos de prueba.

Suelen bastar tres o cuatro tablas. Si te salieron diez, probablemente estás guardando cosas que se
pueden calcular.

Antes de dar por terminada la sección, revisa:

- [ ] El script corre completo, sin errores.
- [ ] Cada tabla tiene clave primaria y cada relación su `FOREIGN KEY`.
- [ ] Ninguna columna se puede calcular desde otra, y el dinero es `DECIMAL`.
- [ ] Insertar una fila con una `FOREIGN KEY` que no existe da error.

| Lo que te pasa | Qué hacer |
|---|---|
| error 1452 al insertar | la fila referenciada no existe: carga primero las tablas de las que dependen las otras |
| error 1451 al borrar | hay filas que dependen de esa: borra primero esas |
| los acentos se ven como `Ã­` | falta `utf8mb4`, en la base y en la conexión |
| las `FOREIGN KEY` nunca fallan | la tabla es MyISAM: tiene que ser InnoDB |
| phpMyAdmin no abre | MySQL no está encendido: revísalo en el panel de XAMPP |
| MySQL no arranca | casi siempre el puerto 3306 está ocupado: cámbialo en el panel |

Al terminar, guarda tu avance (si usas git):

```bash
git add esquema.sql
git commit -m "feat: esquema de la base de datos"
git push
```

---

## Cuestionario de repaso

1. ¿Por qué un dato escrito en varios lugares es un problema?
2. ¿Qué regla convierte lo que se repite en el JSON en tablas?
3. ¿Por qué no existe la columna `disponible`?
4. ¿Por qué el precio se guarda como `DECIMAL` y no como `FLOAT`?
5. ¿Qué hace una `FOREIGN KEY` cuando intentas insertar un dato que no existe en la otra tabla?
6. ¿Por qué `proveedor_id` acepta `NULL` y `categoria_id` no?
7. Nombra las tablas de tu sistema y di qué se repetía en tus datos para que existiera cada una.

---

## Para la próxima clase

El Día 12, PHP se conecta a esta base de datos y devuelve JSON con los mismos campos que tu página
ya sabe mostrar.
