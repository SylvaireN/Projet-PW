<?php

class CategorieModel
{
    private $id;
    private $nom;
    private $codeRaccourci;

    public function __construct($id, $nomCat, $codeRaccourci) {
        $this->id = $id;
        $this->nomCat = $nomCat;
        $this->codeRaccourci = $codeRaccourci;

    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNom(){
        return $this->nomCat;
    }

    public function setNom($nomCat){
        $this->nomCat = $nomCat;
    }

    public function getCode(){
        return $this->codeRaccourci;
    }

    public function setCode($codeRaccourci){
        $this->codeRaccourci = $codeRaccourci;
    }
}