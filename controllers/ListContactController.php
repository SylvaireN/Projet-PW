<?php

class ListContactController {
    private $categorieDAO;
    private $licencieDAO;
    private $contactDAO;
    private $loginDAO;
    private $educateurDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO, EducateurDAO $educateurDAO, LoginDAO $loginDAO) {
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
        $this->licencieDAO = $licencieDAO;
        $this->loginDAO = $loginDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $contact = $this->contactDAO->getAll();
        $login = $this->loginDAO->getAdmin();

        // Inclure la vue pour afficher la liste des contacts
        include('views/views_contact/list_contact.php');
    }
}


?>
