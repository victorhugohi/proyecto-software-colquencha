/* ═══════════════════════════════════════════════════════════════════════════
   Frontend conectado al backend propio - proyecto de ejemplo

   Este es el día en que el proyecto se vuelve uno solo.

   El módulo pasado esta página pedía los datos a un archivo fijo. Hoy los pide a
   `productos.php`, que los saca de la base de datos que hicimos el Día 11.
   Frontend y backend, los dos nuestros, hablando entre sí.

   Y hoy aparece algo que con un archivo fijo no existía: la petición puede
   fallar. El servidor puede estar apagado, la consulta puede romperse, la red
   puede cortarse. Un archivo local nunca fallaba; un servidor sí.
   Hoy se aprende a manejar esa falla.
   ═══════════════════════════════════════════════════════════════════════════ */

const URL_DATOS = "productos.php";

const tabla   = document.querySelector("#cuerpo-tabla");
const estado  = document.querySelector("#estado");

/* Tres funciones cortas para los tres estados posibles de la pantalla.
   Tenerlos separados obliga a pensar en los tres. Es común escribir solo
   el estado "cargó bien" y olvidar los otros dos. */

function mostrarCargando() {
  estado.textContent = "Cargando productos...";
  estado.hidden = false;
  tabla.replaceChildren();
}

function mostrarError(mensaje) {
  estado.textContent = mensaje;
  estado.hidden = false;
  tabla.replaceChildren();
}

function ocultarEstado() {
  estado.hidden = true;
}

/* ── La carga ───────────────────────────────────────────────────────────────
   async/await es lo mismo que se vio el módulo pasado. Lo nuevo es el try/catch
   alrededor, que es lo que separa un ejemplo de práctica de algo usable. */

async function cargarProductos() {
  mostrarCargando();

  try {
    const respuesta = await fetch(URL_DATOS);

    /* fetch no lanza error si el servidor responde 404 o 500. Solo falla si
       no pudo ni conectarse. Por eso hay que revisar `.ok` a mano: sin esto,
       un error 500 del servidor se trataría como si fuera una respuesta
       válida, y el .json() de abajo fallaría con un mensaje confuso. */
    if (!respuesta.ok) {
      throw new Error(`El servidor respondió ${respuesta.status}`);
    }

    const productos = await respuesta.json();

    /* Un array vacío es una respuesta válida que dice "no hay
       nada". Se trata aparte, porque una tabla vacía sin mensaje parece que
       algo se rompió. Es el mismo caso vacío de las historias del Día 10. */
    if (productos.length === 0) {
      mostrarError("No hay productos para mostrar.");
      return;
    }

    renderProductos(productos);
    ocultarEstado();

  } catch (error) {
    /* Aquí cae todo lo que salió mal: sin conexión, servidor caído, JSON
       roto. Al usuario se le da un mensaje que puede entender y una salida;
       el detalle técnico va a la consola, no a la cara del usuario. */
    console.error("Fallo al cargar:", error);
    mostrarError("No se pudieron cargar los productos. Revisa tu conexión e intenta de nuevo.");
  }
}

/* ── El render ──────────────────────────────────────────────────────────────
   Igual que render() del módulo pasado: recibe los datos y arma las filas. No sabe
   de dónde vienen ni le importa: solo renderiza lo que le pasan. */

function renderProductos(productos) {
  const filas = productos.map((p) => {
    const fila = document.createElement("tr");
    const celdas = [p.nombre, p.categoria, `Bs ${p.precio.toFixed(2)}`, p.disponible ? "Sí" : "No"];
    celdas.forEach((texto, i) => {
      const celda = document.createElement("td");
      celda.textContent = texto;
      if (i === 2) celda.className = "precio";
      fila.append(celda);
    });
    return fila;
  });
  tabla.replaceChildren(...filas);
}

