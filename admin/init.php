<?php


function init()
{
    $_SESSION['init'] = true;
    $_SESSION['panier'] = array();
}

if (!isset($_SESSION['init'])){
    init();
}