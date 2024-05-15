<?php
    include 'config.php';

    if(isset($_GET['ID'])){
        $id = $_GET['ID'];
        $image_get = $_GET['image'];
        $category_id = $_GET['category_id'];
        $sql = "SELECT * from `food` where id=$id;";
        $data = $con->query($sql);
        $row = mysqli_fetch_array($data);

    }

    

    if(isset($_POST['update_btn'])){
        $title = $_POST['title'];

        $description = $_POST['description'];

        $id = $_POST['id'];

        $image_get = $_POST['image_get'];

        $price = $_POST['price'];

        $image = $_FILES['image'];
        $image_name = $_FILES['image']['name'];

        $category_id = $_POST['category'];

        if($image_name == ''){
            $image_destination = $image_get;
        }else{
            $image_loc = $_FILES['image']['tmp_name'];
            $image_destination = "images/food/" . $image_name;
            move_uploaded_file($image_loc, $image_destination);
            $remove_image = unlink($image_get);
        }

        $featured = $_POST['featured'];
        $active = $_POST['active'];

        
        $sql = "UPDATE `food` SET `title`='$title',`description`='$description',`price`='$price',`image`='$image_destination',`category_id`='$category_id',`featured`='$featured',`active`='$active' WHERE id=$id";



        if($con->query($sql)){
            echo "
            <script>
                alert('Food Updated succesfully!');
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
    <title>Admin - Update Food Page</title>
</head>
<body>
    <?php include('partials/navbar.php') ?>    

    <div class="container mb-5">
        <div class="row">
            <h2 class='text-center my-3'>Update Food</h2>
            <form action="update_food.php" enctype='multipart/form-data' method='post' class="form border col-md-7 mx-auto p-3 shadow">
                <div class='mb-3'>
                    <label for="title" class='form-label fs-5'>Title :</label>
                    <input required type="text" name="title" value='<?php echo $row['title']; ?>' id="title" placeholder='Enter Food Title' class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="description" class='form-label fs-5'>Description :</label><br>
                    <textarea required name="description" id="description" cols="30" rows="5" class='form-control' placeholder='Enter Food Description'><?php echo $row['description']; ?></textarea>
                    
                </div>
                <div class='mb-3'>
                    <label for="price" class='form-label fs-5'>Price :</label>
                    <input required type="number" name="price" id="price" placeholder='Enter Food Price' class='form-control' value='<?php echo $row['price']; ?>'>
                </div>
                <div class='mb-3'>
                    <label for="current_img" class='form-label fs-5'>Current Image :</label><br>
                    <img id="current_img" src='<?php echo $image_get; ?>' width='250px' height='150px' alt='Image Not Available'>
                    <input type="hidden" name="image_get" value='<?php echo $image_get; ?>'>
                    <input type="hidden" name="id" value='<?php echo $id; ?>'>
                </div>
                <div class='mb-3'>
                    <label for="image" class='form-label fs-5'>Image :</label>
                    <input type="file" name="image" id="image"  class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="category" class='form-label fs-5'>Category :</label><br>
                    <select name="category" id="category" class='form-control'>
                        <?php
                            include 'config.php';
                            $sql = "SELECT * FROM `category` Where active='Yes';";
                            $data = $con->query($sql);
                            while($row = mysqli_fetch_array($data)){

                                if($category_id == $row['id']){
                                    echo "
                                        <option value='$row[id]' selected>$row[title]</option>
                                    "; 
                                }else{
                                    echo "
                                        <option value='$row[id]'>$row[title]</option>
                                    "; 
                                }
                                
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
                    <button class='btn btn-primary fs-4' type='submit' name='update_btn' class='form-control'>Update</button>
                </div>
            </form>
        </div>
    </div>

    <?php include('partials/footer.php') ?>
</body>
</html>