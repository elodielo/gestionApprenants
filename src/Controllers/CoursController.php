<?php

namespace src\Controllers;

use DateTime;
use DateTimeZone;
use src\Models\Utilisateur;
use src\Repositories\CoursRepository;
use src\Repositories\PromoRepository;
use src\Repositories\UtilisateurRepository;
use src\Services\Reponse;

class CoursController
{

  use Reponse;

  public function genereCode()

  {
    $json_data = file_get_contents('php://input');

    if (!empty($json_data)) {
      $data = json_decode($json_data, true);
      if ($data !== null) {
        $IdCours = $data['IdCours'];

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
                  $courAct = $cour;
                  if($cour->codeCours !== null){
                    $codeCours = $cour->codeCours;
                    
                  } else{
                    $coursRepo->definitCodeAleatoire($cour->id);
                    $coursRepo->getCodeCoursById($cour->id);
                  }
                } else {
                  // echo ('pas de cours à cette heure') ;
                }
              } else {
                // echo ('Pas de cours à cette date');
              }
            }
          }
        }
        
        $promo = $promoRepo->getPromoByIdCours($courAct->id);
        
        // AFFICHE 
  include_once __DIR__ . '/../Views/Includes/header.php';
  ?>

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Promotion</a>
      </li>
    </ul>


    <h2> Cours du jour</h2>

    <div class="d-flex justify-content-between bg-light position-absolute top-50 start-50 translate-middle w-75 p-3">
      <div>
        <h3> <?php echo $promo->nomPromo ?></h3>
        <p> <?php echo $promo->placesDispos ?> attendus</p>
      </div>
      <div>
        <p><?php echo $courAct->dateJour ?></p>
        <button id="validerPresenceFormateur" data-id="<?php echo $courAct->id ?>" type="button" class="btn btn-primary"><?php echo $codeCours ?></button>
      </div>
      
    </div>


<?php }

  public function verificationCodeApprenant()
  {
    $json_data = file_get_contents('php://input');

    if (!empty($json_data)) {
      $data = json_decode($json_data, true);
      if ($data !== null) {
        $codeTransmis = $data['inputCode'];

        $coursRepo = new CoursRepository;
        $cours = $coursRepo->getAllCours();
        $dateActuelle = new DateTime('now', new DateTimeZone('UTC'));
        $dateActuelle->setTimezone(new DateTimeZone('Europe/Paris'));
        $dateActuelleFormatee = $dateActuelle->format('Y-m-d');
        $heureFormatee = $dateActuelle->format('H:i:s');
        foreach ($cours as $cour) {
          if ($cour->dateJour == $dateActuelleFormatee) {
            if ($cour->heureDebut < $heureFormatee && $heureFormatee < $cour->heureFin) {
              $courAct = $cour;
            } else {
              // echo ('pas de cours à cette heure') ;
            }
          } else {
            // echo ('Pas de cours à cette date');
          }
      }

      if($courAct->codeCours == $codeTransmis ){
          ?> <h1>Bon code</h1> <?php
          //ca marche maintenant à changer ce qu'il se passe !! 
      } else {
        ?> <h1>Mauvais Code</h1> <?php
      }

  }
    }
}}
