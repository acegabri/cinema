<?php
function get_movies($user_input, $filter)
{
    $movies = array();

    $mysqli = new mysqli("mysql", "root", "root", "db_film");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    if ($user_input !== NULL) {
        if ($filter === 'title') {
            $query = 'SELECT * FROM movie WHERE title LIKE "%' . $user_input . '%"';
        } else if ($filter === 'released_year') {
            $query = 'SELECT * FROM movie WHERE released_year LIKE "%' . $user_input . '%"';
        }
    } else if ($user_input === NULL) {
        $query = 'SELECT * FROM movie';
    }

    $result = $mysqli->query($query);

    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;

        $last_movie = $movies[count($movies) - 1];
        $movie_id = $last_movie['id'];
        $actors_sql = "select actor.id actor.name, actor.last_name from actor join movie_actor on actor.id = movie_actor.actor_id where movie_actor.movie_id = $movie_id";
        $actors_result = $mysqli->query($actors_sql);

        if (!$actors_result) {
            die("error retrieving actors ". $mysqli->error);
        }

        while ($actorRow = mysqli_fetch_assoc($actors_result)) {
            $movies[count($movies) - 1]['actors'][] = [

                "id" => $actorRow['id'],
                "first_name" => $actorRow['name'],
                "last_name" => $actorRow['last_name'],

            ];
        }
    }


    $mysqli->close();

    return $movies;
}


function get_actors($user_input, $filter)
{  //FUNZIONA
    $actors = array();

    $mysqli = new mysqli("mysql", "root", "root", "db_film");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    if ($user_input !== NULL) {
        if ($filter === 'last_name') {
            $query = 'SELECT * FROM actor WHERE last_name LIKE "%' . $user_input . '%"';
        } else if ( $filter === 'name') {
            $query = 'SELECT * FROM actor WHERE name LIKE "%' . $user_input . '%"';
        }
    } else if ($user_input === NULL) {
        $query = 'SELECT * FROM actor';
    }

    $result = $mysqli->query($query);

    while ($row = $result->fetch_assoc()) {
        $actors[] = $row;
    }


    $mysqli->close();

    return $actors;
}


function get_directors($user_input, $filter)
{  
    $directors = array();

    $mysqli = new mysqli("mysql", "root", "root", "db_film");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }


    if ($user_input !== NULL) {
        if ($filter === 'last_name') {
            $query = 'SELECT * FROM director WHERE last_name LIKE "%' . $user_input . '%"';
        } else if ($filter === 'name') {
            $query = 'SELECT * FROM director WHERE name LIKE "%' . $user_input . '%"';
        }
    } else if ($user_input === NULL) {
        $query = 'SELECT * FROM director';
    }

    $result = $mysqli->query($query);

    while ($row = $result->fetch_assoc()) {
        $directors[] = $row;
    }


    $mysqli->close();

    return $directors;
}


function get_genres($user_input, $filter)
{
    $genres = array();

    $mysqli = new mysqli("mysql", "root", "root", "db_film");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    if ($user_input !== NULL) {
        if ($filter === 'name') {
            $query = 'SELECT * FROM genre WHERE name LIKE "%' . $user_input . '%"';
        }
    } else if ($user_input === NULL) {
        $query = 'SELECT * FROM genre';
    }

    $result = $mysqli->query($query);

    while ($row = $result->fetch_assoc()) {
        $genres[] = $row;
    }


    $mysqli->close();

    return $genres;
}
