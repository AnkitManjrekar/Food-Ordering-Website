<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Update Admin Page</title>
</head>
<body>
    <?php 
    include('partials/navbar.php');

    

    include('config.php');

    if(isset($_GET['ID'])){
        $id = $_GET['ID'];

        $sql = "SELECT * FROM `admin` where id=$id";
        $data = $con->query($sql);
        $row = mysqli_fetch_array($data);
    }
    

    // Update Value
    if(isset($_POST['update_admin_btn'])){

        $admin_id = $_POST['id'];
        $fullName = $_POST['fullName'];
        $admin_username = $_POST['username'];
        $admin_password = $_POST['password'];

        $sql_2 = "UPDATE `admin` SET `full_name`='$fullName',`username`='$admin_username',`password`='$admin_password' WHERE id=$admin_id";

        if($con->query($sql_2)){
            echo "
                <script>
                    alert('Admin updated succesfully');
                    window.location.href = 'manage_admin.php';
                </script>
            ";
        }else{
            echo $con->error;
        }
    }

    
    
    ?>    

    <div class="container">
        <div class="row">
            <h2 class='text-center my-3'>Update Admin</h2>
            <form action="update_admin.php" method='post' class="form border col-md-7 mx-auto p-3 shadow">
                <div class='mb-3'>
                    <label for="full_name" class='form-label fs-5'>Full Name :</label>
                    <input type="text" name="fullName" value="<?php echo $row['full_name'] ?>" id="full_name" placeholder='Enter Your Name' class='form-control'>
                    <input type="hidden" name='id' value="<?php echo $row['id'] ?>">
                </div>
                <div class='mb-3'>
                    <label for="username" class='form-label fs-5'>Username :</label>
                    <input type="text" name="username" value="<?php echo $row['username'] ?>" id="username" placeholder='Enter Your Username' class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="password" class='form-label fs-5'>Password : </label>
                    <input type="text" name="password" value="<?php echo $row['password'] ?>" id="password" placeholder='Enter Your Password' class='form-control'>
                </div>
                <div class='mb-3 text-center '>
                    <button class='btn btn-primary fs-4' type='submit' name='update_admin_btn' class='form-control'>Update</button>
                </div>
            </form>
        </div>
    </div>

    <?php include('partials/footer.php') ?>
</body>
</html>