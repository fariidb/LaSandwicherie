<div class="container admin">
    <div class="row">
            <div class="col-sm-6">

                <form method="post" action="">
                <?php
                    if($_SESSION['error'] != null){
                ?>
                    <div class="alert alert-<?= $_SESSION['error']['color']  ?>" role="alert">
                    <?= $_SESSION['error']['msg'] ?>
                    </div>

                <?php
                    $_SESSION['error'] = null;
                    }
                ?>

                <!--Email-->
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                </div>
                <br>

                <!--Password -->
                <div class="mb-3">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ex: ******" required>
                </div>
                <br>

                <div class="form_actions">
                    <button type="submit" class="btn btn-primary"> Connexion</button>
                    <a class="btn btn-danger" href="?page=home"> retour</a>
                </div>
            </form>
    </div>

    <div class="row">
            <div class="col-sm-6 compte">
                <h2>C'est ma 1ère commande sur le site</h2>
                <p> Je crée mon compte La Sandwicherie. C'est rapide ! </p>

                <a href="?page=inscription" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span> Créer mon compte</a>
            </div>
    </div>

</body>

</html>