<?php
    session_start();

    if (isset($_SESSION['connect']))
    {
        header('location: ../');
    }

    require ('../admin/database.php');

    if (!empty($_POST['email']) && !empty($_POST['password']))
    {
        $email            = $_POST['email'];
        $password         = $_POST['password'];
        $error = 1;

        // Crypter le password
        $password = "aq1".sha1($password. "1234")."25";


        $db = Database::connect();
        $req = $db->prepare('SELECT * FROM users WHERE email = ?');
        $req->execute(array($email));

        while ($user = $req->fetch())
        {
            if ($password == $user['password'])
            {
                $error = 0;
                $_SESSION['connect'] = 1;
                $_SESSION['name']= $user['name'];
                header('location: ./connexion.php?success=1');
            }
        }

        if ($error == 1)
        {
            header('location: ./connexion.php?error=1');
        }

    }
?>
<!doctype html>
<html>
<!-------------------------------------------------------------- FORMULAIRE DE CONNEXION -------------------------------------------------------------->
<head>
    <title>Connexion</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<h1 class="text-logo">Connexion à mon compte</h1>

<div class="container admin">
    <div class="row">
            <div class="col-sm-6">
                <?php
                if (isset($_GET['error']))
                {
                    echo '<div id="error" class="alert alert-danger" role="alert"> Nous ne pouvons pas vous authentifiez</div>';
                }
                elseif (isset($_GET['success']))
                {
                    echo '<div class="alert alert-success" role="alert"> Vous etes connecté</div>';
                }
                ?>
            <form method="post" action="connexion.php">

                <!--                Email-->
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                </div>
                <br>
                <!--               Password -->
                <div class="mb-3">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ex: ******" required>
                </div>
                <br>

                <div class="form_actions">
                    <button type="submit" class="btn btn-primary"> Connexion</button>
                    <a class="btn btn-danger" href="../index.php"> retour</a>
                </div>
            </form>
    </div>

    <div class="row">
            <div class="col-sm-6 compte">
                <h2>C'est ma 1ère commande sur le site</h2>
            <p> Je crée mon compte La Sandwicherie. C'est rapide ! </p>

            <a href="index.php" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span> Créer mon compte</a>
            </div>
    </div>

</body>

</html>