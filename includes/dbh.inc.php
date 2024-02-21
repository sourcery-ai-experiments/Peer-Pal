<?php 

$dsn = "mysql:host=localhost;dbname=peer-pal";
$dbusername = "root";
$dbpassword = "PeerPal";

try {
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Create database tables if they don't exist
  $sql = "CREATE TABLE IF NOT EXISTS users (
      id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(30) NOT NULL,
      email VARCHAR(100) NOT NULL,
      password VARCHAR(255) NOT NULL,
      created_at DATETIME DEFAULT CURRENT_TIMESTAMP
  )";

  $pdo->exec($sql);
  
  // echo "Connected Successfully";
  // echo "User table created successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die("Connection failed: " . $e->getMessage());
}