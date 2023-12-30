<?php 

    if(!isset($_SESSION['admin'])){
        header("Location:index.php?page=login");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un educateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1><center>Modifier un educateur</center></h1><br>
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
            <form action="index.php?action=editEducateur&page=editEducateur&id=<?php echo $educateur->getId(); ?>" method="post">
               
                <label for="email" class="form-label">Email :</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php echo $educateur->getEmail(); ?>" required><br>

                <label for="role" class="form-label">Rôle :</label>
                <select id="role" name="role" class="form-select" aria-label="Default select example">
                    <option value="1">Administrateur</option>
                    <option value="0">Utilisateur</option>
                </select><br>

                <label for="licence_id" class="form-label">Licencié :</label>
                <select id="licence_id" name="licence_id" class="form-select" aria-label="Default select example">
                    <?php foreach ($licencie as $licence): ?>
                        <option value="<?php echo $licence->getId(); ?>"><?php echo $licence->getNom(); ?>&nbsp;&nbsp;<?php echo $licence->getPrenom(); ?></option>
                    <?php endforeach; ?>
                    
                </select><br>

                <input type="submit" class="btn btn-primary mb-3" value="Modifier">
            </form>
        <?php else: ?>
            <p>Le contact n'a pas été trouvé.</p>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </div>
</body>
</html>

