<?php
class DeleteCategorieController {
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

    public function deleteCategorie($categorieId) {
        $login = $this->loginDAO->getAdmin();
        // Récupérer la catégorie à supprimer en utilisant son ID
        $categorie = $this->categorieDAO->getById($categorieId);

        if (!$categorie) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "La catégorie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer la catégorie en appelant la méthode du modèle (CatégorieDAO)
            if ($this->categorieDAO->deleteById($categorieId)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=listCategorie');
                exit();
            } else {
                // Gérer les erreurs de suppression du catégorie
                echo "Erreur lors de la suppression du catégorie.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du contact
        include('views/views_categorie/delete_categorie.php');
    }
}



?>

