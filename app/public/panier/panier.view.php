<div class="row">
<a class="btn btn-danger" href="?page=home"> retour</a>
        <h1><strong>Commande</strong></h1>

<form >
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($panier as $key)
            {
            ?>
                <tr>
                    <th><?= $key['name'] ?></th>
                    <th >
                    <span><?= $key['price'] ?> €</span>
                    </th>
                    <th class="row">
                    <input class="col-10" type="text" value="<?= $key['qt'] ?>" class="qte" name="qt" >
                    <div class="col-2" ><a href="?page=panier&id_change=<?= $key['id'] ?>&qt=-1"><i class="glyphicon glyphicon-minus-sign"></i></a><a href="?page=panier&id_change=<?= $key['id'] ?>&qt=1"><i class="glyphicon glyphicon-plus-sign"></i></i></a></div>
                    </th>
                    <th  class="panier-form"><a class="btn" href="?page=panier&delete=<?= $key['id'] ?>" ><i class="glyphicon glyphicon-trash"></i></a></th>
                </tr>
            <?php
            }
            ?>
</form>
            </tbody>

        </table>
        <table>
        <thead>
                <th id="LabelTotalPanier">Total</th>
            </thead>
            <tbody>
                <tr>
                    <th id="TotalPanier"><input type="text" class="ttc" value="<?= $total   ?> €" readonly></th>
                </tr>
            </tbody>
        </table>
        <div class="col-md-12">
            <input type="submit" id="button2" value="Payer">




