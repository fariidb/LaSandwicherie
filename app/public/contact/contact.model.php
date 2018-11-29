
<?php

if($_POST){


    if (!empty($_POST['name']) && !empty($_POST['firstName']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])){
        $name             = checkInput($_POST['name']);
        $firstName        = checkInput($_POST['firstName']);
        $email            = checkInput($_POST['email']);
        $telephone        = checkInput($_POST['phone']);
        $message          = checkInput($_POST['message']);

        $db = Database::connect();
        $sql = "INSERT INTO messages(`id`, `nom`, `prenom`, `email`, `tel`, `message` ) VALUES(DEFAULT, '".$name."', '".$firstName."', '".$email."', '".$telephone."',  '".$message."')";
        $req = $db->exec($sql);
        $_SESSION['error'] = array("msg"=>"Votre message a été bien envoyé", "color"=>"success");
        exit(header('location: ?page=contact'));

    }else {


        $_SESSION['error'] = array("msg"=>"Il faut completer les champs!", "color"=>"danger");

    }

}

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}