<?php

namespace src\Controllers;

use DateTime;
use DateTimeZone;
use src\Models\Utilisateur;
use src\Models\UtilisateurCours;
use src\Repositories\CoursRepository;
use src\Repositories\PromoRepository;
use src\Repositories\Utilisateur_coursRepository;
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
              if ($cour->codeCours !== null) {
                $codeCours = $cour->codeCours;
              } else {
                $coursRepo->definitCodeAleatoire($cour->id);
                $codeStd = $coursRepo->getCodeCoursById($cour->id);
                $codeCours = $codeStd->codeCours;
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
    $promos = $promoRepo->getAllPromos();

    include_once __DIR__ . '/../Views/Includes/header.php';
    include __DIR__ . '/../Views/formateurAvecCode.php';
?>


<?php }

  public function verificationCodeApprenant()
  {
    $json_data = file_get_contents('php://input');

    if (!empty($json_data)) {
      $data = json_decode($json_data, true);
      if ($data !== null) {
        $codeTransmis = $data['inputCode'];
        $utilisateurRepo = new UtilisateurRepository;
        $coursRepo = new CoursRepository;
        $promoRepo = new PromoRepository;
        $utilisateurCoursRepo = new Utilisateur_coursRepository;
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
        $promo = $promoRepo->getPromoByIdCours($courAct->id);
        if ($courAct->codeCours == $codeTransmis) {

          $idUtilisateurAct = $_SESSION['utilisateur']->getId();
          include __DIR__ . '/../Views/ApprenantSignatureReccueillie.php';
          $utilisateurAct = $utilisateurRepo->getUtilisateurById($idUtilisateurAct);
          $heureEnregistrement = $heureFormatee;
          $heureEnregistrement = DateTime::createFromFormat('H:i:s', $heureEnregistrement);
          $heureDebutCours = DateTime::createFromFormat('H:i:s', $courAct->heureDebut);

          if ($heureEnregistrement && $heureDebutCours) {
            $diff = $heureEnregistrement->diff($heureDebutCours);

            $totalMinutes = ($diff->h * 60) + $diff->i;
            if ($totalMinutes > 15) {
              $statut = "retard";
            } else {
              $statut = "present";
            }
          } else {
            // Gérer le cas où la conversion échoue
          }

          $UtilisateurCours = new UtilisateurCours($idUtilisateurAct, $courAct->id, $statut);
          $utilisateurCoursRepo->CreerUtilisateurCours($UtilisateurCours);
        } else {
          include __DIR__ . '/../Views/entrerCode.php';
        }
      }
    }
  }
}
