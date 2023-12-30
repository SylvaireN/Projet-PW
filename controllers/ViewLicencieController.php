<?php
class ViewLicencieController {
    private $categorieDAO;
    private $licencieDAO;
    private $contactDAO;
    private $educateurDAO;
    private $loginDAO;

    public function __construct(CategorieDAO $categorieDAO, LicencieDAO $licencieDAO, ContactDAO $contactDAO, EducateurDAO $educateurDAO, LoginDAO $loginDAO) {
        $this->categorieDAO = $categorieDAO;
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
        $this->educateurDAO = $educateurDAO;
        $this->loginDAO = $loginDAO;
    }

    public function viewLicencie($licencieId) {
        $login = $this->loginDAO->getAdmin();
        // Récupérer le contact à afficher en utilisant son ID
        $categorie = $this->categorieDAO->getAll();
        $licencie = $this->licencieDAO->getById($licencieId);
        $contact = $this->contactDAO->getAll();

        // Inclure la vue pour afficher les détails du contact
        include('views/views_licencie/view_licencie.php');
    }
}



?>

