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
$sql = "SELECT * FROM customers";
if($result = mysqli_query($con, $sql)){
  if(mysqli_num_rows($result) > -1){
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bestellingen - Bakkerij Leiden</title>
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
  <h2>Bestellingen</h2>
  <!-- Order container. -->
  <div class="orders">
    <!-- Start table for order list. -->
    <table>
      <!-- Heading. -->
      <thead>
        <tr>
          <th>#</th>
          <th>Naam</th>
          <th>Email</th>
          <th>Bestelling</th>
          <th>Datum</th>
        </tr>
      </thead>
      <?php 
        while($row = mysqli_fetch_array($result)) { 
      ?>
      <tbody>
        <tr>
          <td><?=$row['id']?></td>
          <td><?=$row['customer_name']?></td>
          <td><?=$row['customer_email']?></td>
          <td>
          <?=$row['product1']?> (<?=$row['quantity1']?>x), 
          <?=$row['product2']?> (<?=$row['quantity2']?>x), 
          <?=$row['product3']?> (<?=$row['quantity3']?>x)
          </td>
          <td><?=$row['date']?></td>
        </tr>
      </tbody>
        <?php 
        } 
      ?>
    </table>
    <!-- End of order list table. -->
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
  <!-- Form container. -->
  <div class="form">
    <!-- Form with post method. Clears the data. -->
    <form action="orders-reset.php" method="post">
      <input class="reset" type="submit" name="reset" value="Reset Data">
    </form>
  </div>
</div>
<!-- End of container. -->

<!-- Copyright. -->
<div class="copyright">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>