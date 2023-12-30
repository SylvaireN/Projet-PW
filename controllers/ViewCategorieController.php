<?php
class ViewCategorieController {
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

    public function viewCategorie($categorieId) {
        $login = $this->loginDAO->getAdmin();
        // Récupérer le contact à afficher en utilisant son ID
        $categorie = $this->categorieDAO->getById($categorieId);

        // Inclure la vue pour afficher les détails du contact
        include('views/views_categorie/view_categorie.php');
    }
}



?>

