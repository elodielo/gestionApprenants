<?php

namespace src\Repositories;

use src\Models\Promo;
use PDO;
use PDOException;
use src\Models\Database;

class PromoRepository
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();
    require_once __DIR__ . '/../../config.php';
  }


  public function getAllPromos()
  {
    $sql = "SELECT * FROM gest_promo";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);
  }

  public function CreerPromo(Promo $promo): Promo
  {
    $sql = "INSERT INTO gest_promo (nomPromo, dateDebut, dateFin, placesDispos) VALUES (:nomPromo, :dateDebut, :dateFin, :placesDispos);";

    $statement = $this->DB->prepare($sql);

    $statement->execute([
      ':nomPromo'               => $promo->getNomPromo(),
      ':dateDebut'       => $promo->getDateDebut(),
      ':dateFin'      => $promo->getDateFin(),
      ':placesDispos' => $promo->getPlacesDispos(),
    ]);

    $id = $this->DB->lastInsertId();
    $promo->setId($id);

    return $promo;
  }

  public function getPromoById($id)
  {
    $sql = "SELECT * FROM gest_promo WHERE ID=:id";
    $statement = $this->DB->prepare($sql);
    $statement->execute([':id' => $id]);
    $retour = $statement->fetch(PDO::FETCH_OBJ);
    return $retour;
  }

  public function getPromoByIdUtilisateur($idUtilisateur)
  {
    $sql = "SELECT * FROM gest_promo
    JOIN utilisateur_promo ON utilisateur_promo.id_promo = gest_promo.id 
    JOIN gest_utilisateur ON utilisateur_promo.id_utilisateur = gest_utilisateur.id
     WHERE gest_utilisateur.id=:id";
    $statement = $this->DB->prepare($sql);
    $statement->execute([':id' => $idUtilisateur]);
    $retour = $statement->fetch(PDO::FETCH_OBJ);
    return $retour;
  }

  public function getPromoByIdCours($idCours)
  {
    $sql = "SELECT * FROM `gest_promo` 
    JOIN gest_cours ON gest_promo.id = gest_cours.id_promo 
    WHERE gest_cours.id =:id";
    $statement = $this->DB->prepare($sql);
    $statement->execute([':id' => $idCours]);
    $retour = $statement->fetch(PDO::FETCH_OBJ);
    return $retour;
  }

  public function getAllApprenantsByIdPromo($idPromo)
  {
    $sql = "SELECT * FROM gest_utilisateur 
JOIN utilisateur_promo ON gest_utilisateur.id = utilisateur_promo.id_utilisateur 
JOIN gest_promo ON gest_promo.id = utilisateur_promo.id_promo
WHERE gest_promo.id = :id";
    $statement = $this->DB->prepare($sql);
    $statement->execute([':id' => $idPromo]);
    $retour = $statement->fetchAll(PDO::FETCH_OBJ);
    return $retour;
  }

  public function supprimePromoById($idPromo)
  {
    $sql = "DELETE FROM gest_promo WHERE id = :id";
    $query = $this->DB->prepare($sql);
    $query->execute(['id' => $idPromo]);
  }
}
