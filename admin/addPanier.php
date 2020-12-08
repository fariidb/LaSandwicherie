<?php

$run = false ;

if(isset($_GET['id'])){

    if(!empty($_SESSION['panier'])){

        for($i= 0; $i< count($_SESSION['panier']); $i++){

                if($_SESSION['panier'][$i]['id'] == $_GET['id']){

                    $_SESSION['panier'][$i]['qt'] = intval( $_SESSION['panier'][$i]['qt'])+1;
                    $run = true;
                }
        }

        if($run == false){


            $table = array('id'=>$_GET['id'], "qt"=>1);
            array_push($_SESSION['panier'], $table);
        }


        $run = false;



    }else {

        $table = array('id'=>$_GET['id'], "qt"=>1);
        array_push($_SESSION['panier'], $table);
    }




    





}