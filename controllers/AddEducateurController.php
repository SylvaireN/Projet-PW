<?php
class AddEducateurController {
    private $contactDAO;
    private $licencieDAO;
    private $categorieDAO;
    private $educateurDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO, EducateurDAO $educateurDAO) {
        $this->contactDAO = $contactDAO;
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
        $this->educateurDAO = $educateurDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les licencié depuis le modÃ¨le
        $licencie = $this->licencieDAO->getAll();
    // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('views/views_educateur/add_educateur.php'); 
    }
    
    public function addEducateur() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $email = $_POST['email'];
            $motdepasse = $_POST['motdepasse'];
            $role = $_POST['role'];
            $licence_id = $_POST['licence_id'];
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet EducateurModel avec les données du formulaire
            $nouveauEducateur = new EducateurModel(0,$email, $motdepasse, $role, $licence_id);

            // Appeler la méthode du modèle (EducateurDAO) pour ajouter le contact
            if ($this->educateurDAO->create($nouveauEducateur)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index.php?page=listEducateur');
                exit();
            } else {
                // Gérer les erreurs d'ajout de educateur
                echo "Erreur lors de l'ajout de l'educateur.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de l'educateur
        include('views/views_educateur/add_educateur.php');
    }
}




?>

