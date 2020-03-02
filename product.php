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
  <link rel="stylesheet" type="text/css" href="style.css" />          
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"/>
</head>
<body>

<!-- Main header. Contains the shopping cart and admin login. -->
<header class="main">
  <div class="item">
    <h1><a href="index.php">Bakkerij Leiden</a></h1>
    <a href="admin/login.php"><i class="fas fa-users"></i>Admin</a>
    <a href="index.php?page=cart"><i class="fas fa-shopping-cart"></i>Shopping Cart</a>
  </div>
</header>

<!-- Container for the display of the products. -->
<div class="container">
  <h2>Product</h2>
  <div class="product">
    <img src="imgs/<?=$product['img']?>" width="500" height="400" alt="<?=$product['name']?>">
    <div class="wrapper">
      <h1><?=$product['name']?></h1>
      <span class="price">&euro;<?=$product['price']?></span>
      <div class="description"><?=$product['desc']?></div>
        <form action="index.php?page=cart" method="post">
          <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
          <input type="hidden" name="product_id" value="<?=$product['id']?>">
          <input type="submit" value="Add To Cart">
        </form>
    </div>
  </div>
</div>

<!-- Copyright -->
<div class="copyright">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>

