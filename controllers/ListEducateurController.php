<?php

class ListEducateurController {
    private $educateurDAO;
    private $licencieDAO;

    public function __construct(CategorieDAO $categorie,LicencieDAO $licencieDAO,ContactDAO $contactDAO, EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
        $this->licencieDAO = $licencieDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $educateur = $this->educateurDAO->getAll();
        // RÃ©cupÃ©rer la liste de tous les licencié depuis le modÃ¨le
        $licencie = $this->licencieDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('views/views_educateur/list_educateur.php');
    }
}


?>
