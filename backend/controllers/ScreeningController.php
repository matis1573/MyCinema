<?php

class ScreeningController {
    private $repository;

    public function __construct() {
        $this->repository = new ScreeningRepository();
    }

    public function list() {
        echo json_encode($this->repository->getAll());
    }

    public function add() {
        $screening = new Screening();
        $screening->movie_id = $_POST['movie_id'];
        $screening->room_id = $_POST['room_id'];
        $screening->start_time = $_POST['start_time'];

        $this->repository->add($screening);
    }

    public function update() {
        $screening = new Screening();
        $screening->id = $_POST['id'];
        $screening->movie_id = $_POST['movie_id'];
        $screening->room_id = $_POST['room_id'];
        $screening->start_time = $_POST['start_time'];

        $this->repository->update($screening);
    }

    public function delete() {
        $this->repository->delete($_POST['id']);
    }
}
