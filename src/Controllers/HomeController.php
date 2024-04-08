<?php

namespace src\Controllers;

use src\Repositories\ClientRepository;
use src\Repositories\ReservationRepository;
use src\Services\Reponse;

class HomeController
{

  use Reponse;


  public function affichePageAccueil()
  {
    $this->render("accueil");
    exit();
  }

//   public function affichePageConnexion()
//   {
//     $this->render("connexion");
//   }

//   public function traiterConnexion()
//   {
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//       if (isset($_POST['emailClient']) && isset($_POST['mdpClient'])) {
//         $emailClient = $_POST['emailClient'];
//         $mdpClient = $_POST['mdpClient'];
//         $repoClient = new ClientRepository();
//         $client = $repoClient->getClientByMailEtMdp($emailClient, $mdpClient);
//         if ($client !== null) {
//           session_start();
//           $_SESSION['utilisateur'] = $client;
//           $_SESSION['connecte'] = true;
//           var_dump("Ok client connecté");
//           header('location:' . HOME_URL . 'recapResa');
//           die();
//         } else {
//           header('location:' . HOME_URL);
//         }
//       }
//     }
//   }

//   public function affichePageConnexionAdmin()
//   {
//     $this->render("ConnexionAdmin");
//   }

//   public function traiterConnexionAdmin()
//   {

//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//       $password = $_POST['password'];
//       if ($password === "1234") {
//         $_SESSION['autorise'] = true;
//         header('location:' . HOME_URL . 'adminAutorise');
//         exit();
//       } else {
//         header('location:' . HOME_URL . 'admin');
//       }
//     }
//   }

//   public function envoyerMail()
//   {
//     $clientRepo = new ClientRepository;
//     $resaRepo = new ReservationRepository;

//     $idClient = $_SESSION['utilisateur']->getId();
//     $client = $clientRepo->getClientById($idClient);
//     $resa = $resaRepo->getReservationByIdClient($idClient);

//     $mail = $client->email;
//     $to      = $mail;
//     $subject = 'le sujet';
//     $message = 'Bravo vous êtes bien inscrit au Vercors Music festival !
// Nombre de personnes attendues : ' . $resa->nombre . ' sous le nom :' . $client->prenom . ' ' . $client->nom .
//       '. A régler sur place : ' . $resa->prixTotal . ' euros.';
//     $headers = 'From: elodielo20@gmail.com' . "\r\n" .
//       'Reply-To: elodielo20@gmail.com' . "\r\n" .
//       'X-Mailer: PHP/' . phpversion();

//     $test = mail($to, $subject, $message, $headers);

//     if ($test) {
//       $this->render("confirmationEmail");
//     } else {
//       var_dump($test);
//     }
//   }

//   public function quit()
//   {
//     session_destroy();
//     header('location:' . HOME_URL);
//     die();
//   }

//   public function indexRecap()
//   {
//     $this->render("recapResa");
//   }

  public function page404(): void
  {
    header("HTTP/1.1 404 Not Found");
    $this->render('404');
  }
}
