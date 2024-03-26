<?php 

// Imports
require_once 'includes/utils/config_session.inc.php';
require_once 'includes/login/login_view.inc.php';

// Redirect already logged in user to the home page

if (isset($_SESSION['user_id'])) {
  header("Location: home.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>PeerPal | Login Page</title>
</head>
<body id="login-page">
  <main class="login__container">
    <div class="login__content">
      <div class="login__content-detail">
        <a href="/">
          <img src="/images/PeerPals.png" alt="PeerPal logo">
        </a>
        <h3>Welcome back to PeerPal</h3>
        <p>Please enter your details</p>

        <form action="includes/login/login.inc.php" target="_self" method="post" autocomplete="on">
          <input type="text" class="input-with-person-icon" name="username" placeholder="Username" size="50" required autofocus><br>
          <input type="password" class="input-with-password-icon" name="password" placeholder="Password" size="50" required><br>
          <button>Login</button>
        </form>
      
        <p>
          Are you new here? 
          <a href="/signup.php"> Signup</a>
        </p>

        <a href="/forgot-password.php">Forgot Password</a>
      
        <!-- <form action="/includes/logout.inc.php">
          <button id="logout-btn">logout</button>
        </form> -->
      
        <?php 
          check_login_errors()
        ?>
      </div>

      <div class="login__content-bg"></div>
    </div>
  </main>
</body>

</html>
