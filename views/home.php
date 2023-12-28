<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashbord</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h1><center>Dashboard</center></h1><br/>
        <!--<a href="index.php?page=addCategorie">Ajouter une catégorie</a>
            <a href="index.php?page=listCategorie">Voir catégorie</a>-->
        <nav class="navbar " style="background-color: #e3f2fd;">
        <ul class="nav nav-pills ">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php?page=home">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php?page=listCategorie">Listes des catégories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=listLicencie">Listes des Licenciés</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=listEducateur">Listes des Educateurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=listContact">Listes des Contacts</a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>-->
        </ul>
    </nav>

    </div>

    <div class="container py-4">
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Projet Prog Web</h1>
                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
                <button class="btn btn-primary btn-lg" type="button"> Lire Plus </button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>

