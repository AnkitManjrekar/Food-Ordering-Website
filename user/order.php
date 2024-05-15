<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        include 'config.php';
        $sql = "SELECT * FROM `food` WHERE id='$id' LIMIT 1;";
        $data = $con->query($sql);
        $row = mysqli_fetch_array($data);
        
    }

    if(isset($_POST['order_btn'])){
        include 'config.php';
        $food = mysqli_real_escape_string($con, $_POST['food']);
        $price = mysqli_real_escape_string($con, $_POST['price']);
        $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
        $date = mysqli_real_escape_string($con, date("Y-m-d H:i:s"));
        $total = mysqli_real_escape_string($con, $price * $quantity);
        $status = 'pending';
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $address = mysqli_real_escape_string($con, $_POST['address']);

        $sql = "INSERT INTO `order_tbl`(`food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES ('$food','$price','$quantity','$total','$date','$status','$name','$phone','$email','$address')";

        
        if($result = $con->query($sql)){
            echo "
                <script>
                    alert('Food Ordered succesfully!');
                    window.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Failed!');
                    window.location.href = 'index.php';
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
    <title>Food House - Order Page</title>
</head>
<body>
<?php include 'constants/header.php'; ?>

<div class="container" style="margin-bottom: 100px; margin-top: 50px;">
    <h1 class="text-center mb-3">Order Details</h1>
    <div class="row">
        <div class="col-md-6 border p-3 mx-auto">
            <form action="order.php" method='POST'>
                <div class="card d-flex flex-row p-3 mb-3">
                    <?php
                        echo "
                        
                            <img src=\"../admin/$row[image]\" alt=\"Image Not Available\" width='200px' height=\"150px\" class=\"rounded\">
                            <div class=\"card-body w-75 p-0 ps-3\">
                                <h3 class=\"card-title mb-2\">$row[title]</h3>
                                <h5 class=\"card-text mb-2\">Rs. $row[price]</h5>
                                <label class=\"form-label\" for=\"quantity\">Quantity :</label><br>
                                <input type=\"number\" required name=\"quantity\" class=\"form-control\" id=\"quantity\" value='1' min=\"1\">
                            </div>
                        
                        ";

                    ?>
                    
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name :</label><br>
                    <input type="text" name='name' required id='name' class="form-control">
                    <input type="hidden" name='food' value='<?php echo $row['title']; ?>' >
                    <input type="hidden" name='price' value='<?php echo $row['price']; ?>' >
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone :</label>
                    <input type="number" required name='phone' id='phone' class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" required id='email' name='email'  class="form-control">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address :</label>
                    <textarea name="address" required id="address" class="form-control"></textarea>
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" name='order_btn' class="btn btn-primary p-3">Confirm Order</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include 'constants/footer.php'; ?>
</body>
</html>