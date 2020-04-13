<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'test';

try {
    $conn = new PDO("mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME", $DATABASE_USER, $DATABASE_PASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE time SET opentime = '".$_POST['opentime']."', 
    closetime = '".$_POST['closetime']."' WHERE id = 1";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
    echo "Connected succesfully";
    }
    catch(PDOException $e)
    {
    echo 'Connection failed: ' . $e->getMessage();
    }
    $conn = null;
    $_SESSION['message'] = "Update succesvol!";
    header('Location: time.php');
    exit();
?>