<nav>
    <ul class="nav nav-pills">

<?php
if(isset($_GET['cat'])){

    $cat = $_GET['cat'];

}else {

    $cat = 1;
}
    // verifier si la table categorie est n'est pas vide
    if($categories):
        // creer un foreach pour visualiser les donées
        foreach ($categories as $key => $value) {
            if($categories[$key]['id'] == $cat){
?>
                <li  class="active"><a href="index.php?cat=<?= $value['id'] ?>" ><?= $value['name'] ?></a></li>

<?php

            }else {

?>
                <li  class=" "><a href="index.php?cat=<?= $value['id'] ?>" ><?= $value['name'] ?></a></li>
<?php
            }
        }
    endif;
?>

    </ul>
</nav>

<div class="tab-content">