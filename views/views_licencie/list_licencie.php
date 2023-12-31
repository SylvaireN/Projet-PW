<?php 

    if(!isset($_SESSION['admin'])){
        header("Location:index.php?page=login");
    }

?>
<?php
    if(!empty($_GET['status'])){
        switch($_GET['status']){
            case 'succ':
                $statusType = 'alert-success';
                $statusMsg = 'Importation Réussir.';
                break;
            case 'err':
                $statusType = 'alert-danger';
                $statusMsg = 'Un problème détecter, Réessayer.';
                break;
            case 'invalide_file':
                $statusType = 'alert-danger';
                $statusMsg = 'Télécharger un fichier csv valide.';
                break;
            default:
                $statusType = '';
                $statusMsg = '';
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Licenciés</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script>
        function formToggle(ID){
            var element = document.getElementById(ID);
            if(element.style.display === "none"){
                element.style.display ="block";
            }else{
                element.style.display ="none";
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1><center>Liste des Licenciés</center></h1><br/>
        <?php if(!empty($statusMsg)){?>
            <div class="col-xs-12">
                <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
            </div>
       <?php } ?>
            <div class="row">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="index.php?page=addLicence">Ajouter un Licencié</a>
                </li>&nbsp;&nbsp;&nbsp;
                <li class="nav-item">
                    <a href="index.php?page=home">Retourner à l'accueil</a>
                </li>&nbsp;&nbsp;&nbsp;
                <li class="nav-item">
                    <a href="index.php?page=export&action=exportLicencie">Export</a>
                </li>&nbsp;&nbsp;&nbsp;
                <li> <a class="nav-item" href="index.php?page=logout">Déconnexion</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
        
                    if(isset($_SESSION['admin'])): ?>
                    <li class="nav-item">
                    <div class="position-absolute" style="right: 150px">
                        <center><img src="img/online.png" alt="admin" style="height:30px;"><br>
                            <?php 
                                echo "" . $_SESSION['admin'] . "";
                            ?>
                        </center>
                    </div>
                
                    </li>
                    
                    
                <?php endif; ?>
            </ul>
            
                <div class="col-md-12 head">
                    <div class="float-right">
                            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i>Import</a>
                    </div>
                </div>

                <div class="col-md-12" id="importFrm" style="display: none;">
                        <form action="index.php?page=import&action=importLicencie" method="post" enctype="multipart/form-data">
                            <input type="file" name="file" id="file" />
                            <input type="submit" class="btn btn-primary" id="importSubmit" name="importSubmit" value="IMPORT" />
                        </form>
                </div>
            </div>
        <br>
        
        

        <?php if (count($licencie) > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numéro de Licence</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Catégorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($licencie as $licence): ?>
                        <tr>
                            <td><?php echo $licence->getId(); ?></td>
                            <td><?php echo $licence->getNumeroLicence(); ?></td>
                            <td><?php echo $licence->getNom(); ?></td>
                            <td><?php echo $licence->getPrenom(); ?></td>
                            <td>
                                
                                <?php
                                foreach ($contact as $ct):
                                    if($ct->getId() == $licence->getContactId()):
                                        echo $ct->getNom(); ?>&nbsp;&nbsp;
                                        <?php echo $ct->getPrenom();
                                    
                                        
                                        ?>
                                    <?php endif; ?>
                               <?php endforeach; ?>
                            
                            </td>
                            <td>
                                <?php
                                foreach ($contact as $ct):
                                    if($ct->getId() == $licence->getContactId()):
                                        echo $ct->getEmail();
                                        ?>
                                    <?php endif; ?>
                               <?php endforeach; ?>
                            
                            </td>
                            <td>
                                <?php
                                foreach ($contact as $ct):
                                    if($ct->getId() == $licence->getContactId()):
                                        echo $ct->getTelephone();
                                        ?>
                                    <?php endif; ?>
                               <?php endforeach; ?>
                            
                            </td>
                            <td><?php
                                foreach ($categorie as $cat):
                                    if($cat->getId() == $licence->getIdCat()):
                                        echo $cat->getNom(); 
                                    
                                        
                                        ?>
                                    <?php endif; ?>
                               <?php endforeach; ?>
                             </td>
                            <td>
                                <a href="index.php?page=viewLicence&action=viewLicencie&id=<?php echo $licence->getId(); ?>"><img src="img/view.png" alt="Voir" style="height:30px;"></a>
                                <a href="index.php?page=editLicence&action=editLicencie&id=<?php echo $licence->getId(); ?>"><img src="img/update.png" alt="Modifier" style="height:30px;"></a>
                                <a href="index.php?page=deleteLicence&action=deleteLicencie&id=<?php echo $licence->getId(); ?>"><img src="img/delete.png" alt="Supprimer" style="height:30px;"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun Licencié trouvé.</p>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </div>
</body>
</html>

