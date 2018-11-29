<div class="container admin">
    <div class="row">
    <?php
    if($res){
    ?>
        <div class="alert alert-success col-12" role="alert">
            <h2><?= $_SESSION['connect']['nom'] ?> <?= $_SESSION['connect']['prenom'] ?></h2>
            <p> Vous avez <?= $res[0]['point'] ?> points</p>
        </div>
    <?php

        }
    ?>
    </div>
</div>