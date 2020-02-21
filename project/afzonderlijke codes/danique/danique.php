<?php
$servername = "localhost";
$username = "root";
$password = "";
// $products = "SELECT * FROM `products`";

try {
    $db = new PDO("mysql:host=$servername;dbname=bakkerij_leiden", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/css/danique.css">
    <script src="https://kit.fontawesome.com/b57a0b7ac6.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header class="header-main">
        <header class="header-left">
            <header class="logo">
                <img src="./assets/images/logo.jpg" alt="logo" style="width: 240px; height: 80px; background-size: cover;">
            </header>
            <header class="red-stripe"></header>

        </header>

        <header class="header-center">
            <header class="fill"></header>
            <header class="text">
                <img src="./assets/images/bakkerij_leiden.png">
            </header>
        </header>
        <header class="header-right">
        <ul>
                <li>
                  <a href="https://www.facebook.com/mboRijnland"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                  <a href="https://www.instagram.com/mborijnland/"><i class="fab fa-instagram"></i></a>
                </li>
                <li>
                  <a href="https://www.youtube.com/channel/UCFmiIyIrkm03gPDR3TcWKBQ"><i class="fab fa-youtube"></i></a>
                </li>
                <li>
                  <a href="https://twitter.com/mborijnland"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                  <a href="https://www.linkedin.com/school/mborijnland/"><i class="fab fa-linkedin"></i></a>
                </li>
                </ul>
        </header>
    </header>

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

    <footer class="footer-main">
        <footer class="footer-left">
            <footer class="openingstijden">
            <footer class="openingstijden-title">Openingstijden</footer>
            <footer class="openingstijden-text">
                <p>Maandag t/m donderdag</p>
                <p>en zondag</p>
            </footer>
            </footer>

            <footer class="location">
            <footer class="location-title">
                <p>Locatie</p>
            </footer>
            <footer class="location-text">
                <p>Betaplein 18</p>
                <p>2321 KS</p>
            </footer>
            </footer>
        </footer>
        <footer class="footer-center">
        <footer class="banner">
        <img src="https://mk0mborijnlandnw1cam.kinstacdn.com/wp-content/uploads/2019/07/logo.svg" style="width: 300px; height: 100px; background-size: cover;">
        </footer>
        </footer>
        <footer class="footer-right">
            <footer class="contact">
            <footer class="contact-title">Contact</footer>
            <footer class="contact-text">
                <p>skoek@mborijnland.nl</p>
                <p>088 297 4326</p>
            </footer>
            </footer>

            <footer class="links">
            <footer class="links-title">Links</footer>
            <footer class="links-text">
                <p><a class="remove-decoration" href="https://mborijnland.nl">mborijnland.nl</a></p>
            </footer>
            </footer>

        </footer>

    </footer>

</body>
</html>
