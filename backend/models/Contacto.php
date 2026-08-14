<?php

class Contacto
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function obtenerTodos()
    {
        $sql = "SELECT * FROM contactos";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($nombre, $email, $telefono)
    {
        $sql = "INSERT INTO contactos (nombre, email, telefono)
                VALUES (:nombre, :email, :telefono)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ":nombre" => $nombre,
            ":email" => $email,
            ":telefono" => $telefono
        ]);

        return $this->pdo->lastInsertId();
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM contactos WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ":id" => $id
        ]);

        return $stmt->rowCount();
    }

    public function actualizar($id, $nombre, $email, $telefono)
    {
        $sql = "UPDATE contactos
                SET nombre = :nombre,
                    email = :email,
                    telefono = :telefono
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ":id" => $id,
            ":nombre" => $nombre,
            ":email" => $email,
            ":telefono" => $telefono
        ]);

        return $stmt->rowCount();
    }
}

