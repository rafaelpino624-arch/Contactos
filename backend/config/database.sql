CREATE DATABASE IF NOT EXISTS contactos_db;

USE contactos_db;

CREATE TABLE IF NOT EXISTS contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefono VARCHAR(20) NOT NULL
);

INSERT INTO contactos (nombre, email, telefono)
VALUES ('Rafael', 'rafael@gmail.com', '3018680971');

