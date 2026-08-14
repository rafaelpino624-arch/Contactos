# Gestión de Contactos

Aplicación web para gestionar contactos mediante un frontend desarrollado con React y un backend desarrollado con PHP y MySQL.

La aplicación permite:

- Consultar contactos.
- Crear contactos.
- Editar contactos.
- Eliminar contactos.

## Tecnologías y versiones

- PHP 8.5.9
- Node.js 24.19.0
- npm 11.17.0
- MySQL 26.7.0
- React con Vite

## Requisitos

Para ejecutar el proyecto se necesita tener instalado:

- PHP
- Node.js y npm
- MySQL

## Estructura del proyecto

contactos-app/
├── backend/
│   ├── api/
│   ├── config/
│   ├── controllers/
│   └── models/
├── frontend/
│   ├── src/
│   └── ...
├── database.sql
└── README.md


## Configuración de la base de datos

La aplicación utiliza una base de datos MySQL llamada:


contactos_db
```

La tabla utilizada es:


contactos


con los siguientes campos:

* `id`
* `nombre`
* `email`
* `telefono`

El archivo `database.sql` incluido en el proyecto contiene el script necesario para crear la base de datos y la tabla.

### Configuración de conexión

La conexión a MySQL se encuentra en:


backend/config/database.php


Se deben configurar los datos de conexión correspondientes al entorno local:


Host: localhost
Base de datos: contactos_db
Usuario: root
Contraseña: contraseña configurada en MySQL


## Levantar el backend

Abrir una terminal y ubicarse en la carpeta:


contactos-app/backend


Ejecutar en la Terminal el comando:

php -S localhost:8000


El backend estará disponible en:

http://localhost:8000


La API de contactos se encuentra en:


http://localhost:8000/api/contactos.php


## Levantar el frontend

Abrir otra terminal y ubicarse en:


contactos-app/frontend


Instalar las dependencias:


npm install


Iniciar el servidor de desarrollo:


npm run dev


El frontend estará disponible normalmente en:


http://localhost:5173


## API

La API permite realizar las siguientes operaciones:

| Método | Operación           |
| ------ | ------------------- |
| GET    | Listar contactos    |
| POST   | Crear contacto      |
| PUT    | Actualizar contacto |
| DELETE | Eliminar contacto   |

## CORS

El backend permite las solicitudes provenientes del frontend React mediante la configuración de CORS.

El frontend se ejecuta en:


http://localhost:5173


y el backend en:


http://localhost:8000


## Base de datos

Para crear la base de datos y la tabla se puede utilizar el archivo:


database.sql

Este archivo contiene la estructura necesaria para ejecutar el proyecto.



