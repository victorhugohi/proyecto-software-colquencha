# Laboratorio 3 - Producto y calidad

**Entrega:** Día 14, en aula · **Puntaje:** 10 pts
**Unidad 4** - Construcción, pruebas y calidad

## Qué se entrega

El **sistema construido y probado**: la base de datos, el backend funcionando, el frontend
conectado, y la matriz de pruebas ejecutada. Es la parte de ingeniería del documento, y la que
demuestra que el proyecto no es solo un plan sino algo que funciona.

Se apoya en el Lab 2: los requerimientos que definiste allí son lo que este sistema tiene que
cumplir, y lo que la matriz de pruebas verifica.

## Qué contiene

### 1. Base de datos (Día 11)
- Esquema **normalizado**: cada cosa repetida es una tabla
- Claves primarias y **foráneas** en cada relación
- Tipos correctos: `DECIMAL` para dinero, `utf8mb4`, ninguna columna que se pueda calcular
- El script `esquema.sql` que crea todo desde cero

### 2. Backend con PHP y PDO (Día 12)
- Al menos un **endpoint** que devuelve datos en JSON
- **Prepared statements** en toda consulta con parámetros (sin excepción)
- Conexión en archivo aparte, con `conexion.ejemplo.php` versionado (el real, no)
- Tipos arreglados: los números salen como números, no como texto

### 3. Frontend conectado (Día 13)
- La página del módulo pasado consumiendo **tu** endpoint
- Los **tres estados** manejados: cargando, con datos, y con error
- El caso vacío distinguido del caso de error

### 4. Matriz de pruebas ejecutada (Día 14)
- Una fila por cada requerimiento del Lab 2
- **Por cada caso normal, al menos uno de error o borde**
- Al menos una prueba de **seguridad** (inyección)
- La matriz **corrida**, con resultado PASA/FALLA anotado y las fallas documentadas

## Requisitos de forma

- Todo el código en la carpeta del proyecto (con git, si lo usas)
- El sistema **corre**: se puede cargar la base, levantar el backend y usar la página
- La contraseña real **no** está en git

## Cómo se califica

Rúbrica completa en `rubrica.md`.

## Errores que cuestan puntos todos los años

- Concatenar parámetros en el SQL en vez de usar prepared statements (vulnerable a inyección)
- Guardar dinero como `FLOAT` en vez de `DECIMAL`
- Una columna `disponible` guardada en vez de calculada desde `stock`
- El frontend sin manejar el error de red: pantalla en blanco cuando el servidor cae
- Una matriz de pruebas de puros casos "normal", sin bordes ni errores
- Una matriz con todo PASA sin haberla corrido de verdad
- La contraseña real subida a git
