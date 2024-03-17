<?php

// Connect to database
if (isset($_SESSION['user_id'])) {
    // Redirect to the login page
    include("./includes/dbh.inc.php");
    
    try {
        // Prepare SQL statement to select potential buddies excluding the current user
        $sql = "SELECT * FROM users WHERE student_type = 'existing student' AND id != :user_id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':user_id', $_SESSION['user_id']);
        
        // Execute the statement
        $statement->execute();
    
        // Check if there are any potential buddies
        if ($statement->rowCount() > 0) {
            // Fetch all potential buddies
            $potential_buddies = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            // Select a random potential buddy
            $random_index = array_rand($potential_buddies);
            $selected_buddy = $potential_buddies[$random_index];
            
            // Create a match request between the current user and the selected buddy
            $sql_insert = "INSERT INTO match_requests (requester_id, requested_id) VALUES (:requester_id, :requested_id)";
            $stmt_insert = $pdo->prepare($sql_insert);
            $stmt_insert->bindParam(':requester_id', $_SESSION['user_id']);
            $stmt_insert->bindParam(':requested_id', $selected_buddy['id']);
            $stmt_insert->execute();
            
            // Display a success message
            echo "<p>Successfully matched with {$selected_buddy['username']}!</p>";
        } else {
            echo "<p>Didn't find a Buddy yet...</p>";
        }
    } catch (PDOException $e) {
        echo "<h3>Something went wrong</h3> " . $e->getMessage();
    }
}
?>
