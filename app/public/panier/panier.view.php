<!-------------------------------------------------- PANIER -------------------------------------------------->
<div class="row">
    <!-- <a class="btn btn-danger" href="?page=home"> retour </a> -->
        <h1><strong>Commande</strong></h1>


<form >

        <?php
            if(!empty($panier)){
        ?>

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
                    <!-- NOM -->
                    <th><?= $key['name'] ?></th>
                    <!-- PRIX -->
                    <th ><span><?= $key['price'] ?> €</span></th>
                    <!-- QUANTITE -->
                    <th class="row">
                        <input class="col-10" type="text" value="<?= $key['qt'] ?>" class="qte" name="qt" readonly >
                        <div class="col-2" >
                        <a href="?page=panier&id_change=<?= $key['id'] ?>&qt=-1"><i class="glyphicon glyphicon-minus-sign"></i></a><a href="?page=panier&id_change=<?= $key['id'] ?>&qt=1"><i class="glyphicon glyphicon-plus-sign"></i></i></a>
                        </div>
                    </th>
                    <!-- SUPPRESSION -->
                    <th  class="panier-form"><a class="btn" href="?page=panier&delete=<?= $key['id'] ?>" ><i class="glyphicon glyphicon-trash"></i></a></th>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
</form>


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
            <a href="?page=paiement" class=" btn button2">payer</a>
        </div>

        <?php
        }else{
        ?>
            <h2>votre panier est vide</h2>
        <?php
        }
        ?>
</div>




