<?php
class ViewCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function viewCategorie($categorieId) {
        // Récupérer le contact à afficher en utilisant son ID
        $categorie = $this->categorieDAO->getById($categorieId);

        // Inclure la vue pour afficher les détails du contact
        include('views/views_categorie/view_categorie.php');
    }
}



?>

