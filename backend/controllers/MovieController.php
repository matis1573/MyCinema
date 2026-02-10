<?php

class MovieController {
    private $repository;

    public function __construct() {
        $this->repository = new MovieRepository();
    }

    // READ
    public function list() {
        echo json_encode($this->repository->getAll());
    }

    // CREATE
    public function add() {
        $movie = new Movie();
        $movie->title = $_POST['title'];
        $movie->description = $_POST['description'];
        $movie->duration = $_POST['duration'];
        $movie->release_year = $_POST['release_year'];
        $movie->genre = $_POST['genre'];
        $movie->director = $_POST['director'];

        $this->repository->add($movie);
    }

    // UPDATE
    public function update() {
        $movie = new Movie();
        $movie->id = $_POST['id'];
        $movie->title = $_POST['title'];
        $movie->description = $_POST['description'];
        $movie->duration = $_POST['duration'];
        $movie->release_year = $_POST['release_year'];
        $movie->genre = $_POST['genre'];
        $movie->director = $_POST['director'];

        $this->repository->update($movie);
    }

    // DELETE
    public function delete() {
        $this->repository->delete($_POST['id']);
    }
}
