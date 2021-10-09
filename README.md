# Blockbuster API

La documentación del API puede ser encontrada en este [link](https://documenter.getpostman.com/view/10516858/UUy7c5Gh)

Este proyecto está hecho con el microframework de php [lumen](https://lumen.laravel.com/)

# Instalación

Crear el archivo `.env` en la raíz del proyecto y configurar una conexión con una base de datos.

Crear el esquema de base de datos:
<pre>
php artisan migrate
</pre>

Crear datos de prueba:
<pre>
php artisan db:seed
</pre>

Iniciar servidor de desarrollo:
<pre>
php -S localhost:8000 -t public
</pre>
