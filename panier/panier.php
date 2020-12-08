<!doctype html>
<html lang="fr">
<!-------------------------------------------------------------- PANIER -------------------------------------------------------------->
<head>
    <title>Panier</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js"></script>
</head>

<body>
<h1 class="text-logo"><span class="glyphicon glyphicon-shopping-cart"></span> Panier </h1>

<div class="container admin">
    <div class="row">
        <h1><strong>Commande</strong></h1>


        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($_SESSION['panier'] as $key)
            {
                foreach ($key as $k=> $v)
                {
                    ?>

                    <div><?= $k."=>".$v ?></div>

                    <?php
                }
            }

            ?>


            </tbody>


        </table>
        <div class="col-md-12">
            <input type="submit" id="button2" value="Payer">

        </div>
    </div>
</div>
</body>



</html>