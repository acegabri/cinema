<?php

$db = "db_film";
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$conn = mysqli_connect($db_host, $db_user, $db_password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {

    
    function get_movies()
    {
        $movies = array();
        global $conn;
        global $db;
        mysqli_select_db($conn, $db);
        $query = 'select * from movie';
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo $row['title'];
            $movies[] = $row;
        }
        return $movies;
    }

    function get_actors()
    {
        $actors = array();
        global $conn;
        global $db;
        mysqli_select_db($conn, $db);
        $query = 'select * from movie';
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo $row['title'];
            $actors[] = $row;
        }
        return $actors;
    }

    function get_genres()
    {
        $genres = array();
        global $conn;
        global $db;
        mysqli_select_db($conn, $db);
        $query = 'select * from movie';
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo $row['title'];
            $genres[] = $row;
        }
        return $genres;
    }

    function get_directors()
    {
        $directors = array();
        global $conn;
        global $db;
        mysqli_select_db($conn, $db);
        $query = 'select * from movie';
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo $row['title'];
            $directors[] = $row;
        }
        return $directors;
    }
}

$conn->close();
