<?php

    $category_id = $_GET['id'];
    $title = $_GET['title'];

    include 'config.php';
    $sql = "SELECT * FROM `food` WHERE category_id=$category_id;";
    $data = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food House - Category Food Page</title>
</head>

<body>
    <?php include 'constants/header.php'; ?>

    <div class='container-fluid bg-warning my-5 py-5'>
        <div class="row ">
            <div class="col-md-5 mx-auto my-5">
                <h1 class="text-center">Food on <span class='text-danger'>"<?php echo $title; ?>"</span></h1>
            </div>
        </div>
    </div>

    <div class="container-fluid my-5 py-5 bg-danger" >
        <h2 class="text-center">Food Menu</h2>
        <div class="row my-5 d-flex justify-content-center">
            <?php 

                while($row = mysqli_fetch_array($data)){
                    echo "
                    
                        <div class=\"col-md-5 m-3 p-0\">
                            <div class=\"card d-flex flex-row p-3\">
                                <img src=\"../admin/$row[image]\" alt=\"Image Not Available\" width='200px' height=\"150px\" class=\"rounded\">
                                <div class=\"card-body w-75 p-0 ps-3\">
                                    <h5 class=\"card-title mb-3\">$row[title]</h5>
                                    <h5 class=\"card-text mb-1\">Rs. $row[price]</h5>
                                    <p class=\"card-text mb-2\">$row[description]</p>
                                    <a href=\"order.php?id=$row[id]\" class=\"btn btn-primary\">Order Now</a>
                                </div>
                            </div>
                        </div>
                    
                    ";
                }



            ?>
            
        </div>
    </div>


    <?php include 'constants/footer.php'; ?>
</body>

</html>