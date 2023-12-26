<?php

class ListLicencieController {
    private $licencieDAO;
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $licencie = $this->licencieDAO->getAll();
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $categorie = $this->categorieDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('views/views_licencie/list_licencie.php');
    }
}


?>
