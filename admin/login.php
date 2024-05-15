

<?php 

    if(isset($_POST['login_btn'])){
        include('config.php');

        $username = mysqli_real_escape_string($con, $_POST['username']) ;
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $sql = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password' ";
        $data = $con->query($sql);
        

        if(mysqli_num_rows($data)){
            session_start();

            $_SESSION['admin_username'] = $username;
            $_SESSION['admin_password'] = $password;

            echo "
                <script>
                    alert('Login succesfully');
                    window.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Login Failed');
                window.location.href = 'login.php';
            </script>
            ";
        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    

    <div class="container">
        <div class="row">
            
            <form action="login.php" method='post' class="form border col-md-7 my-3 mx-auto p-3 shadow">
            <h2 class='text-center my-2 '>Admin Login</h2>
                <div class='mb-3'>
                    <label for="username" class='form-label fs-5'>Username :</label>
                    <input type="text" name="username" id="username" placeholder='Enter Your Username' class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="password" class='form-label fs-5'>Password : </label>
                    <input type="password" name="password" id="password" placeholder='Enter Your Password' class='form-control'>
                </div>
                <div class='mb-3 text-center '>
                    <button class='btn btn-primary fs-4' type='submit' name='login_btn' class='form-control'>Login</button>
                </div>
            </form>
        </div>
    </div>

    <?php include('partials/footer.php') ?>
</body>
</html>


