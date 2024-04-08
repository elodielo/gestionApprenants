<?php

namespace src\Models;


class Promo
{
    private $id;
    private $nomPromo;
    private $dateDebut;
    private $dateFin;
    private $placesDispos;

    public function __construct($id, $nomPromo, $dateDebut, $dateFin, $placesDispos)
    {
        $this->id = $id;
        $this->nomPromo = $nomPromo;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->placesDispos = $placesDispos;
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
     * Get the value of nomPromo
     */
    public function getNomPromo()
    {
        return $this->nomPromo;
    }

    /**
     * Set the value of nomPromo
     */
    public function setNomPromo($nomPromo): self
    {
        $this->nomPromo = $nomPromo;

        return $this;
    }

    /**
     * Get the value of dateDebut
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set the value of dateDebut
     */
    public function setDateDebut($dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get the value of dateFin
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set the value of dateFin
     */
    public function setDateFin($dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get the value of placesDispos
     */
    public function getPlacesDispos()
    {
        return $this->placesDispos;
    }

    /**
     * Set the value of placesDispos
     */
    public function setPlacesDispos($placesDispos): self
    {
        $this->placesDispos = $placesDispos;

        return $this;
    }
}
