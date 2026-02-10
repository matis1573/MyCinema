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

switch ($request) {

    /* ================= MOVIES ================= */

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


    /* ================= ROOMS ================= */

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


    /* ================= SCREENINGS ================= */

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
