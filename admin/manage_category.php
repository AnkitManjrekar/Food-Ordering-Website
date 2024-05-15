<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin   - Category Page</title>
</head>
<body>
<?php
  include 'partials/navbar.php';
?>

<div class="container  my-5">
  <div class="row ">
    <h2 class='text-center fw-bold'>Manage Category</h2>
    <a href="add_category.php"><button class='btn btn-primary'>Add Category</button></a>
    <table class="table mt-3 text-center">
      <thead>
        <tr class='fs-5'>
          <th>Sr. No.</th>
          <th>Category</th>
          <th>Image</th>
          <th>Featured</th>
          <th>Active</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php
          include 'config.php';
          $sql = "SELECT * FROM `category`";
          $data = $con->query($sql);
          $i=1;
          while($row = mysqli_fetch_array($data)){
            echo "
              <tr>
                <td>$i</td>
                <td>$row[title]</td>
                <td><image src='$row[image]' alt='Category Image' width='200px'> </td>
                <td>$row[featured]</td>
                <td>$row[active]</td>
                <td>
                  <a href='update_category.php?ID=$row[id]&image=$row[image]'><button class='btn btn-success' name='update_btn'>Update</button></a>
                  <a href='delete_category.php?ID=$row[id]&image=$row[image]'><button class='btn btn-danger'>Delete</button></a>
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