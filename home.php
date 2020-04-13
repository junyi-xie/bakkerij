<?php
$stmt = $pdo->prepare('SELECT * FROM shop ORDER BY id ASC LIMIT 3');
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'test';
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt select query execution
$sql = "SELECT * FROM time";
if($result = mysqli_query($con, $sql)){
  if(mysqli_num_rows($result) > 0){
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home - Bakkerij Leiden</title>
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
    <h1><a href="index.php?page=home">Bakkerij Leiden</a></h1>
    <a class="main" href="login.php"><i class="fas fa-users"></i>Admin</a>
    <a class="main" href="index.php?page=cart"><i class="fas fa-shopping-cart"></i>Winkelwagen</a>
    <a class="sub" href="javascript:void(0);" onclick="dropdownmenu()"><i class="fa fa-bars"></i></a>
  </div>
  <!-- Mobile view navigation -->
  <div class="menu">
    <div id="links">
      <a href="login.php"><i class="fas fa-users"></i> Admin</a>
      <a href="index.php?page=cart"><i class="fas fa-shopping-cart"></i> Winkelwagen</a>
    </div>
  </div>
</header>
<!-- End of navigation. -->

<!-- Container. -->
<div class="container">
  <h2>Home</h2>
  <!-- Contains about us, location, contact, openinghours and social media. -->
  <div class="message">
    <h3>Koekje van eigen deeg</h3>
    <p>Bij de bakkerij van mboRijnland (Leiden – Bètaplein) verkopen wij verassingspakketten in 
    diverse hoeveelheden en prijzen. De verassingspakketten worden vers gemaakt door onze studenten.
    <span class="text">Momenteel kan er alleen worden afgehaald</span>. Ieder verassingspakket 
    bevat altijd weer iets nieuws, dus het blijft altijd een verassing!</p>
    <h3>Openingstijden</h3>
    <?php 
    while($row = mysqli_fetch_array($result)){ 
    $time = "u";
    ?>
    <!-- Openinghours information. Displays time the shop is opened and closed. -->
    <p>Op zondag, maandag, dinsdag, woensdag en donderdag zijn wij geopend vanaf
    <span class="time"><?=$row['opentime']?><?=$time?></span>
    <span>t/m</span><span class="time"> <?=$row['closetime']?><?=$time?></span>.</p>
    <?php 
    }
    mysqli_free_result($result);
    } else{
      echo "No records matching your query were found.";
    }
    } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    mysqli_close($con);
    ?>
    <h3>Contact</h3>
    <p class="text"><a href="mailto:skoek@mborijnland.nl"><i class="far fa-envelope"></i> skoek@mborijnland.nl</a></p>
    <p><i class="fas fa-phone"></i> 088 222 17 77</p>
    <h3>Locatie</h3>
    <p class="text">Bètaplein 18</p>
    <p>2321 KS Leiden</p>
    <h3>Volg ons</h3>
    <!-- Social media. Redirects to mboRijnland social media links. -->
    <div class="icons">
      <ul>
        <li><a href="https://www.facebook.com/mboRijnland" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="https://www.instagram.com/mborijnland/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
        <li><a href="https://www.youtube.com/channel/UCFmiIyIrkm03gPDR3TcWKBQ" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a></li>
        <li><a href="https://twitter.com/mborijnland" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://www.linkedin.com/school/18224141/" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a></li>
      </ul>
    </div>
  </div>
  <!-- End of message class. -->
  
  <!-- Displays the products from the database. -->
  <div class="products"> 
  <!-- Start of product loop. -->
  <?php foreach ($products as $product): ?>
    <!-- Container for each product box. -->
    <div class="box">
      <!-- Product image. -->
      <div class="image">
        <img src="assets/img/<?=$product['img']?>" width="160" height="100" alt="<?=$product['name']?>">
      </div>
      <!-- Product name and price. -->
      <h3 class="name"><?=$product['name']?></h3>
      <p class="price">&euro;<?=$product['price']?></p>
      <!-- Link to product details. -->
      <span class="info">
        <a href="index.php?page=product&id=<?=$product['id']?>">Product Detail</a>
      </span>
    </div>
  <?php endforeach; ?>
  <!-- End of product loop. -->
  </div>
</div>
<!-- End of container class. -->

<!-- Copyright. -->
<div class="copyright">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>
