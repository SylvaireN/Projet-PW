<?php
class LoginController {
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
        $error = False;
        $login = $this->loginDAO->getAdmin();
        
    // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('views/login.php'); 
    }
    
    public function isLogin() {
        $error = False;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
             $educateur = $this->educateurDAO->getAll();
            // Récupérer les données du formulaire
            
            $email = htmlspecialchars(trim($_POST['email']));
			$motdepasse = htmlspecialchars(trim($_POST['motdepasse']));	
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet EducateurModel avec les données du formulaire
            //$nouveauEducateur = new EducateurModel(0,$email, $motdepasse, $role, $licence_id);

            // Appeler la méthode du modèle (EducateurDAO) pour ajouter le contact
            if ($this->loginDAO->getLogin($email,$motdepasse)) {
                $_SESSION['admin'] = $email;
                
                //var_dump($_SESSION['admin']);
                //if ($this->loginDAO->getAdmin()) {
                //    var_dump($_SESSION['admin']);
                //}
                
                //Rediriger vers la page d'accueil après l'ajout
                header('Location:index.php?page=home');
                exit();
            } else {
                // Gérer les erreurs d'ajout de educateur
                $error = True;
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de l'educateur
        include('views/login.php');
    }
}




?>

