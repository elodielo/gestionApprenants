<?php

namespace src\Controllers;

use src\Services\Reponse;

class UtilisateurController
{

  use Reponse;

  public function traiterForm(){
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = json_decode(file_get_contents('php://input'), true);
    
    $mailCo = $formData['mailCo'];
    $mdpCo = $formData['mdpCo'];
    
      // Aller chercher l'utilisateur en BDD et démarrer une session 
    // Traiter les données (par exemple, enregistrer en base de données)

    // Renvoyer une réponse au client (par exemple, un message de succès)
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Formulaire soumis avec succès']);
    exit;
}


  }
}
