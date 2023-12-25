<?php
class DeleteCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function deleteCategorie($categorieId) {
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
                header('Location:index.php');
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

