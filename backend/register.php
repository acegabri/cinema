<?php

session_start();

require_once('connect.php');
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader);

$conn = mysqli_connect("mysql", "root", "root", "db_film");

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION['email'] = $email;

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        header('Location: ../templates/index.html.twig');
        exit();
    }

    $query = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "User created successfully!";
        echo "<a href='../templates/index.html.twig'>home page</a>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        exit();
    }
} else {
    header('Location: ../templates/accesso.html.twig');
}
exit();
