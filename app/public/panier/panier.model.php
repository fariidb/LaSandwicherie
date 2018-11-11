<?php
$db = Database::connect();
$panier = array();


if(isset($_GET['qt'])){


    for($m=0; $m<count($_SESSION['panier']); $m++){
        if($_SESSION['panier'][$m]['id'] == $_GET['id_change']){

            $_SESSION['panier'][$m]['qt']= intval($_SESSION['panier'][$m]['qt']) + intval($_GET['qt']);

            if($_SESSION['panier'][$m]['qt']<0){

                $_SESSION['panier'][$m]['qt']= 0;
            }
        }
    }


}

if(isset($_GET['delete'])){


    for($m=0; $m<count($_SESSION['panier']); $m++){
        if($_SESSION['panier'][$m]['id'] == $_GET['delete']){

        array_splice($_SESSION['panier'], $m, 1);
        }
    }
}







for($s = 0; $s < count($_SESSION['panier']); $s++){

            $id = $_SESSION['panier'][$s]['id'];

            $result = $db->query("SELECT * FROM items WHERE id=".$id);

            $res = $result->fetchAll();
            $pan =   $res[0]+ array('qt'=>$_SESSION['panier'][$s]['qt']);

array_push($panier, $pan);

}

$total = 0;

foreach($panier as $ks){


        $total += (floatval($ks['price']) * intval($ks['qt']));

}