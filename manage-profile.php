<?php 
session_start();

include("./includes/dbh.inc.php");

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
        <link rel="stylesheet" href="/css/manage.css">
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="./css/navbar.css">
        <title>Profile Page</title>
      </head>
      <body>
      <?php include("./components/navbar.php") ?>

      <h1>Manage Account</h1>
      <div class="container">
        <div class="manage">
       
        <?php         
        include("./components/profile_form.php");
        ?>
          </div>

        <div class="picture">
          <img src="https://images.unsplash.com/photo-1501556466850-7c9fa1fccb4c?q=80&w=1965&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="picture">

        </div>
 </div>
  <?php include("./components/footer.php") ?>
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
