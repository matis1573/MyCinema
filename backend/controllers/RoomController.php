<?php

class RoomController {
    private $repository;

    public function __construct() {
        $this->repository = new RoomRepository();
    }

    public function list() {
        echo json_encode($this->repository->getAll());
    }

}
