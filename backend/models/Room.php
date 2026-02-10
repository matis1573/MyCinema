<?php

class Room {
    public $id;
    public $name;
    public $capacity;

    public function __construct($name = "", $capacity = 0) {
        $this->name = $name;
        $this->capacity = $capacity;
    }
}
