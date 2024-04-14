<?php

require_once("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $endpoint = trim($_SERVER['PATH_INFO'], '/');
    switch ($endpoint) {
        case 'movies':
            $data = get_movies();
            break;
        case 'actors':
            $data = get_actors();
            break;
        case 'directors':
            $data = get_directors();
            break;
        case 'genres':
            $data = get_genres();
            break;
        default:
            http_response_code(404);
            $data = [
                "status" => "404",
                "message" => "Endpoint not found",
                "payload" => []
            ];
            break;
    }

    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    http_response_code(405);
    header("Content-Type: application/json");
    echo json_encode(
        [
            "status" => "405",
            "message" => "Method Not Allowed",
            "payload" => []
        ]
    );
}

exit;
