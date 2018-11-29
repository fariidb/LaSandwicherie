


<div class="container admin">
    <div class="row">
    <?php
    if(!$res){
        ?>

                <div class="alert alert-success col-12" role="alert">
                    <h2>Vous n'avez pas de message </h2>
                </div>

    <?php


    }else{

        foreach($res as $val){
        ?>
                <div class="alert alert-success col-12" role="alert">
                    Nom: <?= $val['nom'] ?> <?= $val['prenom'] ?></p>
                    <?= $val['message'] ?></p>
                    <a class="btn btn-danger" href="?page=mesMessage&id=<?= $val['id'] ?>"> supprimer</a>
                </div>
        <?php
        }
    }
    ?>

    </div>
</div>
