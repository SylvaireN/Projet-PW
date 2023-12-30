<?php
class EditLicencieController {
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

    public function editLicencie($licencieId) {
        $login = $this->loginDAO->getAdmin();
        // Récupérer le licencier à modifier en utilisant son ID
        $licencie = $this->licencieDAO->getById($licencieId);
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $contact = $this->contactDAO->getAll();
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $categorie = $this->categorieDAO->getAll();
        // Inclure la vue pour afficher le formulaire d'ajout de contact

        if (!$licencie) {
            // Le licencie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencié n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            

            $numero = $_POST['numero'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $contactid = $_POST['contactid'];
            $idCat = $_POST['idCat'];
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du categorie
            $licencie->setNumeroLicence($numero);
            $licencie->setNom($nom);
            $licencie->setPrenom($prenom);
            $licencie->setContactId($contactid);
            $licencie->setIdCat($idCat);

            // Appeler la méthode du modèle (LicencieDAO) pour mettre à jour le categorie
            if ($this->licencieDAO->update($licencie)) {
                // Rediriger vers la page de détails du contact après la modification
                header('Location:index.php?page=listLicencie');
                exit();
            } else {
                // Gérer les erreurs de mise à jour du categorie
                echo "Erreur lors de la modification du licencie.";
                
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du contact
        include('views/views_licencie/edit_licencie.php');
    }
}


?>

