<?php

class EducateurModel extends LicencieModel
{
    private $email;
    
    private $motDePasse;

    private $role;

    private $licence_id;

    public function __construct($id, $nomCat, $codeRaccourci, $numeroLicence, $nom, $prenom, $contact, $email, $motDePasse, $role, $licence_id)
    {
        parent::__construct($id, $nomCat, $codeRaccourci, $numeroLicence, $nom, $prenom, $contact);
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->role = $role;
        $this->licence_id = $licence_id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getLicenceID()
    {
        return $this->licence_id; 
    }

    public function setLicenceID($licence_id)
    {
        $this->licence_id = $licence_id;
    }
}