<?php

    $db = Database::connect();
    $id = $_SESSION['connect']['id'];
    $sql = "SELECT * FROM fidelite WHERE id_client='".$id."'";
    $req = $db->query($sql);
    $res = $req->fetchAll();