<?php
class ViewEducateurController {
    private $licencieDAO;
    private $categorieDAO;
    private $contactDAO;
    private $educateurDAO;
    private $loginDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO, EducateurDAO $educateurDAO, LoginDAO $loginDAO) {
        $this->contactDAO = $contactDAO;
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
        $this->educateurDAO = $educateurDAO;
        $this->loginDAO = $loginDAO;
    }

    public function viewEducateur($educateurId) {
        $login = $this->loginDAO->getAdmin();
        // RÃ©cupÃ©rer la liste de tous les licencié depuis le modÃ¨le
        $licencie = $this->licencieDAO->getAll();
        // Récupérer l'educateur à afficher en utilisant son ID
        $educateur = $this->educateurDAO->getById($educateurId);

        // Inclure la vue pour afficher les détails du contact
        include('views/views_educateur/view_educateur.php');
    }
}



?>

