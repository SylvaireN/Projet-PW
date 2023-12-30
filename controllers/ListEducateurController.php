<?php

class ListEducateurController {
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
        $login = $this->loginDAO->getAdmin();
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $educateur = $this->educateurDAO->getAll();
        // RÃ©cupÃ©rer la liste de tous les licencié depuis le modÃ¨le
        $licencie = $this->licencieDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('views/views_educateur/list_educateur.php');
    }
}


?>
