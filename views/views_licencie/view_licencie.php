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
        <h1><center>Détails du Licencié</center></h1>
        <a href="index.php?page=listLicencie">Retour à la liste des catégories</a>

        <?php if ($licencie): ?>
            <p><strong>Numéro de Licence :</strong> <?php echo $licencie->getNumeroLicence(); ?></p>
            <p><strong>Nom :</strong> <?php echo $licencie->getNom(); ?></p>
            <p><strong>Prénom :</strong> <?php echo $licencie->getPrenom(); ?></p>
            <p><strong>Contact :</strong> <?php echo $licencie->getContact(); ?></p>
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

