<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'database.php';
require_once 'Movie.php';
require_once 'MovieRepository.php';
require_once 'MovieController.php';
require_once 'Room.php';
require_once 'RoomRepository.php';
require_once 'RoomController.php';
require_once 'Screening.php';
require_once 'ScreeningRepository.php';
require_once 'ScreeningController.php';

$request = $_GET['action'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    // Liste
    case 'list_movies':
        (new MovieController())->list();
        break;
    case 'list_rooms':
        (new RoomController())->list();
        break;
    case 'list_screenings':
        (new ScreeningController())->list();
        break;

    // Ajout
    case 'add_movie':
        if ($method === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $movie = new Movie($data['title'], $data['duration'], $data['description'], $data['release_year'], $data['genre'], $data['director']);
            $repo = new MovieRepository();
            $repo->add($movie);
            echo json_encode(["success" => true]);
        }
        break;

    case 'add_room':
        if ($method === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $room = new Room($data['name'], $data['capacity']);
            $repo = new RoomRepository();
            $repo->add($room);
            echo json_encode(["success" => true]);
        }
        break;

    case 'add_screening':
        if ($method === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $screening = new Screening($data['movie_id'], $data['room_id'], $data['start_time']);
            $repo = new ScreeningRepository();
            $repo->add($screening);
            echo json_encode(["success" => true]);
        }
        break;

    default:
        echo json_encode(["error" => "Action not found"]);
        break;
}
