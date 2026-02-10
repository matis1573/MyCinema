<?php

class ScreeningRepository {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM screenings");
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Screening");
    }


    public function add(Screening $screening) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO screenings (movie_id, room_id, start_time) VALUES (?, ?, ?)"
        );

        if (!$stmt->execute([
            $screening->movie_id,
            $screening->room_id,
            $screening->start_time
        ])) {
            throw new Exception("Erreur lors de l'ajout de la séance.");
        }
    }
}
