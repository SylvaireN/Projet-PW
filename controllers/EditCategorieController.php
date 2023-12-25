<?php
class EditCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function editCategorie($categorieId) {
        // Récupérer le contact à modifier en utilisant son ID
        $categorie = $this->categorieDAO->getById($categorieId);

        if (!$categorie) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "La categorie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nomCat = $_POST['nomCat'];
            $codeRaccourci = $_POST['codeRaccourci'];
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du categorie
            $categorie->setNom($nomCat);
            $categorie->setCode($codeRaccourci);

            // Appeler la méthode du modèle (CategorieDAO) pour mettre à jour le categorie
            if ($this->categorieDAO->update($categorie)) {
                // Rediriger vers la page de détails du contact après la modification
                header('Location:index.php?page=editCat&action=editCategorie&id=' . $categorieId);
                exit();
            } else {
                // Gérer les erreurs de mise à jour du categorie
                echo "Erreur lors de la modification du categorie.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du contact
        include('views/views_categorie/edit_categorie.php');
    }
}


?>

