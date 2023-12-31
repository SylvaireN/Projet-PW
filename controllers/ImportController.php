<?php

class ImportController {
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

    public function importLicencie() {
        $login = $this->loginDAO->getAdmin();
        $licencie = $this->licencieDAO->getAll();
        $contact = $this->contactDAO->getAll();
        $categorie = $this->categorieDAO->getAll();
        $export = $this->licencieDAO->getDataExport();

        if(isset($_POST['importSubmit'])){
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream','text/csv','application/csv','application/excel','application/vnd.msexcel','text/plain');
            $fileName = $_FILES["file"]["name"];
            $t = in_array($_FILES["file"]["type"], $csvMimes);
            //var_dump($fileName);
            //var_dump($t);
            //var_dump(!empty($_FILES["file"]["name"]));
            //die();
            if(!empty($_FILES["file"]["name"]) && in_array($_FILES["file"]["type"], $csvMimes)){
               // var_dump($_FILES['file']['name']);
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                    //var_dump($csvFile);
                    
                    fgetcsv($csvFile);

                    while(($line = fgetcsv($csvFile)) !== FALSE){
                        $id = $line[0];
                        $numero = $line[1];
                        $nom = $line[2];
                        $prenom = $line[3];
                        $idContact = $line[4];
                        $nomContact = $line[5];
                        $prenomContact = $line[6];
                        $email = $line[7];
                        $telephone = $line[8];
                        $idCategorie = $line[9];
                        $nomCategorie = $line[10];
                        $code = $line[11];
                        //var_dump($id);
                        $i = 0;

                        $nouveauLicencie = new LicencieModel(0,$numero, $nom, $prenom, $idContact, $idCategorie);
                        $this->licencieDAO->create($nouveauLicencie);
                        $nouveauContact = new ContactModel($idContact,$nomContact, $prenomContact, $email, $telephone);
                        $this->contactDAO->create($nouveauContact);
                        $nouveauCategorie = new CategorieModel($idCategorie,$nomCategorie, $code);
                        $this->categorieDAO->create($nouveauCategorie);
                       /* foreach($contact as $ct){
                            if($ct->getEmail() == $email){
                                $i++;
                               // var_dump($i);
                                if ($i > 0){
                                    foreach($licencie as $l){
                                        foreach($categorie as $c){
                                            if($l->getContactId() == $ct->getId()){
                                                if($l->getIdCat() == $c->getId()){
                                                    //var_dump($l->getIdCat());
                                                    //var_dump($c->getId());
                                                    $licB = $this->licencieDAO->getById($l->getId());
                                                    $contB = $this->contactDAO->getById($ct->getId());
                                                    $catB = $this->categorieDAO->getById($c->getId());
                                                    //var_dump($licB);
                                                    $licB->setNumeroLicence($numero);
                                                    $licB->setNom($nom);
                                                    $licB->setPrenom($prenom);
                                                    //$licB->setContactId($contactid);
                                                    //$licB->setIdCat($idCat);
                                                    $contB->setNom($nomContact);
                                                    $contB->setPrenom($prenomContact);
                                                    $contB->setTelephone($telephone);
                                                    //$contB->setEmail($email);
                                                    $catB->setNom($nomCategorie);
                                                    $catB->setCode($code);

                                                    $this->licencieDAO->update($licB);
                                                    $this->contactDAO->update($contB);
                                                    $this->categorieDAO->update($catB);
                                                    //if ($this->licencieDAO->update($licB) && $this->contactDAO->update($contB) && $this->categorieDAO->update($catB)) {
                                                        // Rediriger vers la page d'accueil après l'ajout
                                                      //  echo "Update réussir";
                                                        
                                                   // } else {
                                                        // Gérer les erreurs d'ajout de contact
                                                    //    echo "Erreur lors de l'ajout du catégorie.";
                                                    //}

                                                    //header('Location:index.php?page=listLicencie');
                                                    //exit();
                                                }
                        
                                            }
                                        }
                                    }
                                }
                            }else{

                                
                                //header('Location:index.php?page=listLicencie');
                                //exit();
                            }
                        }*/
                        
                    }

                    fclose($csvFile);
                    
                    $qstring = '?status=succ';
                }else{
                    $qstring = '?status=err';
                }
            }else{
                $qstring = '?status=invalid_file';
            }
        }

            
            //var_dump($export);
            //die();

            // Inclure la vue pour afficher la confirmation de suppression du contact
            include('views/views_licencie/list_licencie.php');
    }
}


?>
