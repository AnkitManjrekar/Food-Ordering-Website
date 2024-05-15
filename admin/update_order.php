<?php
    include 'config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * from `order_tbl` where id=$id;";
        $data = $con->query($sql);
        $row = mysqli_fetch_array($data);

    }

    

    if(isset($_POST['update_btn'])){
        $id = $_POST['id'];
        $food = $_POST['food'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $total = $price*$qty;
        $order_date = $_POST['order_date'];
        $status = $_POST['status'];
        $customer_name = $_POST['customer_name'];
        $customer_contact = $_POST['customer_contact'];
        $customer_email = $_POST['customer_email'];
        $customer_address = $_POST['customer_address'];

        
        $sql = "UPDATE `order_tbl` SET `food`='$food',`price`=$price,`qty`=$qty,`total`=$total,`order_date`='$order_date',`status`='$status',`customer_name`='$customer_name',`customer_contact`='$customer_contact',`customer_email`='$customer_email',`customer_address`='$customer_address' WHERE id=$id";



        if($con->query($sql)){
            echo "
            <script>
                alert('Order Updated succesfully!');
                window.location.href = 'manage_order.php';
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
    <title>Admin - Update Order Page</title>
</head>
<body>
    <?php include('partials/navbar.php') ?>    

    <div class="container mb-5">
        <div class="row">
            <h2 class='text-center my-3'>Update Order</h2>
            <form action="update_order.php" method='post' class="form border col-md-7 mx-auto p-3 shadow">
                <div class='mb-3'>
                    <label for="food" class='form-label fs-5'>Food :</label>
                    <input required type="text" name="food" value='<?php echo $row['food']; ?>' id="food" class='form-control'>
                    <input type="hidden" name="id" value='<?php echo $id; ?>'>
                </div>
                <div class='mb-3'>
                    <label for="price" class='form-label fs-5'>Price :</label>
                    <input required type="number" name="price" value='<?php echo $row['price']; ?>' id="price" class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="qty" class='form-label fs-5'>Qty :</label>
                    <input required type="number" name="qty" min='1' value='<?php echo $row['qty']; ?>' id="qty" class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="total" class='form-label fs-5'>Total :</label>
                    <input required type="number" name="total" value='<?php echo $row['price']*$row['qty']; ?>' id="total" class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="order_date" class='form-label fs-5'>Order Date :</label>
                    <input required type="text" name="order_date" value='<?php echo $row['order_date']; ?>' id="order_date" class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="status" class='form-label fs-5'>Status :</label>
                    <select name="status" id="status" class='form-control'>
                        <?php
                            if($row['status'] == 'pending'){
                                echo "
                                        <option value='$row[status]' selected>$row[status]</option>
                                        <option value='delivered'>delivered</option>
                                        <option value='cancelled'>cancelled</option>
                                    ";

                            }else if($row['status'] == 'delivered'){
                                echo "
                                        <option value='$row[status]' selected>$row[status]</option>
                                        <option value='pending'>pending</option>
                                        <option value='cancelled'>cancelled</option>
                                    ";
                            }else if($row['status'] == 'cancelled'){
                                echo "
                                        <option value='$row[status]' selected>$row[status]</option>
                                        <option value='pending'>pending</option>
                                        <option value='delivered'>delivered</option>
                                    ";
                            }else{
                                echo "
                                        <option value='pending'>pending</option>
                                        <option value='delivered'>delivered</option>
                                        <option value='cancelled'>cancelled</option>
                                    ";
                            }
                        ?>
                    </select>
                </div>
                <div class='mb-3'>
                    <label for="customer_name" class='form-label fs-5'>Customer Name :</label>
                    <input required type="text" name="customer_name" value='<?php echo $row['customer_name']; ?>' id="customer_name" class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="customer_contact" class='form-label fs-5'>Customer Contact :</label>
                    <input required type="number" name="customer_contact" value='<?php echo $row['customer_contact']; ?>' id="customer_contact" class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="customer_email" class='form-label fs-5'>Customer Email :</label>
                    <input required type="email" name="customer_email" value='<?php echo $row['customer_email']; ?>' id="customer_email" class='form-control'>
                </div>
                <div class='mb-3'>
                    <label for="customer_address" class='form-label fs-5'>Customer Address :</label>
                    <input required type="text" name="customer_address" value='<?php echo $row['customer_address']; ?>' id="customer_address" class='form-control'>
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