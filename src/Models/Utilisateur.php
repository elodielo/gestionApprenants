<?php

namespace src\Models;


class Utilisateur
{
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $mdp;
    private $id_role;

    public function __construct($id, $nom, $prenom, $mail, $mdp, $id_role)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->mdp = $mdp;
        $this->id_role = $id_role;
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
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom($prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of email
     */
    public function setEmail($mail): self
    {
        $this->mail = $mail;

        return $this;
    }


    /**
     * Get the value of mdp
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     */
    public function setMdp($mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get the value of id_role
     */
    public function getIdRole()
    {
        return $this->id_role;
    }

    /**
     * Set the value of id_role
     */
    public function setIdRole($id_role): self
    {
        $this->id_role = $id_role;

        return $this;
    }
}
