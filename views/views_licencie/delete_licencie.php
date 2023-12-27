<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un Licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1><center>Supprimer un Licencié</center></h1>
    <a href="index.php?page=listLicencie">Retour à la liste des licenciés</a>

    <?php if ($licencie): ?>
        <p>Voulez-vous vraiment supprimer le licencié "<?php echo $licencie->getNom(); ?> &nbsp;&nbsp;<?php echo $licencie->getPrenom(); ?>" ?</p>
        <form action="index.php?page=deleteLicence&action=deleteLicencie&id=<?php echo $licencie->getId(); ?>" method="post">
            <input type="submit" class="btn btn-primary mb-3" value="Oui, Supprimer">
        </form>
    <?php else: ?>
        <p>Le licencie  n'a pas été trouvé.</p>
    <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>

