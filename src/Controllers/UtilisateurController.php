<?php

namespace src\Controllers;

use DateTime;
use DateTimeZone;
use src\Models\Utilisateur;
use src\Models\UtilisateurPromo;
use src\Repositories\CoursRepository;
use src\Repositories\PromoRepository;
use src\Repositories\Utilisateur_coursRepository;
use src\Repositories\Utilisateur_promoRepository;
use src\Repositories\UtilisateurRepository;
use src\Services\Reponse;

class UtilisateurController
{

  use Reponse;

  public function traiterForm()
  {
    $afficherPageApprenant = false;
    $afficherPageFormateur = false;
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

                  if ($afficherPageApprenant == true) {
                    include_once __DIR__ . '/../Views/Includes/header.php';
                    include __DIR__ . '/../Views/entrerCode.php';
                  }

                  if ($afficherPageFormateur == true) {
                    include_once __DIR__ . '/../Views/Includes/header.php';
                    include __DIR__ . '/../Views/accueilFormateur.php';
                  }
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
  }


  public function afficheFormulaireCreationApprenant()
  {
    include __DIR__ . '/../Views/creationApprenant.php';
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
        $nvApprenant = new Utilisateur(null, $nomApprenant, $prenomApprenant, $mailApprenant, null, 2);
        $utilisateurRepo = new UtilisateurRepository;
        $apprenant = $utilisateurRepo->CreerUtilisateur($nvApprenant);
        $utilisateurPromo = new UtilisateurPromo($apprenant->getId(), $_SESSION['promo']->id);
        $utilisateurPromoRepo = new Utilisateur_promoRepository;
        $utilisateurPromoRepo->CreerUtilisateurPromo($utilisateurPromo);

        $lien = "http://gestionapprenants/creationmdp?email=" . $mailApprenant;
        $to  = $mailApprenant;
        $subject = 'Creation d\'un mot de passe';
        $message = 'Bravo vous êtes bien inscrit à la formation, veuillez
          créer votre mot de passe en suivant le lien suivant:
          <a href=' . $lien . '>Cliquez ici</a> ';
        $headers = 'From: elodie@gmail.com' . "\r\n" .
          'Reply-To: elodie@gmail.com' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

        $test = mail($to, $subject, $message, $headers);

        if ($test) {
          echo 'Mail envoyé';
        } else {
          var_dump($test);
        }
      }
    }
  }

  public function creerMDP()
  {
    $json_data = file_get_contents('php://input');

    if (!empty($json_data)) {
      $data = json_decode($json_data, true);
      if ($data !== null) {
        $mdpCree = $data['mdpCreation'];
        $mdpCree2 = $data['mdpCreation2'];
        $email = $data['email'];

        $utilisateurRepo = new UtilisateurRepository;

        if ($mdpCree == $mdpCree2) {
          $mdp = password_hash($mdpCree, PASSWORD_DEFAULT);
          $utilisateurRepo->creerMDP($email, $mdp);
        }
      }
    }
  }

  public function supprimeApprenant()
  {
    $json_data = file_get_contents('php://input');

    if (!empty($json_data)) {
      $data = json_decode($json_data, true);
      if ($data !== null) {
        $idDeLApprenantASupprimer = $data['idDeLApprenantASupprimer'];
        $utilisateurRepo = new UtilisateurRepository;
        $utilisateurPromoRepo = new Utilisateur_promoRepository;
        $utilisateurCoursRepo = new Utilisateur_coursRepository;
        $utilisateurRepo->supprimeUtilisateurById($idDeLApprenantASupprimer);
        $utilisateurPromoRepo->supprimeUtilisateurPromoById($idDeLApprenantASupprimer);
        $utilisateurCoursRepo->supprimeUtilisateurCoursById($idDeLApprenantASupprimer);
      }
    }
  }
}
