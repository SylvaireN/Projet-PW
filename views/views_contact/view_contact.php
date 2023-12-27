<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1><center>Détails du Contact</center></h1>
        <a href="index.php?page=listContact">Retour à la liste des contacts</a>

        <?php if ($contact): ?>
            <p><strong>Nom :</strong> <?php echo $contact->getNom(); ?></p>
            <p><strong>Prénom :</strong> <?php echo $contact->getPrenom(); ?></p>
            <p><strong>Email :</strong> <?php echo $contact->getEmail(); ?></p>
            <p><strong>Téléphone :</strong> <?php echo $contact->getTelephone(); ?></p>
        <?php else: ?>
            <p>Le contact n'a pas été trouvé.</p>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </div>
</body>
</html>

