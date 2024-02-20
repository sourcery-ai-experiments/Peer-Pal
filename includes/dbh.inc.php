<?php 

$dsn = "mysql:host=localhost;dbname=peer-pal";
$dbusername = "root";
$dbpassword = "Just4u..";

try {
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected Successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die("Connection failed: " . $e->getMessage());
}
