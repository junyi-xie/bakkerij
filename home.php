<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home - Bakkerij Leiden</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="style.css" />          
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"/>
</head>
<body>

<header class="main">
  <div class="item">
    <h1><a href="home.php">Bakkerij Leiden</a></h1>
    <a href="admin/login.php"><i class="fas fa-users"></i>Admin</a>
    <a href="shop.php"><i class="fas fa-shopping-cart"></i>Shopping Cart</a>
  </div>
</header>

<div class="container">
  <h2>Home</h2>
  <div class="box">Product #1</div>
  <div class="box">Product #2</div>
  <div class="box">Product #3</div>
</div>

<!-- Copyright -->
<div class="copyright">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>