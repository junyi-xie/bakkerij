<?php
session_start();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">    
  <title>Sign up - Bakkerij Leiden</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />          
</head>
<body>

<!-- Login. -->
<div class="login">
  <!-- The heading for login page. -->
  <div class="heading">
    <p class="title">Bakkerij Leiden</p>
    <p class="text">Admin Panel</p>
    <hr/>
  </div>
  <!-- Form that uses the method post to get data from the database. -->
  <form action="config.php" method="post">
    <input class="username" name="username" type="text" maxlength="50" placeholder="Gebruikersnaam" required>
    <input class="password" name="password" type="password" maxlength="50" placeholder="Wachtwoord" required>
    <!-- Remember me option. -->
    <div class="option">
      <input class="remembercheck" type="checkbox" name="remember" />
      <span class="remembertext">Onthoud me</span>
      <!-- Return to the home page if you do not want to login. -->
      <span class="return">    
        <a href="index.php">terug naar home</a>
      </span>
    </div>
    <!-- Submit button. Sends all data to config.php. -->
    <input class="submit" type="submit" value="login" />
  </form>
  <!-- End of form. -->
</div>
<!-- End of login. -->

<!-- Copyright. -->
<div class="copyright" style="position: absolute;">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>