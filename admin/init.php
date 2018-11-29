<?php

// j'initialise les sessions pour eviter les erreurs de code php
// ex: if ($_SESSION['error']) = null; ( sans initialisé $_SESSION['error'] il y a un risque 
//que le serveur affiche une erreur)
function init()
{
    // On met true pour pas repeter la function init(), on initialise pour éviter qu'elle se répete
    $_SESSION['init'] = true;
    // initialise la session panier à un tableau vide
    $_SESSION['panier'] = array();
    // optionnel
    $_SESSION['connect'] = null;
    // je l'initialise pour éviter les erreurs de code php, je l'utilise dans les formulaires
    $_SESSION['error'] = null;
    // optionnel
    $_SESSION['message'] = null;
}
// Permet de déclencher la fonction initi() une seul fois
if (!isset($_SESSION['init'])){
    init();
}