<?php
$servername = "localhost";
$username = "root";
$password = "";
// $products = "SELECT * FROM `products`";

try {
    $db = new PDO("mysql:host=$servername;dbname=bakkerij_leiden", $username, $password);
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
        $stmt = $db->query("SELECT * from products");
        while ($row = $stmt->fetch())
        {
            echo "<br>id:" . $row['id'] . "\n" . "<br>";
            echo "name:" . $row['name'] . "\n". "<br>";
            echo "description:" . $row['description'] . "\n". "<br>";
            echo "price:" . $row['price'] . "\n". "<br>";
        }
        
    ?>