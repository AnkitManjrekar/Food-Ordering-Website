<?php

    include 'config.php';
    
    $id = $_GET['ID'];
    $image = $_GET['image'];

    $sql = "DELETE FROM `category` WHERE id=$id";

    if($con->query($sql)){
        
        $remove_image = unlink($image);

        echo "
            <script>
                alert('Category deleted succesfully!');
                window.location.href = 'manage_category.php';
            </script>
        ";
        
    }else{
        echo $con->error;
    }
    

?>

