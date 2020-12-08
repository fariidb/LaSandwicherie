<?php


    if (!empty($_POST['name']) && !empty($_POST['firstName']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm']))
    {
        $name             = $_POST['name'];
        $firstName        = $_POST['firstName'];
        $email            = $_POST['email'];
        $password         = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

//    Test password = password_confirm

        if ($password != $password_confirm)
        {
            header('location: ./?error=1&pass=1');
        }

//    Test si l'email existe deja

        $db = Database::connect();
        $req = $db->prepare("SELECT count(*) as numberEmail FROM users WHERE email = ?");
        $req->execute(array($email));

        while ($checkEmail = $req->fetch())
                {
                    if ($checkEmail['numberEmail'] != 0)
                        {
                            header('location: ./?error=1&email=1');
                        }
                }


//       Envoi du formulaire dans la DB

        // Cryptage du Password (grain de sable)
        $password = sha1($password);

        // envoi de la requete
        $req = $db->prepare("INSERT INTO users(name, firstName, email, password, secret) VALUES(?, ?, ?, ?, ?)");
        $req->execute(array($name, $firstName, $email, $password, $secret));
        header('location: ./?success=1');


    };
?>