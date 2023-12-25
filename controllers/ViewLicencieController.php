<?php
class ViewLicencieController {
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function viewLicencie($licencieId) {
        // Récupérer le contact à afficher en utilisant son ID
        $licencie = $this->licencieDAO->getById($licencieId);

        // Inclure la vue pour afficher les détails du contact
        include('views/views_categorie/view_categorie.php');
    }
}



?>

