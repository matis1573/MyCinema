<?php

class RoomRepository {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM rooms");
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Room");
    }

    public function add(Room $room) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO rooms (name, capacity) VALUES (?, ?)"
        );

        if (!$stmt->execute([$room->name, $room->capacity])) {
            throw new Exception("Erreur lors de l'ajout de la salle.");
        }
    }
}
