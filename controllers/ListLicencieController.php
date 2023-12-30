<?php

class ListLicencieController {
    private $licencieDAO;
    private $categorieDAO;
    private $contactDAO;
    private $loginDAO;
    private $educateurDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO, EducateurDAO $educateurDAO, LoginDAO $loginDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
        $this->contactDAO = $contactDAO;
        $this->loginDAO = $loginDAO;
    }

    public function index() {
        $login = $this->loginDAO->getAdmin();
        // RÃ©cupÃ©rer la liste de tous les contacts depuis le modÃ¨le
        $contact = $this->contactDAO->getAll();
        // RÃ©cupÃ©rer la liste de tous les licencies depuis le modÃ¨le
        $licencie = $this->licencieDAO->getAll();
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $categorie = $this->categorieDAO->getAll();
        


        // Inclure la vue pour afficher la liste des contacts
        include('views/views_licencie/list_licencie.php');
    }


  
}


?>
