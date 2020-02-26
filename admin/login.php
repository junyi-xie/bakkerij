<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">    
  <title>Sign up - Bakkerij Leiden</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="style.css" />             
</head>
<body>

<!-- 1140px width. Content is centered. -->
<div class="login">

  <!-- The heading for login page -->
  <div class="heading">
    <p class="title">Bakkerij Leiden</p>
    <p class="text">Admin Panel</p>
    <hr/>
  </div>

  <!-- Form that uses the method post to get data from the database. -->
  <form action="config.php" method="post">
    <input class="username" name="username" type="text" maxlength="30" placeholder="Username" required>
    <input class="password" name="password" type="password" maxlength="20" placeholder="Password" required>

    <!-- Remember me option. Does not work yet -->
    <div class="remember">
      <input class="remembercheck" type="checkbox" name="remember" />
      <span class="rememberspan">Remember me</span>

      <!-- Return to the home page if you do not want to login -->
      <span class="return">    
      <a href="/bakkerij/index.php">want to return?</a>
      </span>

    </div>

    <!-- Submit button. Sends all data to config.php. -->
    <input class="submit" type="submit" value="login" />

  </form>

</div>

<!-- Copyright -->
<div class="copyright">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>

