<?php
class DeleteEducateurController {
    private $licencieDAO;
    private $categorieDAO;
    private $contactDAO;
    private $educateur;
    private $loginDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO, EducateurDAO $educateurDAO, LoginDAO $loginDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
        $this->contactDAO = $contactDAO;
        $this->educateurDAO = $educateurDAO;
        $this->loginDAO  = $loginDAO;
    }

    public function deleteEducateur($educateurId) {
        $login = $this->loginDAO->getAdmin();

        $educall = $this->educateurDAO->getAll();
        // Récupérer l'educateur à supprimer en utilisant son ID
        $educateur = $this->educateurDAO->getById($educateurId);

        // RÃ©cupÃ©rer la liste de tous les licencié depuis le modÃ¨le
        $licencie = $this->licencieDAO->getAll();
        

        if (!$educateur) {
            // L'educateur n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "L'educateur n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer l'educateur en appelant la méthode du modèle (EducateurDAO)
            if ($this->educateurDAO->deleteById($educateurId)) {
                foreach($educall as $educ){
                    if($educ->getId() == $educateurId){
                        foreach($licencie as $l){
                            if($l->getId() == $educ->getLicenceID() ){
                                $licencedelete = $this->licencieDAO->getById($educ->getLicenceID());
                                $this->licencieDAO->deleteById($educ->getLicenceID());
                            }
                        }
                    }
                }
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=listEducateur');
                exit();
            } else {
                // Gérer les erreurs de suppression de l'éducateur
                echo "Erreur lors de la suppression de l'éducateur.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression de l'éducateur
        include('views/views_educateur/delete_educateur.php');
    }
}



?>

