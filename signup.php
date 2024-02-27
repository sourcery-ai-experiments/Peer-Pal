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
</head>
<body id="signup-page">
  <main class="signup__container">
    <div class="signup__content">
      <div class="signup__content-detail">
        <a href="/">
          <img src="/images/icons/home.png" alt="Home Icon">
        </a>
        <h3>Welcome to PeerPal</h3>
        <p>Please enter your details</p>
        
        <form action="includes/signup.inc.php" method="POST">
          <?php 
            signup_inputs();
          ?>
          <button>sign up</button>
          <hr class="hr-line">
          <p>Do you have an account with us already?</p>
        </form>
        <a href="/login.php">login</a>

        <?php 
          check_signup_errors();
        ?>
      </div>

      <div class="signup__content-bg">
        <!-- <img src="/images/form-bg.avif" alt="Colorful background"> -->
      </div>
    </div>
  </main>
</body>
</html>