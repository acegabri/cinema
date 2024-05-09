<?php

session_start();

require_once('connect.php');
require_once '../vendor/autoload.php'; // Carica l'autoloader di Twig
$loader = new \Twig\Loader\FilesystemLoader('../templates'); // Imposta il percorso della cartella dei template
$twig = new \Twig\Environment($loader); // Inizializza l'ambiente Twig

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];

$query = "SELECT id FROM users WHERE password = ?";

// Connessione al database
$mysqli = new mysqli("mysql", "root", "root", "db_film");

$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    $_SESSION['id'] = $result;

    header('Location: ../index.html');
} else {
    echo "errore in fase di accesso";
}

exit();
