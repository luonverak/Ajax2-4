<?php
    include('con.php');
    $name = $_POST['pro_name'];
    $qty  = $_POST['pro_qty'];
    $price= $_POST['pro_price'];
    $image= $_POST['pro_image'];
    $id   = $_POST['pro_id'];
    if(!empty($name) && !empty($qty) && !empty($price) && !empty($image)){
        $sql = "UPDATE `product`
                SET `name`='$name',`qty`='$qty',`price`='$price',`thumbnail`='$image'
                WHERE id='$id'";
        $rs  = $connection->query($sql);
        // respone data
        echo 'success';
    }
?>