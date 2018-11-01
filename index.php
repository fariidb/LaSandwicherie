<?php
session_start();

function init()
{
    $_SESSION['init'] = true;
    $_SESSION['panier'] = array();
}

if (!isset($_SESSION['init'])){
    init();
}

if (isset($_SESSION['panier']))
if(isset($_GET['prix']) AND isset($_GET['nom']))
{

    $table = array("prix"=> $_GET['prix'], "nom" => $_GET['nom'] );
    array_push($_SESSION['panier'], $table);

}
?>
<!doctype html>
<html>
<!-------------------------------------------------------------- PAGE D'ACCUEIL -------------------------------------------------------------->
<head>
    <title>La Sandwicherie</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
<div class="container site">
<!-- Connexion - inscription - deconnexion - contact - admin-->
    <div class="form_actions">
        <a class="btn btn-success" href="./inscription/connexion.php">Connexion</a>
        <a class="btn btn-primary" href="./inscription">Inscription</a>
        <a class="btn btn-danger" href="./inscription/deconnexion.php">Déconnecter</a>
        <a class="btn btn-info" href="./contact/index.php">Contact</a>
        <a class="btn btn-warning" href="./admin/index.php">Admin</a>
        <a class="btn btn-warning" href="./panier/panier.php">Panier (<?=count($_SESSION['panier']); ?>)</a>
    </div>

    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> La Sandwicherie <span class="glyphicon glyphicon-cutlery"></span></h1>


    <?php
    require 'admin/database.php';
    echo '<nav>
            <ul class="nav nav-pills">';
//    CONNEXION A LA DB
    $db = Database::connect();
    $statement = $db->query('SELECT * FROM categories');
    $categories = $statement->fetchAll();
//    RECUPERATION DES ITEMS MENU DANS LA DB
    foreach ($categories as $category)
    {
        if ($category['id'] == '1')
        {
            echo '<li role="presentation" class="active"><a href="#' . $category['id'] . '"data-toggle="tab">' . $category['name'] . '</a></li>';
        }
        else
        {
            echo '<li role="presentation"><a href="#' . $category['id'] . '"data-toggle="tab">' . $category['name'] . '</a></li>';
        }
    }

    echo '</ul>
            </nav>';

    echo '<div class="tab-content">';

    foreach ($categories as $category)
    {
        if ($category['id'] == '1')
        {
            echo '<div class="tab-pane active" id="' . $category['id'] . '">';
        }
        else
        {
            echo '<div class="tab-pane" id="' . $category['id'] . '">';
        }

        echo '<div class="row">';

        $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
        $statement->execute(array($category['id']));

        while ($item = $statement->fetch())
        {

            $prix = number_format($item['price']);
            $nom = $item["name"];

            echo'<div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="img/' . $item['image'] . '" alt="...">
                        <div class="price">' . number_format($item['price'],2,'.', ''). ' €</div>
                        <div class="caption">
                            <h4>' . $item['name'] . '</h4>
                            <p>' . $item['description'] . '</p>
                            <a href="index.php?prix='.$prix.'&nom='.$nom.'" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                        </div>
                    </div>
                </div>';
        }

        echo '</div>
                    </div>';
    }
    Database::disconnect();

    echo '</div>'
    ?>


    </div>
</body>

</html>