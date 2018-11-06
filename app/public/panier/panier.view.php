<div class="row">
        <h1><strong>Commande</strong></h1>

<form >
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($panier as $key){

                    ?>
                        <tr>
                            <th><?= $key[0]['name'] ?></th>
                            <th ><span><?= $key[0]['price'] ?></span></th>
                            <th><input type="number" value="1" class="qt" name="qt" ></th>
                            <th  class="panier-form"><a class="btn" href="" >supprimer</a></th>
                        </tr>

                        
                    <?php

            }

            ?>

</form>
                        <tr>
                            <th><input type="text" class="ttc" readonly></th>
                        </tr>
            </tbody>


        </table>
        <div class="col-md-12">
            <input type="submit" id="button2" value="Payer">




