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
  <title>Openinghours - Bakkerij Leiden</title>
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
  <h2>Openingstijden</h2>
  <!-- Openinghours container. -->
  <div class="time">
    <!-- Form -->
    <form action="time-update.php" method="post">
      <!-- Start table. -->
      <table>
        <tbody>
          <tr>
            <td>Openingstijd:</td>
            <td><input type="text" name="opentime" placeholder="10:15" required></td>
          </tr>
          <tr>
            <td>Sluitingstijd:</td>
            <td><input type="text" name="closetime" placeholder="12:30" required></td>
          </tr>
          <tr>
            <!-- Update -->
            <td colspan="2"><input type="submit" value="Bewerken"></td>
          </tr>
          <tr>
            <td colspan="2">
            <?php if (isset($_SESSION['message'])): ?>
	          <div class="update">
	          <?php 
		        echo $_SESSION['message']; 
		        unset($_SESSION['message']);
	          ?>
	          </div>
            <?php endif ?>
            </td>
          </tr>  
        </tbody>
      </table> 
      <!-- End table.  -->
    </form>
    <!-- End form. -->
  </div>
  <!-- End of openingshours. -->
</div>
<!-- End of container. -->

<!-- Copyright. -->
<div class="copyright" style="position: absolute;">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>