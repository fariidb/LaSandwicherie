<!doctype html>
<html>
<!-------------------------------------------------------------- PAGE D'ACCUEIL -------------------------------------------------------------->
<head>
    <title>La Sandwicherie</title>
    <meta charset="utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
<div class="container site">
<!-- Connexion - inscription - deconnexion - contact - admin-->
    <div class="form_actions">
        <a class="btn btn-success" href="./inscription/connexion.php"><span class="glyphicon glyphicon-user"></span> | Mon compte</a>
        <!-- <a class="btn btn-danger" href="./inscription/deconnexion.php"><span class="glyphicon glyphicon-off"></span> Deconnexion</a> -->
        <a class="btn btn-info" href="./contact/index.php">Contact</a>
        <a class="btn btn-warning" href="./admin/index.php"><span class="glyphicon glyphicon-star"></span> | Admin</a>
        <a class="btn btn-dark" href="./panier/panier.php"> <span class="glyphicon glyphicon-shopping-cart"></span> | Mon Panier (<?=count($_SESSION['panier']); ?>)</a>
    </div>

    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> La Sandwicherie <span class="glyphicon glyphicon-cutlery"></span></h1>
