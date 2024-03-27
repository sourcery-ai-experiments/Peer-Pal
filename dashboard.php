
<?php 

// Check for session start
session_start();

include("./includes/utils/databaseConfig.php");

// Check if the user is logged in
try {

    if (isset($_SESSION['user_id'])) {

        $user_id = $_SESSION['user_id'];
        
        $statement = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $statement->execute([$user_id]);
        
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        // echo($user['is_admin']);

        // Display Admin Dashboard if the user is an admin

        if($user['is_admin'] === 1) {
          ?>
          <!DOCTYPE html>
              <html lang="en">
              <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <link rel="stylesheet" href=".">
              <link rel="stylesheet" href="./css/navbar.css">
              <link rel="stylesheet" href="./css/footer.css">
              <link rel="stylesheet" href="./css/dashboard.css">
              <title>Admin Dashboard</title>
              </head>
              <body>
              <!-- NAVBAR -->
              <?php 
              include("./components/navbar.php");
              ?>

              <?php include("./components/dashboard-component.php"); ?>

              <!-- FOOTER  -->
              <?php 
              include("./components/footer.php");
              ?>
              </body>
              </html>
              <?php 
      } else {
          echo "<h1>You are restricted from this page</h1>";
      }
    } else { 
        // Redirect to the login page
        header("Location: login.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
