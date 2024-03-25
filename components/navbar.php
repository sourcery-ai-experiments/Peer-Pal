<?php 

// Start session

include("./includes/utils/start_session.php");

// Check if the user is logged in
$isLogged = isset($_SESSION['user_id']);

// Set link dynamically
$loginLink = $isLogged ? "" : '<li><a href="../login.php">Login</a></li>';

$buddyMatchLink = $isLogged ? '<li id="match-me-link"><a  href="../buddy-match.php">Match me</a></li>' : "";
$profileLink = $isLogged ? '<li><a href="../profile.php">Profile</a></li>' : "";
$registerLink = $isLogged ? "" : '<li><a href="../signup.php">Register</a></li>';
$logoutLink = $isLogged ? '<li><a href="../includes/logout/logout.inc.php">Logout</a></li>' : "";

?>
<header class="header">
  <div class="header-content">
    <a href="/">
      <img id="logo" src="/images/PeerPals.png" alt="Peer Pal logo">
    </a>
    <nav class="nav">
      <ul class="nav-links">
        <?php echo $buddyMatchLink; ?>
        
        <li>
          <a href="../about.php">About</a>
        </li>
        <li>
          <a href="#">Contact us</a>
        </li>
        <?php echo $loginLink; ?>
        <?php echo $registerLink; ?>
        <?php echo $profileLink; ?>
        <?php echo $logoutLink; ?>

      </ul>
      <img src="/images/icons/menu.png" alt="menu">
  </div>
  </nav>
</header>
