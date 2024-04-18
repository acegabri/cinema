<?php
require_once("connect.php");

function execute_query($query)
{
    $mysqli = new mysqli("mysql", "root", "root", "db_film");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $result = $mysqli->query($query);

    if (!$result) {
        die("Error executing query: " . $mysqli->error);
    }

    $mysqli->close();

    return $result;
}

function fetch_movies_with_actors($query)
{
    $movies = array();
    $result = execute_query($query);

    while ($row = $result->fetch_assoc()) {
        $movie_id = $row['id'];
        $actors_query = "SELECT actor.id, actor.first_name, actor.last_name FROM actor JOIN movie_actor ON actor.id = movie_actor.actor_id WHERE movie_actor.movie_id = $movie_id";
        $actors_result = execute_query($actors_query);

        $actors = array();
        while ($actorRow = $actors_result->fetch_assoc()) {
            $actors[] = [
                "id" => $actorRow['id'],
                "first_name" => $actorRow['first_name'],
                "last_name" => $actorRow['last_name'],
            ];
        }

        $row['actors'] = $actors;
        $movies[] = $row;
    }

    return $movies;
}

function get_movies($user_input, $filter)
{
    $query = 'SELECT * FROM movie';
    if ($user_input !== NULL) {
        $query .= ' WHERE ' . $filter . ' LIKE "%' . $user_input . '%"';
    }

    return fetch_movies_with_actors($query);
}

function fetch_actors_with_movies($query)
{
    $actors = array();
    $result = execute_query($query);

    while ($row = $result->fetch_assoc()) {
        $actor_id = $row['id'];
        $movies_query = "SELECT movie.id, movie.title, movie.synopsis, movie.duration, movie.released_year FROM movie JOIN movie_actor ON movie.id = movie_actor.movie_id WHERE movie_actor.actor_id = $actor_id";
        $movies_result = execute_query($movies_query);

        $movies = array();
        while ($moviesRow = $movies_result->fetch_assoc()) {
            $movies[] = [
                "id" => $moviesRow['id'],
                "synopsis" => $moviesRow['synopsis'],
                "title" => $moviesRow['title'],
                "duration" => $moviesRow['duration'],
                "released_year" => $moviesRow['released_year'],
            ];
        }

        $row['movies'] = $movies;
        $actors[] = $row;
    }

    return $actors;
}

function get_actors($user_input, $filter)
{
    $query = 'SELECT * FROM actor';
    if ($user_input !== NULL) {
        $query .= ' WHERE ' . $filter . ' LIKE "%' . $user_input . '%"';
    }

    return fetch_actors_with_movies($query);
}

function fetch_directors_with_movies($query)
{
    $directors = array();
    $result = execute_query($query);

    while ($row = $result->fetch_assoc()) {
        $director_id = $row['id'];
        $movies_query = "SELECT movie.id, movie.title, movie.synopsis, movie.duration, movie.released_year FROM movie JOIN movie_director ON movie.id = movie_director.movie_id WHERE movie_director.director_id = $director_id";
        $movies_result = execute_query($movies_query);

        $movies = array();
        while ($moviesRow = $movies_result->fetch_assoc()) {
            $movies[] = [
                "id" => $moviesRow['id'],
                "synopsis" => $moviesRow['synopsis'],
                "title" => $moviesRow['title'],
                "duration" => $moviesRow['duration'],
                "released_year" => $moviesRow['released_year'],
            ];
        }

        $row['movies'] = $movies;
        $directors[] = $row;
    }

    return $directors;
}

function get_directors($user_input, $filter)
{
    $query = 'SELECT * FROM director';
    if ($user_input !== NULL) {
        $query .= ' WHERE ' . $filter . ' LIKE "%' . $user_input . '%"';
    }

    return fetch_directors_with_movies($query);
}

function get_genres($user_input, $filter)
{
    $query = 'SELECT * FROM genre';
    if ($user_input !== NULL) {
        $query .= ' WHERE ' . $filter . ' LIKE "%' . $user_input . '%"';
    }

    return execute_query($query)->fetch_all(MYSQLI_ASSOC);
}
