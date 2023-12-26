<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Licenciés</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1><center>Liste des Licenciés</center></h1><br/>
        <a href="index.php?page=addLicence">Ajouter un Licencié</a>

        <?php if (count($licencie) > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Numéro de Licence</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Contact</th>
                        <th>Catégorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($licencie as $licence): ?>
                        <tr>
                            <td><?php echo $licence->getNumeroLicence(); ?></td>
                            <td><?php echo $licence->getNom(); ?></td>
                            <td><?php echo $licence->getPrenom(); ?></td>
                            <td><?php echo $licence->getContact(); ?></td>
                            <td><?php
                                foreach ($categorie as $cat):
                                    if($cat->getId() == $licence->getIdCat()):
                                        echo $cat->getNom(); 
                                    
                                        
                                        ?>
                                    <?php endif; ?>
                               <?php endforeach; ?>
                             </td>
                            <td>
                                <a href="index.php?page=view&action=viewCategorie&id=<?php echo $licence->getId(); ?>">Voir</a>
                                <a href="index.php?page=edit&action=editContact&id=<?php echo $licence->getId(); ?>">Modifier</a>
                                <a href="index.php?page=delete&action=deleteContact&id=<?php echo $licence->getId(); ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun Licencié trouvé.</p>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </div>
</body>
</html>

