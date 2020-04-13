<?php
if (!isset($_SESSION['totalprice'])) {
	header('Location: index.php?page=cart');
	exit();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact formulier invullen - Bakkerij Leiden</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  <script src="assets/js/main.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
</head>
<body>

<!-- Start form class. -->
<div class="form">
  <!-- Heading. -->
  <div class="heading">
    <p class="title">Bakkerij Leiden</p>
    <p class="text">Contact Formulier</p>
    <hr/>
  </div>
  <!-- Form that uses method post. Submits all the data to insert.php  -->
  <form action="mollie/payments.php" method="post">
    <input class="name" type="text" name="name" maxlength="50" placeholder="Voor- en achternaam" required />
    <input class="email" type="email" name="email" maxlength="50" placeholder="E-mail" required />
    <!-- Input type hidden which sends the product ID. -->
    <input type="hidden" name="product1" value="<?php echo $_SESSION['product1']?>">
    <input type="hidden" name="product2" value="<?php echo $_SESSION['product2']?>">
    <input type="hidden" name="product3" value="<?php echo $_SESSION['product3']?>">
    <!-- Input type hidden which sends the quantity of the product ID. -->
    <input type="hidden" name="quantity1" value="<?php echo $_SESSION['quantity1']?>">
    <input type="hidden" name="quantity2" value="<?php echo $_SESSION['quantity2']?>">
    <input type="hidden" name="quantity3" value="<?php echo $_SESSION['quantity3']?>">
    <!-- Input type hidden which sends the current date. -->
    <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
    <!-- Input type hidden for totalprice. -->
    <input type="hidden" name="totalprice" value="<?php echo $_SESSION['totalprice']?>"> 
    <!-- Submit button, inserts value into database. -->
    <input class="submit" type="submit" name="submit" value="Verder">
  </form>
  <!-- End of form. -->
</div>
<!-- End of form class. -->

<!-- Copyright. -->
<div class="copyright" style="position: absolute;">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>
