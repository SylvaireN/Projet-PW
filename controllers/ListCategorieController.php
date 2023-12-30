<?php

class ListCategorieController {
    private $categorieDAO;
    private $loginDAO;
    private $licencieDAO;
    private $educateurDAO;
    private $contactDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO, EducateurDAO $educateurDAO, LoginDAO $loginDAO) {
        $this->categorieDAO = $categorieDAO;
        $this->loginDAO = $loginDAO;

    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $categorie = $this->categorieDAO->getAll();
        $login = $this->loginDAO->getAdmin();

        // Inclure la vue pour afficher la liste des contacts
        include('views/views_categorie/list_categorie.php');
    }
}


?>
