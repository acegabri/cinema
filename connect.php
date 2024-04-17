<?php

# select * from movie where title like "%god%"

$db = "db_film";
$db_host = "localhost";
$db_user = "gabriele";
$db_password = "gugrina";
$dsn = "mysql:host=$db_host;dbname=$db";
$PDO = new PDO($dsn, $db_user, $db_password);

function get_movies($user_input)
{
    global $PDO;
    if ($user_input === null) {

        $query = 'SELECT * FROM movie';

    } else {

        $query = 'SELECT * FROM movie where title like' . '%' . $user_input . '%';

    }

    $stmt = $PDO->query($query);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function get_actors($user_input)
{
    global $PDO;
    if ($user_input === null) {

        $query = 'SELECT * FROM actor';

    } else {

        $query = 'SELECT * FROM actor where last_name like' . '%' . $user_input . '%';

    }

    $stmt = $PDO->query($query);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function get_genres($user_input)
{
    global $PDO;
    if ($user_input === null) {

        $query = 'SELECT * FROM genre';

    } else {

        $query = 'SELECT * FROM genre where name like' . '%' . $user_input . '%';

    }

    $stmt = $PDO->query($query);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function get_directors($user_input)
{
    global $PDO;
    if ($user_input === null) {

        $query = 'SELECT * FROM director';

    } else {

        $query = 'SELECT * FROM director where last_name like' . '%' . $user_input . '%';

    }

    $stmt = $PDO->query($query);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);

}
