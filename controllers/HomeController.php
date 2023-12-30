<?php

class HomeController {
    private $categorieDAO;
    private $licencieDAO;
    private $contactDAO;
    private $educateurDAO;
    private $loginDAO;

    public function __construct(CategorieDAO $categorieDAO, LicencieDAO $licencieDAO, ContactDAO $contactDAO, EducateurDAO $educateurDAO, LoginDAO $loginDAO) {
        $this->categorieDAO = $categorieDAO;
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
        $this->educateurDAO = $educateurDAO;
        $this->loginDAO = $loginDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $categorie = $this->categorieDAO->getAll();
        $licencie = $this->licencieDAO->getAll();
        $contact = $this->contactDAO->getAll();
        $login = $this->loginDAO->getAdmin();
       
        // Inclure la vue pour afficher la liste des contacts
        include('views/home.php');
    }
}


?>
