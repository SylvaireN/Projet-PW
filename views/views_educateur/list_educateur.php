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
        
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="index.php?page=addEducateur">Ajouter un Educateur</a></li>
                &nbsp;&nbsp;&nbsp;
            <li class="nav-item">
                <a href="index.php?page=home">Retourner à l'accueil</a>
            </li>
        </ul>

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
                                <a href="index.php?page=viewEducateur&action=viewEducateur&id=<?php echo $educ->getId(); ?>"><img src="img/view.png" alt="Voir" style="height:30px;"></a>
                                <a href="index.php?page=editEducateur&action=editEducateur&id=<?php echo $educ->getId(); ?>"><img src="img/update.png" alt="Modifier" style="height:30px;"></a>
                                <a href="index.php?page=deleteEducateur&action=deleteEducateur&id=<?php echo $educ->getId(); ?>"><img src="img/delete.png" alt="Supprimer" style="height:30px;"></a>
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

