<?php
    if(isset($_POST['add_admin_btn'])){
        
        $fullName = $_POST['fullName'];
        $admin_username = $_POST['username'];
        $admin_password = $_POST['password'];

        include('config.php');

        $sql = "INSERT INTO `admin`(`full_name`, `username`, `password`) VALUES ('$fullName','$admin_username','$admin_password')";

        if($con->query($sql) === TRUE){
            echo "
                <script>
                    alert('Admin added succesfully');
                    window.location.href = 'manage_admin.php';
                </script>
            ";
        }else{
            echo $con->error;
        }

        $con->close();

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Admin Page</title>
</head>
<body>
    <?php include('partials/navbar.php') ?>    

    <div class="container">
        <div class="row">
            <h2 class='text-center my-3'>Add Admin</h2>
            <form action="add_admin.php" method='post' class="form border col-md-7 mx-auto p-3 shadow">
                <div class='mb-3'>
                    <label for="full_name" class='form-label fs-5'>Full Name :</label>
                    <input type="text" name="fullName" id="full_name" placeholder='Enter Your Name' class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="username" class='form-label fs-5'>Username :</label>
                    <input type="text" name="username" id="username" placeholder='Enter Your Username' class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="password" class='form-label fs-5'>Password : </label>
                    <input type="password" name="password" id="password" placeholder='Enter Your Password' class='form-control'>
                </div>
                <div class='mb-3 text-center '>
                    <button class='btn btn-primary fs-4' type='submit' name='add_admin_btn' class='form-control'>Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php include('partials/footer.php') ?>
</body>
</html>

