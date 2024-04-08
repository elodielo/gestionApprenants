<?php

namespace src\Models;


class UtilisateurPromo
{
    private $idUtilisateur;
    private $idPromo;

    public function __construct($idUtilisateur, $idPromo)
    {
        $this->idUtilisateur = $idUtilisateur;
        $this->idPromo = $idPromo;
    }



    /**
     * Get the value of idUtilisateur
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set the value of idUtilisateur
     */
    public function setIdUtilisateur($idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get the value of idPromo
     */
    public function getIdPromo()
    {
        return $this->idPromo;
    }

    /**
     * Set the value of idPromo
     */
    public function setIdPromo($idPromo): self
    {
        $this->idPromo = $idPromo;

        return $this;
    }
}
