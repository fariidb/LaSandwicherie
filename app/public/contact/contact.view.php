
        <div class="divider"></div>
        <div class="heading">

        </div>

        <div class="row">
            <a class="btn btn-danger" href="?page=home"> retour</a>
            <div class="col-lg-10 col-lg-offset-1">
                <form id="contact-form" method="post" action="" role="form">
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
                    <div class="row">
                        <div class="col-md-6">
                            <label for="firstname">Prenom <span class="red">*</span></label>
                            <input type="text" id="firstname" name="firstName" class="form-control" placeholder="Votre prénom">
                            <p class="comments"></p>
                        </div>

                        <div class="col-md-6">
                            <label for="name">nom <span class="red">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom">
                            <p class="comments"></p>
                        </div>

                        <div class="col-md-6">
                            <label for="email">email <span class="red">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Votre email">
                            <p class="comments"></p>
                        </div>

                        <div class="col-md-6">
                            <label for="phone">Telephone <span class="red">*</span></label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre telephone">
                            <p class="comments"></p>
                        </div>

                        <div class="col-md-12">
                            <label for="message">Message <span class="red">*</span></label>
                            <textarea class="form-control" name="message" id="message" rows="4" placeholder="Votre message"></textarea>
                            <p class="comments"></p>
                        </div>

                        <div class="col-md-12">
                            <p class="red"><strong>* Ces informations sont requises</strong></p>
                        </div>

                        <div class="col-md-12">
                            <input type="submit" class="button1" value="Envoyer">
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

</body>
</html>