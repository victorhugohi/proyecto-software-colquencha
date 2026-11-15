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
  tabla.innerHTML = "";
}

function mostrarError(mensaje) {
  estado.textContent = mensaje;
  estado.hidden = false;
  tabla.innerHTML = "";
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
  tabla.innerHTML = productos.map((p) => `
    <tr>
      <td>${p.nombre}</td>
      <td>${p.categoria}</td>
      <td class="precio">Bs ${p.precio.toFixed(2)}</td>
      <td>${p.disponible ? "Sí" : "No"}</td>
    </tr>
  `).join("");
}

/* p.precio.toFixed(2) solo funciona si precio es un número.
   Si el backend lo devolviera como texto "0.50", esta línea lanzaría
   "toFixed is not a function". Por eso ayer arreglamos los tipos en el PHP:
   el frontend confía en que el precio es número, y esa confianza es parte del
   contrato. */

cargarProductos();

/* ── Pedidos ────────────────────────────────────────────────────────────────
   Todo lo de arriba lee: el catálogo. Esto escribe: registra pedidos y los
   marca como entregados, contra pedidos.php.

   No es teoría nueva. Son las mismas tres ideas de hoy, otra vez: fetch con
   .ok, los tres estados, y el error a la consola. Lo único nuevo es que el
   fetch ahora envía datos, con method: "POST". */

const URL_PEDIDOS = "pedidos.php";

const formulario       = document.querySelector("#form-pedido");
const selectorProducto = document.querySelector("#producto");
const avisoPedido      = document.querySelector("#aviso-pedido");
const fechaConsulta    = document.querySelector("#fecha-consulta");
const buscador         = document.querySelector("#buscar");
const tituloPedidos    = document.querySelector("#titulo-pedidos");
const totalPendientes  = document.querySelector("#total-pendientes");
const estadoPedidos    = document.querySelector("#estado-pedidos");
const listaPedidos     = document.querySelector("#lista-pedidos");

/* La fecha de hoy como AAAA-MM-DD, que es lo que usan <input type="date"> y
   MySQL. toISOString() no sirve: da la fecha en UTC, y en Bolivia (UTC-4)
   después de las 20:00 ya dice mañana. El formato regional "en-ca" es
   justamente AAAA-MM-DD. */
const hoy = new Date().toLocaleDateString("en-CA");

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
    cargarPedidos();
  } catch (error) {
    console.error(error);
    avisar("No se pudo guardar el pedido. Revisa la conexión e intenta de nuevo.", "error");
  }
}

/* El servidor dice qué campo falló, y el frontend le pone el foco. Así el
   mensaje "Falta el nombre del cliente" no queda flotando: el cursor ya está
   donde hay que escribir. Es el criterio de aceptación 2 de la hu-01. */

/* ── Listar ────────────────────────────────────────────────────────────────── */
function renderPedidos(pedidos, mensajeVacio) {
  listaPedidos.replaceChildren();
  totalPendientes.textContent = pedidos.filter((p) => !p.entregado).length;

  if (pedidos.length === 0) {
    estadoPedidos.textContent = mensajeVacio;
    estadoPedidos.hidden = false;
    return;
  }
  estadoPedidos.hidden = true;

  pedidos.forEach((p) => {
    const item = document.createElement("li");
    const texto = document.createElement("span");
    texto.textContent = `${p.cantidad} × ${p.producto} · ${p.cliente}`;
    item.append(texto);

    if (p.entregado) {
      const marca = document.createElement("span");
      marca.className = "entregado";
      marca.textContent = "Entregado";
      item.append(marca);
    } else {
      const boton = document.createElement("button");
      boton.type = "button";
      boton.dataset.id = p.id;
      boton.textContent = "Entregado";
      item.append(boton);
    }
    listaPedidos.append(item);
  });
}

/* Por qué createElement Y textContent, y no innerHTML como en la tabla:
   la tabla muestra el catálogo, que escribe la panadería. Esta lista muestra
   lo que escribió cualquiera en el formulario. Si alguien pone de nombre
   <img src=x onerror=alert(1)>, innerHTML lo ejecutaría. Con textContent es
   texto, y se ve tal cual. Es la regla del Día 12 del lado del navegador: lo
   que viene del usuario es dato, nunca instrucción. */

async function cargarPedidos() {
  const cliente = buscador.value.trim();
  const url = cliente
    ? `${URL_PEDIDOS}?cliente=${encodeURIComponent(cliente)}`
    : `${URL_PEDIDOS}?fecha=${encodeURIComponent(fechaConsulta.value)}`;

  if (cliente) {
    tituloPedidos.textContent = `Pedidos de «${cliente}»`;
  } else if (fechaConsulta.value === hoy) {
    tituloPedidos.textContent = "Pedidos de hoy";
  } else {
    tituloPedidos.textContent = `Pedidos del ${fechaConsulta.value}`;
  }
  estadoPedidos.textContent = "Cargando pedidos...";
  estadoPedidos.hidden = false;

  try {
    const respuesta = await fetch(url);
    if (!respuesta.ok) throw new Error(`HTTP ${respuesta.status}`);
    const pedidos = await respuesta.json();
    renderPedidos(pedidos, cliente ? "No hay pedidos de ese cliente." : "No hay pedidos pendientes para este día.");
  } catch (error) {
    console.error(error);
    listaPedidos.replaceChildren();
    estadoPedidos.textContent = "No se pudieron cargar los pedidos. Intenta de nuevo en un momento.";
    estadoPedidos.hidden = false;
  }
}

/* ── Marcar como entregado ─────────────────────────────────────────────────
   Un solo listener en la lista, no uno por botón: es la delegación de eventos
   del Día 9 del módulo pasado. Los botones se crean y se destruyen con cada
   carga, y el listener de la lista sirve para todos. */
listaPedidos.addEventListener("click", async (evento) => {
  const boton = evento.target.closest("button[data-id]");
  if (!boton) return;

  boton.disabled = true;                     // que un doble toque no mande dos veces
  try {
    const respuesta = await fetch(`${URL_PEDIDOS}?accion=entregar&id=${boton.dataset.id}`, { method: "POST" });
    if (!respuesta.ok) throw new Error(`HTTP ${respuesta.status}`);
    cargarPedidos();
  } catch (error) {
    console.error(error);
    boton.disabled = false;
    estadoPedidos.textContent = "No se pudo marcar como entregado. Intenta de nuevo.";
    estadoPedidos.hidden = false;
  }
});

/* Un toque en "Entregado" cambia el estado del pedido, y la lista se vuelve a
   pedir al servidor para que muestre lo que de verdad quedó guardado. */

formulario.addEventListener("submit", registrarPedido);
fechaConsulta.addEventListener("change", cargarPedidos);
buscador.addEventListener("change", cargarPedidos);

fechaConsulta.value = hoy;
llenarProductos();
cargarPedidos();

