<?php

    include 'config.php';
    
    $id = $_GET['ID'];

    $sql = "DELETE FROM `admin` WHERE id=$id";


    if($con->query($sql)){
        echo "
            <script>
                alert('Admin deleted succesfully!');
                window.location.href = 'manage_admin.php';
            </script>
        ";
    }else{
        echo $con->error;
    }
    

?>