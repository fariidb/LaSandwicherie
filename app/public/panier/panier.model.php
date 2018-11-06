<?php
$db = Database::connect();
$panier = array();

foreach ($_SESSION['panier'] as $key){
    print_r($key);

            $id = $key['id'];

            $result = $db->query("SELECT * FROM items WHERE id=".$id);
            
            array_push($panier, $result->fetchAll());


}

$totale = 0;