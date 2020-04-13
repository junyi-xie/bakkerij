<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
header('Location: login.php');
exit();
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel - Bakkerij Leiden</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  <script src="assets/js/main.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
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
  <!-- Mobile view navigation -->
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
  <h2>Dashboard</h2>
  <div class="box">
    <!-- Product List. -->
    <div class="product">
      <p><a href="products.php"><i class="fas fa-edit"></i> Producten</a> - bekijk uw producten die in de database zijn opgeslagen.</p>
    </div>
  </div>
  <div class="box">
    <!-- Order list. -->
    <div class="order">
      <p><a href="orders.php"><i class="fas fa-edit"></i> Bestellingen</a> - laat zien wie een product heeft besteld.</p>
    </div>
  </div>
  <div class="box">
    <!-- Openinghours -->
    <div class="openinghour">
      <p><a href="time.php"><i class="fas fa-edit"></i> Openingstijden</a> - bewerk de openingstijden.</p>
    </div>
  </div>
  </div>
</div>
<!-- End of container. -->

<!-- Copyright. -->
<div class="copyright" style="position: absolute;">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>
  
</body>
</html>