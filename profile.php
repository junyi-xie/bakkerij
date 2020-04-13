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
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?'); 
$stmt->bind_param('i', $_SESSION['id']); $stmt->execute();
$stmt->bind_result($password, $email); $stmt->fetch(); $stmt->close(); 
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?=$_SESSION['name']?>'s Profiel - Bakkerij Leiden</title>
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
  <h2><?=$_SESSION['name']?>'s Profiel</h2>
  <!-- Profile container. -->
  <div class="profile">
    <!-- Start of table. -->
    <table>
      <tr>
        <td>Gebruikersnaam:</td>
        <td><?=$_SESSION['name']?></td>
      </tr>
      <tr>
        <td>Wachtwoord:</td>
        <td><?=$_SESSION['password']?></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><?=$email?></td>
      </tr>
    </table>
    <!-- End of table. -->
  </div>
  <!-- End of profile container. -->
</div>
<!-- End of container. -->

<!-- Copyright. -->
<div class="copyright" style="position: absolute;">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>
