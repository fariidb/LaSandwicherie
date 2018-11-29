<?php

$run = false ;

if(isset($_GET['id'])){
// si la session panier n'est pas vide
    if(!empty($_SESSION['panier'])){

        for($i= 0; $i< count($_SESSION['panier']); $i++){

                if($_SESSION['panier'][$i]['id'] == $_GET['id']){
// intval() convertir un caractere string en caractere entier
                    $_SESSION['panier'][$i]['qt'] = intval( $_SESSION['panier'][$i]['qt'])+1;
                    $run = true;
                }
        }

        if($run == false)
        {
            $table = array('id'=>$_GET['id'], "qt"=>1);
            // array_push() permet dj'aouter un article dans le tableau dans la $_SESSION['panier']
            array_push($_SESSION['panier'], $table);
        }

        $run = false;

    }else
    {
        // si la session panier est vide
        $table = array('id'=>$_GET['id'], "qt"=>1);
        array_push($_SESSION['panier'], $table);
    }

}