<?php



if(isset($_GET['id'])){

    $table = array("id"=> $_GET['id'], "qt" =>0);
    array_push($_SESSION['panier'], $table);
    exit(header('location: index.php?cat='.$_GET['cat']));

}