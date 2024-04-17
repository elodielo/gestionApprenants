<?php

namespace src\Repositories;

use src\Models\Utilisateur;
use PDO;
use PDOException;
use src\Models\Database;

class UtilisateurRepository
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();
    require_once __DIR__ . '/../../config.php';
  }


  public function getAllUtilisateurs()
  {
    $sql = "SELECT * FROM gest_utilisateur";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);
  }

  public function CreerUtilisateur(Utilisateur $utilisateur): Utilisateur
  {
    $sql = "INSERT INTO gest_utilisateur (nom, prenom, mail, id_role) VALUES (:nom, :prenom, :mail, :id_role);";

    $statement = $this->DB->prepare($sql);

    $statement->execute([
      ':nom'               => $utilisateur->getNom(),
      ':prenom'       => $utilisateur->getPrenom(),
      ':mail'      => $utilisateur->getMail(),
      ':id_role' => $utilisateur->getIdRole(),
    ]);

    $id = $this->DB->lastInsertId();
    $utilisateur->setId($id);

    return $utilisateur;
  }

  public function getUtilisateurById($id)
  {
    $sql = "SELECT * FROM gest_utilisateur WHERE ID=:id";
    $statement = $this->DB->prepare($sql);
    $statement->execute([':id' => $id]);
    $retour = $statement->fetch(PDO::FETCH_OBJ);
    return $retour;
  }

  public function getUtilisateurByMail($mail)
  {
    $sql = "SELECT * FROM gest_utilisateur WHERE mail=:mail";
    $statement = $this->DB->prepare($sql);
    $statement->execute([':mail' => $mail]);
    $retour = $statement->fetch(PDO::FETCH_OBJ);
    return $retour;
  }

  public function creerMDP($mail, $mdp){
      $sql ="UPDATE gest_utilisateur SET mdp =:mdp WHERE mail=:mail";
      $statement = $this->DB->prepare($sql);
      $statement->execute(
        [':mdp' => $mdp,
        ':mail' => $mail]
      );
      }

  public function recupererApprenantsEnRetard(){
    $sql = "SELECT * FROM gest_utilisateur JOIN utilisateur_cours ON gest_utilisateur.id = utilisateur_cours.id_utilisateur WHERE Statut='retard' ORDER BY gest_utilisateur.nom ASC";
    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);
  }

      public function supprimeUtilisateurById($idUtilisateur)
      {
        $sql = "DELETE FROM gest_utilisateur WHERE id = :id";
        $query = $this->DB->prepare($sql);
        $query->execute(['id' => $idUtilisateur]);
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
  
