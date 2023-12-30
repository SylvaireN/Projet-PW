<?php 

    if(!isset($_SESSION['admin'])){
        header("Location:index.php?page=login");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un Educateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1><center>Supprimer un Educateur</center></h1><br>
    
    <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="index.php?page=listEducateur">Retour à la liste des Educateurs</a>
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

    <?php if ($educateur): ?>
        <p>
            Voulez-vous vraiment supprimer l'éducateur " 
               <strong> <?php echo $educateur->getEmail(); ?> </strong> &nbsp;&nbsp; qui est lier au licencié &nbsp;&nbsp;
                <strong>
                    <?php
                        foreach ($licencie as $licence):
                            if($licence->getId() == $educateur->getLicenceID()):
                                echo $licence->getNom(); ?>&nbsp;&nbsp;
                                <?php echo $licence->getPrenom();?>
                            <?php endif; ?>
                    <?php endforeach; ?>
                 </strong>
                " ?
    
         </p>
        <form action="index.php?page=deleteEducateur&action=deleteEducateur&id=<?php echo $educateur->getId(); ?>" method="post">
            <input type="submit" class="btn btn-primary mb-3" value="Oui, Supprimer">
        </form>
    <?php else: ?>
        <p>L'éducateur  n'a pas été trouvé.</p>
    <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>

