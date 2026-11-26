<!-- ═══════════════════════════════════════════════════════════════════════
     LEEME (README) como carta de presentación - proyecto de ejemplo

     ⚠️ Es el proyecto de ejemplo del módulo, no el tuyo.

     La idea del día, de Modern pm (1.1.2, "de features a valor"):
        La gente no compra un taladro porque quiere un taladro.
        Lo compra porque quiere un agujero en la pared.

     Un README que dice "usa PHP y MySQL" habla del taladro. Uno que
     dice "tu panadera ve los pedidos del día antes de abrir" habla del
     agujero. El segundo es el que hace que alguien quiera usar el sistema.

     Este archivo es lo primero que ve quien llega al proyecto: el cliente, un
     evaluador, un futuro empleador que mira tu GitHub. Si en treinta segundos
     no entiende qué problema resuelve y para quién, cierra la pestaña.
     ═══════════════════════════════════════════════════════════════════════ -->

# Gestión de pedidos - Panadería del Barrio

**Registra y consulta pedidos por encargo en menos de un minuto, para no
perder ventas mientras se atiende a otro cliente.**

<!-- Esa primera línea en negrita es la parte principal del archivo. Dice, en
     una oración: qué hace, para quién, y por qué importa. Si alguien lee solo
     eso, ya entendió el proyecto.

     Fíjate en lo que no dice: no menciona PHP, ni MySQL, ni "aplicación web".
     Eso es el taladro. La primera línea es el agujero.                 -->

---

## El problema

La panadería toma pedidos por encargo en un cuaderno. Cuando hay cola, anotar
un pedido tarda y a veces se pierde: un teléfono que no se apuntó, una fecha
que no se lee. Al día siguiente, saber qué hornear obliga a revisar el
cuaderno hoja por hoja.

<!-- El problema va antes que la solución, y en el idioma del cliente, no en
     el del programador. Nadie que lea esto tiene que saber qué es un
     endpoint. Tiene que reconocer el problema como propio: "sí, eso me
     pasa".

     Esta sección sale directo de la formulación del problema del Día 2. No se
     reinventa: se cuenta para afuera lo que ya se documentó para adentro.  -->

## Qué hace el sistema

- Registra un pedido en cuatro campos, eligiendo del catálogo de productos
- Muestra a la dueña, con su contraseña, los pedidos y el total de hoy
- Marca los pedidos como entregados, para que no se acumulen, y deshace la marca si fue un error
- Funciona desde el celular, con las manos ocupadas del mostrador

<!-- Cada punto empieza con un verbo y describe un beneficio, no una
     característica técnica. "Registra un pedido en cuatro campos" (beneficio)
     y no "formulario con validación del lado del servidor" (característica).

     Estos puntos salen de las historias de usuario del Día 10. El "para qué"
     de cada historia es lo que las hace vendibles.                         -->

## Cómo se usa

1. Abre el sistema en el navegador del celular o la computadora.
2. Para registrar: completa los cuatro campos y confirma.
3. Para ver el día: entra al "Panel de la dueña" con tu usuario y contraseña.
4. Para cerrar un pedido: toca "Entregado". Si fue un error, búscalo por el cliente y toca "Deshacer".

<!-- Instrucciones para el usuario, no para el programador. Un manual de
     instalación con "clonar el repositorio" y "configurar el .env" va más
     abajo o en otro archivo. Lo primero es cómo lo usa quien lo va a usar.  -->

## Para instalarlo (parte técnica)

Requiere PHP 8 y MySQL (incluidos en XAMPP).

1. Copia la carpeta del proyecto en `htdocs` de XAMPP, con el nombre `panaderia`.
2. Crea la base de datos, corre `esquema.sql` y cambia la contraseña de ejemplo (cómo, en el
   comentario de la tabla `usuarios` de `esquema.sql`).
3. Copia `conexion.ejemplo.php` a `conexion.php` y completa tus datos.
4. Abre `http://localhost/panaderia/`.

<!-- La parte técnica existe, pero va al final y separada. Quien necesita
     instalarlo la busca; quien solo quiere entender el proyecto no tropieza
     con ella. El orden del README es el orden de las preguntas: primero
     "¿qué es y para qué?", después "¿cómo lo instalo?".                    -->

## Estado del proyecto

Proyecto formativo, funcional en entorno local. No incluye facturación ni
inventario (ver los límites en la propuesta). El acceso de la dueña con usuario y
contraseña (RNF-06) funciona; la contraseña de ejemplo se cambia al instalar.

<!-- La honestidad sobre el estado y los límites es parte de la carta. Un
     README que promete más de lo que hay se descubre al primer clic y pierde
     toda la credibilidad que construyó. Es la misma honestidad del alcance
     del Día 4 y del estado del arte del Día 7.                             -->

