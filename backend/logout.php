<?php
session_start();
session_unset(); 
session_destroy(); 

header('Location: ../templates/accesso.html.twig');
exit();
