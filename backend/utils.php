<?php

session_start();

require_once('connect.php');
require_once('api.php');

function build_matrix($movies, $users)
{
    $matrix = array();

    // Creare una matrice che rappresenta le valutazioni dei film da parte degli utenti
    foreach ($users as $user) {

        $user_id = $user['id'];
        $matrix[$user_id] = array();
        foreach ($movies as $movie) {
            $movie_id = $movie['id'];
            // Query per ottenere la valutazione dell'utente per il film dal database
            // Assumendo una tabella user_movie con campi user_id, movie_id e rating
            // Qui dovresti implementare la query per ottenere il rating dell'utente per il film
            $rating = null;
            $matrix[$user_id][$movie_id] = $rating;
        }
    }

    return $matrix;
}

function cosine_similarity($a, $b)
{
    $dot_product = 0; //prodotto scalare
    $magnitude1 = 0; //lungezza del vettore
    $magnitude2 = 0;

    // Calcolare il prodotto scalare e le magnitudini dei vettori
    foreach ($a as $key => $value) {
        $dot_product += $value * $b[$key];
        $magnitude1 += $value * $value;
        $magnitude2 += $b[$key] * $b[$key];
    }

    // Calcolare le magnitudini dei vettori
    $magnitude1 = sqrt($magnitude1);
    $magnitude2 = sqrt($magnitude2);

    // Calcolare la similarità coseno
    if ($magnitude1 != 0 && $magnitude2 != 0) {
        $similarity = $dot_product / ($magnitude1 * $magnitude2);
    } else {
        $similarity = 0;
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


// Ottenere la matrice delle valutazioni degli utenti per i film
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