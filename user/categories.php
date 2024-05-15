<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food House - Category Page</title>
</head>
<body>
<?php include 'constants/header.php'; ?>

<div class='container my-5'>
        <div class="">
            <div class="col-md-12 my-5">
                <h2 class='text-center'>Explore Foods</h2>
                <div class="container p-3">
                    <div class="row d-flex justify-content-around">
                        
                    <?php
                            include 'config.php';
                            $sql = 'SELECT * FROM `category` WHERE featured=\'Yes\' AND active=\'Yes\' ';
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

<?php include 'constants/footer.php'; ?>
</body>
</html>