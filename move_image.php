<?php
    $thumbnail =date('dmyhis').'-'.$_FILES['thumbnail']['name'];
    $path = 'images/'.$thumbnail;
    move_uploaded_file($_FILES['thumbnail']['tmp_name'],$path);
    echo $thumbnail;
?>