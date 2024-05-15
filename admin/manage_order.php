<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Order Page</title>
</head>
<body>
<?php
  include 'partials/navbar.php';
?>

<div class="container  my-5">
  <div class="row ">
    <h2 class='text-center fw-bold'>Manage Order</h2>
    <table class="table mt-3 text-center">
      <thead>
        <tr class='fs-5'>
          <th>Sr. No.</th>
          <th>Food</th>
          <th>Price</th>
          <th>Qty.</th>
          <th>Total</th>
          <th>Order Date</th>
          <th>Status</th>
          <th>Customer Name</th>
          <th>Customer Contact</th>
          <th>Customer Email</th>
          <th>Customer Adress</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include('config.php');
          $sql = "SELECT * FROM `order_tbl`";
          $data = $con->query($sql);
          $i = 1;
          while($row = mysqli_fetch_array($data)){
              echo "
                  <tr>
                    <td>$i</td>
                    <td>$row[food]</td>
                    <td>$row[price]</td>
                    <td>$row[qty]</td>
                    <td>$row[total]</td>
                    <td>$row[order_date]</td>
                    <td>$row[status]</td>
                    <td>$row[customer_name]</td>
                    <td>$row[customer_contact]</td>
                    <td>$row[customer_email]</td>
                    <td>$row[customer_address]</td>
                    <td>
                      <a href=\"update_order.php?id=$row[id]\"><button class='btn btn-success'>Update</button></a>
                    </td>
                  </tr>
              
              ";
              $i++;
          }
        
        ?>
        
        
      </tbody>
    </table>
  </div>
</div>


<?php
  include 'partials/footer.php';
?>
</body>
</html>