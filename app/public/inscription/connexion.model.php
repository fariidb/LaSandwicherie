<?php

    if (isset($_SESSION['connect']))
    {
        header('location: ../');
    }

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