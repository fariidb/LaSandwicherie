<?php

    // CONNEXION A LA DB
    $db = Database::connect();
    // recuperation des données dans la table categories
    $statement = $db->query('SELECT * FROM categories');
    $categories = $statement->fetchAll();