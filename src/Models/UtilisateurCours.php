<?php

namespace src\Models;


class UtilisateurCours
{
    private $idUtilisateur;
    private $idCours;
    private $statut;


    public function __construct($idUtilisateur, $idCours, $statut)
    {
        $this->idUtilisateur = $idUtilisateur;
        $this->idCours = $idCours;
        $this->statut = $statut;
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
     * Get the value of idCours
     */
    public function getIdCours()
    {
        return $this->idCours;
    }

    /**
     * Set the value of idCours
     */
    public function setIdCours($idCours): self
    {
        $this->idCours = $idCours;

        return $this;
    }

    /**
     * Get the value of statut
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     */
    public function setStatut($statut): self
    {
        $this->statut = $statut;

        return $this;
    }
}
