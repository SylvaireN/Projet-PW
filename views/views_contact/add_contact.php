<?php 

    if(!isset($_SESSION['admin'])){
        header("Location:index.php?page=login");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   
</head>
<body>
    <div class="container">
        
        <h1><center>Ajouter un Contact</center></h1><br>
        

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="index.php?page=listContact">Retour à la liste des contacts</a>
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
        
        <div class="mb-3">
            <form action="index.php?page=addCont&action=addContact" method="post">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" required><br>

                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" required><br>

                <label for="email" class="form-label">Email :</label>
                <input type="email" id="email" name="email" class="form-control" required><br>

                <label for="telephone" class="form-label">Téléphone :</label>
                <input type="text" id="telephone" name="telephone" class="form-control" required><br>

                <input type="submit" name="action" class="btn btn-primary mb-3" value="Ajouter">
            </form>
        </div>
        <?php
        // Inclure ici la logique pour traiter le formulaire d'ajout de contact
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </div>
</body>
</html>

