<?php

class ScreeningController {
    private $repository;

    public function __construct() {
        $this->repository = new ScreeningRepository();
    }

    public function list() {
        echo json_encode($this->repository->getAll());
    }

}
