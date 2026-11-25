/* ═══════════════════════════════════════════════════════════════════════════
   Panel de la dueña - proyecto de ejemplo

   La parte privada del sistema: el resumen del día y la lista de pedidos,
   con los nombres de los clientes. Antes de mostrar nada, pregunta al
   servidor si hay sesión. Si no hay, muestra el formulario para entrar.

   La sesión no se guarda en JavaScript: la guarda el servidor, y el
   navegador manda la cookie solo en cada fetch. Este archivo no toca la
   cookie en ningún momento.
   ═══════════════════════════════════════════════════════════════════════════ */

const URL_LOGIN   = "login.php";
const URL_PANEL   = "panel.php";
const URL_PEDIDOS = "pedidos.php";

const seccionEntrar   = document.querySelector("#entrar");
const formEntrar      = document.querySelector("#form-entrar");
const avisoEntrar     = document.querySelector("#aviso-entrar");
const panel           = document.querySelector("#panel");
const nombre          = document.querySelector("#nombre");
const estadoResumen   = document.querySelector("#estado-resumen");
const fechaConsulta   = document.querySelector("#fecha-consulta");
const buscador        = document.querySelector("#buscar");
const tituloPedidos   = document.querySelector("#titulo-pedidos");
const totalPendientes = document.querySelector("#total-pendientes");
const estadoPedidos   = document.querySelector("#estado-pedidos");
const listaPedidos    = document.querySelector("#lista-pedidos");

/* La fecha de hoy como AAAA-MM-DD, la misma razón que en app.js: en-CA da
   ese formato en la hora de aquí, y toISOString() daría la de UTC. */
const hoy = new Date().toLocaleDateString("en-CA");

/* ── Mostrar una parte u otra ──────────────────────────────────────────────
   Dos estados de la página: sin sesión (el formulario) y con sesión (el
   panel). Nunca los dos a la vez. */

function mostrarEntrar(mensaje) {
  panel.hidden = true;
  seccionEntrar.hidden = false;
  avisoEntrar.textContent = mensaje ?? "";
  avisoEntrar.className = "error";
  avisoEntrar.hidden = !mensaje;
  formEntrar.elements.usuario.focus();
}

function mostrarPanel(nombreDuena) {
  seccionEntrar.hidden = true;
  panel.hidden = false;
  nombre.textContent = nombreDuena;
  cargarResumen();
  cargarPedidos();
}

/* ── Al abrir: ¿ya hay sesión? ──────────────────────────────────────────────
   Si la dueña entró hace un rato y recarga la página, no tiene que escribir
   la contraseña otra vez: la cookie sigue ahí y login.php la reconoce. */

async function revisarSesion() {
  try {
    const respuesta = await fetch(URL_LOGIN);
    if (respuesta.status === 401) {
      mostrarEntrar();
      return;
    }
    if (!respuesta.ok) throw new Error(`HTTP ${respuesta.status}`);
    const datos = await respuesta.json();
    mostrarPanel(datos.nombre);
  } catch (error) {
    console.error(error);
    mostrarEntrar("No se pudo conectar con el servidor. Intenta de nuevo en un momento.");
  }
}

/* El 401 no es un error de la página: es la respuesta normal cuando nadie
   entró todavía. Por eso se pregunta por él antes del .ok. */

/* ── Entrar ──────────────────────────────────────────────────────────────── */
async function entrar(evento) {
  evento.preventDefault();
  const datos = Object.fromEntries(new FormData(formEntrar));

  try {
    const respuesta = await fetch(URL_LOGIN, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(datos),
    });
    const resultado = await respuesta.json();

    if (!respuesta.ok) {
      formEntrar.elements.clave.value = "";
      mostrarEntrar(resultado.error);
      return;
    }
    formEntrar.reset();
    mostrarPanel(resultado.nombre);
  } catch (error) {
    console.error(error);
    mostrarEntrar("No se pudo conectar con el servidor. Intenta de nuevo en un momento.");
  }
}

/* Si la contraseña estaba mal, se borra el campo: que la persona la vuelva a
   escribir entera, y no corrija a ciegas una que no ve. */

