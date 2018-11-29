
<?php

    if (!empty($_POST['name']) && !empty($_POST['firstName']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])){
        $name             = checkInput($_POST['name']);
        $firstName        = checkInput($_POST['firstName']);
        $email            = checkInput($_POST['email']);
        $password         = checkInput($_POST['password']);
        $password_confirm = checkInput($_POST['password_confirm']);

        // Test password = password_confirm
        if ($password !== $password_confirm){

            $_SESSION['error'] = array("msg"=>"Les mots de passe ne sont pas identique!", "color"=>"danger");
        }else {

            // Test si l'email existe deja
            $db = Database::connect();
            $sql = "SELECT * FROM users WHERE email='".$email."'";
            $req = $db->query($sql);
            $res = $req->fetchAll();

            if($res){

                $_SESSION['error'] = array("msg"=>"E-mail déja utiliser", "color"=>"danger");

            }else {

                // Cryptage du Password
                $password = sha1($password);

                $sql = "INSERT INTO users(`id`, `name`, `firstName`, `email`, `password`) VALUES(DEFAULT, '".$name."', '".$firstName."', '".$email."', '".$password."')";
                $req = $db->exec($sql);

                $sql = "SELECT * FROM users";
                $req = $db->query($sql);
                $res = $req->fetchAll();

                // insertion dans la base de données des informations en fonction du roles (admin ou user)
                if (!$res){

                    $sql = "INSERT INTO `role` (`id`, `role` ) VALUES(DEFAULT, 'admin')";
                    $req = $db->exec($sql);
                    $_SESSION['error'] = array("msg"=>"Votre inscription a bien été valider", "color"=>"success");

                }else{

                    $sql = "INSERT INTO `role` (`id`, `role` ) VALUES(DEFAULT, 'user')";
                    $req = $db->exec($sql);
                    $_SESSION['error'] = array("msg"=>"Votre inscription a bien été valider", "color"=>"success");

                }

            }

        }
    };


    function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>