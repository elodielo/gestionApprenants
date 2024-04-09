<?php

use src\Controllers\HomeController;
use src\Controllers\UtilisateurController;

$HomeController = new HomeController;
$UtilisateurController = new UtilisateurController;



$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];


switch($route) {
    case HOME_URL: 
    $HomeController->affichePageAccueil();
    break;

    case HOME_URL.'creation':
    $HomeController->affichePageCreation();
    break;
    
    case HOME_URL.'connexion':
        $UtilisateurController->traiterForm();
    break;

    default:
    $HomeController->page404();
    break;
}
