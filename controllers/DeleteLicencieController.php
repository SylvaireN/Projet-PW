<?php
class DeleteLicencieController {
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

    public function deleteLicencie($licencieId) {
        $login = $this->loginDAO->getAdmin();
        // Récupérer le licencie à supprimer en utilisant son ID
        $licencie = $this->licencieDAO->getById($licencieId);

        if (!$licencie) {
            // Le licencie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le licencié en appelant la méthode du modèle (LicencieDAO)
            if ($this->licencieDAO->deleteById($licencieId)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php');
                exit();
            } else {
                // Gérer les erreurs de suppression du licencié
                echo "Erreur lors de la suppression du licencié.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du licencié
        include('views/views_licencie/delete_licencie.php');
    }
}



?>

