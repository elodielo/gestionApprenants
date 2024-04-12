<?php

namespace src\Controllers;


use src\Services\Reponse;

class PromoController
{

  use Reponse;

  public function affichePageCreationPromo()
  {
    include __DIR__ .'/../Views/formulaireCreationPromo.php'; 
  }

  }
