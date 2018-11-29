

<?php

    $db = Database::connect();
    $sql = "SELECT * FROM messages ORDER BY id DESC LIMIT 10";
    $req = $db->query($sql);
    $res = $req->fetchAll();

    $_SESSION['message'] = count($res);
if(isset($_GET['id'])){

    $sql = "DELETE FROM `messages` WHERE id='".$_GET['id']."'";
    $db->exec($sql);
    exit(header('location: ?page=mesMessage'));
}