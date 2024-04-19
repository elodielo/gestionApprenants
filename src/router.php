<?php

use src\Controllers\CoursController;
use src\Controllers\HomeController;
use src\Controllers\PromoController;
use src\Controllers\UtilisateurController;
use src\Models\Database;

$HomeController = new HomeController;
$UtilisateurController = new UtilisateurController;
$CoursController = new CoursController;
$PromoController = new PromoController;
$DB = new Database;


$route = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];


switch ($route) {
    case HOME_URL:
        $HomeController->affichePageAccueil();
        break;

    case HOME_URL . 'creation':
        $HomeController->affichePageCreation();
        break;

        case HOME_URL . 'creationCours':
            $HomeController->affichePageCreationCours();
            break;
    
    case HOME_URL . 'sauverCours':
        $CoursController->entrerCoursEnBDD();
        break;

    case HOME_URL . 'connexion':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $UtilisateurController->traiterForm();}
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
        $PromoController->retourPageAccueilFormateur();
        break;

    case HOME_URL . 'afficherPromoChoisie':
        $PromoController->afficherPromoChoisie();
        break;

    case HOME_URL . 'supprimerPromoChoisie':
        $PromoController->supprimerPromoChoisie();
        $PromoController->retourPageAccueilFormateur();
        break;

    case HOME_URL . 'supprimerApprenantChoisi':
        $UtilisateurController->supprimeApprenant();
        $PromoController->retourPageAccueilFormateur();
        break;

    case HOME_URL . 'afficheFormulaireCreationApprenant':
        $UtilisateurController->afficheFormulaireCreationApprenant();
        break;

    case HOME_URL . 'sauvegarderApprenant':
        $UtilisateurController->sauvegarderApprenant();
        $PromoController->retourPageAccueilFormateur();
        break;

    case HOME_URL. 'database':
        $DB->initialiserBDD();
        break;
    
    
    case HOME_URL. 'deconnexion':
      $HomeController->deconnexion();
      break;
    
    case HOME_URL . 'creationmdp':
        $HomeController->affichePageCreationMDP();
        break;
    
       case HOME_URL . 'creerMDP':
        $UtilisateurController->creerMDP();
        break;   

    default:
        $HomeController->page404();
        break;
}
