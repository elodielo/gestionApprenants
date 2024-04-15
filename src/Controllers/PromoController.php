<?php

namespace src\Controllers;

use DateTime;
use DateTimeZone;
use src\Models\Promo;
use src\Repositories\CoursRepository;
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
    $dateActuelle = new DateTime('now', new DateTimeZone('UTC'));
    $dateActuelle->setTimezone(new DateTimeZone('Europe/Paris'));
    $dateActuelleFormatee = $dateActuelle->format('Y-m-d');
    $heureFormatee = $dateActuelle->format('H:i:s');
    $promoRepo = new PromoRepository;
    $coursRepo = new CoursRepository;
    $cours = $coursRepo->getAllCours();
    foreach ($cours as $cour) {
      if ($cour->dateJour == $dateActuelleFormatee) {
        if ($cour->heureDebut < $heureFormatee && $heureFormatee < $cour->heureFin) {
          $courAct = $cour;}}}
     $promo = $promoRepo->getPromoByIdCours($courAct->id);
     $promos = $promoRepo->getAllPromos();
     $codeCours = $courAct->codeCours;

     include_once __DIR__ . '/../Views/Includes/header.php';
     include __DIR__ .'/../Views/formateurAvecCode.php'; 
  }

  public function afficherPromoChoisie()
  {
    $json_data = file_get_contents('php://input');

    if (!empty($json_data)) {
      $data = json_decode($json_data, true);
      if ($data !== null) {
        $promoRepo = new PromoRepository;
        $idDeLaPromoAAfficher = $data['idDeLaPromoAAfficher'];
        $promo = $promoRepo->getPromoById($idDeLaPromoAAfficher);
        $apprenants = $promoRepo->getAllApprenantsByIdPromo($idDeLaPromoAAfficher);  
        include __DIR__ .'/../Views/tableauApprenants.php'; 

      }}
  }

  public function supprimerPromoChoisie()
  {
    $json_data = file_get_contents('php://input');

    if (!empty($json_data)) {
      $data = json_decode($json_data, true);
      if ($data !== null) {
        $promoRepo = new PromoRepository;
        $idDeLaPromoASupprimer = $data['idDeLaPromoASupprimer'];
        $promoRepo->supprimePromoById($idDeLaPromoASupprimer);
      }
  }

  }
}