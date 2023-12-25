<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
   
</head>
<body>
    <h1>Ajouter un Contact</h1>
    <a href="index.php?page=listCategorie">Retour à la liste des contacts</a>

    <form action="index?page=add&action=addCategorie" method="post">
        <label for="nom">Nom du categorie :</label>
        <input type="text" id="nomCat" name="nomCat" required><br>

        <label for="prenom">Code Raccourcie :</label>
        <input type="text" id="codeRaccourci" name="codeRaccourci" required><br>

        <input type="submit" name="action" value="Ajouter">
    </form>

    <?php
    // Inclure ici la logique pour traiter le formulaire d'ajout de contact
    ?>

</body>
</html>

