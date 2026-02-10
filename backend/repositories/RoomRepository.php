<?php

class RoomRepository {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    // READ
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM rooms");
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Room");
    }

    // CREATE
    public function add(Room $room) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO rooms (name, capacity) VALUES (?, ?)"
        );
        $stmt->execute([
            $room->name,
            $room->capacity
        ]);
    }

    // UPDATE
    public function update(Room $room) {
        $stmt = $this->pdo->prepare(
            "UPDATE rooms SET name = ?, capacity = ? WHERE id = ?"
        );
        $stmt->execute([
            $room->name,
            $room->capacity,
            $room->id
        ]);
    }

    // DELETE
    public function delete(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM rooms WHERE id = ?");
        $stmt->execute([$id]);
    }
}
