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
        <title>Profile Page</title>
      </head>
      <body>
        <h1>User Profile</h1>
        <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>First Name:</strong> <?php echo $user['first_name']; ?></p>
        <p><strong>Last Name:</strong> <?php echo $user['last_name']; ?></p>
        <!-- Display other user details here -->

      <a href="/manage-profile.php">Manage Profile</a>
      <form action="/includes/logout.inc.php">
        <button id="logout-btn">logout</button>
      </form>
      </body>
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
