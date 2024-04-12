<?php

use src\Controllers\CoursController;
use src\Controllers\HomeController;
use src\Controllers\PromoController;
use src\Controllers\UtilisateurController;

$HomeController = new HomeController;
$UtilisateurController = new UtilisateurController;
$CoursController = new CoursController;
$PromoController = new PromoController;



$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];


switch ($route) {
    case HOME_URL:
        $HomeController->affichePageAccueil();
        break;

    case HOME_URL . 'creation':
        $HomeController->affichePageCreation();
        break;

    case HOME_URL . 'connexion':
        $UtilisateurController->traiterForm();
        break;

    case HOME_URL . 'validationFormateur':
        $CoursController->genereCode();
        break;

    case HOME_URL . 'validationApprenant':
        $CoursController->verificationCodeApprenant();
        break;

    case HOME_URL . 'affichePageCreationPromo':
        $PromoController->affichePageCreationPromo();
        break;

    case HOME_URL . 'retourPageAccueilFormateur':
        $PromoController->retourPageAccueilFormateur();
        break;
    
    case HOME_URL . 'creationPromotion':
        $PromoController->creationPromotion();
        break;


    default:
        $HomeController->page404();
        break;
}
