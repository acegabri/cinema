<?php
require_once("connect.php");
require_once("../vendor/autoload.php"); // Includi l'autoloader di Composer

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Inizializza l'ambiente Twig
$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

$pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
if (empty($pathInfo)) {
    $pathInfo = isset($_SERVER['REQUEST_URI']) ? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) : '';
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($pathInfo == '/movies') {

        if (isset($_GET['title'])) {
            $user_input = $_GET['title'];
            $filter = 'title';
        } else if (isset($_GET['synopsis'])) {
            $user_input = $_GET['synopsis'];
            $filter = 'synopsis';
        } else if (isset($_GET['duration'])) {
            $user_input = $_GET['duration'];
            $filter = 'duration';
        } else if (isset($_GET['released_year'])) {
            $user_input = $_GET['released_year'];
            $filter = 'released_year';
        } else {
            $user_input = NULL;
            $filter = NULL;
        }

        $movies = get_movies($user_input, $filter);
        echo $twig->render('movies.html.twig', ['movies' => $movies]);

        /*http_response_code(200);
        header("Content-Type: application/json");
        echo json_encode([
            "status" => 200,
            "message" => "OK",
            "payload" => $movies
        ]);*/
    } else if ($pathInfo == '/actors') {


        if (isset($_GET['last_name'])) {
            $user_input = $_GET['last_name'];
            $filter = 'last_name';
        } else if (isset($_GET['name'])) {
            $user_input = $_GET['name'];
            $filter = 'name';
        } else {
            $user_input = NULL;
            $filter = 'NULL';
        }


        $actors = get_actors($user_input, $filter);
        echo $twig->render('actors.twig', ['actors' => $actors]);

        http_response_code(200);
        header("Content-Type: application/json");
        echo json_encode([
            "status" => 200,
            "message" => "OK",
            "payload" => $actors
        ]);
    } else if ($pathInfo == '/directors') {


        if (isset($_GET['last_name'])) {
            $user_input = $_GET['last_name'];
            $filter = 'last_name';
        } else if (isset($_GET['name'])) {
            $user_input = $_GET['name'];
            $filter = 'name';
        } else {
            $user_input = NULL;
            $filter = 'NULL';
        }


        $directors = get_directors($user_input, $filter);
        echo $twig->render('directors.twig', ['directors' => $directors]);

        http_response_code(200);
        header("Content-Type: application/json");
        echo json_encode([
            "status" => 200,
            "message" => "OK",
            "payload" => $directors
        ]);
    } else if ($pathInfo == '/genres') {


        if (isset($_GET['name'])) {
            $user_input = $_GET['name'];
            $filter = 'name';
        } else {
            $user_input = NULL;
            $filter = 'NULL';
        }

        $genres = get_genres($user_input, $filter);
        echo $twig->render('genres.twig', ['genres' => $genres]);

        http_response_code(200);
        header("Content-Type: application/json");
        echo json_encode([
            "status" => 200,
            "message" => "OK",
            "payload" => $genres
        ]);
    } else if ($pathInfo == '/') {
        http_response_code(404);
        header("Content-Type: application/json");
        echo json_encode([
            "status" => 404,
            "message" => "Resource not found",
            "payload" => []
        ]);
    }
} else {

    http_response_code(405);
    header("Content-Type: application/json");
    echo json_encode([
        "status" => 405,
        "message" => "Method not allowed",
        "payload" => []
    ]);
}

exit;
