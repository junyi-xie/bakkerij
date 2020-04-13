<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'test';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM shop";
if($result = mysqli_query($con, $sql)){
  if(mysqli_num_rows($result) > 0){
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Producten - Bakkerij Leiden</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />   
  <script src="assets/js/main.js"></script>  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"/>
</head>
<body>

<!-- Navigation. -->
<header class="nav">
  <!-- Navigation items. -->
  <div class="item">
    <h1><a href="dashboard.php">Admin Panel</a></h1>
    <a class="main" href="profile.php"><i class="fas fa-user-circle"></i> Mijn Account</a>
    <a class="main" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    <a class="sub" href="javascript:void(0);" onclick="dropdownmenu()"><i class="fa fa-bars"></i></a>
  </div>
  <!-- Mobile view navigation. -->
  <div class="menu">
    <div id="links">
      <a href="profile.php"><i class="fas fa-user-circle"></i> Mijn Account</a>
      <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
  </div>
</header>
<!-- End of navigation. -->

<!-- Container. -->
<div class="content">
  <h2>Producten Lijst</h2>
  <!-- The product list in admin panel. -->
  <div class="list">
    <table>
      <!-- Product heading. -->
      <thead>
        <tr>
          <th>#</th>
          <th>Naam</th>
          <th>Beschrijving</th>
          <th>Prijs</th>
          <th>Aantal</th>
        </tr>
      </thead>
      <?php 
        while($row = mysqli_fetch_array($result)) { $currency = "€"; 
      ?>
      <tbody>
        <tr>
          <td> <?=$row['id']?> </td>
          <td> <?=$row['name']?> </td>
          <td> <?=$row['product_desc']?> </td>
          <td> <?=$currency, $row['price']?> </td>
          <td> <?=$row['quantity']?> <a href="quantity.php"><i class="fas fa-edit"></i></a></td>
        </tr>
      </tbody>
      <?php 
        } 
      ?>
    </table>
    <!-- End of table. -->
  <?php
  mysqli_free_result($result);
    } else{
      echo "No records matching your query were found.";
    }
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  }
  mysqli_close($con);
  ?>
  </div>
  <!-- End of product list. -->
</div>
<!-- End of container. -->

<!-- Copyright. -->
<div class="copyright" style="position: absolute;">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>