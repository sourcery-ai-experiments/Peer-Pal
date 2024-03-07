<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css ">
  <link rel="stylesheet" href="/css/homepage.css">
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/navbar.css">

  <title>PeerPal | HomePage</title>
</head>
<body>
  <!-- HEADER / NAVBAR -->
  <header class="header">
    <div class="header-content">
      <a href="/">
        <img id="logo" src="/images/PeerPals.png" alt="Peer Pal logo">
      </a>
      <nav class="nav">
        <ul class="nav-links">
          <li>
            <a href="#">About</a>
          </li>
          <li>
            <a href="#">Contact us</a>
          </li>
          <li>
            <a href="/login.php">Login</a>
          </li>
          <li>
            <a href="/signup.php">Register</a>
          </li>
        </ul>
        <img src="/images/icons/menu.png" alt="menu">
    </div>
    </nav>

  </header>
  <!-- MAIN -->
  <div class="hero">
    <div class="hero__content">
      <h1 class="hero__title">BuddyConnect: Forge Connections, Foster Growth</h1>
      <p class="hero__subtitle">Discover Your Perfect Study Buddy and Thrive Together</p>
      <a href="/login.php" class="hero__button">Browse</a>
    </div>
  </div>

  <footer class="footer">
    <ul class="footer-links">
      <li>
        <a href="#">Terms</a>
      </li>
      <li>
        <a href="#">Contact us</a>
      </li>
      <li>
        <a href="#">Cookies</a>
      </li>
      <li>
        <a href="#">Safety</a>
      </li>
      <li>
        <a href="#">FAQ</a>
      </li>
    </ul>
    <ul class="social-links">
      <li><a href="#">
        <img class="social-icon" src="/images/icons/instagram.png" alt="">
      </a></li>
      <li><a href="#">
        <img class="social-icon" src="/images/icons/youtube.png" alt="">
      </a></li>
      <li><a href="#">
        <img class="social-icon" src="/images/icons/facebook.png" alt="">
      </a></li>
      <li><a href="#">
        <img class="social-icon" src="/images/icons/x.png" alt="">
      </a></li>
      <li><a href="#">
        <img class="social-icon" src="/images/icons/linkedin.png" alt="">
      </a></li>
      <li><a href="#">
        <img class="social-icon" src="/images/icons/tiktok.png" alt="">
      </a></li>
    </ul>
    <p>© <?php echo date("Y")  ?> Peerpal | Made with love by PeerPal</p>
  </footer>
</body>
</html>
