<?php
class ViewEducateurController {
    private $licencieDAO;
    private $categorieDAO;
    private $contactDAO;
    private $educateurDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO, EducateurDAO $educateurDAO) {
        $this->contactDAO = $contactDAO;
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
        $this->educateurDAO = $educateurDAO;
    }

    public function viewEducateur($educateurId) {
        // RÃ©cupÃ©rer la liste de tous les licencié depuis le modÃ¨le
        $licencie = $this->licencieDAO->getAll();
        // Récupérer l'educateur à afficher en utilisant son ID
        $educateur = $this->educateurDAO->getById($educateurId);

        // Inclure la vue pour afficher les détails du contact
        include('views/views_educateur/view_educateur.php');
    }
}



?>

