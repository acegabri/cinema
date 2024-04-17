<?php

require_once ("connect.php");
$user_input = $_POST['user_input'];
$user_input_endpoint = $_POST['chiave'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $endpoint = trim($user_input_endpoint, '/');
    switch ($endpoint) {
        case 'movies':
            $data = get_movies($user_input);
            break;
        case 'actors':
            $data = get_actors($user_input);
            break;
        case 'directors':
            $data = get_directors($user_input);
            break;
        case 'genres':
            $data = get_genres($user_input);
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