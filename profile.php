<?php 
// start session
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// include connection to database
include("./includes/dbh.inc.php");
include("./actions/auth_check.php");

try {
  // Check for user_id
  if (isset($_SESSION['user_id'])) {
    // select user from the database
    $user_id = $_SESSION['user_id'];
    // To prevent sql injection
    $statement = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $statement->execute([$user_id]);
    // execute task
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // Display user's profile if there is a user or display an error page if there is no user
    if ($user) {
      ?>
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/navbar.css">
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="css/profilepage.css">
        <title>Profile Page</title>
      </head>
      <body>
        <!-- HEADER / NAVBAR -->
  <?php include("./components/navbar.php") ?>
    <div class="container">
        <section class="profile">
            <div class="profile-picture">
                <img src="<?php echo $user['photo']; ?>" alt="Profile Picture">
            </div>
            <div class="profile-info">
                <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p><strong>First Name:</strong> <?php echo $user['first_name']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $user['last_name']; ?></p>
                <p><strong>Nationality:</strong> <?php echo $user['nationality']; ?></p>
                <p><strong>Date of Birth:</strong> <?php echo $user['date_of_birth']; ?></p>
                <p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
                <p><strong>Degree Level:</strong> <?php echo $user['program_type']; ?></p><br><br><br><br>
                 <!-- Display other user details here -->
            </div>
            <div class="profile-actions">
            <a href="/manage-profile.php" class="button">Manage Profile</a>
            <a href="/" class="button">Back to home</a>
            </div>
        </section>
        <section class="posts">
            <h2>About me</h2>
            <article class="post">
                <p>Postgraduate student at Robert Gordon University.....</p><br><br><br>
            </article>
            <!-- Additional posts can be displayed here -->
        </section>
    </div>
</body>

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
      </html>
      <?php
    } else {
      echo "<h1>User not found</h1>";
    }
  } else {
    echo "<h1>UserID not provided</h1>";
  }
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>
