<?php

namespace src\Controllers;

use src\Models\Utilisateur;
use src\Repositories\UtilisateurRepository;
use src\Services\Reponse;

class UtilisateurController
{

  use Reponse;

  public function traiterForm(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $json_data = file_get_contents('php://input');
  
      if (!empty($json_data)) {
          $data = json_decode($json_data, true);  
          if ($data !== null) {
              $mailCo = $data['mailCo'];
              $mdpCo = $data['mdpCo'];
              $repoUtilisateur = new UtilisateurRepository();
              $utilisateur = $repoUtilisateur->getUtilisateurByMailEtMdp($mailCo, $mdpCo);
  
              if ($utilisateur !== null) {
                  $_SESSION['utilisateur'] = $utilisateur;
                  $_SESSION['connecte'] = true;
                //   $response = $utilisateur->objectToArray();
  
                //   header("Content-Type: application/json");
                  

include_once __DIR__ . '/../Views/Includes/header.php';
?>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
  </li>
</ul>

<h2>Cours du jour </h2>
<div id="containerCreation" class="w-50 p-3 position-absolute top-50 start-50 translate-middle bg-light">
    <h3 class="text-center"> DWW3 </h3>
    <!-- A changer selon la classe  -->
    <p> Nombre de participants </p>
    <!-- A renseigner -->
    <form id="formValidationCode">
    <div class="mb-3">
    <label for="validationCode" class="form-label">Code*</label>
    <input type="number" class="form-control" id="validationCode">
  </div>

<div class="">
  <button type="submit" id="boutonValidationCode" class="btn btn-primary"> Valider la présence </button>
</div>
</form>
</div>

</body>

<?php
                //   echo json_encode($response);
                  // NE PAS RENVOYER LA REPONSE MAIS ENVOYER LE CODE HTML DE LA PAGE POUR METTRE LE CODE SWS
                  exit;
              } else {
                  http_response_code(404);
                  echo json_encode(['error' => 'Utilisateur non trouvé']);
              }
          } else {
              http_response_code(400);
              echo json_encode(['error' => 'Données JSON invalides']);
          }
      } else {
          http_response_code(400);
          echo json_encode(['error' => 'Aucune donnée envoyée']);
      }
  } else {
      http_response_code(405);
      echo json_encode(['error' => 'Méthode non autorisée']);
  }
  }

  public function creerUtilisateur(){
    // 
  }

}