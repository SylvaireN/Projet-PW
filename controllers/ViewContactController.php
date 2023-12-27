<?php
class ViewContactController {
    private $licencieDAO;
    private $categorieDAO;
    private $contactDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
        $this->contactDAO = $contactDAO;
    }

    public function viewContact($contactId) {
        // Récupérer le contact à afficher en utilisant son ID
        $contact = $this->contactDAO->getById($contactId);

        // Inclure la vue pour afficher les détails du contact
        include('views/views_contact/view_contact.php');
    }
}



?>

