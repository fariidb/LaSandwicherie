<?php
session_start();
// initilisation des sessions
require_once './admin/init.php';
require_once './admin/addPanier.php';
// recuperer le header dans app/public/baseHtml/
require_once './app/public/baseHtml/header.php';
// recuperer la database
require 'admin/database.php';


if(isset($_GET['page'])){

    $request = $_GET['page'];

    switch($request){

        // aller a la page d'accueil
        case 'home':

            require_once './app/public/menu/menu.model.php';
            require_once './app/public/menu/menu.view.php';
            require_once './app/public/home/home.model.php';
            require_once './app/public/home/home.view.php';


        break;
        // aller à la page panier
        case 'panier':

            require_once './app/public/panier/panier.model.php';
            require_once './app/public/panier/panier.view.php';

        break;

        // aller à la page contact
        case 'contact':

            require_once './app/public/contact/contact.model.php';
            require_once './app/public/contact/contact.view.php';

        break;

        // aller à la page fidelite
        case 'monCompte':

            require_once './app/public/fidelite/fidelite.model.php';
            require_once './app/public/fidelite/fidelite.view.php';

        break;
        // aller à la page connexion
        case 'connexion':

            require_once './app/public/connexion/connexion.model.php';
            require_once './app/public/connexion/connexion.view.php';

        break;

        // aller à la page inscription
        case 'inscription':

            require_once './app/public/inscription/inscription.model.php';
            require_once './app/public/inscription/inscription.view.php';

        break;
        // aller à la page paiement
        case 'paiement':

            require_once './app/public/paiement/paiement.model.php';
            require_once './app/public/paiement/paiement.view.php';

        break;

        // aller à la page deconnexion
        case 'deconnexion':

            require_once './app/public/deconnexion/deconnexion.model.php';
            require_once './app/public/deconnexion/deconnexion.view.php';

        break;

        // aller à la page Mesmessages
        case 'mesMessage':

        if($_SESSION['connect']['role'] === "admin"){
            require_once './app/public/mesMessage/mesMessage.model.php';
            require_once './app/public/mesMessage/mesMessage.view.php';
        }else {

            exit(header('location: ?page=home'));
        }
        break;
    }
}else {

    require_once './app/public/menu/menu.model.php';
    require_once './app/public/menu/menu.view.php';
    require_once './app/public/home/home.model.php';
    require_once './app/public/home/home.view.php';

}

    ?>

<?php

// require_once './app/public/baseHtml/footer.php';

?>