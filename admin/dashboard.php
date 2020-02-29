<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
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
  <h2>Dashboard</h2>
    <p>Welcome to your dashboard, <span><?=$_SESSION['name']?>!</span></p>
    <p>Quick overview of what you can edit/change down below:</p>

  <!-- Box shadow effect. Holder for a short description of what each function does. -->
  <div class="box">
    <div class="product">
      <p><a href="product.php">Products</a> - view your current products 
      saved in the database, quantity, price, name and description.</p>
    </div>
  </div>

  <!-- Box shadow effect. Holder for a short description of what each function does. -->
  <div class="box">
    <div class="order">
      <p><a href="order.php">Orders</a> - let's you see who has ordered,
      includes the time and the contact information.</p>
    </div>
  </div>

  <!-- Box shadow effect. Holder for a short description of what each function does. -->
  <div class="box">
    <div class="time">
      <p><a href="time.php">Openinghours</a> - it shows current openinghours which will display
      on the home page. You can edit the openinghours and it will automatically update.</p>
    </div>
  </div>

</div>

<!-- Copyright -->
<div class="copyright">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>
