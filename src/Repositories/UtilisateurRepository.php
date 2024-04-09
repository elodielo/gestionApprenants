<?php

namespace src\Repositories;

use src\Models\Utilisateur;
use PDO;
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
    $sql = "INSERT INTO gest_utilisateur (nom, prenom, mail, id_role) VALUES (:nom, :prenom, :mail, :mdp, :id_role);";

    $statement = $this->DB->prepare($sql);

    $statement->execute([
      ':nom'               => $utilisateur->getNom(),
      ':prenom'       => $utilisateur->getPrenom(),
      ':mail'      => $utilisateur->getMail(),
      ':mdp'      => $utilisateur->getMdp(),
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

  public function getUtilisateurByMailEtMdp($mail, $mdp)
  {
      $sql = "SELECT * FROM gest_utilisateur WHERE mail=:mail";
      $statement = $this->DB->prepare($sql);
      $statement->execute([':mail' => $mail]);
    $utilisateur = $statement->fetch(PDO::FETCH_ASSOC);
      if ($utilisateur) {
          // if (password_verify($mdp, $utilisateur['mdp'])) {
            if ($mdp == $utilisateur['mdp']) {
              $newUtilisateur = new Utilisateur($utilisateur['id'], $utilisateur['nom'], $utilisateur['prenom'], $utilisateur['mail'], $utilisateur['mdp'], $utilisateur['id_role']);
              return $newUtilisateur;
          } else {
              return "mot de passe erronne";
          }
      } else {
          return "utilisateur inconnu";
      }
  }}
  
