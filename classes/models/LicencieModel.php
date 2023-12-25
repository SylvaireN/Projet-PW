<?php

class LicencieModel 
{
    private $numeroLicence;
    private $nom;
    private $prenom;
    private $contact;
    private $idCat;

    public function __construct($id, $numeroLicence, $nom, $prenom, $contact, $idCat)
    {
        //parent::__construct($id, $nomCat, $codeRaccourci);
        $this->numeroLicence = $numeroLicence;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->contact = $contact;
        $this->idCat = $idCat;
    }

    public function getNumeroLicence()
    {
        return $this->numeroLicence;
    }

    public function setNumeroLicence($numeroLicence)
    {
        $this->numeroLicence = $numeroLicence;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    public function getIdCat()
    {
        return $this->idCat;
    }

    public function setIdCat($idCat)
    {
        $this->idCat = $idCat;
    }
}