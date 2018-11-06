<?php

    // CONNEXION A LA DB
    $db = Database::connect();
    // recuperartion tout data dans la table category
    $statement = $db->query('SELECT * FROM categories');
    
    $categories = $statement->fetchAll();