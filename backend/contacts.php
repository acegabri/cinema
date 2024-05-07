<?php
/* Questo sarà il nostro controller */

require __DIR__ . '../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;


$loader = new FilesystemLoader('../templates');
$twig = new Environment($loader, []);
$template = $twig->load('../templates/contacts.html.twig');

// Estraggo i dati dal db e li metto in una variabile $houses
echo $template->render([
	// Array associativo:
	'menu' => [
		[ 'href'=> "index.php", "text"=>"Homepage", "active" => false ],
		[ 'href'=> "contacts.php", "text"=>"Contacts", "active" => true ],
		[ 'href'=> "api.php", "text"=>"Film", "active" => false ],
		[ 'href'=> "api.php", "text"=>"Attori", "active" => false ],
		[ 'href'=> "api.php", "text"=>"Registi", "active" => false ]
	],
]);
