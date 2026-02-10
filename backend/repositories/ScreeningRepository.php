<?php

class ScreeningRepository
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM screenings");
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Screening");
    }


    public function add(Screening $screening)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO screenings (movie_id, room_id, start_time) VALUES (?, ?, ?)"
        );

        if (
            !$stmt->execute([
                $screening->movie_id,
                $screening->room_id,
                $screening->start_time
            ])
        ) {
            throw new Exception("Erreur lors de l'ajout de la séance.");
        }
    }

    public function update(Screening $screening)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE screenings SET movie_id = ?, room_id = ?, start_time = ? WHERE id = ?"
        );

        if (
            !$stmt->execute([
                $screening->movie_id,
                $screening->room_id,
                $screening->start_time,
                $screening->id
            ])
        ) {
            throw new Exception("Erreur lors de la mise à jour de la séance.");
        }
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM screenings WHERE id = ?");

        if (!$stmt->execute([$id])) {
            throw new Exception("Erreur lors de la suppression de la séance.");
        }
    }
}
