<?php

//session_start();

require_once('connect.php');
require_once('api.php');

function build_matrix()
{
    $query = "SELECT * FROM users";
    $users = execute_query($query);

    $query = "SELECT * FROM movie";
    $movies = execute_query($query);

    $matrix = array();

    foreach ($users as $user) {
        $user_id = $user['id'];
        $matrix[$user_id] = array();
        foreach ($movies as $movie) {
            $movie_id = $movie['id'];

            $query = "SELECT rating FROM movie_user WHERE user_id = $user_id AND movie_id = $movie_id";
            $query_result = execute_query($query);

            if ($query_result->num_rows > 0) {
                $rating = $query_result->fetch_assoc()['rating'];
            } else {
                $rating = null;
            }

            $matrix[$user_id][$movie_id] = $rating;
        }
    }

    return $matrix;

}

function cosine_similarity($a, $b) // anche detta distanza
{
    $dot_product = 0;
    $denominatore1 = 0;
    $denominatore2 = 0;

    foreach ($a as $key => $value) {
        $dot_product += $value * $b[$key];
        $denominatore1 += $value * $value;
        $denominatore2 += $b[$key] * $b[$key];
    }

    $denominatore1 = sqrt($denominatore1);
    $denominatore2 = sqrt($denominatore2);

    if ($denominatore1 != 0 && $denominatore2 != 0) {
        $similarity = $dot_product / ($denominatore1 * $denominatore2);
    } else {
        $similarity = -10;
    }

    return $similarity;
}

function find_user($matrix, $user_id)
{
    $most_similar_user = null;
    $highest_similarity = -1;

    // Trovare l'utente più simile basato sulla similarità coseno
    foreach ($matrix as $other_user_id => $ratings) {
        if ($other_user_id != $user_id) {
            $similarity = cosine_similarity($matrix[$user_id], $ratings);
            if ($similarity > $highest_similarity) {
                $most_similar_user = $other_user_id;
                $highest_similarity = $similarity;
            }
        }
    }

    return $most_similar_user;
}

function get_movie($user_a, $user_b)
{
    $recommended_movie = null;

    // Trovare il film raccomandato basato sulla differenza di rating tra due utenti
    // Esempio: trovare un film che piace a $user_b ma non a $user_a
    // Potresti implementare la logica per trovare il film raccomandato qui
    // Restituisci il film raccomandato come oggetto JSON
    return json_encode($recommended_movie);
}


// Esempio di utilizzo delle funzioni sopra definite
/*$movies = array();
$users = array();
$matrix = build_matrix($movies, $users);

// Trovare l'utente più simile
$user_id = 1; // ID dell'utente di cui si desidera trovare il simile
$most_similar_user = find_user($matrix, $user_id);

// Ottenere il film raccomandato per l'utente corrente e il suo simile
$recommended_movie = get_movie($matrix[$user_id], $matrix[$most_similar_user]);

echo $recommended_movie; // Output del film raccomandato come JSON
*/