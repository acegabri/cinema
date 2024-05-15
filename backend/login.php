<?php

session_start();

require_once('connect.php');
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader);

$error = '';

/* 
if (isset($_SESSION['email'])) {
    header('Location: ../api.php/');
    exit();
}
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connessione al database
    $conn = mysqli_connect("mysql", "root", "root", "db_film");

    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Query senza prepared statements (non sicuro)
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        assign_sess_values($row);
        header('Location: ../backend/api.php/');
        exit();
    } else {
        header('Location: ../backend/api.php/registrazione.html.twig');
    }

    mysqli_close($conn);
    exit();
}

function assign_sess_values($row)
{
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
}

exit();
