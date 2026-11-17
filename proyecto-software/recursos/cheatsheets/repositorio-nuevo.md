# Tu repositorio de Proyecto de Software

Universidad Mayor de San Andrés · Programa Académico Desconcentrado "Técnico Superior en Informática" ·
Sede Universitaria Local Colquencha

**Proyecto de Software** · Docente: MSc Victor Hugo Huanca Ibarra

**Instrucciones.** Esta guía crea el repositorio donde vive todo tu proyecto de este módulo: el documento
(`propuesta.md` y lo que sigue) y, desde el Día 11, el código del sistema. Escribe cada comando tal cual,
de uno en uno, y compara con lo que tiene que aparecer. La primera parte se hace sin internet; la segunda,
subirlo a GitHub, necesita internet.

Si ya tienes `propuesta.md` en tu repositorio de Programación Web, no lo pierdes: en el paso 2 se copia
al repositorio nuevo.

---

## Primera parte. El repositorio en tu computadora (sin internet)

### 1. Crear la carpeta del proyecto

En tu memoria USB, crea una carpeta nueva con un nombre sin espacios ni tildes, por ejemplo
`proyecto-software`.

### 2. Copiar lo que ya tienes

Copia dentro de la carpeta nueva:

- tu `propuesta.md`, si ya lo empezaste (o tu documento de Word o Writer);
- si tu sistema va a partir de la página que hiciste en Programación Web, sus archivos: `index.html`, los
  `.css`, los `.js` y `datos.json`.

**No copies la carpeta `.git`** de tu proyecto anterior. Es una carpeta oculta: si la ves, déjala donde
está. El repositorio nuevo empieza su propia historia.

Si todavía no tienes nada, no importa: crea un archivo vacío llamado `propuesta.md` y sigue.

### 3. Abrir Git Bash en la carpeta

Abre la carpeta nueva, haz clic derecho en un espacio vacío y elige **Open Git Bash here** (en Windows 11,
primero **Mostrar más opciones**).

```bash
pwd
```

Tiene que aparecer la carpeta nueva, por ejemplo `/e/proyecto-software`. La `/e/` es la unidad E:, tu
memoria USB.

### 4. Crear el repositorio

```bash
git init -b main
```

Tiene que aparecer:

```
Initialized empty Git repository in /e/proyecto-software/.git/
```

### 5. Decirle a Git quién eres

```bash
git config user.name "Juan Pérez"
git config user.email "juan@correo.com"
```

Con tu nombre y tu correo. Si sale sin ningún mensaje, salió bien. Va sin `--global` a propósito: la
computadora es compartida, y así tu nombre queda guardado dentro de tu proyecto.

### 6. Los archivos que Git no debe guardar

```bash
echo Thumbs.db > .gitignore
echo .DS_Store >> .gitignore
```

La segunda línea lleva dos `>>`: agrega una línea. Con uno solo se borraría la anterior.

### 7. El primer commit

```bash
git status
git add .
git commit -m "docs: inicio del proyecto de software"
```

Después de `git add .`, `git status` muestra los archivos en verde. El commit tiene que terminar con algo
parecido a:

```
[main (root-commit) 3f2a1b9] docs: inicio del proyecto de software
```

### 8. Comprobar

```bash
git log --oneline
```

Tiene que aparecer tu commit. Con eso el repositorio ya existe, aunque todavía no esté en internet. Para
la entrega de los laboratorios alcanza con esto: se entregan por el formulario del curso, en tu memoria USB
o con el enlace de GitHub.

---

## Segunda parte. Subirlo a GitHub (con internet)

Con el internet de la sede puede tardar. Si no se puede en clase, hazlo desde tu casa o con los datos del
celular. Mientras tanto, sigue haciendo commits: se suben todos juntos después.

### 9. Crear el repositorio en GitHub

1. Entra a **github.com** con tu cuenta. Si no tienes una, créala primero.
2. Arriba a la derecha, **+** y después **New repository**.
3. **Repository name:** `proyecto-software`.
4. Elige **Public** o **Private**. Si eliges **Private**, agrega al docente para que pueda verlo:
   **Settings → Collaborators → Add people → `victorhugohi`**.
5. **No marques** «Add a README file». El repositorio tiene que nacer vacío.
6. **Create repository**.

GitHub muestra la dirección del repositorio, por ejemplo
`https://github.com/tu-usuario/proyecto-software.git`. Cópiala.

### 10. Conectar y subir

```bash
git remote add origin https://github.com/tu-usuario/proyecto-software.git
git push -u origin main
```

La primera vez se abre una ventana para iniciar sesión en GitHub: elige **Sign in with your browser** y
acepta. Al terminar, recarga la página del repositorio en GitHub: tienen que aparecer tus archivos.

---

## Desde hoy, cada clase

Cuando termines algo que funcione:

```bash
git add .
git commit -m "docs: objetivos y justificacion"
git push
```

El mensaje dice qué hiciste ese día. Si no hay internet, haz solo el commit; el `push` se hace después y
sube todo lo pendiente. La rúbrica pide commits en tres días o más: un commit por clase lo cumple.

---

## Si algo sale mal

| Lo que aparece | Qué pasa y qué hacer |
|---|---|
| `fatal: not a git repository` | Git Bash está abierto en otra carpeta. Ciérralo y repite el paso 3. |
| `Author identity unknown` | Falta el paso 5. Hazlo y repite el commit. |
| `remote origin already exists` | El remoto ya estaba. Corrige la dirección con `git remote set-url origin` y la dirección correcta. |
| `rejected ... (fetch first)` | El repositorio de GitHub se creó con README. Bórralo en GitHub (Settings, al final) y créalo de nuevo sin README. |
| `Repository not found` | La dirección está mal escrita, o el repositorio es de otra cuenta. Cópiala otra vez desde GitHub. |
| la ventana de inicio de sesión no aparece o falla | Sigue trabajando con commits y entrega por el formulario o en tu memoria USB. Por dónde entregas no cambia la nota. |
| `propuesta.md` no aparece en GitHub | Faltó `git add .` antes del commit, o faltó el `push`. Mira `git status`. |
