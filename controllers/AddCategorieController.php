<?php
class AddCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
    // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('views/views_categorie/add_categorie.php'); 
    }
    
    public function addCategorie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nomCat = $_POST['nomCat'];
            $codeRaccourci = $_POST['codeRaccourci'];
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet ContactModel avec les données du formulaire
            $nouveauCategorie = new CategorieModel(0,$nomCat, $codeRaccourci);

            // Appeler la méthode du modèle (ContactDAO) pour ajouter le contact
            if ($this->categorieDAO->create($nouveauCategorie)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('views/views_categorie/add_categorie.php');
    }
}




?>

