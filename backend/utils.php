<?php

//session_start();

require_once('connect.php');
require_once('api.php');

function build_matrix()
{
    // Ottieni tutti gli utenti
    $query = "SELECT id, first_name, last_name FROM users";
    $users_result = execute_query($query);
    $users = [];
    while ($user = $users_result->fetch_assoc()) {
        $users[] = $user;
    }

    // Ottieni tutti i film
    $query = "SELECT id, title FROM movie";
    $movies_result = execute_query($query);
    $movies = [];
    while ($movie = $movies_result->fetch_assoc()) {
        $movies[] = $movie;
    }

    // Inizializza la matrice
    $matrix = [];

    // Prima riga: prima cella vuota seguita dai nomi dei film
    $header = [''];
    foreach ($movies as $movie) {
        $header[] = $movie['title'];
    }
    $matrix[] = $header;

    // Costruisci la matrice con i nomi degli utenti e i rating
    foreach ($users as $user) {
        $user_row = [$user['first_name'] . ' ' . $user['last_name']];
        foreach ($movies as $movie) {
            $user_id = $user['id'];
            $movie_id = $movie['id'];

            // Ottieni il rating
            $query = "SELECT rating FROM movie_user WHERE user_id = $user_id AND movie_id = $movie_id";
            $rating_result = execute_query($query);
            if ($rating_result->num_rows > 0) {
                $rating = $rating_result->fetch_assoc()['rating'];
            } else {
                $rating = '';
            }

            $user_row[] = $rating;
        }
        $matrix[] = $user_row;
    }

    return $matrix;
}

function cosine_similarity($a, $b)
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