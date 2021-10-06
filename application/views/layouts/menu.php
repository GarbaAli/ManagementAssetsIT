<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventaire Assets</title>

    <!-- Mes styles-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/DataTables/media/css/jquery.dataTables.min.css') ?>">
    <script src="<?= base_url('assets/DataTables/media/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/DataTables/media/js/jquery.dataTables.min.js') ?>"></script>
    
</head>

<body style="background-color:#bacce5">

<!-- My Side Barre -->
<div class="sideBarre">
        <div class="sideBarre__logo">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="">
        </div>
        <div class="sideBarre__menu">
            <ul>
                <li><a href="<?= base_url('assets_it.php') ?>">Tableau de bord</a></li>
                <hr><strong style="color:#7e9bc3;font: size 18px;">Assets</strong>
                <li><a href="<?= base_url('assets_it.php/cmdControlleur/index') ?>">Commandes</a></li>
                <li><a href="<?= base_url('assets_it.php/inventaireControlleur/index') ?>">Suivi Assets</a></li>
                <hr><strong style="color:#7e9bc3;font: size 18px;">Parametres</strong>
                <!-- Sites et Departement -->
                <li><a href="<?= base_url('assets_it.php/siteControlleur/index') ?>">Localisation</a></li>
                <li><a href="<?= base_url('assets_it.php/familleControlleur/index') ?>">Famille Materiels</a></li>
                <li><a href="<?= base_url('assets_it.php/fsseurControlleur/index') ?>">Fournisseurs</a></li>
                <hr><strong style="color:#7e9bc3;font: size 18px;">Administration</strong>
                <li><a href="<?= base_url('assets_it.php/utilisateurController/index') ?>">Utilisateurs</a></li>
                <li><a href="<?= base_url('assets_it.php/departementControlleur/index') ?>">Departement</a></li>
                <li><a href="<?= base_url('assets_it.php/roleControlleur/index') ?>">Roles</a></li>
                
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