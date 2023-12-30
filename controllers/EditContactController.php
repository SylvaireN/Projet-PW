<?php
class EditContactController {
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

    public function editContact($contactId) {
        $login = $this->loginDAO->getAdmin();
        // Récupérer le contact à modifier en utilisant son ID
        $contact = $this->contactDAO->getById($contactId);
        

        if (!$contact) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du contact
            $contact->setNom($nom);
            $contact->setPrenom($prenom);
            $contact->setEmail($email);
            $contact->setTelephone($telephone);

            // Appeler la méthode du modèle (LicencieDAO) pour mettre à jour le categorie
            if ($this->contactDAO->update($contact)) {
                // Rediriger vers la page de détails du contact après la modification
                header('Location:index.php?page=listContact');
                exit();
            } else {
                // Gérer les erreurs de mise à jour du categorie
                echo "Erreur lors de la modification du licencie.";
                
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du contact
        include('views/views_contact/edit_contact.php');
    }
}


?>

