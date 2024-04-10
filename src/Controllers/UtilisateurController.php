<?php

namespace src\Controllers;

use src\Models\Utilisateur;
use src\Repositories\UtilisateurRepository;
use src\Services\Reponse;

class UtilisateurController
{

  use Reponse;

  public function traiterForm(){
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
                    $afficherPageApprenant = true;
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
            exit;         }
    } else {
        http_response_code(405);
        echo json_encode(['error' => 'Méthode non autorisée']);
        exit; 
    }

    // FAIRE ENSUIITE DES IFS SELON LE ID_ROLE

    if ($afficherPageApprenant == true) { 
        include_once __DIR__ . '/../Views/Includes/header.php'; ?>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Accueil</a>
            </li>
        </ul>

        <h2>Cours du jour</h2>
        <div id="containerCreation" class="w-50 p-3 position-absolute top-50 start-50 translate-middle bg-light">
            <h3 class="text-center">DWW3</h3>
            <!-- A changer selon la promo -->
            <p>Nombre de participants</p>
            <!-- A renseigner selon la promo -->
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

   if ($afficherPageFormateur == true){
    include_once __DIR__ . '/../Views/Includes/header.php';
?>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Promotions</a>
  </li>
</ul>


<div id="containerConnexion" class="w-50 p-3 position-absolute top-50 start-50 translate-middle bg-light">
  <h2> Création d'un apprenant </h2>
  <form id="formCreationApprenant">
  <div class="mb-3">
      <label for="nomApprenant" class="form-label">Nom</label>
      <input type="text" class="form-control" id="nomApprenant" >
    </div>
    <div class="mb-3">
      <label for="prenomApprenant" class="form-label">Prenom</label>
      <input type="text" class="form-control" id="prenomApprenant">
    </div>
    <div class="mb-3">
      <label for="mailApprenant" class="form-label">Adresse email</label>
    <input type="email" class="form-control" id="mailApprenant" aria-describedby="emailHelp">
    </div>

    <button type="submit" class="btn btn-primary"> Sauvegarder </button>
  
    
  </form>
</div>
   
   
<?php }}


  public function creerUtilisateur(){
    // 
  }

}