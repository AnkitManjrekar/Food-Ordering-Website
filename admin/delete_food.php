<?php

    include 'config.php';
    
    $id = $_GET['ID'];
    $image = $_GET['image'];

    $sql = "DELETE FROM `food` WHERE id=$id";

    if($con->query($sql)){
        
        $remove_image = unlink($image);

        echo "
            <script>
                alert('Food deleted succesfully!');
                window.location.href = 'manage_food.php';
            </script>
        ";
        
    }else{
        echo $con->error;
    }
    

?>

