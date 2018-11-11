
<?php

foreach ($stat as $key => $val){

?>
<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="img/<?=  $stat[$key]['image']  ?>" alt="">
        <div class="price"><?= $stat[$key]['price'] ?>  €</div>
        <div class="caption">
            <h4><?= $stat[$key]['name'] ?></h4>
            <p><?= $stat[$key]['description'] ?></p>
            <a href="index.php?cat=<?= $cat ?>&id=<?= $stat[$key]['id'] ?>" class="btn btn-order" id="commander" role="button"> Commander</a>
        </div>
    </div>
</div>

<?php

}

?> 