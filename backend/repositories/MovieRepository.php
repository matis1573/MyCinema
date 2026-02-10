<?php

class MovieRepository {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    // READ
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM movies");
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Movie");
    }

    // CREATE
    public function add(Movie $movie) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO movies (title, description, duration, release_year, genre, director)
             VALUES (?, ?, ?, ?, ?, ?)"
        );

        if (!$stmt->execute([
            $movie->title,
            $movie->description,
            $movie->duration,
            $movie->release_year,
            $movie->genre,
            $movie->director
        ])) {
            throw new Exception("Erreur lors de l'ajout du film.");
        }
    }

    // UPDATE
    public function update(Movie $movie) {
        $stmt = $this->pdo->prepare(
            "UPDATE movies
             SET title = ?, description = ?, duration = ?, release_year = ?, genre = ?, director = ?
             WHERE id = ?"
        );

        $stmt->execute([
            $movie->title,
            $movie->description,
            $movie->duration,
            $movie->release_year,
            $movie->genre,
            $movie->director,
            $movie->id
        ]);
    }

    // DELETE
    public function delete(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM movies WHERE id = ?");
        $stmt->execute([$id]);
    }
}
