<?php

class ScreeningController
{
    private $service;

    public function __construct()
    {
        $this->service = new ScreeningService();
    }

    public function list()
    {
        echo json_encode($this->service->getAll());
    }


    public function add()
    {
        $movie_id = $_POST['movie_id'] ?? 0;
        $room_id = $_POST['room_id'] ?? 0;
        $start_time = $_POST['start_time'] ?? '';

        $this->service->add($movie_id, $room_id, $start_time);
    }


    public function update()
    {
        $id = $_POST['id'] ?? 0;
        $movie_id = $_POST['movie_id'] ?? 0;
        $room_id = $_POST['room_id'] ?? 0;
        $start_time = $_POST['start_time'] ?? '';

        $this->service->update($id, $movie_id, $room_id, $start_time);
    }


    public function delete()
    {
        $this->service->delete($_POST['id']);
    }
}
