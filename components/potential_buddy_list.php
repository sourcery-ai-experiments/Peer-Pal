<?php

// Connect to database

if (isset($_SESSION['user_id'])) {
    // Redirect to the login page
    include("./includes/dbh.inc.php");
    
    try {
        // Prepare SQL statement
        $sql = "SELECT * FROM users WHERE student_type = 'existing student'";
        $statement = $pdo->prepare($sql);
        
        // Execute the statement
        $statement->execute();
    
        // Check if there are any existing students
        if ($statement->rowCount() > 0) {
            echo "<h2>Potential Buddies...</h2>";
            echo "<ul>";
            // Fetch and display user data
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>{$row['username']}</li>"; // Display username, you can display other user details as needed
            }
            echo "</ul>";
        } else {
            echo "<p>No Potential Buddy yet...</p>";
        }
    } catch (PDOException $e) {
        echo "<h3>Something went wrong</h3> " . $e->getMessage();
    }
}
