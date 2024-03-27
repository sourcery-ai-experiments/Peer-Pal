<?php 

// imports

include("./includes/utils/databaseConfig.php");

// Fetch user details based on username from the url

if (isset($_GET['username'])) {
  $username = $_GET['username'];

  // Find user with username from the database

  $sql_statement = $pdo->prepare("SELECT * FROM users WHERE username = ?");
  $sql_statement->execute([$username]);
  $user = $sql_statement->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
    die("User not Found");
  }
} else {
  header("Location: 404.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $user['username']; ?></title>
</head>
<body>
  <ul>
    <li>Username: <?php echo $user['username']; ?></li>
    <li>Email: <?php echo $user['email']; ?></li>
    <li>First Name: <?php echo $user['first_name']; ?></li>
    <li>Last Name: <?php echo $user['last_name']; ?></li>

    
  </ul>
</body>
</html>