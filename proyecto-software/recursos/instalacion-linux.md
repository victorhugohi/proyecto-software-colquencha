# Instalación del entorno - Linux y macOS

> Este módulo es **agnóstico de editor**. Usa el que quieras.
> Lo del módulo pasado (Git, un navegador, un editor) sigue sirviendo: **esto se suma, no
> reemplaza**.

Lo nuevo de este módulo es el servidor: **Apache + PHP + MySQL**. Se instala una vez, el
Día 11, y no se vuelve a tocar.

## Lo más simple: XAMPP

XAMPP trae las tres cosas juntas y ya configuradas. **Es lo que se usa en clase**, y conviene
que todos tengan lo mismo para que los problemas sean los mismos.

```bash
# 1. Descargar de https://www.apachefriends.org  (o copiarlo del pendrive)
# 2. Darle permiso de ejecución e instalar
chmod +x xampp-linux-x64-*-installer.run
sudo ./xampp-linux-x64-*-installer.run
```

**Arrancar y parar:**

```bash
sudo /opt/lampp/lampp start      # arranca Apache y MySQL
sudo /opt/lampp/lampp stop
sudo /opt/lampp/lampp status     # ver qué está corriendo
```

**Dónde van los archivos del proyecto:** `/opt/lampp/htdocs/`. La carpeta es de root: dásela a tu
usuario una sola vez, y después trabaja ahí sin `sudo`:

```bash
sudo chown -R $USER /opt/lampp/htdocs
cp -r ~/proyecto-software /opt/lampp/htdocs/
```

Y se abre en `http://localhost/proyecto-software/`. Al terminar, copia la carpeta de vuelta a tu memoria
o haz `git push` (hoja "Tu carpeta del proyecto").

No sirve un enlace simbólico desde tu carpeta personal (`ln -s ~/proyecto-software ...`): en Ubuntu la
carpeta personal es privada, Apache no puede entrar, y la página responde **403 Forbidden** (comprobado
con XAMPP 8.5 en Ubuntu, nov 2026).

## La alternativa: paquetes del sistema

Si prefieres no instalar XAMPP, o ya tienes un servidor:

```bash
sudo apt update
sudo apt install -y apache2 php php-mysql mariadb-server
sudo systemctl start apache2 mariadb
sudo mysql_secure_installation        # aquí le pones contraseña a root
```

La raíz del servidor es `/var/www/html/`.

⚠️ **Si eliges esta vía, la contraseña de `root` no queda vacía.** Hay que ponerla en
`conexion.php`, donde la demo tiene `$clave = ''`.

**Otras distribuciones:**

```bash
sudo dnf install httpd php php-mysqlnd mariadb-server     # Fedora
sudo pacman -S apache php php-fpm mariadb                 # Arch
```

## macOS

```bash
brew install php mysql
brew services start mysql
```

O XAMPP para macOS, desde la misma página.

## Verificar que funciona

Cuatro comprobaciones, en este orden. **No sigas a la siguiente si la anterior falla.**

- [ ] `http://localhost` abre la página de XAMPP (o de Apache)
- [ ] `http://localhost/phpmyadmin` abre phpMyAdmin
- [ ] creas `info.php` con `<?php phpinfo();` en la raíz del servidor y
      `http://localhost/info.php` muestra la tabla de configuración de PHP
- [ ] esa tabla dice que **PDO** y **pdo_mysql** están habilitados

Cuando termines, **borra `info.php`**: muestra la configuración completa del servidor.

## Cuando algo no sale

| Síntoma | Casi siempre es |
|---|---|
| `http://localhost` no abre | Apache no arrancó. `sudo /opt/lampp/lampp status` |
| el navegador **descarga** el `.php` en vez de mostrarlo | estás abriendo el archivo con `file://`. Tiene que ser `http://localhost/…` |
| phpMyAdmin no abre | MySQL no está corriendo |
| `Port 80 in use` | otro servidor ya lo ocupa. Párale, o cambia el puerto de XAMPP a 8080 |
| `Port 3306 in use` | ya tienes un MySQL o MariaDB del sistema corriendo |
| permiso denegado al guardar en `htdocs` | usa el enlace simbólico de arriba en vez de copiar archivos con `sudo` |

> **La regla de oro del módulo:** el proyecto se abre **siempre** por `http://localhost/…`,
> nunca haciendo doble clic en el archivo. Con `file://` el PHP no se ejecuta y `fetch` no
> funciona.
