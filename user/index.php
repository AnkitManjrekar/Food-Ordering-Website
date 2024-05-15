<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food House - Home Page</title>
</head>
<body>
    <?php include 'constants/header.php'; ?>

    <div class='container-fluid bg-warning my-5 py-5'>
        <div class="row ">
            <div class="col-md-5 mx-auto my-5">
            <form action='food-search.php' method='post' class="d-flex">
                <input class="form-control me-2" name='search_food' type="search" placeholder="Search for food" aria-label="Search">
                <button class="btn btn-danger p-2 px-3" type="submit">Search</button>
            </form>
            </div>
        </div>
    </div>
    <div class='container my-5'>
        <div class="">
            <div class="col-md-12 my-5">
                <h2 class='text-center'>Explore Foods</h2>
                <div class="container p-3">
                    <div class="row d-flex justify-content-around">
                        <?php
                            include 'config.php';
                            $sql = 'SELECT * FROM `category` WHERE featured=\'Yes\' AND active=\'Yes\'  LIMIT 3';
                            $data = $con->query($sql);
                            while($row = mysqli_fetch_array($data)){
                                echo "
                                <div class='col-md-4 my-3 d-flex justify-content-center '>
                                    <a href='category-food.php?id=$row[id]&title=$row[title]' class='text-decoration-none '><div class='card ' style='width: 21rem;'>
                                        <div class='card-body' style='background: url(\"../admin/$row[image]\") no-repeat center center; height: 400px; background-size: cover;'>
                                            <h2 class='text-center fw-bold'><span class='bg-white p-2'>$row[title]</span></h2>
                                        </div>
                                    </div></a>
                                </div>
                                
                                
                                ";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid my-5 py-5 bg-danger">
        <h2 class="text-center">Food Menu</h2>
        <div class="row my-5 d-flex justify-content-center">
            <?php  
            
                include 'config.php';
                $sql = 'SELECT * FROM `food` WHERE featured=\'Yes\' AND active=\'Yes\'  LIMIT 4';
                $data = $con->query($sql);
                while($row = mysqli_fetch_array($data)){
                    echo "
                    
                        <div class=\"col-md-5 m-3 p-0\">
                            <div class=\"card d-flex flex-row p-3\">
                                <img src=\"../admin/$row[image]\" alt=\"Image Not Available\" width='200px' height=\"150px\" class=\"rounded\">
                                <div class=\"card-body w-75 p-0 ps-3\">
                                    <h5 class=\"card-title mb-2 \">$row[title]</h5>
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
        <a href="foods.php" class="text-white"><h3 class="text-center">See All Foods</h3></a>
    </div>


    <?php include 'constants/footer.php'; ?>
</body>
</html>