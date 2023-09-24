<?php
    include("con.php");
    $name = $_POST['pro_name'];
    $qty  = $_POST['pro_qty'];
    $price= $_POST['pro_price'];
    $image= $_POST['pro_image'];
    if(!empty($name) && !empty($qty) && !empty($price) && !empty($image)){
        $sql = "INSERT INTO `product`(`name`, `qty`, `price`, `thumbnail`)
                VALUES ('$name','$qty','$price','$image')";
        $rs  = $connection->query($sql);
        // respone data
        if($rs){
            $getId = "SELECT * FROM `product` ORDER BY id DESC";
            $rsId  = $connection->query($getId);
            $row   = mysqli_fetch_assoc($rsId);
            echo $row['id'];
        }
    }
?>