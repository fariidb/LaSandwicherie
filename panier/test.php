<?php




$produit = array('prix'=>5, "qt"=>2, "libelle" => "macdonald");
$produit2 = array('prix'=>3, "qt"=>1, "libelle" => "macdonald1");
$produit3 = array('prix'=>5, "qt"=>2, "libelle" => "macdonald2");
$produit4 = array('prix'=>7, "qt"=>6, "libelle" => "macdonald3");



$prod = array("item"=>$produit, "item2"=>$produit2, "item3"=>$produit3, "item4"=>$produit4);


var_dump($prod);
die();



foreach($prod as $key => $val){

?>

<a href="test.php?prix=<?= $prod['prix'] ?>&qt=<?= $prod['qt'] ?>&libelle=<?= $prod['libelle'] ?>"><?= $prod['libelle'] ?></a>

<?php

}
$_SESSION['panier'] = array();

if(isset($_GET[’prix’]) AND isset($_GET[’qt’]) AND isset($_GET[’libelle’])) {


    $table = array($_GET[’prix’], $_GET[’qt’], $_GET[’libelle’]);


    array_push($_SESSION['panier'], $table);


    print_r($_SESSION['panier']);


}

?>


