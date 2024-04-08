<?php

use src\Controllers\HomeController;

$HomeController = new HomeController;



$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];


switch($route) {
    case HOME_URL: 
    $HomeController->affichePageAccueil();
    break;

    default:
    $HomeController->page404();
    break;
}
