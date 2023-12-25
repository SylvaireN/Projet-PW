<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1><center>Modifier une Categorie</center></h1>
        <a href="index.php?page=listCategorie">Retour à la liste des catégorie</a>

        <?php if ($categorie): ?>
            <form action="index.php?action=editCategorie&page=editCat&id=<?php echo $categorie->getId(); ?>" method="post">
                <label for="nomCat" class="form-label">Nom du Catégorie:</label>
                <input type="text" id="nomCat" name="nomCat" class="form-control" value="<?php echo $categorie->getNom(); ?>" required><br>

                <label for="codeRaccourci" class="form-label">Code Raccourci :</label>
                <input type="text" id="codeRaccourci" name="codeRaccourci" class="form-control" value="<?php echo $categorie->getCode(); ?>" required><br>

                <input type="submit" class="btn btn-primary mb-3" value="Modifier">
            </form>
        <?php else: ?>
            <p>La catégorie n'a pas été trouvé.</p>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </div>
</body>
</html>

