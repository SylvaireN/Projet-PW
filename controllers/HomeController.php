<?php

class HomeController {
    private $categorieDAO;
    private $licencieDAO;
    private $contactDAO;

    public function __construct(CategorieDAO $categorieDAO, LicencieDAO $licencieDAO, ContactDAO $contactDAO) {
        $this->categorieDAO = $categorieDAO;
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $categorie = $this->categorieDAO->getAll();
        $licencie = $this->licencieDAO->getAll();
        $contactDAO = $this->contactDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('views/home.php');
    }
}


?>
