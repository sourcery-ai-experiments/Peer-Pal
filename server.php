<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "PeerPal";


// creating a connection
$conn = new mysqli($servername, $username, $password, $database);


// check  connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 echo "Connected successfully";
?>