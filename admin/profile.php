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
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?'); 
//In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']); $stmt->execute();
$stmt->bind_result($password, $email); $stmt->fetch(); $stmt->close(); 
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?=$_SESSION['name']?>'s Profile - Bakkerij Leiden</title>
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
  <h2><?=$_SESSION['name']?>'s Profile</h2>

  <!-- Account details are posted here -->
  <div class="profile">
    <p>Your account details are below:</p>
    <table>
      <tr>
        <td>Username:</td>
        <td><?=$_SESSION['name']?></td>
      </tr>
      <tr>
        <td>Password:</td>
        <!-- Replace PHP code with $password if you want to show encrypted password. -->
        <!-- Do not forget to edit config.php as well. -->
        <td><?=$_SESSION['password']?></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><?=$email?></td>
      </tr>
    </table>
  </div>
</div>

<!-- Copyright -->
<div class="copyright">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>
