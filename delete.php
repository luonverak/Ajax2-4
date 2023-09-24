<?php
    include("con.php");
    $id = $_POST['delete_id'];
    $rs = $connection->query("DELETE FROM `product` WHERE id='$id'");
    echo 'success';
?>