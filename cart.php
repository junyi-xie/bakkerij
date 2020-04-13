<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
  // Set the post variables so we easily identify them, also make sure they are integer
  $product_id = (int)$_POST['product_id'];
  $quantity = (int)$_POST['quantity'];
  // Prepare the SQL statement, we basically are checking if the product exists in our databaser
  $stmt = $pdo->prepare('SELECT * FROM shop WHERE id = ?');
  $stmt->execute([$_POST['product_id']]);
  // Fetch the product from the database and return the result as an Array
  $product = $stmt->fetch(PDO::FETCH_ASSOC);
  // Check if the product exists (array is not empty)
  if ($product && $quantity > 0) {
      // Product exists in database, now we can create/update the session variable for the cart
      if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
          if (array_key_exists($product_id, $_SESSION['cart'])) {
              // Product exists in cart so just update the quanity
              $_SESSION['cart'][$product_id] += $quantity;
          } else {
              // Product is not in cart so add it
              $_SESSION['cart'][$product_id] = $quantity;
          }
      } else {
          // There are no products in cart, this will add the first product to cart
          $_SESSION['cart'] = array($product_id => $quantity);
      }
  }
  // Prevent form resubmission...
  header('Location: index.php?page=cart');
  exit;
}

// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
  // Remove the product from the shopping cart
  unset($_SESSION['cart'][$_GET['remove']]);
}

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
  // Loop through the post data so we can update the quantities for every product in cart
  foreach ($_POST as $k => $v) {
      if (strpos($k, 'quantity') !== false && is_numeric($v)) {
          $id = str_replace('quantity', '', $k);
          $quantity = (int)$v;
          // Always do checks and validation
          if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
              // Update new quantity
              $_SESSION['cart'][$id] = $quantity;
          }
      }
  }
  // Prevent form resubmission...
  header('Location: index.php?page=cart');
  exit;
}

// Create some session variables for later use
if (isset($_POST['checkout']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  // First checks if product 1 contains anything, if not we give it a value
  if ($_POST['product1']=="") $_POST['product1'] = "-";
  // Checks if quantity 1 contains a value, if not we will give it an empty value
  if ($_POST['quantity1']=="") $_POST['quantity1'] = "0";
  // Puts the post value in a session to use in form.php (product 1 + quantity 1)
  $_SESSION['product1'] = $_POST['product1'];
  $_SESSION['quantity1'] = $_POST['quantity1'];

  $_POST['product1'] = $_SESSION['product1'];
  $_POST['quantity1'] = $_SESSION['quantity1'];

  // First checks if product 2 contains anything, if not we give it a value
  if ($_POST['product2']=="") $_POST['product2'] = "-";
  // Checks if quantity 2 contains a value, if not we will give it an empty value
  if ($_POST['quantity2']=="") $_POST['quantity2'] = "0";
  // Puts the post value in a session to use in form.php (product 2 + quantity 2)
  $_SESSION['product2'] = $_POST['product2'];
  $_SESSION['quantity2'] = $_POST['quantity2'];

  $_POST['product2'] = $_SESSION['product2'];
  $_POST['quantity2'] = $_SESSION['quantity2'];

  // First checks if product 3 contains anything, if not we give it a value
  if ($_POST['product3']=="") $_POST['product3'] = "-";
  // Checks if quantity 3 contains a value, if not we will give it an empty value
  if ($_POST['quantity3']=="") $_POST['quantity3'] = "0";
  // Puts the post value in a session to use in form.php (product 3 + quantity 3)
  $_SESSION['product3'] = $_POST['product3'];
  $_SESSION['quantity3'] = $_POST['quantity3'];

  $_POST['product3'] = $_SESSION['product3'];
  $_POST['quantity3'] = $_SESSION['quantity3'];

  // Puts the totalprice value in a session to later use
  $_SESSION['totalprice'] = $_POST['totalprice'];
  $_POST['totalprice'] = $_SESSION['totalprice'];

  header('Location: index.php?page=form');
  exit;
}

// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM shop WHERE id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shopping Cart - Bakkerij Leiden</title>
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
  <h2>Winkelwagen</h2>
  <div class="cart">
    <!-- Form with a method of post to send data. -->
    <form action="index.php?page=cart" method="post">
      <!-- Table for displaying the products -->
      <table>
        <thead>
          <tr>
            <td colspan="2">Product</td>
            <td>Beschrijving</td>
            <td>Prijs</td>
            <td>Aantal</td>
            <td>Totaal</td>
          </tr>
        </thead>
        <!-- Container where the products from the database will display. -->
        <tbody>
        <!-- If shopping cart is empty it will display a message saying it is empty. -->
        <?php if (empty($products)): ?>
          <tr>
            <td colspan="5" style="text-align: center;">
            <span class="text">Momenteel zijn er geen producten toegevoegd aan uw winkelwagen</span>
            </td>
          </tr>
          <?php else: ?>
          <?php foreach ($products as $product): ?>
          <tr>
            <td class="img">
              <a href="index.php?page=product&id=<?=$product['id']?>">
                <!-- Product image. -->
                <img src="assets/img/<?=$product['img']?>" width="100" height="60" alt="<?=$product['name']?>"/>
              </a>
              <!-- Sends the product ID. -->
              <input type="hidden" name="product<?=$product['id']?>" value="<?=$product['name']?>">
            </td>
            <td>
              <!-- Product name. -->
              <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['name']?></a>
                <br/>
              <!-- Remove button for product.-->
              <a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove">Remove</a>
            </td>
            <!-- Description of the product which is saved in the database. -->
            <td class="description">
              <?=$product['product_desc']?>
            </td>
            <!-- The price of the product. -->
            <td class="price">
              &euro;<?=$product['price']?>
            </td>
            <!-- Quantity of product. -->
            <td class="quantity">
              <input type="number" name="quantity<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required />
            </td>
            <!-- Total price. -->
            <td class="price">
              <?php $price = $product['price'] * $products_in_cart[$product['id']]?>
              &euro;<?=number_format($price,2)?>
            </td>
          </tr>
        </tbody>
        <!-- End of the loop. -->
        <?php endforeach; ?>
        <?php endif; ?>
      </table>
      <!-- End of table. -->
    </div>
    <!-- Displays total price. Currency is euro's. -->
    <div class="subtotal">
      <span class="text">Subtotaal</span>
      <span class="price">&euro;<?=number_format($subtotal, 2)?></span>
      <input type="hidden" name="totalprice" value="<?=number_format($subtotal, 2)?>">
    </div>  
    <!-- Button for finishing your payment. -->
    <div class="buttons">
      <input type="submit" value="Update" name="update" />
      <input type="submit" value="Betalen" name="checkout" />
    </div>
  </form>
  <!-- End of form. -->  
</div>
<!-- End of div. -->

<!-- Copyright. -->
<div class="copyright">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>
