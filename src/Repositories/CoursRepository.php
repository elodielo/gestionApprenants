<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Cours;
use src\Models\Database;

class CoursRepository
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();
    require_once __DIR__ . '/../../config.php';
  }


  public function getAllCours()
  {
    $sql = "SELECT * FROM gest_cours";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);
  }

  public function CreerCours(Cours $cours): Cours
  {
    $sql = "INSERT INTO gest_cours (dateJour, heureDebut, heureFin, codeCours, id_promo) VALUES (:dateJour, :heureDebut, :heureFin, :codeCours, :id_promo);";

    $statement = $this->DB->prepare($sql);

    $statement->execute([
      ':dateJour'               => $cours->getDateJour(),
      ':heureDebut'       => $cours->getHeureDebut(),
      ':heureFin'      => $cours->getHeureFin(),
      ':codeCours'      => $cours->getCodeCours(),
      ':id_promo' => $cours->getIdPromo(),
    ]);

    $id = $this->DB->lastInsertId();
    $cours->setId($id);

    return $cours;
  }

  public function getCoursById($id)
  {
    $sql = "SELECT * FROM gest_cours WHERE ID=:id";
    $statement = $this->DB->prepare($sql);
    $statement->execute([':id' => $id]);
    $retour = $statement->fetch(PDO::FETCH_OBJ);
    return $retour;
  }

  public function getCodeCoursById($id)
  {
    $sql = "SELECT codeCours FROM gest_cours WHERE ID=:id";
    $statement = $this->DB->prepare($sql);
    $statement->execute([':id' => $id]);
    $retour = $statement->fetch(PDO::FETCH_OBJ);
    return $retour;
  }

  public function definitCodeAleatoire($id)
  {
    $sql ="UPDATE gest_cours SET codeCours =:codeCours WHERE id=:id";
    $statement = $this->DB->prepare($sql);
    $codeAleatoire = sprintf('%05d', random_int(10000, 99999));
    $statement->execute(
      [':id' => $id,
      ':codeCours' => $codeAleatoire]
    );
  }



}
  
