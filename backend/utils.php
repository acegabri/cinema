<?php

//session_start();
require_once('connect.php');
require_once('api.php');

function build_matrix()
{

    /*GET MOVIES*/
    $moviesQuery = 'SELECT * FROM movie';

    $moviesResult = execute_query($moviesQuery);

    while ($moviesRow = $moviesResult->fetch_assoc()) {
        $movies[] = $moviesRow;
    }

    $usersQuery = 'SELECT * FROM users';

    $usersResult = execute_query($usersQuery);

    while ($usersRow = $usersResult->fetch_assoc()) {
        $users[] = $usersRow;
    }

    $watchFilmsQuery = 'SELECT * FROM movie_user';

    $watchFilmsResult = execute_query($watchFilmsQuery);

    while ($watchFilmsRow = $watchFilmsResult->fetch_assoc()) {
        $watchFilms[] = $watchFilmsRow;
    }

    $movieIds = array_column($movies, 'id');
    $userIds = array_column($users, 'id');

    $movieIndex = array_flip($movieIds);
    $userIndex = array_flip($userIds);

    $matrix = array_fill(0, count($userIds), array_fill(0, count($movieIds), 0));

    foreach ($watchFilms as $watch) {
        $userId = $watch['user_id'];
        $movieId = $watch['movie_id'];
        $rating = isset($watch['rating']) ? $watch['rating'] : 0;

        $matrix[$userIndex[$userId]][$movieIndex[$movieId]] = $rating;
    }

    return $matrix;
}

function cosine_similarity($a, $b)
{
    $dist = 0;
    $numeratore = 0;
    $modulo_a = 0;
    $modulo_b = 0;
    $denom = 0;

    for ($i = 0; $i < $a[$i]; $i++) {
        $modulo_a = $modulo_a + pow($a[$i], 2);
        $modulo_b = $modulo_b + pow($b[$i], 2);
    }
    $modulo_a = sqrt($modulo_a);
    $modulo_b = sqrt($modulo_b);

    $denom = $modulo_a * $modulo_b;

    if ($denom == 0) {
        return null;
    } else {
        for ($i = 0; $i < $a[$i]; $i++) {
            $prodotto = $a[$i] * $b[$i];

            $numeratore = $numeratore + $prodotto;
        }

        $dist = $numeratore / $denom;
        echo $dist;

        return $dist;
    }
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