<?php
session_start();
// initilisation des sessions
require_once './admin/init.php';
require_once './admin/addPanier.php';
// recuperer le header dans app/public/baseHtml/
require_once './app/public/baseHtml/header.php';
// recuperer la database
require 'admin/database.php';

// ______________________________________________________
// require menu et home
if(isset($_GET['page'])){

    $request = $_GET['page'];

    switch($request){


        case 'home':

            require_once './app/public/menu/menu.model.php';
            require_once './app/public/menu/menu.view.php';
            require_once './app/public/home/home.model.php';
            require_once './app/public/home/home.view.php';


        break;

        case 'panier':

            require_once './app/public/panier/panier.model.php';
            require_once './app/public/panier/panier.view.php';

        break;

        case 'contact':

            require_once './app/public/contact/contact.model.php';
            require_once './app/public/contact/contact.view.php';

    break;
    }
}else {



    require_once './app/public/menu/menu.model.php';
    require_once './app/public/menu/menu.view.php';
    require_once './app/public/home/home.model.php';
    require_once './app/public/home/home.view.php';



}


    // _________________________________________________________________________________ view
    ?>

<?php

// recuperer le footer dans app/public/baseHtml/
require_once './app/public/baseHtml/footer.php';

?>