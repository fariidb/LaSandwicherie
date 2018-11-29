

<div>
    <div class="container admin">
        <div class="row">
            <div class="col-sm-12">
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
                        <!--Nom-->
                        <div class="mb-3">
                            <label for="name">Nom <span class="red">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Votre nom" required>
                        </div>
                        <br>
                        <!--Prénom-->
                        <div class="mb-3">
                            <label for="firstName">Prénom <span class="red">*</span></label>
                            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Votre prénom" required>
                        </div>
                        <br>
                        <!--Email-->
                        <div class="mb-3">
                            <label for="email">Email <span class="red">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="exemple@email.com" required>
                        </div>
                        <br>
                        <!--Password -->
                        <div class="mb-3">
                            <label for="password">Mot de passe <span class="red">*</span></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Ex: ******" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Confirmer le Mot de passe <span class="red">*</span></label>
                            <input type="password" class="form-control" name="password_confirm" id="password" placeholder="Ex: ******" required>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <p class="red"><strong>* Ces informations sont requises</strong></p>
                        </div>

                        <div class="form_actions ">
                            <button type="submit" class="btn btn-success"> Valider</button>
                            <a class="btn btn-danger" href="?page=home"> Annuler</a>
                        </div>
                </form>
            <br>
            <p> Déjà inscrit ? <a href="?page=connexion"> Connectez-vous</a></p>
            </div>
        </div>
    </div>
</div>
</body>

</html>