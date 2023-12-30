<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="Export licencie.csv"');
class ExportController {
    private $licencieDAO;
    private $categorieDAO;
    private $contactDAO;
    private $loginDAO;
    private $educateurDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO, EducateurDAO $educateurDAO, LoginDAO $loginDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
        $this->contactDAO = $contactDAO;
        $this->loginDAO = $loginDAO;
    }
    public function exportLicencie() {
        $login = $this->loginDAO->getAdmin();
        $licencie = $this->licencieDAO->getAll();
        $contact = $this->contactDAO->getAll();
        $categorie = $this->categorieDAO->getAll();
        $export = $this->licencieDAO->getDataExport();
        $affiche = "";
        $affiche .= '"ID";"Numéro de Licence";"Nom";"Prénom";"Contact";"Email";"Téléphone";"Catégorie";'."\n";
        foreach($licencie as $l){
            foreach($categorie as $c){
                foreach($contact as $ct){
                    if($l->getContactId() == $ct->getId()){
                        if($l->getIdCat() == $c->getId()){
                            $affiche .= '"'.$l->getId().'";"'.$l->getNumeroLicence().'";"'.$l->getNom().'";"'.$l->getPrenom().'";"'.$ct->getNom().' '.$ct->getPrenom().'";"'.$ct->getEmail().'";"'.$ct->getTelephone().'";"'.$c->getNom().'";'."\n";
        
                        }

                    }
                }
                
            }
        }

        print $affiche;
        //var_dump($export);
        die();

        // Inclure la vue pour afficher la confirmation de suppression du contact
        include('views/views_licencie/list_licencie.php');
    }
}


?>
