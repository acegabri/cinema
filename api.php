<?php

require_once("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($_SERVER['PATH_INFO'] === 'movies') {

        $movies = get_movies();
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode(
            [
                "status" => "200",
                "message" => "OK",
                "payload" => $movies
            ]
        );
    } elseif ($_SERVER['PATH_INFO'] === 'actors') {
        $actors = get_actors();
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode(
            [
                "status" => "200",
                "message" => "OK",
                "payload" => $actors
            ]
        );
    } elseif ($_SERVER['PATH_INFO'] === 'directors') {
        $directors = get_directors();
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode(
            [
                "status" => "200",
                "message" => "OK",
                "payload" => $directors
            ]
        );
    } elseif ($_SERVER['PATH_INFO'] === 'genres') {
        $genres = get_genres();
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode(
            [
                "status" => "200",
                "message" => "OK",
                "payload" => $genres
            ]
        );
    } else {

        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode(
            [
                "status" => "200",
                "message" => "Request ok, but no endpoint specified",
                "payload" => []
            ]
        );
    }
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
