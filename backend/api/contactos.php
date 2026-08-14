<?php

require_once "../config/cors.php";
require_once "../controllers/ContactoController.php";

$controller = new ContactoController();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $controller->listar();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->crear();
}

if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    $controller->eliminar();
}

if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    $controller->actualizar();
}