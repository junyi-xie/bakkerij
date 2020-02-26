<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'test';
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt select query execution
$sql = "SELECT * FROM shop";
if($result = mysqli_query($con, $sql)){
  if(mysqli_num_rows($result) > 0){
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Products - Bakkerij Leiden</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"/>
</head>
<body>

<!-- 100% navigation bar positioned at the top. Color is #3a0f49. -->
<nav class="navtop">
  <div class="item">
    <h1><a href="dashboard.php">Admin Panel</a></h1>
    <a href="profile.php"><i class="fas fa-user-circle"></i>My Account</a>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
  </div>
</nav>

<!-- 1140px width. Main content. -->
<div class="content">
  <h2>Product List</h2>
  <p>Product details are below:</p>
  <!-- Div for product list. Shows available products from the database -->
  <div class="list">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Quantity</th>
        </tr>
      </thead>

      <?php 
        while($row = mysqli_fetch_array($result)){ 
        $currency = "€";
      ?>

      <tbody>
        <tr>
          <td> <?=$row['id']?> </td>
          <td> <?=$row['name']?> </td>
          <td> <?=$row['desc']?> </td>
          <td> <?=$currency, $row['price']?> </td>
          <td> <?=$row['quantity']?> </td>
        </tr>

      <?php 
        }
      ?>

      </tbody>
    </table>

  <?php
  // Free result set
  mysqli_free_result($result);
    } else{
      echo "No records matching your query were found.";
    }
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  }
  // Close connection
  mysqli_close($con);
  ?>

  </div>
</div>

<!-- Copyright -->
<div class="copyright">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>