/* createElement y textContent, no innerHTML con los datos pegados: el
   nombre de un producto viene de la base, y el día que se cargue desde un
   formulario, un nombre como <img src=x onerror=alert(1)> se vería como
   texto y nunca se ejecutaría. Es la misma regla de la lista de pedidos del
   panel (panel.js). replaceChildren() vacía la tabla y pone las filas nuevas
   de una vez. */

/* p.precio.toFixed(2) solo funciona si precio es un número.
   Si el backend lo devolviera como texto "0.50", esta línea lanzaría
   "toFixed is not a function". Por eso ayer arreglamos los tipos en el PHP:
   el frontend confía en que el precio es número, y esa confianza es parte del
   contrato. */

cargarProductos();

/* ── Pedidos ────────────────────────────────────────────────────────────────
   Todo lo de arriba lee: el catálogo. Esto escribe: registra pedidos contra
   pedidos.php. La lista de pedidos y el botón "Entregado" no están aquí:
   tienen los nombres de los clientes, y viven en el panel (panel.js).

   No es teoría nueva. Son las mismas tres ideas de hoy, otra vez: fetch con
   .ok, los tres estados, y el error a la consola. Lo único nuevo es que el
   fetch ahora envía datos, con method: "POST". */

const URL_PEDIDOS = "pedidos.php";

const formulario       = document.querySelector("#form-pedido");
const selectorProducto = document.querySelector("#producto");
const avisoPedido      = document.querySelector("#aviso-pedido");

function avisar(texto, tipo) {
  avisoPedido.textContent = texto;
  avisoPedido.className = tipo;              // "ok" o "error": ver estilos.css
  avisoPedido.hidden = false;
}

/* ── El selector de productos ──────────────────────────────────────────────
   Se pide el catálogo otra vez, en vez de reusar el de la tabla. Dos fetch
   pequeños que hacen una cosa cada uno se entienden mejor que uno que hace dos.
   Van todos los productos, también los agotados: un encargo es para otro día,
   y lo que hoy no hay, mañana se hornea. */
async function llenarProductos() {
  try {
    const respuesta = await fetch(URL_DATOS);
    if (!respuesta.ok) throw new Error(`HTTP ${respuesta.status}`);
    const productos = await respuesta.json();

    selectorProducto.replaceChildren(new Option("Elige un producto", ""));
    productos.forEach((p) => {
      selectorProducto.append(new Option(`${p.nombre} - Bs ${p.precio.toFixed(2)}`, p.id));
    });
  } catch (error) {
    console.error(error);
    selectorProducto.replaceChildren(new Option("No se pudieron cargar los productos", ""));
  }
}

/* ── Registrar ─────────────────────────────────────────────────────────────── */
async function registrarPedido(evento) {
  evento.preventDefault();
  const datos = Object.fromEntries(new FormData(formulario));

  try {
    const respuesta = await fetch(URL_PEDIDOS, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(datos),
    });
    const resultado = await respuesta.json();

    if (!respuesta.ok) {
      avisar(resultado.error, "error");
      formulario.elements[resultado.campo]?.focus();
      return;
    }

    avisar(resultado.aviso ?? "Pedido guardado.", "ok");
    formulario.reset();
    formulario.elements.cliente.focus();
  } catch (error) {
    console.error(error);
    avisar("No se pudo guardar el pedido. Revisa la conexión e intenta de nuevo.", "error");
  }
}

/* El servidor dice qué campo falló, y el frontend le pone el foco. Así el
   mensaje "Falta el nombre del cliente" no queda flotando: el cursor ya está
   donde hay que escribir. Es el criterio de aceptación 2 de la HU-01. */

formulario.addEventListener("submit", registrarPedido);

llenarProductos();

/* El calendario no ofrece días pasados: min es la fecha de hoy. Es una ayuda
   para quien llena el formulario, no una protección: la regla de verdad la
   revisa pedidos.php, que rechaza una fecha anterior a hoy con un 400. */
formulario.elements.fecha_entrega.min = new Date().toLocaleDateString("en-CA");

