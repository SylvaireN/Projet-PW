<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'éducateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1><center>Détails de l'éducateur</center></h1>
        <a href="index.php?page=listEducateur">Retour à la liste des éducateurs</a>

        <?php if ($educateur): ?>
            <p><strong>Email :</strong> <?php echo $educateur->getEmail(); ?></p>
            <p><strong>Rôle :</strong>
                <?php
                    if($educateur->getRole() == 1): ?>
                        Administrateur
                        <?php elseif($educateur->getRole() == 0): ?>
                        Utilisateur
                <?php endif; ?>
            
            </p>
            <p><strong>Licencié :</strong>
                <?php
                    foreach ($licencie as $licence):
                        if($licence->getId() == $educateur->getLicenceID()):
                            echo $licence->getNom(); ?>&nbsp;&nbsp;
                            <?php echo $licence->getPrenom();?>
                        <?php endif; ?>
                <?php endforeach; ?>
            </p>
        <?php else: ?>
            <p>Le contact n'a pas été trouvé.</p>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </div>
</body>
</html>

