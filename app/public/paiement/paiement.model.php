

<?php

        $db = Database::connect();
        $id = $_SESSION['connect']['id'];
        $sql = "SELECT * FROM fidelite WHERE id_client='".$id."'";
        $req = $db->query($sql);
        $res = $req->fetchAll();
        print_r($res);
        if($res){

            $point = intval($res[0]['point']) + 10;
            $sql ="UPDATE `fidelite` SET `point`='".$point."' WHERE id_client='".$id."'";
            $db->exec($sql);
            $_SESSION['panier'] = array();
            

        }else {

            $sql ="INSERT INTO `fidelite` (`id`, `id_client`, `point`) VALUES(DEFAULT, '".$id."', 10)";
            $db->exec($sql);
            $_SESSION['panier'] = array();
            

        }

