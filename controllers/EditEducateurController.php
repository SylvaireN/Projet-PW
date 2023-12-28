<?php
class EditEducateurController {
    private $licencieDAO;
    private $categorieDAO;
    private $contactDAO;
    private $educateurDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO, ContactDAO $contactDAO,EducateurDAO $educateurDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
        $this->contactDAO = $contactDAO;
        $this->educateurDAO = $educateurDAO;
    }

    public function editEducateur($educateurId) {
        $licencie = $this->licencieDAO->getAll();
        // Récupérer l'educateur à modifier en utilisant son ID
        $educateur = $this->educateurDAO->getById($educateurId);
        

        if (!$educateur) {
            // L'educateur n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "L'educateur n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            
            $email = $_POST['email'];
            $role = $_POST['role'];
            $licence_id = $_POST['licence_id'];
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails de l'educateur
            $educateur->setEmail($email);
            $educateur->setRole($role);
            $educateur->setLicenceID($licence_id);

            // Appeler la méthode du modèle (EducateurDAO) pour mettre à jour l'educateur
            if ($this->educateurDAO->update($educateur)) {
                // Rediriger vers la page de list après la modification
                header('Location:index.php?page=listEducateur');
                exit();
            } else {
                // Gérer les erreurs de mise à jour du educateur
                echo "Erreur lors de la modification de l'educateur.";
                
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du contact
        include('views/views_educateur/edit_educateur.php');
    }
}


?>

