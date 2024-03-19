<?php
// Start the session
// require_once "../includes/utils/start_session.php";
// Include the database connection

try {
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        throw new Exception("User not logged in.");
    }


    // Retrieve accepted buddies for the current user
    $user_id = $_SESSION['user_id'];

    $fetch_buddies_sql = "SELECT * FROM buddies WHERE (user1_id = :user_id OR user2_id = :user_id) AND status = 'accepted'";
    $fetch_buddies_stmt = $pdo->prepare($fetch_buddies_sql);
    $fetch_buddies_stmt->bindParam(':user_id', $user_id);
    $fetch_buddies_stmt->execute();
    $buddies = $fetch_buddies_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the list of accepted buddies
    if (!empty($buddies)) {
        echo "<div class='buddies-content'>";
        echo "<h2 style='text-align: center'>Accepted Buddies</h2>";
        foreach ($buddies as $buddy) {
            // Determine the ID of the buddy (the other user)
            $buddy_id = ($buddy['user1_id'] == $user_id) ? $buddy['user2_id'] : $buddy['user1_id'];
            // Fetch the buddy's username or other relevant information from the users table
            $fetch_user_sql = "SELECT username FROM users WHERE id = :buddy_id";
            $fetch_user_stmt = $pdo->prepare($fetch_user_sql);
            $fetch_user_stmt->bindParam(':buddy_id', $buddy_id);
            $fetch_user_stmt->execute();
            $buddy_info = $fetch_user_stmt->fetch(PDO::FETCH_ASSOC);
            echo "<ul>";
            echo "<li><a href=''>{$buddy_info['username']}</a></li>";
            echo "</ul>";
        }
    } else {
        echo "<div class='buddies-content'>";
        echo "<p class='buddies-content-text'>No accepted buddies found.</p>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "<h3>Something went wrong while fetching buddies</h3> " . $e->getMessage();
} catch (Exception $e) {
    echo "<h3>Error:</h3> " . $e->getMessage();
}