/* ── Salir ───────────────────────────────────────────────────────────────── */
async function salir() {
  try {
    await fetch(`${URL_LOGIN}?accion=salir`, { method: "POST" });
  } catch (error) {
    console.error(error);
  }
  mostrarEntrar();
}

/* ── El resumen: tres números ───────────────────────────────────────────── */
async function cargarResumen() {
  estadoResumen.textContent = "Cargando el resumen...";
  estadoResumen.hidden = false;
  try {
    const respuesta = await fetch(URL_PANEL);
    if (respuesta.status === 401) return mostrarEntrar("La sesión terminó. Vuelve a entrar.");
    if (!respuesta.ok) throw new Error(`HTTP ${respuesta.status}`);
    const datos = await respuesta.json();

    document.querySelector("#num-pedidos").textContent = datos.pedidos;
    document.querySelector("#num-total").textContent = `Bs ${datos.total.toFixed(2)}`;
    document.querySelector("#num-pendientes").textContent = datos.pendientes;
    estadoResumen.hidden = true;
  } catch (error) {
    console.error(error);
    estadoResumen.textContent = "No se pudo cargar el resumen. Intenta de nuevo en un momento.";
  }
}

/* Un 401 a mitad del uso quiere decir que la sesión se cerró (pasó mucho
   tiempo, o se cerró en otra pestaña). Se vuelve al formulario con un aviso,
   en vez de mostrar un error que no se entiende. */

/* ── Listar los pedidos ────────────────────────────────────────────────────
   La lista va aquí y no en app.js porque tiene los nombres de los clientes:
   es de la dueña, no del público. */
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

    const boton = document.createElement("button");
    boton.type = "button";
    boton.dataset.id = p.id;
    if (p.entregado) {
      const marca = document.createElement("span");
      marca.className = "entregado";
      marca.textContent = "Entregado";
      item.append(marca);
      boton.dataset.accion = "deshacer";
      boton.textContent = "Deshacer";
      boton.className = "enlace";
    } else {
      boton.dataset.accion = "entregar";
      boton.textContent = "Entregado";
    }
    item.append(boton);
    listaPedidos.append(item);
  });
}

/* createElement y textContent, no innerHTML: los nombres los escribió
   cualquiera en el formulario público. Con textContent un nombre como
   <img src=x onerror=alert(1)> se ve tal cual, como texto. */

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
    if (respuesta.status === 401) return mostrarEntrar("La sesión terminó. Vuelve a entrar.");
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

/* ── Marcar como entregado, o deshacerlo ───────────────────────────────────
   Un solo listener en la lista, no uno por botón: la delegación de eventos
   del Día 9 del módulo pasado. El botón dice qué hacer en data-accion:
   "entregar" en un pendiente, "deshacer" en uno ya entregado (aparecen al
   buscar por cliente: la lista del día muestra solo los pendientes). */
listaPedidos.addEventListener("click", async (evento) => {
  const boton = evento.target.closest("button[data-id]");
  if (!boton) return;

  boton.disabled = true;                     // que un doble toque no mande dos veces
  try {
    const respuesta = await fetch(`${URL_PEDIDOS}?accion=${boton.dataset.accion}&id=${boton.dataset.id}`, { method: "POST" });
    if (respuesta.status === 401) return mostrarEntrar("La sesión terminó. Vuelve a entrar.");
    if (!respuesta.ok) throw new Error(`HTTP ${respuesta.status}`);
    cargarResumen();
    cargarPedidos();
  } catch (error) {
    console.error(error);
    boton.disabled = false;
    estadoPedidos.textContent = "No se pudo guardar el cambio. Intenta de nuevo.";
    estadoPedidos.hidden = false;
  }
});

/* Al entregar o deshacer, se piden otra vez el resumen y la lista: "Por
   entregar" cambia en uno, y lo que se ve es lo que de verdad quedó guardado. */

formEntrar.addEventListener("submit", entrar);
document.querySelector("#salir").addEventListener("click", salir);
fechaConsulta.addEventListener("change", cargarPedidos);
buscador.addEventListener("change", cargarPedidos);

fechaConsulta.value = hoy;
revisarSesion();

