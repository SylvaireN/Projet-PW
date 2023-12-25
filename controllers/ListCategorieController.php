<?php

class ListCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $categorie = $this->categorieDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('views/views_categorie/list_categorie.php');
    }
}


?>
