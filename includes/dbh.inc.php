<?php 

$dsn = "mysql:host=localhost;dbname=peer-pal;";
$dbusername = "root";
$dbpassword = "PeerPal";

try {
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // // Create Database

  // $sql_db = "CREATE DATABASE IF NOT EXISTS peer-pal";
  // $pdo->exec($sql_db);

  // // Execute Database

  // $pdo->exec("USE peer-pal");

  // Create database tables if they don't exist
  $sql = "CREATE TABLE IF NOT EXISTS users (
      id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(30) NOT NULL,
      email VARCHAR(100) NOT NULL,
      password VARCHAR(255) NOT NULL,
      first_name VARCHAR(255),
      last_name VARCHAR(255),
      date_of_birth DATE,
      nationality VARCHAR(255),
      gender VARCHAR(10),
      faculty VARCHAR(255),
      study_mode VARCHAR(255),
      photo VARCHAR(255),
      is_admin BOOLEAN DEFAULT FALSE,
      program_type VARCHAR(255),
      student_type VARCHAR(255),
      UNIQUE (username),
      UNIQUE (email),
      created_at DATETIME DEFAULT CURRENT_TIMESTAMP
  )";

  $sql2 = "CREATE TABLE IF NOT EXISTS buddies (
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user1_id INT(11) UNSIGNED NOT NULL,
    user2_id INT(11) UNSIGNED NOT NULL,
    status VARCHAR(20) DEFAULT 'pending',
    FOREIGN KEY (user1_id) REFERENCES users(id),
    FOREIGN KEY (user2_id) REFERENCES users(id),
    UNIQUE (user1_id, user2_id)
  )";

  $pdo->exec($sql);
  $pdo->exec($sql2);
  
  // echo "Connected Successfully";
  // echo "User table created successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die("Connection failed: " . $e->getMessage());
}
