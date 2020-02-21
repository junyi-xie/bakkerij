<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bakkerij_leiden";
// $products = "SELECT * FROM `products`";

try {
    $db = new PDO("mysql:host=$servername;dbname={$dbname}", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
<?php
 include "header.php";
?>

<!-- MAIN CONTENT HERE -->

<div id="container">
  <div id="block">

  </div>
  <div class="box">

    <h2>Verassingpakket 1</h2>
    
  </div>

  <div class="box">

    <h2>Verassingpakket 2</h2>

  </div>

  <div class="none">

    <h2>Verassingpakket 3</h2>

  </div>
</div>


<?php
  include "footer.php";
?>