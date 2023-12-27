<?php

class ListContactController {
    private $categorieDAO;
    private $licencieDAO;
    private $contactDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
        $this->licencieDAO = $licencieDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $contact = $this->contactDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('views/views_contact/list_contact.php');
    }
}


?>
