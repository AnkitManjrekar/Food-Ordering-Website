<?php

    if(isset($_POST['add_btn'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_FILES['image'];
            $image_name = $_FILES['image']['name'];
            $image_loc = $_FILES['image']['tmp_name'];
            $image_destination = "images/food/" . $image_name;
            move_uploaded_file($image_loc, $image_destination);
        $category_id = $_POST['category'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        include 'config.php';

        $sql = "INSERT INTO `food`(`title`, `description`, `price`, `image`, `category_id`, `featured`, `active`) VALUES ('$title','$description','$price','$image_destination','$category_id','$featured','$active')";

        if($con->query($sql)){
            echo "
            <script>
                alert('Food Added succesfully!');
                window.location.href = 'manage_food.php';
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Failed!');
                window.location.href = 'manage_food.php';
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
    <title>Admin - Add Food Page</title>
</head>
<body>
    <?php include('partials/navbar.php') ?>    

    <div class="container mb-5">
        <div class="row">
            <h2 class='text-center my-3'>Add Food</h2>
            <form action="add_food.php" enctype='multipart/form-data' method='post' class="form border col-md-7 mx-auto p-3 shadow">
                <div class='mb-3'>
                    <label for="title" class='form-label fs-5'>Title :</label>
                    <input required type="text" name="title" id="title" placeholder='Enter Food Title' class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="description" class='form-label fs-5'>Description :</label><br>
                    <textarea required name="description" id="description" cols="30" rows="5" class='form-control' placeholder='Enter Food Description'></textarea>
                </div>
                <div class='mb-3'>
                    <label for="price" class='form-label fs-5'>Price :</label>
                    <input required type="number" name="price" id="price" placeholder='Enter Food Price' class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="image" class='form-label fs-5'>Image :</label>
                    <input required type="file" name="image" id="image"  class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="category" class='form-label fs-5'>Category :</label><br>
                    <select name="category" id="category" class='form-control'>
                        <?php
                            include 'config.php';
                            $sql = "SELECT * FROM `category` Where active='Yes';";
                            $data = $con->query($sql);
                            while($row = mysqli_fetch_array($data)){
                                echo "
                                    <option value='$row[id]'>$row[title]</option>
                                "; 
                            }
                        ?>
                    </select>
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
                    <button class='btn btn-primary fs-4' type='submit' name='add_btn' class='form-control'>Add Food</button>
                </div>
            </form>
        </div>
    </div>

    <?php include('partials/footer.php') ?>
</body>
</html>