<?php

// Connexion a la DB
$db = Database::connect();

// Declarer les variables $panier $pan comme un tableau vide
$panier = array();
$pan = array();

// AJOUT QUANTITÉ
// TODO On vérifie dans l'url si la variable "qt" et "id_change" existe
if(isset($_GET['qt']) and isset($_GET['id_change'])){


    // TODO On creer une boucle pour recuperer les valeurs du tableau "$_SESSION['panier']"
    for($m=0; $m<count($_SESSION['panier']); $m++){
        // si l'id du tableau $_SESSION['panier'] est egale à $_GET['id_change']
        if($_SESSION['panier'][$m]['id'] == $_GET['id_change']){

            // on ajoute a la quantite de Session panier la valeur de "qt"
            $_SESSION['panier'][$m]['qt']= intval($_SESSION['panier'][$m]['qt']) + intval($_GET['qt']);

            // et si la quantite de Session panier est inferieur à zero
            if($_SESSION['panier'][$m]['qt']<0){
                // on laisse la quantite du panier egale zero
                $_SESSION['panier'][$m]['qt']= 0;
            }
        }
    }
}

// SUPPRESSION ARTICLE
//TODO Si dans l'url se trouve une variable delete,  qui prend pour valeur un id de l'article
if(isset($_GET['delete'])){

    // On creer une boucle pour recuperer les valeurs du tableau $_SESSION['panier']
    for($m=0; $m<count($_SESSION['panier']); $m++){
        // si l'id du tableau $_SESSION['panier'] est egale à $_GET['delete']
        if($_SESSION['panier'][$m]['id'] == $_GET['delete']){
            // on utilse la fonctions de php pour supprimer l'element  qui est un tableau qui se trouve a la position $m
            array_splice($_SESSION['panier'], $m, 1);
            exit(header('location: ?page=panier'));
        }
    }
}

// Partie du code qui recupere l'article qui correspond à l'id et ajoute la quantité
//TODO On creer une boucle pour recuperer les valeur id du tableau $_SESSION['panier']
if($_SESSION['panier']){
    for($s = 0; $s < count($_SESSION['panier']); $s++){

        // on declare une variable $id qui est egale à l'id de la session panier
        $id = $_SESSION['panier'][$s]['id'];

        // on recupere sur la table items les valeurs de l'article
        $result = $db->query("SELECT * FROM items WHERE id=".$id);

        // on stock le resultat dans une variable $res
        $res = $result->fetchAll();

        // on creer un tableau $pan qui contient le premier resultat de $res plus un tableau avec clé "qt"
        //et la valeur de la quantité $_SESSION['panier'][$s]['qt']
        $pan =   $res[0]+ array('qt'=>$_SESSION['panier'][$s]['qt']);

        // on ajoute le tableau $pan au tableau $panier à l'aide de la fonction array_push()
        array_push($panier, $pan);

    }
}



// TOTAL PANIER
// on declare une variable $total qui est egale à zero
$total = 0;


//TODO On creer une boucle por recuperer le prix et la quantite dans le tableau $panier
foreach($panier as $ks){

    // on additionne l'ancien et le nouveau prix à la variable $totale
    $total += (floatval($ks['price']) * intval($ks['qt']));

}