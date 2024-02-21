<?php 

// Imports
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PeerPal | Login Page</title>
</head>
<body>
  <h3>Login</h3>
  
  <form action="includes/login.inc.php" method="POST">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button>Login</button>
  </form>

  <?php 
  
  check_login_errors();
  
  ?>
</body>
</html>