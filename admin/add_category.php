<?php

    if(isset($_POST['add_btn'])){
        $title = $_POST['title'];
        $image = $_FILES['image'];
            $image_name = $_FILES['image']['name'];
            $image_loc = $_FILES['image']['tmp_name'];
            $image_destination = "images/category/" . $image_name;
            move_uploaded_file($image_loc, $image_destination);
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        include 'config.php';
        $sql = "INSERT INTO `category`(`title`, `image`, `featured`, `active`) VALUES ('$title','$image_destination','$featured','$active')";

        if($con->query($sql)){
            echo "
            <script>
                alert('Category Added succesfully!');
                window.location.href = 'manage_category.php';
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Failed!');
                window.location.href = 'manage_category.php';
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
    <title>Admin - Add Category Page</title>
</head>
<body>
    <?php include('partials/navbar.php') ?>    

    <div class="container">
        <div class="row">
            <h2 class='text-center my-3'>Add Category</h2>
            <form action="add_category.php" enctype='multipart/form-data' method='post' class="form border col-md-7 mx-auto p-3 shadow">
                <div class='mb-3'>
                    <label for="title" class='form-label fs-5'>Title :</label>
                    <input required type="text" name="title" id="title" placeholder='Enter Category Title' class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="image" class='form-label fs-5'>Image :</label>
                    <input required type="file" name="image" id="image"  class='form-control'>
                </div>
                <div class='mb-3 radio'>
                    <label class='form-label fs-5'>Featured :</label>
                        <label><input type="radio" name="featured" value='Yes' class='m-1' checked>Yes</label>
                        <label><input type="radio" name="featured" value='No' class='m-1'>No</label>
                </div>
                <div class='mb-3'>
                <label class='form-label fs-5'>Active :</label>
                        <label><input type="radio" name="active" value='Yes' class='m-1' checked>Yes</label>
                        <label><input type="radio" name="active" value='No' class='m-1'>No</label>
                </div>
                <div class='mb-3 text-center '>
                    <button class='btn btn-primary fs-4' type='submit' name='add_btn' class='form-control'>Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php include('partials/footer.php') ?>
</body>
</html>