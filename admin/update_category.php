<?php
    include 'config.php';

    if(isset($_GET['ID'])){
        $id = $_GET['ID'];
        $image_get = $_GET['image'];
        $sql = "SELECT * from `category` where id=$id;";
        $data = $con->query($sql);
        $row = mysqli_fetch_array($data);

    }

    

    if(isset($_POST['update_btn'])){
        $title = $_POST['title'];
        $id = $_POST['id'];
        $image_get = $_POST['image_get'];


        $image = $_FILES['image'];
        $image_name = $_FILES['image']['name'];

        if($image_name == ''){
            $image_destination = $image_get;
        }else{
            $image_loc = $_FILES['image']['tmp_name'];
            $image_destination = "images/category/" . $image_name;
            move_uploaded_file($image_loc, $image_destination);
        }



        
        
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        
        $sql = "UPDATE `category` SET `title`='$title',`image`='$image_destination',`featured`='$featured',`active`='$active' WHERE id=$id";

        if($con->query($sql)){
            echo "
            <script>
                alert('Category Updated succesfully!');
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
    <title>Admin - Update Category Page</title>
</head>
<body>
    <?php include('partials/navbar.php') ?>    

    <div class="container">
        <div class="row">
            <h2 class='text-center my-3'>Update Category</h2>
            <form action="update_category.php" enctype='multipart/form-data' method='post' class="form border col-md-7 mx-auto p-3 shadow mb-5">
                <div class='mb-3'>
                    <label for="title" class='form-label fs-5'>Title :</label>
                    <input required type="text" name="title" value='<?php echo $row['title']; ?>' id="title" placeholder='Enter Category Title' class='form-control'>
                    <input type='hidden' name='id' value='<?php echo $id; ?>'>
                    <input type='hidden' name='image_get' value='<?php echo $image_get; ?>'>
                </div>
                <div class='mb-3'>
                    <label for="title" class='form-label fs-5'>Current Image :</label><br>
                    <img src='<?php echo $row['image']; ?>' alt='No Image' width='200px';>
                </div>
                <div class='mb-3'>
                    <label for="image" class='form-label fs-5'>Image :</label>
                    <input type="file" name="image" id="image"  class='form-control'>
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
                    <button class='btn btn-primary fs-4' type='submit' name='update_btn' class='form-control'>Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php include('partials/footer.php') ?>
</body>
</html>