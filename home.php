<?php
$stmt = $pdo->prepare('SELECT * FROM shop ORDER BY id ASC LIMIT 3');
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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

<!-- Main header. 1140px width centered. -->
<header class="main">
  <div class="item">
    <h1><a href="index.php">Bakkerij Leiden</a></h1>
    <a href="admin/login.php"><i class="fas fa-users"></i>Admin</a>
    <a href="index.php?page=cart"><i class="fas fa-shopping-cart"></i>Shopping Cart</a>
  </div>
</header>

<!-- Container. 1140px width centered. Contains most of the items. -->
<div class="container">
  <h2>Home</h2>
  <!-- Welcome message. Contains about us, location and social media. -->
  <div class="message">
    <h3>Welcome</h3>
    <p>Hallo welkom op onze pagina.
    op deze pagina kan u uw producten bestellen vers uit onze horeca opleiding keueken 
    .</p>
    <h3>About Us</h3>
    <p> Dit is de pagina van de Horeca opleiding, deze opleiding leeren we je alles over de uitvoering van alle keukenwerkzaamheden, 
    de taakverdeling, toezicht houden en natuurlijk meer diepgaande kook kennis en vaardigheden met betrekking tot koken en bereiden van gerechten. 
    Je kunt deze opleiding volgen wanneer je in het bezit bent van een diploma Zelfstandig Werkend Kok</p>
    <h3>Location</h3>
    <p>Wij zijn gevestigd in leiden op het adress : Breestraat 46, 2311 CS Leiden.</p>
    <h3>Social Media</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quisquam 
    ipsam odit sed facilis similique nulla obcaecati omnis, dolores ab molestias 
    debitis nihil inventore odio est laborum quam praesentium possimus.</p>
  </div>
  
  <!-- Displays the products from the database. -->
  <div class="products"> 
  <?php foreach ($products as $product): ?>
    <!-- Container for each product box. -->
    <div class="box">
      <!-- Product image. -->
      <div class="image">
        <img src="imgs/<?=$product['img']?>" width="160" height="100" alt="<?=$product['name']?>">
      </div>
      <!-- Product name and price. -->
      <h3 class="name"><?=$product['name']?></h3>
      <p class="price">&euro;<?=$product['price']?></p>
      <!-- Link to product details. -->
      <span class="detail">
        <a href="index.php?page=product&id=<?=$product['id']?>">Product Detail</a>
      </span>
    </div>
  <?php endforeach; ?>
  </div>
</div>

<!-- Copyright -->
<div class="copyright">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>
