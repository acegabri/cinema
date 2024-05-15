<?php
session_start();
session_unset(); 
session_destroy(); 

header('Location: ../backend/api.php/accesso.html.twig');
exit();
