
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
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <style>
        body {
            background-color: #cce5ff; 
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <?php include("./components/navbar.php"); ?>

    <div class="container dashboard-page">
        <!-- Dashboard Component -->
        <?php include("./components/dashboard-component.php"); ?>
    </div>

    <!-- FOOTER -->
    <?php include("./components/footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
        } else {
            echo "<h1 class='text-center mt-5'>You are restricted from this page</h1>";
        }
    } else { 
        // Redirect to the login page
        header("Location: login.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} ?>