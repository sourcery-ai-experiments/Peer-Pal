<?php 
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/signup.css">
  <title>PeerPal | Signup Page</title>
</head>
<body id="signup-page">
  <main class="signup__container">
    <div class="signup__content">
      <h3>Welcome to PeerPal</h3>
      <p>Please enter your details</p>
      
      <form action="includes/signup.inc.php" method="POST">
        <?php 
          signup_inputs();
        ?>
        <button>signup</button>
        <a href="/login.php">login</a>
      </form>

      <?php 
        check_signup_errors();
      ?>
    </div>
  </main>
</body>
</html>