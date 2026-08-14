# Contactos

Aplicación web para gestionar contactos, con un frontend desarrollado en React y un backend en PHP conectado a MySQL.

## Requisitos y versiones

Para ejecutar el proyecto se utilizaron:

* PHP 8.5.9
* Node.js 24.19.0
* npm
* MySQL 26.7.0
* React con Vite 8.2.1

## Levantar el proyecto

### Backend

Entrar a la carpeta `backend`:

```bash
cd backend
php -S localhost:8000
```

El backend quedará disponible en:

`http://localhost:8000`

### Frontend

Entrar a la carpeta `frontend`:

```bash
cd frontend
npm install
npm run dev
```

Vite mostrará la dirección donde se está ejecutando el frontend. Normalmente será:

`http://localhost:5173`

Si ese puerto está ocupado, Vite utilizará otro disponible, como `http://localhost:5174`.

## Base de datos

El proyecto utiliza MySQL para almacenar los contactos.

El script para crear la base de datos y sus tablas se encuentra en:

`backend/config/database.sql`

Para configurar la conexión a la base de datos se debe revisar el archivo:

`backend/config/database.php`

Ahí se deben colocar los datos correspondientes al servidor de MySQL, usuario, contraseña y nombre de la base de datos.

## Estructura principal

* `backend/`: código del servidor y conexión con la base de datos.
* `frontend/`: aplicación desarrollada con React y Vite.
* `backend/config/database.sql`: script de la base de datos.
* `backend/config/database.php`: configuración de conexión a MySQL.
* `backend/controllers/`: controladores del backend.
* `backend/models/`: modelos utilizados por el sistema.

## Nota

Se recomienda tener MySQL iniciado antes de ejecutar el backend y verificar que los datos de conexión coincidan con la configuración local.
