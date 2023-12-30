<?php 

    if(!isset($_SESSION['admin'])){
        header("Location:index.php?page=login");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Contacts</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1><center>Liste des Contacts</center></h1><br/>
        
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="index.php?page=addCont">Ajouter un Contact</a>
                &nbsp;&nbsp;&nbsp;
            <li class="nav-item">
                <a href="index.php?page=home">Retourner à l'accueil</a>
            </li>&nbsp;&nbsp;&nbsp;
            <li> <a class="nav-item" href="index.php?page=logout">Déconnexion</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
    
                if(isset($_SESSION['admin'])): ?>
                <li class="nav-item">
                <div class="position-absolute" style="right: 150px">
                <center><img src="img/online.png" alt="admin" style="height:30px;"><br>
                    <?php 
                        echo "" . $_SESSION['admin'] . "";
                    ?>
                </center>
                </div>
              
                </li>
                
                
            <?php endif; ?>
        </ul>

        <?php if (count($contact) > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contact as $cont): ?>
                        <tr>
                            <td><?php echo $cont->getId(); ?></td>
                            <td><?php echo $cont->getNom(); ?></td>
                            <td><?php echo $cont->getPrenom(); ?></td>
                            <td><?php echo $cont->getEmail(); ?></td>
                            <td><?php echo $cont->getTelephone(); ?></td>
                            <td>
                                <a href="index.php?page=viewContact&action=viewContact&id=<?php echo $cont->getId(); ?>"><img src="img/view.png" alt="Voir" style="height:30px;"></a>
                                <a href="index.php?page=editContact&action=editContact&id=<?php echo $cont->getId(); ?>"><img src="img/update.png" alt="Modifier" style="height:30px;"></a>
                                <a href="index.php?page=deleteContact&action=deleteContact&id=<?php echo $cont->getId(); ?>"><img src="img/delete.png" alt="Supprimer" style="height:30px;"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun Contact trouvé.</p>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </div>
</body>
</html>

