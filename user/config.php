<?php

    // Connection
    $server = "localhost:3309";
    $username = "root";
    $password = "";
    $db_name = "food_order";

    $con = mysqli_connect($server, $username, $password, $db_name);

    if(!$con){
        die(mysqli_connect_error());
    }

?>