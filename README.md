# SunKissed: Guía de despliegue

## 1. Instalaciones previas

Debemos asegurarnos de tener instalado en nuestro equipo lo siguiente:
- XAMPP
- Composer
- Node.js

## 2. Clonar repositorio

Ya que estamos utilizando xampp, deberás clonar el repositorio en la carpeta "*xampp > htdocs*" 
en el disco donde hayamos instalado xampp. Para ello nos situamos en la carpeta desde cualquier
consola y escribimos `git clone https://github.com/JesusUruGar/SunKissedTFG.git`.

## 3. Configurar vhost (opcional)

Para trabajar mejor en local se recomienda hacer un host virtual. En mi caso
lo configuro como "sunkissed.local". Por no hacer la guía innecesariamente larga, esta es la guía que he utilizado personalmente
para crear mi host virtual:

- [Guía VHOST](https://codersfree.com/posts/configurar-virtualhost-xampp-windows-guia-paso-a-paso)

## 4. Actualizar dependencias

Una vez con el repositorio en la carpeta, nos situamos dentro desde nuestra consola y escribimos el comando `composer update`.

## 5. Configurar ".env"

Cuando el proceso haya acabado tendremos que crear un archivo de entorno llamado "*.env*", del cuál se habrá generado un archivo de ejemplo llamado "*.env.example*" del que podemos tomar referencia y ajustar ciertos parámetros.

Lo primero que haremos será configurar la base de datos. En el archivo buscaremos los apartados que comiencen por "*DB_*" y lo dejaremos de la siguiente manera:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sunkissed
DB_USERNAME=root
DB_PASSWORD=
```

**⚠️IMPORTANTE:** Si tienes problemas con vite, puedes agregar esto último al final del archivo, configurandolo con la URL que estés usando:

```
VITE_DEV_SERVER_HOST=sunkissed.local
VITE_DEV_SERVER_PORT=5173
```

## 6. Preparar base de datos

Primero accedes al panel de "*phpMyAdmin*" por el enlace de "[phpMyAdmin](http://localhost/phpmyadmin)". Una vez ahí, en el apartado izquierdo das en "*Nueva*", y en el menú te aparece un apartado en el que te pide el nombre de la BBDD. La llamas "*sunkissed*" y creas la base de datos.

Una vez aquí tenemos 2 opciones para desplegar la BBDD:
1. Insertando archivo SQL (*mantiene estructura y datos*).
2. Haciendo las migraciones de laravel (*mantiene estructura pero sin datos*).

Para el primer caso, seleccionamos la BBDD en el menú de la izquierda de "*phpMyAdmin*", buscamos el apartado "*Importar*" e importamos el archivo "*sunkissed.sql*" que se encuentra en la carpeta "*db*" del proyecto.

Si no nos hacen falta los datos, entramos en la consola, nos situamos en la carpeta del proyecto y escribimos lo siguiente: `php artisan migrate`. Esto genera la estructura de tablas sin crear datos.

## 7. Cargar los assets en tiempo real

Para que los recursos se carguen correctamente durante el desarrollo, debemos abrir la consola situados en el proyecto y escribir el siguiente comando: `npm run dev`.

**⚠️IMPORTANTE:** Este comando debe estar corriendo en todo momento de fondo para que se siga compilando mientras carguemos las vistas.

## 8. Conclusión

Si se han seguido los pasos correctamente, cada vez que encendamos los módulos "*Apache*" y "*MySQL*" de xampp y el comando del apartado anterior esté corriendo en la consola, el proyecto debería funcionar correctamente. En caso de que se me haya pasado algo o no funcione como debería, no dudes en escribirme.

Un saludo y que tengas un buen día 👋.
