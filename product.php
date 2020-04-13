<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM shop WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        die ('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    die ('Product does not exist!');
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?=$product['name']?> - Bakkerij Leiden</title>
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
    <h1><a href="index.php?page=home">Bakkerij Leiden</a></h1>
    <a class="main" href="login.php"><i class="fas fa-users"></i>Admin</a>
    <a class="main" href="index.php?page=cart"><i class="fas fa-shopping-cart"></i>Winkelwagen</a>
    <a class="sub" href="javascript:void(0);" onclick="dropdownmenu()"><i class="fa fa-bars"></i></a>
  </div>
  <!-- Mobile view navigation. -->
  <div class="menu">
    <div id="links">
      <a href="login.php"><i class="fas fa-users"></i> Admin</a>
      <a href="index.php?page=cart"><i class="fas fa-shopping-cart"></i> Winkelwagen</a>
    </div>
  </div>
</header>
<!-- End of container. -->

<!-- Container for the display of the products. -->
<div class="container">
  <h2>Producten</h2>
  <!-- Product container. -->
  <div class="product">
    <!-- Image of product. -->
    <img src="assets/img/<?=$product['img']?>" alt="<?=$product['name']?>" class="main">
    <div class="wrapper">
    <img src="assets/img/<?=$product['img']?>" alt="<?=$product['name']?>" class="sub">
      <!-- Title of the product. -->
      <h1><?=$product['name']?></h1>
      <!-- Price in euro's. -->
      <span class="price">&euro;<?=$product['price']?></span>
      <!-- Displays quantity of the product. -->
      <h4>Er zijn <span class="text"><?=$product['quantity']?></span> verrassingspakketten op voorraad</h4>
      <!-- Description of the product. -->
      <div class="description"><?=$product['desc']?></div>
        <!-- Form. -->
        <form action="index.php?page=cart" method="post">
          <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
          <input type="hidden" name="product_id" value="<?=$product['id']?>">
          <input type="submit" value="Toevoegen aan winkelwagen">
        </form>
        <!-- End of form. -->
      </div>
      <!-- End of wrapper. -->
    </div>
    <!-- End of product container. -->
  </div>
  <!-- End of container. -->
</div>

<!-- Copyright -->
<div class="copyright">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>

