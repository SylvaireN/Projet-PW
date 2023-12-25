<?php

class ListEducateurController {
    private $educateurDAO;

    public function __construct(CategorieDAO $categorie,LicencieDAO $licence,ContactDAO $contactDAO, EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $educateur = $this->educateurDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('views/views_educateur/list_educateur.php');
    }
}


?>
