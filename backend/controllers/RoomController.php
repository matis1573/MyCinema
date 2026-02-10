<?php

class RoomController {
    private $repository;

    public function __construct() {
        $this->repository = new RoomRepository();
    }

    // READ
    public function list() {
        echo json_encode($this->repository->getAll());
    }

    // CREATE
    public function add() {
        $room = new Room();
        $room->name = $_POST['name'];
        $room->capacity = $_POST['capacity'];

        $this->repository->add($room);
    }

    // UPDATE
    public function update() {
        $room = new Room();
        $room->id = $_POST['id'];
        $room->name = $_POST['name'];
        $room->capacity = $_POST['capacity'];

        $this->repository->update($room);
    }

    // DELETE
    public function delete() {
        $this->repository->delete($_POST['id']);
    }
}
