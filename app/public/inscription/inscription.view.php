<div>
    <div class="container admin">
        <div class="row">
            <div class="col-sm-12">
                <?php
                if (!isset($_SESSION['connect']))
                { ?>


            <!--affichage des erreurs-->
                <?php
            if (isset($_GET['error']))
            {
                if (isset($_GET['pass']))
                {
                    echo '<div id="error" class="alert alert-danger" role="alert"> Les mots de passe ne sont pas identiques.</div>';
                }
                elseif (isset($_GET['email']))
                {
                    echo '<div id="error" class="alert alert-warning" role="alert"> Cette adresse email est deja prise.</div>';
                }
            }
            elseif (isset($_GET['success']))
            {
                echo '<div class="alert alert-success" role="alert"> Votre inscription à bien était validé.</div>';
            }
            ?>
                <form method="post" action="index.php">
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
                            <input type="password" class="form-control" name="password" id="password" placeholder="Ex: ******" required>
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
                <?php } else{ ?>
                <h1 class="text-center" ><strong>Bonjour <?= $_SESSION['firstname'] ?> </strong></h1>
                <a href="../index.php" class="btn btn-warning btn-lg"><span class="glyphicon glyphicon-eye-open"></span> Voir la boutique</a>
                <?php }?>
            </div>
        </div>
    </div>
</div>
</body>

</html>