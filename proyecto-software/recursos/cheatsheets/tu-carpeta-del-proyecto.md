# Tu carpeta del proyecto

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Esta hoja dice dónde va cada archivo de tu proyecto desde el Día 11, cuando se vuelve
al código, y cómo trabajar con XAMPP sin perder nada. Léela una vez y tenla a mano cada clase.

---

## 1. Una sola carpeta

Todo tu proyecto de este módulo vive en **una sola carpeta**: la de tu repositorio de Proyecto de
Software, el que creaste con la hoja "Tu repositorio de Proyecto de Software". Ahí van **los documentos y
el código juntos**, como en el ejemplo de la Panadería del Barrio.

- **No abras ni cambies tu repositorio de Programación Web.** Queda como estaba, con su historia.
- **Tu página de Programación Web se copia a la carpeta nueva.** Si todavía no lo hiciste, copia ahora
  `index.html`, los `.css`, los `.js`, `datos.json` y las imágenes. **Sin la carpeta `.git`** del proyecto
  anterior: la carpeta nueva tiene su propia historia.
- **Los documentos no se mueven.** `propuesta.md`, `instrumento.md`, `marco-teorico.md`,
  `requerimientos.md` e `historias.md` se quedan donde están, junto al código.

---

## 2. Cómo queda, día por día

Todo en la misma carpeta, sin subcarpetas para los documentos:

```
proyecto-software/
├── propuesta.md              Lab 1
├── instrumento.md            Lab 2
├── marco-teorico.md          Lab 2
├── requerimientos.md         Lab 2
├── historias.md              Día 10
├── index.html, .css, .js     tu página de Programación Web
├── datos.json                el de tu página: de aquí salen tus tablas
├── esquema.sql               Día 11: tu base de datos
├── conexion.php              Día 12: NO va a git
├── conexion.ejemplo.php      Día 12: el que sí va a git, sin contraseña
├── (tus endpoints).php       Día 12: el que lee y el que guarda
├── sesion.php, login.php     Día 13: la parte privada
├── panel.html, panel.js...   Día 13: el panel del día
├── pruebas.md                Día 14: la matriz (Lab 3)
├── presupuesto.md            Día 15
├── respaldo.sh, deploy.md    Día 16
├── LEEME.md                  Día 17
└── .gitignore
```

Los nombres de tus endpoints y tablas son los de tu proyecto (`reservas.php`, `ventas.php`...). El ejemplo
de la panadería usa `productos.php` y `pedidos.php`.

---

## 3. Dónde corre: `htdocs`

Apache, el servidor de XAMPP, solo muestra lo que está dentro de `C:\xampp\htdocs`. Por eso, desde el Día
11, tu carpeta tiene que estar ahí para que la página y el PHP funcionen. Y no se abre con doble clic: con
doble clic la página no puede pedirle datos a PHP.

**La regla de cada clase en el aula** (las computadoras son compartidas, y lo único que guarda tu trabajo
es tu memoria USB):

1. **Al empezar:** copia tu carpeta entera de la memoria a `C:\xampp\htdocs\`, reemplazando la que hubiera
   de otra clase. Queda `C:\xampp\htdocs\proyecto-software`. Copia la carpeta **entera**, también la
   carpeta oculta `.git`: ahí está tu historia.
2. **Durante la clase:** abre en tu editor la carpeta de `htdocs` y trabaja **solo en ella**. En el
   navegador: `http://localhost/proyecto-software/`.
3. **Al terminar:** haz commit en esa carpeta (Git Bash ahí mismo), y cópiala **de vuelta a tu memoria**,
   reemplazando la anterior. Si hay internet, `git push`.

Hay dos copias: la de `htdocs` es la de trabajo durante la clase; la de tu memoria es la que te llevas.
**Nunca cambies las dos el mismo día**, porque después no sabrás cuál es la buena.

**En tu propia computadora** es más simple: crea o copia la carpeta en `C:\xampp\htdocs` una sola vez y
trabaja siempre ahí; la memoria (o GitHub) es tu respaldo. En Linux, la carpeta es `/opt/lampp/htdocs`
(ver `instalacion-linux.md`).

---

## 4. Lo que no va a git

Tu `.gitignore` lleva, desde el Día 12 y el Día 16:

```
Thumbs.db
.DS_Store
conexion.php
respaldos/
```

`conexion.php` tiene la contraseña de tu base, y `respaldos/` los datos de tu cliente. A git va
`conexion.ejemplo.php`, con el usuario y la clave vacíos.

---

## 5. Los ejemplos

- **La Panadería del Barrio**, el ejemplo de todo el módulo: en la carpeta del código de cada día
  (`ejemplo-con-comentarios` en la memoria de la sede, o en el repositorio del curso en GitHub). Es
  acumulativo: la carpeta del Día 19 es el proyecto completo, con los documentos y el código juntos, igual
  que tu carpeta.

| Lo que te pasa | Qué hacer |
|---|---|
| la página abre pero no trae datos | ¿la abriste desde `http://localhost/...` y no con doble clic? |
| `http://localhost/proyecto-software/` da "Not Found" | la carpeta no está en `htdocs`, o tiene otro nombre |
| perdiste lo de la clase pasada | lo dejaste en `htdocs` y no lo copiaste a la memoria: revisa si sigue en esa computadora |
| tienes dos carpetas distintas y no sabes cuál es la buena | `git log` en cada una: la del último commit de hoy es la buena |
