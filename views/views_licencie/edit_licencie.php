<?php 

    if(!isset($_SESSION['admin'])){
        header("Location:index.php?page=login");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1><center>Modifier un Licencié</center></h1><br>
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
            <form action="index.php?action=editLicencie&page=editLicence&id=<?php echo $licencie->getId(); ?>" method="post">
               
                <label for="numero" class="form-label">Numéro du Licencié :</label>
                <input type="text" id="numero" name="numero" class="form-control" value="<?php echo $licencie->getNumeroLicence(); ?>" required><br>

                <label for="nom" class="form-label">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" value="<?php echo $licencie->getNom(); ?>" required><br>

                <label for="prenom" class="form-label">Prenom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo $licencie->getPrenom(); ?>" required><br>

                <label for="contactid" class="form-label">Contact :</label>
                <select id="contactid" name="contactid" class="form-select" aria-label="Default select example">
                    <?php foreach ($contact as $ct): ?>
                        <option value="<?php echo $ct->getId(); ?>"><?php echo $ct->getNom(); ?>&nbsp;&nbsp;<?php echo $ct->getPrenom(); ?></option>
                    <?php endforeach; ?>
                    
                </select><br>

                <label for="idCat" class="form-label">Catégorie :</label>
                <select id="idCat" name="idCat" class="form-select" aria-label="Default select example">
                    <?php foreach ($categorie as $cat): ?>
                        <option value="<?php echo $cat->getId(); ?>"><?php echo $cat->getNom(); ?></option>
                    <?php endforeach; ?>
                    
                </select><br>
                
                <input type="submit" class="btn btn-primary mb-3" value="Modifier">
            </form>
        <?php else: ?>
            <p>Le licencié n'a pas été trouvé.</p>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </div>
</body>
</html>

