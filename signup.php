<?php 
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/homepage.css">
  <title>PeerPal | Signup Page</title>
</head>
<body>
  <h3>Signup</h3>
  
  <form action="includes/signup.inc.php" method="POST">
    <?php 
      signup_inputs();
    ?>
    <button>signup</button>
    <hr>
    <a href="/login.php">login</a>
  </form>

  <?php 
    check_signup_errors();
  ?>
</body>
</html>