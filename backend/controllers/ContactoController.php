<?php

require_once "../config/database.php";
require_once "../models/Contacto.php";

class ContactoController
{
    private $contacto;

    public function __construct()
    {
        global $pdo;

        $this->contacto = new Contacto($pdo);
    }

     public function listar()
    {
        $contactos = $this->contacto->obtenerTodos();

        header("Content-Type: application/json");

        echo json_encode($contactos);
    }

    public function crear()
{
    $datos = json_decode(file_get_contents("php://input"), true);
    

    if (
    empty($datos["nombre"]) ||
    empty($datos["email"]) ||
    empty($datos["telefono"])
) {
    http_response_code(400);

    echo json_encode([
        "error" => "Todos los campos son obligatorios"
    ]);

    return;
}

if (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);

    echo json_encode([
        "error" => "El email no tiene un formato válido"
    ]);

    return;
}

    $nombre = $datos["nombre"];
    $email = $datos["email"];
    $telefono = $datos["telefono"];

    $id = $this->contacto->crear($nombre, $email, $telefono);

    header("Content-Type: application/json");

    echo json_encode([
        "mensaje" => "Contacto creado correctamente",
        "id" => $id
    ]);
}

public function eliminar()
{
    $id = $_GET["id"];

    $resultado = $this->contacto->eliminar($id);

    header("Content-Type: application/json");

    if ($resultado > 0) {
        echo json_encode([
            "mensaje" => "Contacto eliminado correctamente"
        ]);
    } else {
        http_response_code(404);

        echo json_encode([
            "error" => "Contacto no encontrado"
        ]);
    }
}

public function actualizar()
{
    $id = $_GET["id"];

    $datos = json_decode(file_get_contents("php://input"), true);

    if (
        empty($datos["nombre"]) ||
        empty($datos["email"]) ||
        empty($datos["telefono"])
    ) {
        http_response_code(400);

        echo json_encode([
            "error" => "Todos los campos son obligatorios"
        ]);

        return;
    }

    if (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);

        echo json_encode([
            "error" => "El email no tiene un formato válido"
        ]);

        return;
    }

    $resultado = $this->contacto->actualizar(
        $id,
        $datos["nombre"],
        $datos["email"],
        $datos["telefono"]
    );

    header("Content-Type: application/json");

    if ($resultado > 0) {
        echo json_encode([
            "mensaje" => "Contacto actualizado correctamente"
        ]);
    } else {
        http_response_code(404);

        echo json_encode([
            "error" => "Contacto no encontrado"
        ]);
    }
}


}