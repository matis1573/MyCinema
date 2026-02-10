<?php
$pdo = new PDO('mysql:host=localhost;dbname=mycinema;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


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

switch ($request) {
    case 'list_movies':
        $controller = new MovieController();
        $controller->list();
        break;

    case 'list_rooms':
        $controller = new RoomController();
        $controller->list();
        break;

    case 'list_screenings':
        $controller = new ScreeningController();
        $controller->list();
        break;

    default:
        echo json_encode(["error" => "Action not found"]);
        break;
}
