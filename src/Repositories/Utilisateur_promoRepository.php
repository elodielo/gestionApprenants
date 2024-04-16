<?php

namespace src\Repositories;

use src\Models\Utilisateur;
use PDO;
use PDOException;
use src\Models\Database;
use src\Models\UtilisateurPromo;

class Utilisateur_promoRepository
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();
    require_once __DIR__ . '/../../config.php';
  }


  public function getAllUtilisateurs_promos()
  {
    $sql = "SELECT * FROM utilisateur_promo";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);
  }

  public function CreerUtilisateurPromo(UtilisateurPromo $utilisateurPromo): UtilisateurPromo
  {
    $sql = "INSERT INTO utilisateur_promo (id_utilisateur, id_promo) VALUES (:id_utilisateur, :id_promo);";

    $statement = $this->DB->prepare($sql);

    $statement->execute([
      ':id_utilisateur'       => $utilisateurPromo->getIdUtilisateur(),
      ':id_promo'       => $utilisateurPromo->getIdPromo(),
    ]);

    return $utilisateurPromo;
  }

  public function supprimeUtilisateurPromoById($idUtilisateur)
  {
    $sql = "DELETE FROM utilisateur_promo WHERE id_utilisateur = :id_utilisateur";
    $query = $this->DB->prepare($sql);
    $query->execute(['id_utilisateur' => $idUtilisateur]);
  }


  public function getUtilisateurById($id)
  {
    $sql = "SELECT * FROM gest_utilisateur WHERE ID=:id";
    $statement = $this->DB->prepare($sql);
    $statement->execute([':id' => $id]);
    $retour = $statement->fetch(PDO::FETCH_OBJ);
    return $retour;
  }

  public function getUtilisateurByMailEtMdp($mail, $mdp)
  {
    try{
      $sql = "SELECT * FROM gest_utilisateur WHERE mail=:mail";
      $statement = $this->DB->prepare($sql);
      $statement->execute([':mail' => $mail]);
    $utilisateur = $statement->fetch(PDO::FETCH_ASSOC);
      if ($utilisateur) {
          if (password_verify($mdp, $utilisateur['mdp'])) {
              $newUtilisateur = new Utilisateur($utilisateur['id'], $utilisateur['nom'], $utilisateur['prenom'], $utilisateur['mail'], $utilisateur['mdp'], $utilisateur['id_role']);
              return $newUtilisateur;
          } else {
              return false;
          }
      } else {
          return false;
      } 
  }catch (PDOException $e) {
          echo "Erreur lors de la préparation de la requête : " . $e->getMessage();
      }
}}
  
