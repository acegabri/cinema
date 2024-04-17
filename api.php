<?php
require_once("connect.php");

// Funzione per gestire le richieste di risorse
function handle_resource_request($resource)
{
    $user_input = null;

    // Determina il parametro di ricerca in base al tipo di risorsa
    switch ($resource) {
        case 'movies':
            $search_param = isset($_GET['title']) ? 'title' : (isset($_GET['synopsis']) ? 'synopsis' : (isset($_GET['duration']) ? 'duration' : (isset($_GET['released_year']) ? 'released_year' : null)));
            break;
        case 'actors':
        case 'directors':
            $search_param = isset($_GET['last_name']) ? 'last_name' : (isset($_GET['name']) ? 'name' : null);
            break;
        case 'genres':
            $search_param = isset($_GET['name']) ? 'name' : null;
            break;
        default:
            return http_response_code(404);
    }

    if ($search_param !== null) {
        $user_input = $_GET[$search_param];
    }

    // Ottieni i risultati dalla funzione appropriata
    $results = call_user_func("get_$resource", $user_input);

    // Invia la risposta
    send_response($results);
}

// Funzione per inviare la risposta JSON
function send_response($payload)
{
    http_response_code(200);
    header("Content-Type: application/json");
    echo json_encode([
        "status" => 200,
        "message" => "OK",
        "payload" => $payload
    ]);
}

// Gestione della richiesta
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_SERVER['PATH_INFO'])) {
        $resource = trim($_SERVER['PATH_INFO'], '/');
        handle_resource_request($resource);
    } else {
        http_response_code(400);
        header("Content-Type: application/json");
        echo json_encode([
            "status" => 400,
            "message" => "Bad Request",
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
