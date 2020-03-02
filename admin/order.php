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
  <title>Orders - Bakkerij Leiden</title>
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
  <h2>Order List</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
    Itaque saepe repudiandae inventore nulla obcaecati pariatur
    beatae corporis nostrum delectus tenetur tempore aut, porro
    quisquam rem odio magnam? Sint, reprehenderit adipisci.</p>
</div>

<!-- Copyright -->
<div class="copyright">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>