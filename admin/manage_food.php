<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Food Page</title>
</head>
<body>
<?php
  include 'partials/navbar.php';
?>

<div class="container  my-5">
  <div class="row ">
    <h2 class='text-center fw-bold'>Manage Food</h2>
    <a href="add_food.php"><button class='btn btn-primary'>Add Food</button></a>
    <table class="table mt-3 text-center">
      <thead>
        <tr class='fs-5'>
          <th>Sr. No.</th>
          <th>Title</th>
          <th>Description</th>
          <th>Price</th>
          <th>Image</th>
          <th>Category_id</th>
          <th>Featured</th>
          <th>Active</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php
          include 'config.php';
          $sql = "SELECT * FROM `food`";
          $data = $con->query($sql);
          $i=1;
          while($row = mysqli_fetch_array($data)){
            echo "
              <tr>
                <td>$i</td>
                <td>$row[title]</td>
                <td>$row[description]</td>
                <td>Rs. $row[price]</td>
                <td><image src='$row[image]' alt='Food Image' width='250px' height='150px'> </td>
                <td>$row[category_id]</td>
                <td>$row[featured]</td>
                <td>$row[active]</td>
                <td>
                  <a href='update_food.php?ID=$row[id]&image=$row[image]&category_id=$row[category_id]'><button class='btn btn-success' name='update_btn'>Update</button></a>
                  <a href='delete_food.php?ID=$row[id]&image=$row[image]'><button class='btn btn-danger'>Delete</button></a>
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