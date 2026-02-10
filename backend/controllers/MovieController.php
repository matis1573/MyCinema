<?php

class MovieController {
    private $repository;

    public function __construct () {
        $this ->repository = new MovieRepository (); //
    }  
    public function list() {
        echo json_encode($this ->repository ->getAll ());
    }

}