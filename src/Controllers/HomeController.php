<?php

namespace src\Controllers;

use src\Repositories\ClientRepository;
use src\Repositories\ReservationRepository;
use src\Services\Reponse;

class HomeController
{

  use Reponse;


  public function affichePageAccueil()
  {
    $this->render("accueil");
    exit();
  }

  public function affichePageCreation()
  {
    $this->render("formulaireCreationPromo");
    exit();
  }

  public function affichePageCreationCours()
  {
    $this->render("formulaireCreationCours");
    exit();
  }


  public function affichePageCreationMDP()
  {
    $this->render("creationMdp");
    exit();
  }

  public function deconnexion()
  {
    session_destroy();
    header('location:' . HOME_URL);
    die();
  }


  public function page404(): void
  {
    header("HTTP/1.1 404 Not Found");
    $this->render('404');
  }
}
