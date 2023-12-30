<?php
class AddLicencieController {
    
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

    public function index() {
        $login = $this->loginDAO->getAdmin();
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $contact = $this->contactDAO->getAll();
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $categorie = $this->categorieDAO->getAll();
        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('views/views_licencie/add_licencie.php'); 
    }
    
    public function addLicencie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $numero = $_POST['numero'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $contactid = $_POST['contactid'];
            $idCat = $_POST['idCat'];
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet ContactModel avec les données du formulaire
            $nouveauLicencie = new LicencieModel(0,$numero, $nom, $prenom, $contactid, $idCat);

            // Appeler la méthode du modèle (LicencieDAO) pour ajouter le licencié
            if ($this->licencieDAO->create($nouveauLicencie)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index.php?page=listLicencie');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du catégorie.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de licencié
        include('views/views_licencie/add_licencie.php');
    }
}




?>

