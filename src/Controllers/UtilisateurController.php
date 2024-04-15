<?php

namespace src\Controllers;

use DateTime;
use DateTimeZone;
use src\Models\Utilisateur;
use src\Repositories\CoursRepository;
use src\Repositories\PromoRepository;
use src\Repositories\UtilisateurRepository;
use src\Services\Reponse;

class UtilisateurController
{

  use Reponse;

  public function traiterForm()
  {
    $afficherPageApprenant = false;
    $afficherPageFormateur = false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // A METTRE DANS ROUTER
      $json_data = file_get_contents('php://input');

      if (!empty($json_data)) {
        $data = json_decode($json_data, true);
        if ($data !== null) {
          $mailCo = $data['mailCo'];
          $mdpCo = $data['mdpCo'];
          $repoUtilisateur = new UtilisateurRepository();
          $utilisateur = $repoUtilisateur->getUtilisateurByMailEtMdp($mailCo, $mdpCo);

          if ($utilisateur) {
            $_SESSION['utilisateur'] = $utilisateur;
            $_SESSION['connecte'] = true;

            $dateActuelle = new DateTime('now', new DateTimeZone('UTC'));
            $dateActuelle->setTimezone(new DateTimeZone('Europe/Paris'));

            $dateActuelleFormatee = $dateActuelle->format('Y-m-d');
            $heureFormatee = $dateActuelle->format('H:i:s');

            $coursRepo = new CoursRepository;
            $cours = $coursRepo->getAllCours();
            $promoRepo = new PromoRepository;
            $idUtilisateur = $utilisateur->getId();
            $promo = $promoRepo->getPromoByIdUtilisateur($idUtilisateur);
            $courAct = null;
            $promos = $promoRepo->getAllPromos();

            if ($utilisateur->getIdRole() == 2) {
              $afficherPageApprenant = true;
            } elseif ($utilisateur->getIdRole() == 1) {
              $afficherPageFormateur = true;
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
              // }
            }
          } else {
            http_response_code(401);
            echo json_encode(['error' => 'Email ou mot de passe incorrect.']);
            exit;
          }
        } else {
          http_response_code(400);
          echo json_encode(['error' => 'Données JSON invalides']);
          exit;
        }
      } else {
        http_response_code(400);
        echo json_encode(['error' => 'Aucune donnée envoyée']);
        exit;
      }
    } else {
      http_response_code(405);
      echo json_encode(['error' => 'Méthode non autorisée']);
      exit;
    }


    if ($afficherPageApprenant == true) {
      include_once __DIR__ . '/../Views/Includes/header.php'; 
      include __DIR__ .'/../Views/entrerCode.php';  ?>

    <?php

    }

    if ($afficherPageFormateur == true) {
      include_once __DIR__ . '/../Views/Includes/header.php';
      include __DIR__ .'/../Views/accueilFormateur.php'; 
    ?>


<?php }
  }
}

public function afficheFormulaireCreationApprenant()
{
  include __DIR__ .'/../Views/creationApprenant.php'; 
}

public function sauvegarderApprenant()
{
  $json_data = file_get_contents('php://input');

      if (!empty($json_data)) {
        $data = json_decode($json_data, true);
        if ($data !== null) {
          $nomApprenant = $data['nomApprenant'];
          $prenomApprenant = $data['prenomApprenant'];
          $mailApprenant = $data['mailApprenant'];
          // AJOUTER APPRENANT EN BDD
          // LUI ENVOYER UN MAIL POUR QU'IL CREE UN MDP 
          // LUI ASSIGNER L'ID DE LA PROMO EN COURS

        }}
}
}