

<?php

    if (isset($_SESSION['connect']))
    {
        header('location: ../?page=home');
    }

    if (!empty($_POST['email']) && !empty($_POST['password']))
    {
        $email            = $_POST['email'];
        $password         = sha1($_POST['password']);

        $db = Database::connect();
        $sql = "SELECT * FROM users WHERE `email`='".$email."' AND `password`='".$password."'";
        $req = $db->query($sql);
        $res = $req->fetchAll();

        if($res)
        {

            $id = $res[0]['id'];

            $sql = "SELECT * FROM `role` WHERE id='".$id."'";
            $req = $db->query($sql);
            $res_role = $req->fetchAll();



            $_SESSION['connect'] = array("id"=>$id, 'nom'=>$res[0]['name'], 'prenom'=>$res[0]['firstname'], "role"=>$res_role[0]['role']);

            exit(header('location: ?page=home'));

        }else{

            $_SESSION['error'] = array("msg"=>"E-mail ou mot de passse incorrect!", "color"=>"danger");
        }

    }
?>

