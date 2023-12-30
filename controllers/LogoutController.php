<?php
class LogoutController {
    private $contactDAO;
    private $licencieDAO;
    private $categorieDAO;
    private $educateurDAO;
    private $loginDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO, EducateurDAO $educateurDAO, LoginDAO $loginDAO) {
        $this->contactDAO = $contactDAO;
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
        $this->educateurDAO = $educateurDAO;
        $this->loginDAO = $loginDAO;
    }

    public function index() {
        session_destroy();
    // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('views/logout.php'); 
    }
    
  
}




?>

