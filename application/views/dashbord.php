<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <!-- Mes styles-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>

<body>

    <?= require_once('layouts/menu.php'); ?>


        <!-- My Box Content -->
        <div class="boxContent">
            <div class="firstRow">
                <div class="cardOne">
                    <div class="description">
                        <p>Materiels</p>
                        <h3>98765</h3>
                    </div>
                </div>
                <div class="cardOne">
                    <div class="description">
                        <p>Famille materiels</p>
                        
                    </div>
                </div>
                <div class="cardOne">
                    <div class="description">
                        <p>Total invoices</p>
                        <h3>98765</h3>
                    </div>
                </div>
                <div class="cardOne">
                    <div class="description">
                        <p>Total invoices</p>
                        <h3>98765</h3>
                    </div>
                </div>
            </div>
            <div class="secondRow">
                <div class="cardChart">

                </div>
                <div class="cardChart">

                </div>
                <div class="cardChart">

                </div>
            </div>
            <div class="thirdRow">

            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>