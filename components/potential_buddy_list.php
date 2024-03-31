<?php

// Connect to the database
if (isset($_SESSION['user_id'])) {
    // Redirect to the login page
    include("./includes/utils/databaseConfig.php");
    
    try {
        // Prepare SQL statement to select potential buddies excluding the current user
        $sql = "SELECT * FROM users WHERE student_type = 'existing student' AND id != :user_id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':user_id', $_SESSION['user_id']);
        
        // Execute the statement
        $statement->execute();
    
        // Check if there are any potential buddies
        if ($statement->rowCount() > 0) {
            echo "<h2 class='potential-buddies-header'>Potential Buddies...</h2>";
            echo "<div class='potential-buddies-container'>";
            // Fetch and display user data
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='buddy-card'>";
                echo "<img src='{$row['photo']}' alt='User Photo' />";
                echo "<div class='buddy-card-infos'>";
                echo "<h2>{$row['username']}</h2>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p>No Potential Buddy yet...</p>";
        }
    } catch (PDOException $e) {
        echo "<h3>Something went wrong</h3> " . $e->getMessage();
    }
}
?>
