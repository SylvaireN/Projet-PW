<?php

class ListLicencieController {
    private $licencieDAO;

    public function __construct(CategorieDAO $categorie,LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $licencie = $this->licencieDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('views/views_licencie/list_licencie.php');
    }
}


?>
