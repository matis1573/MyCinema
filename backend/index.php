<?php
// Connexion PDO
$pdo = new PDO('mysql:host=localhost;dbname=mycinema;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Import des classes
require_once 'Movie.php';
require_once 'MovieRepository.php';
require_once 'MovieController.php';

// Récupération de l'action depuis l'URL
$request = $_GET['action'] ?? '';

switch ($request) {
    case 'list_movies':
        $controller = new MovieController();
        $controller->list();
        break;

    default:
        echo json_encode(["error" => "Action not found"]);
        break;
}
