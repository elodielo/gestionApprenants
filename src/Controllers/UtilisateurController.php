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

            if ($utilisateur->getIdRole() == 2) {
              $afficherPageApprenant = true;
            } elseif ($utilisateur->getIdRole() == 1) {
              $afficherPageFormateur = true;
              foreach ($cours as $cour) {
                if ($cour->dateJour == $dateActuelleFormatee) {
                  if ($cour->heureDebut < $heureFormatee && $heureFormatee < $cour->heureFin) {
                    $courAct = $cour;
                    // if($cour->codeCours !== null){
                    //   $codeCours = $cour->codeCours;
                    // } else{
                    //   $coursRepo->ajoutCodeAleatoire($cour->id);
                    //   // LE RECUPERER MAINTENANT
                    // }
                  } else {
                    // var_dump('pas la bonne heure') ;
                  }
                } else {
                  // Creer un cours selon l'heure actuelle
                }
              }
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
      include_once __DIR__ . '/../Views/Includes/header.php'; ?>
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
      </ul>

      <h2>Cours du jour</h2>
      <div id="containerCreation" class="w-50 p-3 position-absolute top-50 start-50 translate-middle bg-light">
        <h3 class="text-center"> <?php echo $promo->nomPromo ?> </h3>
        <p><?php echo $promo->placesDispos ?> participants attendus</p>
        <form id="formValidationCode">
          <div class="mb-3">
            <label for="validationCode" class="form-label">Code*</label>
            <input type="number" class="form-control" id="validationCode">
          </div>
          <div class="">
            <button type="submit" id="boutonValidationCode" class="btn btn-primary">Valider la présence</button>
          </div>
        </form>
      </div>
    <?php

    }

    if ($afficherPageFormateur == true) {
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
          <p> <?php echo $promo->placesDispos ?></p>
        </div>
        <div>
          <p>date</p>
          <button id="validerPresenceFormateur" data-id="<?php echo $courAct->id ?>" type="button" class="btn btn-primary">Valider présence</button>
        </div>
      </div>


<?php }
  }



  public function creerUtilisateur()
  {
    // 
  }
}
