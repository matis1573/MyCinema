<?php

class ScreeningService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ScreeningRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function add($movie_id, $room_id, $start_time)
    {
        $screening = new Screening($movie_id, $room_id, $start_time);
        $this->repository->add($screening);
    }

    public function update($id, $movie_id, $room_id, $start_time)
    {
        $screening = new Screening($movie_id, $room_id, $start_time);
        $screening->id = $id;
        $this->repository->update($screening);
    }

    public function delete($id)
    {
        $this->repository->delete($id);
    }
}
