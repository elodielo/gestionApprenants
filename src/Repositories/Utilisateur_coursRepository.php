<?php

namespace src\Repositories;

use src\Models\Utilisateur;
use PDO;
use PDOException;
use src\Models\Database;
use src\Models\UtilisateurCours;

class Utilisateur_coursRepository
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();
    require_once __DIR__ . '/../../config.php';
  }


  public function getAllFromUtilisateurCours()
  {
    $sql = "SELECT * FROM utilisateur_cours";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);
  }

  public function CreerUtilisateurCours(UtilisateurCours $utilisateurCours): UtilisateurCours
  {
    $sql = "INSERT INTO utilisateur_cours (id_utilisateur, id_cours, Statut) VALUES (:id_utilisateur, :id_cours, :Statut);";

    $statement = $this->DB->prepare($sql);

    $statement->execute([
      ':id_utilisateur'  => $utilisateurCours->getIdUtilisateur(),
      ':id_cours'       => $utilisateurCours->getIdCours(),
      ':Statut'      => $utilisateurCours->getStatut(),
    ]);

    return $utilisateurCours;
  }

  function getStatutByIdUtilisateur($idUtilisateur)
  {
    $sql = "SELECT Statut FROM utilisateur_cours WHERE id_utilisateur=:id";
    $statement = $this->DB->prepare($sql);
    $statement->execute([':id' => $idUtilisateur]);
    $retour = $statement->fetch(PDO::FETCH_OBJ);
    return $retour;
  }

}
  
