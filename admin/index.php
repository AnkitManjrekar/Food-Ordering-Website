<?php 
  include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Home Page</title>
</head>
<body>
<?php
  include 'partials/navbar.php';
?>

<div class="container  my-5">
  <div class="row">
    <h3>Dashboard</h3>
    <div class="col-md-2  m-3 mx-5 p-3 text-center bg-danger text-light">
      <?php
        $food_sql = "SELECT * FROM `food`";
        $data = $con->query($food_sql);
        $count = mysqli_num_rows($data);
        echo "
          <h3>$count</h3>
        ";
      ?>
      
      <span>Food</span>
    </div>
    <div class="col-md-2  m-3 mx-5 p-3 text-center bg-danger text-light">
    <?php
        $food_sql = "SELECT * FROM `category`";
        $data = $con->query($food_sql);
        $count = mysqli_num_rows($data);
        echo "
          <h3>$count</h3>
        ";
      ?>
      <span>Categories</span>
    </div>
    <div class="col-md-2  m-3 mx-5 p-3 text-center bg-danger text-light">
      <?php
          $food_sql = "SELECT * FROM `order_tbl`";
          $data = $con->query($food_sql);
          $count = mysqli_num_rows($data);
          echo "
            <h3>$count</h3>
          ";
        ?>
      <span>Total Orders</span>
    </div>
    <div class="col-md-2  m-3 mx-5 p-3 text-center bg-danger text-light">
        <?php
              $food_sql = "SELECT SUM(price) AS total FROM order_tbl WHERE status = 'delivered';";
              $data = $con->query($food_sql);
              $row = mysqli_fetch_array($data);
              if($row['total'] != ''){
                echo "
                  <h3>Rs. $row[total]</h3>
                ";
              }else{
                echo "
                  <h3>0</h3>
                ";
              }
              
        ?>
      <span>Revenue</span>
    </div>
  </div>
</div>

<?php
  include 'partials/footer.php';
?>
</body>
</html>