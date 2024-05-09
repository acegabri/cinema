<?php

session_start();

require_once('connect.php');
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "INSERT into users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

$result = execute_query($query);

$idquery = 'SELECT id from users where first_name like ' . $first_name . ' and password like ' . $password;
$resultidquery = execute_query($idquery);

if ($result) {
    
    $_SESSION['id'] = $resultidquery;
    header('Location: ../index.html');
} else {
    echo "errore in fase di registrazione";
}

exit();