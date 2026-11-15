# Retos del Día 14 - Pruebas

Día de entrega: retos cortos.

---

## Nivel base - ¿Qué tipo de caso es?

Clasifica cada caso como **normal**, **error**, **borde** o **seguridad**:

1. Registrar un pedido con todos los datos correctos.
2. Registrar un pedido sin fecha de entrega.
3. Buscar productos cuando la base está vacía.
4. Escribir `'; DROP TABLE--` en el campo de búsqueda.
5. Registrar un pedido con fecha del 29 de febrero.
6. Registrar una cantidad de 999999.

¿Cuántos de los seis son "normal"? ¿Qué te dice eso?

---

## Nivel medio - Tu matriz

- [ ] Una fila por cada criterio de aceptación del Día 10
- [ ] Columnas: ID, entrada, acción, resultado esperado, **tipo**
- [ ] **Por cada caso normal, al menos uno de error o borde**
- [ ] Al menos una prueba de tu caso vacío
- [ ] Al menos una prueba de seguridad

Y cuéntalos:

- [ ] ¿Cuántos casos normales tienes? ¿Cuántos de error o borde?

Si los normales son mayoría, te faltan casos.

---

## Nivel extra - Córrela de verdad

- [ ] Corre **cada** caso en tu sistema real
- [ ] Anota PASA o FALLA
- [ ] En las fallas, escribe **qué pasó exactamente**

Y responde con honestidad:

> ¿Cuántas fallas encontraste?

- Si encontraste **cero**, casi seguro te faltan casos de borde: vuelve y prueba cantidad cero,
  fechas raras, textos larguísimos, campos vacíos.
- Si encontraste **algunas**, anótalas bien: son el resultado más útil del trabajo de hoy. Cada
  falla anotada es un arreglo pendiente identificado.

> En la revisión se valora más una entrega con fallas bien documentadas que una que dice
> "todo pasa" sin haberlo probado en serio.
