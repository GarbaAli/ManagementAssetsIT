<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Famille Materiels</title>

    <!-- Mes styles-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/DataTables/media/css/jquery.dataTables.min.css') ?>">
    <script src="<?= base_url('assets/DataTables/media/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/DataTables/media/js/jquery.dataTables.min.js') ?>"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" type="text/css">
</head>

<body>

<!-- My Side Barre -->
<div class="sideBarre">
        <div class="sideBarre__logo">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="">
        </div>
        <div class="sideBarre__menu">
            <ul>
                <li><a href="<?= base_url('assets_it.php') ?>">Tableau de bord</a></li>
                <hr><strong style="color:#7e9bc3;font: size 18px;">Assets</strong>
                <li><a href="#">Commandes</a></li>
                <li><a href="#">Flux Materiels</a></li>
                <li><a href="#">Inventaires</a></li>
                <hr><strong style="color:#7e9bc3;font: size 18px;">Parametres</strong>
                <!-- Sites et Departement -->
                <li><a href="#">Localisation</a></li> 
                <li><a href="<?= base_url('assets_it.php/familleControlleur/index') ?>">Materiels</a></li>
                <li><a href="#">Fournisseurs</a></li>
                <hr><strong style="color:#7e9bc3;font: size 18px;">Administration</strong>
                <li><a href="#">Clients</a></li>
                <li><a href="<?= base_url('assets_it.php/technicienControlleur/index') ?>">Utilisateurs</a></li>
                <li><a href="#">Roles</a></li>
                
            </ul>
        </div>
    </div>
    
    <!-- My Main Content -->
    <div class="mainContent">
        <!-- nav-horizontal -->
        <nav style="background-color: #7e9bc3">
            <div class="user">

            </div>
        </nav>
        <!-- fin nav-horizontal -->