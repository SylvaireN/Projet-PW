<?php

class ListContactController {
    private $contactDAO;

    public function __construct(CategorieDAO $categorie,LicencieDAO $licence,ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $contact = $this->contactDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('views/views_contact/list_contact.php');
    }
}


?>
