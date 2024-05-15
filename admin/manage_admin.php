<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Admin Page</title>
</head>
<body>
<?php
  include 'partials/navbar.php';

  include 'config.php';

  


?>

<div class="container  my-5">
  <div class="row ">
    <h2 class='text-center fw-bold'>Manage Admin</h2>
    <a href="add_admin.php"><button class='btn btn-primary'>Add Admin</button></a>
    <table class="table mt-3 text-center">
      <thead>
        <tr class='fs-5'>
          <th>Sr. No.</th>
          <th>Full Name</th>
          <th>Username</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

        <?php

          $sql = "SELECT * FROM `admin`";
          $data = $con->query($sql);
          $i=1;
          while($row = mysqli_fetch_array($data)){
            echo "
              <tr>
                <td>$i</td>
                <td>$row[full_name]</td>
                <td>$row[username]</td>
                <td>
                  <a href='update_admin.php?ID=$row[id]'><button class='btn btn-success' name='update_btn'>Update</button></a>
                  <a href='delete_admin.php?ID=$row[id]'><button class='btn btn-danger'>Delete</button></a>
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


