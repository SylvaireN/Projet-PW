<?php 

    if(!isset($_SESSION['admin'])){
        header("Location:index.php?page=login");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Licencie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1><center>Détails du Licencié</center></h1><br>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="index.php?page=listLicencie">Retour à la liste des licencié</a>
            </li>&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
                <a href="index.php?page=home">Retourner à l'accueil</a>
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
        </ul><br>

        <?php if ($licencie): ?>
            <p><strong>Numéro de Licence :</strong> <?php echo $licencie->getNumeroLicence(); ?></p>
            <p><strong>Nom :</strong> <?php echo $licencie->getNom(); ?></p>
            <p><strong>Prénom :</strong> <?php echo $licencie->getPrenom(); ?></p>
            <p><strong>Contact :</strong>
            
                <?php
                    foreach ($contact as $ct):
                        if($ct->getId() == $licencie->getContactId()):
                            echo $ct->getNom(); ?>&nbsp;&nbsp;
                            <?php echo $ct->getPrenom();
                        
                            
                            ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
        
             </p>
             <p><strong>Email :</strong> 
                <?php
                    foreach ($contact as $ct):
                        if($ct->getId() == $licencie->getContactId()):
                            echo $ct->getEmail();
                            ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </p>
             <p><strong>Téléphone :</strong> 
            <?php
                foreach ($contact as $ct):
                    if($ct->getId() == $licencie->getContactId()):
                        echo $ct->getTelephone();
                        ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </p>
            <p><strong>Catégorie :</strong> 
            <?php
                foreach ($categorie as $cat):
                    if($cat->getId() == $licencie->getIdCat()):
                        echo $cat->getNom(); 
                        ?>
                    <?php endif; ?>
                <?php endforeach; ?>
        </p>
        <?php else: ?>
            <p>Le licencie n'a pas été trouvé.</p>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </div>
</body>
</html>

