<?php
$db = "db_film";
$db_host = "localhost";
$db_user = "gabriele";
$db_password = "gugrina";
$dsn = "mysql:host=$db_host;dbname=$db";
$PDO = new PDO($dsn, $db_user, $db_password);

function get_movies()
{
    global $PDO;
    $query = 'SELECT * FROM movie';
    $stmt = $PDO->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_actors()
{
    global $PDO;
    $query = 'SELECT DISTINCT actor FROM movie';
    $stmt = $PDO->query($query);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function get_genres()
{
    global $PDO;
    $query = 'SELECT DISTINCT genre FROM movie';
    $stmt = $PDO->query($query);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function get_directors()
{
    global $PDO;
    $query = 'SELECT DISTINCT director FROM movie';
    $stmt = $PDO->query($query);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

