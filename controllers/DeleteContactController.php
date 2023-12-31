<?php
class DeleteContactController {
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

    public function deleteContact($contactId) {
        $login = $this->loginDAO->getAdmin();
        // Récupérer le contact à supprimer en utilisant son ID
        $contact = $this->contactDAO->getById($contactId);

        if (!$contact) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le contact en appelant la méthode du modèle (ContactDAO)
            if ($this->contactDAO->deleteById($contactId)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=listContact');
                exit();
            } else {
                // Gérer les erreurs de suppression du licencié
                echo "Erreur lors de la suppression du licencié.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du licencié
        include('views/views_contact/delete_contact.php');
    }
}



?>

