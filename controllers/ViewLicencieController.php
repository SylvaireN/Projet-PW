<?php
class ViewLicencieController {
    private $licencieDAO;
    private $categorieDAO;
    private $contactDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
        $this->contactDAO = $contactDAO;
    }

    public function viewLicencie($licencieId) {
        // Récupérer le contact à afficher en utilisant son ID
        $categorie = $this->categorieDAO->getAll();
        $licencie = $this->licencieDAO->getById($licencieId);
        $contact = $this->contactDAO->getAll();

        // Inclure la vue pour afficher les détails du contact
        include('views/views_licencie/view_licencie.php');
    }
}



?>

