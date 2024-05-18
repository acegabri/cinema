<?php

// session_start();
require_once('connect.php');
require_once('api.php');

function recommend_film($matrix, $user_id, $most_similar_user)
{
    $user_rating = $matrix[$user_id]['rating'];
    $similar_user_rating = $matrix[$most_similar_user]['rating'];

    foreach ($similar_user_rating as $movie_id => $rating) {
        if (!isset($user_rating[$movie_id]) && $rating >= 4) {
            return $movie_id;
        }
    }

    return null;
}

function build_matrix()
{
    $matrix = array();

    // Ottieni tutti gli utenti
    $query = "SELECT id, first_name, last_name FROM users";
    $result_users = execute_query($query);

    // Ottieni tutti i film
    $query = "SELECT id, title FROM movie";
    $result_movies = execute_query($query);

    // Crea una mappa per film
    $movies = array();
    while ($movie = mysqli_fetch_assoc($result_movies)) {
        $movies[$movie['id']] = $movie['title'];
    }

    // Popola la matrice con utenti e rating
    while ($user = mysqli_fetch_assoc($result_users)) {
        $user_id = $user['id'];
        $matrix[$user_id] = array('name' => $user['first_name'] . ' ' . $user['last_name'], 'rating' => array());

        foreach ($movies as $movie_id => $title) {
            $query = "SELECT rating FROM movie_user WHERE user_id = $user_id AND movie_id = $movie_id";
            $result_rating = execute_query($query);
            $rating = mysqli_fetch_assoc($result_rating);

            if ($rating) {
                $matrix[$user_id]['rating'][$movie_id] = $rating['rating'];
            } else {
                $matrix[$user_id]['rating'][$movie_id] = null;
            }
        }
    }

    return $matrix;
}


function find_most_similar_user($matrix, $user_id)
{
    $most_similar_user = null;
    $highest_similarity = -1;

    foreach ($matrix as $other_user_id => $user_data) {
        if ($other_user_id != $user_id) {
            $similarity = cosine_similarity($matrix[$user_id]['rating'], $matrix[$other_user_id]['rating']);
            if ($similarity > $highest_similarity) {
                $highest_similarity = $similarity;
                $most_similar_user = $other_user_id;
            }
        }
    }

    return $most_similar_user;
}

function cosine_similarity($rating_a, $rating_b)
{
    $dot_product = 0;
    $magnitude_a = 0;
    $magnitude_b = 0;

    foreach ($rating_a as $movie_id => $rating_a) {
        if (isset($rating_b[$movie_id])) {
            $rating_b = $rating_b[$movie_id];
            $dot_product += $rating_a * $rating_b;
            $magnitude_a += $rating_a ** 2;
            $magnitude_b += $rating_b ** 2;
        }
    }

    $magnitude_a = sqrt($magnitude_a);
    $magnitude_b = sqrt($magnitude_b);

    if ($magnitude_a * $magnitude_b == 0) {
        return 0;
    }

    return $dot_product / ($magnitude_a * $magnitude_b);
}
