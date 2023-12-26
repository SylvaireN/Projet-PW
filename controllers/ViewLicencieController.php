<?php
class ViewLicencieController {
    private $licencieDAO;
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
    }

    public function viewLicencie($licencieId) {
        // Récupérer le contact à afficher en utilisant son ID
        $categorie = $this->categorieDAO->getAll();
        $licencie = $this->licencieDAO->getById($licencieId);

        // Inclure la vue pour afficher les détails du contact
        include('views/views_licencie/view_licencie.php');
    }
}



?>

