<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Educateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1><center>Liste des Educateurs</center></h1><br/>
        <a href="index.php?page=addEducateur">Ajouter un Educateur</a>

        <?php if (count($educateur) > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Licencié</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($educateur as $educ): ?>
                        <tr>
                            <td><?php echo $educ->getId(); ?></td>
                            <td><?php echo $educ->getEmail(); ?></td>
                            <td>
                                <?php
                                if($educ->getRole() == 1): ?>
                                    Administrateur
                                    <?php elseif($educ->getRole() == 0): ?>
                                        Utilisateur
                                <?php endif; ?>
                        
                            </td>
                            <td>
                                
                                <?php
                                foreach ($licencie as $licence):
                                    if($licence->getId() == $educ->getLicenceID()):
                                        echo $licence->getNom(); ?>&nbsp;&nbsp;
                                        <?php echo $licence->getPrenom();
                                    
                                        
                                        ?>
                                    <?php endif; ?>
                               <?php endforeach; ?>
                            
                            </td>
                            <td>
                                <a href="index.php?page=viewEducateur&action=viewEducateur&id=<?php echo $educ->getId(); ?>">Voir</a>
                                <a href="index.php?page=edit&action=editContact&id=<?php echo $educ->getId(); ?>">Modifier</a>
                                <a href="index.php?page=delete&action=deleteContact&id=<?php echo $educ->getId(); ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun Educateur trouvé.</p>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </div>
</body>
</html>

