<?php
header('Content-Type: application/json; charset=utf-8');

require_once 'config/database.php';

require_once 'models/Movie.php';
require_once 'repositories/MovieRepository.php';
require_once 'controllers/MovieController.php';

require_once 'models/Room.php';
require_once 'repositories/RoomRepository.php';
require_once 'controllers/RoomController.php';

require_once 'models/Screening.php';
require_once 'repositories/ScreeningRepository.php';
require_once 'services/ScreeningService.php';
require_once 'controllers/ScreeningController.php';

$request = $_GET['action'] ?? '';

switch ($request) {


    case 'list_movies':
        (new MovieController())->list();
        break;

    case 'add_movie':
        (new MovieController())->add();
        echo json_encode(["success" => true]);
        break;

    case 'update_movie':
        (new MovieController())->update();
        echo json_encode(["success" => true]);
        break;

    case 'delete_movie':
        (new MovieController())->delete();
        echo json_encode(["success" => true]);
        break;



    case 'list_rooms':
        (new RoomController())->list();
        break;

    case 'add_room':
        (new RoomController())->add();
        echo json_encode(["success" => true]);
        break;

    case 'update_room':
        (new RoomController())->update();
        echo json_encode(["success" => true]);
        break;

    case 'delete_room':
        (new RoomController())->delete();
        echo json_encode(["success" => true]);
        break;



    case 'list_screenings':
        (new ScreeningController())->list();
        break;

    case 'add_screening':
        (new ScreeningController())->add();
        echo json_encode(["success" => true]);
        break;

    case 'update_screening':
        (new ScreeningController())->update();
        echo json_encode(["success" => true]);
        break;

    case 'delete_screening':
        (new ScreeningController())->delete();
        echo json_encode(["success" => true]);
        break;


    default:
        echo json_encode(["error" => "Action not found"]);
        break;
}
