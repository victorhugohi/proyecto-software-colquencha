# Instalación del entorno - Windows

> Este módulo es **agnóstico de editor**. Usa el que quieras.
> Lo del módulo pasado (Git, un navegador, un editor) sigue sirviendo: **esto se suma, no
> reemplaza**.

Lo nuevo de este módulo es el servidor: **Apache + PHP + MySQL**. Se instala una vez, el
Día 11, y no se vuelve a tocar.

## XAMPP

XAMPP trae las tres cosas juntas y ya configuradas. **Es lo que se usa en clase.**

1. Descargar de <https://www.apachefriends.org> - o copiarlo del pendrive.
2. Instalar en **`C:\xampp`**. No en `Archivos de programa`: esa carpeta tiene permisos
   especiales y da problemas al guardar proyectos.
3. Si Windows Defender pregunta, permitir el acceso en **redes privadas**.

## Arrancar

Abrir el **Panel de control de XAMPP** y pulsar **Start** en `Apache` y en `MySQL`. Los dos
tienen que quedar en **verde**.

> Si el panel pide permisos de administrador, dáselos: sin ellos Apache no puede abrir el
> puerto 80.

## Dónde van los archivos del proyecto

```
C:\xampp\htdocs\mi-proyecto\
```

Y se abre en el navegador como:

```
http://localhost/mi-proyecto/
```

⚠️ **Nunca con doble clic en el archivo.** Eso abre `file:///C:/...` y con `file://` el PHP
no se ejecuta y `fetch` no funciona. Es el error número uno del módulo.

## Verificar que funciona

Cuatro comprobaciones, en este orden. **No sigas a la siguiente si la anterior falla.**

- [ ] `http://localhost` abre la página de XAMPP
- [ ] `http://localhost/phpmyadmin` abre phpMyAdmin
- [ ] creas `C:\xampp\htdocs\info.php` con `<?php phpinfo();` y `http://localhost/info.php`
      muestra la tabla de configuración de PHP
- [ ] esa tabla dice que **PDO** y **pdo_mysql** están habilitados

Cuando termines, **borra `info.php`**: muestra la configuración completa del servidor.

## Cuando algo no sale

| Síntoma | Casi siempre es |
|---|---|
| Apache no arranca, `Port 80 in use` | **Skype**, **IIS** o **VMware** ocupan el 80. Ciérralos, o cambia XAMPP a 8080 (ver abajo) |
| MySQL no arranca, `Port 3306 in use` | ya hay otro MySQL instalado como servicio de Windows |
| el navegador **descarga** el `.php` | estás con `file://`. Tiene que ser `http://localhost/…` |
| phpMyAdmin no abre | MySQL no está en verde en el panel |
| "acceso denegado" al guardar en `htdocs` | instalaste en `Archivos de programa`. Reinstala en `C:\xampp` |
| el antivirus bloquea XAMPP | añade `C:\xampp` a las exclusiones |

**Cambiar Apache al puerto 8080:** en el panel, `Apache → Config → httpd.conf`, cambiar
`Listen 80` por `Listen 8080` y `ServerName localhost:80` por `localhost:8080`. Guardar,
reiniciar Apache, y entrar por `http://localhost:8080/`.

## Un detalle de Windows que da problemas

**Windows no distingue mayúsculas de minúsculas en los nombres de archivo, y el servidor del
Día 16 sí.** `Productos.php` y `productos.php` son el mismo archivo en tu máquina y dos
archivos distintos al publicar.

> **Escribe todo en minúsculas y sin espacios ni tildes**, desde el primer día:
> `productos.php`, no `Productos.php` ni `listado de productos.php`.
