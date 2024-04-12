<?php

namespace src\Controllers;

use src\Models\Promo;
use src\Repositories\PromoRepository;
use src\Services\Reponse;

class PromoController
{

  use Reponse;

  public function affichePageCreationPromo()
  {
    include __DIR__ .'/../Views/formulaireCreationPromo.php'; 
  }

  public function creationPromotion(){
    $json_data = file_get_contents('php://input');

    if (!empty($json_data)) {
      $data = json_decode($json_data, true);
      if ($data !== null) {
      $nomPromotion = $data['nomPromotion'];
      $dateDebutPromo = $data['dateDebutPromo'];
      $dateFinPromo = $data['dateFinPromo'];
      $placesDisposPromo = $data['placesDisposPromo'];
    
    $nvPromo = new Promo(null, $nomPromotion,$dateDebutPromo, $dateFinPromo, $placesDisposPromo);
    $promoRepo = new PromoRepository;
    $promoRepo->CreerPromo($nvPromo);

    // include __DIR__ .'/../Views/accueilFormateur.php'; 
    
      }
    }
  }

  public function retourPageAccueilFormateur()
  {
    // $promoRepo = new PromoRepository;
    // $promos = $promoRepo->getAllPromos();

    // include __DIR__ .'/../Views/accueilFormateur.php';
  }

  }
