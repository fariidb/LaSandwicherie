<?php
session_start();
// initilisation des session
require_once './admin/init.php';
require_once './admin/addPanier.php';
// recuperer le header dans app/public/baseHtml/
require_once './app/public/baseHtml/header.php';
// recuperer la database
require 'admin/database.php';

// ______________________________________________________
// require menu et home
// require_once './app/public/menu/menu.model.php';
// require_once './app/public/menu/menu.view.php';
// require_once './app/public/home/home.model.php';
// require_once './app/public/home/home.view.php';


require_once './app/public/panier/panier.model.php';
require_once './app/public/panier/panier.view.php';


    // ________________________________________________________________________________ model
    

    // _________________________________________________________________________________ vierw
    ?>

<?php

// recuperer le footer dans app/public/baseHtml/
require_once './app/public/baseHtml/footer.php';

?>