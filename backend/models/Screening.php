<?php

class Screening {
    public $id;
    public $movie_id;
    public $room_id;
    public $start_time;

    public function __construct($movie_id = 0, $room_id = 0, $start_time = "") {
        $this->movie_id = $movie_id;
        $this->room_id = $room_id;
        $this->start_time = $start_time;
    }
}
