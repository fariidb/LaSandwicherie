<?php

if(isset($_GET['cat'])):

$cat = $_GET['cat'];
else:

    $cat =1;

endif;
    // recuperation dans la table item toutes les categories
    $statement = $db->prepare("SELECT * FROM items WHERE category ='".$cat."'");
    $statement->execute(array($cat));
    $stat = $statement->fetchAll();



