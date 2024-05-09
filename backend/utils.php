<?php

require_once("connect.php");

/**
 * La somiglianza tra i vettori A e B può essere vista come il prodotto 
 * scalare tra A e B normalizzato dividendolo per il prodotto delle due norme.
 * Il prodotto scalare in PHP può essere scritto senza cicli for:
 * $dot_product=array_sum(array_map(create_function('$a, $b', 'return $a * $b;'), $a1, $a2));
 */

//prodotto scalare
//magnitude --> lunghezza del vettore

function build_matrix($movies, $users)
{
    $matrix = null;

    //query the user_movie table

    return $movies;
}

function cosine_similarity($a, $b)
{
    $dist = null;

    //implementazione della formula

    return $dist;
}

function find_user($matrix, $user_id)
{
    $most_similar = null;

    //find the most similar user

    return $most_similar;
}

function get_moive($user_a, $user_b)
{
    $movie = null;

    //find the recommended movie

    return json_encode($movie);
}
