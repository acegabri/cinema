<?php

session_start();

require_once('connect.php');
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../templates'); 
$twig = new \Twig\Environment($loader);

if (isset($_SESSION['email'])) {
    header('Location: ../templates/index.html.twig');
} else {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $conn = mysqli_connect("mysql", "root", "root", "db_film");

        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        $query = "SELECT * FROM users WHERE email like '$email' AND password like  '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo $row;
            assign_sess_values($row);
            header('Location: ../templates/index.html.twig');
        } else {
            echo "email or password incorrect!";
        }
    }
}

function assign_sess_values($row)
{
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
}

exit();
