<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Educateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   
</head>
<body>
    <div class="container">
        
        <h1><center>Ajouter un Eduacteur</center></h1>
        <a href="index.php?page=listEducateur">Retour à la liste des Educateurs</a>
        <div class="mb-3">
            <form action="index.php?page=addEducateur&action=addEducateur" method="post">
                <label for="email" class="form-label">Email :</label>
                <input type="email" id="email" name="email" class="form-control" required><br>

                <label for="motdepasse" class="form-label">Mot de Passe :</label>
                <input type="password" id="motdepasse" name="motdepasse" class="form-control" required><br>

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

