<?php
    session_start();
    if(!isset($_SESSION['admin_username'])){
        header('location:login.php');
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid text-white">
            <a class="navbar-brand text-white">
                <h1>Food-House</h1>
            </a>
            <span class='text-light'>
                <a href="index.php" class="text-light text-decoration-none px-2">Home</a>
                <a href="manage_admin.php" class="text-light text-decoration-none px-2">Admin</a>
                <a href="manage_category.php" class="text-light text-decoration-none px-2">Category</a>
                <a href="manage_food.php" class="text-light text-decoration-none px-2">Food</a>
                <a href="manage_order.php" class="text-light text-decoration-none px-2">Order</a>
                <a href="logout.php" class="text-light text-decoration-none px-2">Logout</a>
            </span>
        </div>
    </nav>
</nav>
</body>

</html>