<?php 

// Check if session is started already or start session
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Start session
    session_start();
}


// Check if the user is logged in
$isLogged = isset($_SESSION['user_id']);

// Check if the user is an admin 
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;

// Set link dynamically
$loginLink = $isLogged ? "" : '<li><a href="../login.php">Login</a></li>';
$buddyMatchLink = $isLogged ? '<li id="match-me-link"><a  href="../buddy-match.php">Match me</a></li>' : "";
$profileLink = $isLogged ? '<li><a href="../profile.php">Profile</a></li>' : "";
$registerLink = $isLogged ? "" : '<li><a href="../signup.php">Register</a></li>';
$logoutLink = $isLogged ? '<li><a href="../includes/logout/logout.inc.php">Logout</a></li>' : "";
$dashboardLink = $isAdmin ? '<li><a href="../dashboard.php">Dashboard</a></li>' : '';

?>
<header class="header">
  <div class="header-content">
    <a href="/">
      <div id="logo">
        <img src="./images/PeerPals.png" alt="Peer Pal logo">
      </div>
    </a>
    <nav class="nav">
      <ul class="nav-links">
        <?php echo $buddyMatchLink; ?>
        <?php echo $dashboardLink; ?>
        <li>
          <a href="../about.php">About</a>
        </li>
        <li>
          <a href="#">Contact us</a>
        </li>
        <li>
          <a href="../resources.php">Resources</a>
        </li>
        <?php echo $loginLink; ?>
        <?php echo $registerLink; ?>
        <?php echo $profileLink; ?>
        <?php echo $logoutLink; ?>
      </ul>
      <img src="./images/icons/menu.png" alt="menu">
    </nav>
  </div>
</header>