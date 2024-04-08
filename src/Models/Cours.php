<?php

namespace src\Models;


class Cours
{
    private $id;
    private $dateJour;
    private $heureDebut;
    private $heureFin;
    private $codeCours;

    public function __construct($id, $dateJour, $heureDebut, $heureFin, $codeCours)
    {
        $this->id = $id;
        $this->dateJour = $dateJour;
        $this->heureDebut = $heureDebut;
        $this->heureFin = $heureFin;
        $this->codeCours = $codeCours;
    }



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of dateJour
     */
    public function getDateJour()
    {
        return $this->dateJour;
    }

    /**
     * Set the value of dateJour
     */
    public function setDateJour($dateJour): self
    {
        $this->dateJour = $dateJour;

        return $this;
    }

    /**
     * Get the value of heureDebut
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * Set the value of heureDebut
     */
    public function setHeureDebut($heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get the value of heureFin
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * Set the value of heureFin
     */
    public function setHeureFin($heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get the value of codeCours
     */
    public function getCodeCours()
    {
        return $this->codeCours;
    }

    /**
     * Set the value of codeCours
     */
    public function setCodeCours($codeCours): self
    {
        $this->codeCours = $codeCours;

        return $this;
    }
}
