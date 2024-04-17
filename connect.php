<?php
function execute_query($table, $user_input, $search_field)
{
    $results = array();

    $mysqli = new mysqli("mysql", "root", "root", "db_film");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $query = "SELECT * FROM $table";
    if ($user_input !== NULL) {
        switch ($search_field) {
            case 'title':
            case 'released_year':
                $query .= " WHERE $search_field LIKE '%$user_input%'";
                break;
            default:
                break;
        }
    }

    $result = $mysqli->query($query);

    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    $mysqli->close();

    return $results;
}

function get_movies($user_input)
{
    return execute_query("movie", $user_input, isset($_GET['title']) ? 'title' : (isset($_GET['released_year']) ? 'released_year' : null));
}

function get_actors($user_input)
{
    return execute_query("actor", $user_input, isset($_GET['last_name']) ? 'last_name' : (isset($_GET['name']) ? 'name' : null));
}

function get_directors($user_input)
{
    return execute_query("director", $user_input, isset($_GET['last_name']) ? 'last_name' : (isset($_GET['name']) ? 'name' : null));
}

function get_genres($user_input)
{
    return execute_query("genre", $user_input, isset($_GET['name']) ? 'name' : null);
}
