<?php
try {
    // Check if a session is not already active
    include("../utils/start_session.php");
    include("../utils/databaseConfig.php");

    require_once "../utils/config_session.inc.php";

    if (isset($_POST['accept']) || isset($_POST['reject'])) {
        // Ensure $_SESSION['user_id'] is set
        if (!isset($_SESSION['user_id'])) {
            throw new Exception("User ID not set in session.");
        }

        // Get the request ID and action (accept or reject)
        $request_id = $_POST['request_id'];
        $action = isset($_POST['accept']) ? 'accept' : 'reject';

        // Update the status of the match request
        $update_request_sql = "UPDATE match_requests SET status = :status WHERE id = :request_id";
        $update_request_stmt = $pdo->prepare($update_request_sql);
        $update_request_stmt->bindParam(':request_id', $request_id);

        // Set the status based on the action
        $status = ($action === 'accept') ? 'accepted' : 'rejected';
        $update_request_stmt->bindParam(':status', $status);
        $update_request_stmt->execute();

        if ($action === 'accept') {
            // Check if $_POST['requested_id'] is set
            if (!isset($_POST['requester_id'])) {
                throw new Exception("Requester ID not provided.");
            }

            // Check if $_POST['requested_id'] is not null
            $requester_id = $_POST['requester_id'];
            if (empty($requester_id)) {
                throw new Exception("Requester ID is empty.");
            }

            // Ensure that the current user is not trying to add themselves as a buddy
            if ($_SESSION['user_id'] != $requester_id) {
                // Insert a record into the buddies table
                $insert_buddy_sql = "INSERT INTO buddies (user1_id, user2_id, status) VALUES (:user1_id, :user2_id, :status)";
                $insert_buddy_stmt = $pdo->prepare($insert_buddy_sql);
                $insert_buddy_stmt->bindParam(':user1_id', $_SESSION['user_id']);
                $insert_buddy_stmt->bindParam(':user2_id', $requester_id);
                $insert_buddy_stmt->bindParam(':status', $status);
                $insert_buddy_stmt->execute();
            } else {
                throw new Exception("Cannot add yourself as a buddy.");
            }
        }

        // Redirect back to the page displaying match requests
        header("Location: ../../../../match-requests.php");
        exit;
    } else {
        // Handle invalid form submission
        // echo "<h2>Invalid form submission!</h2>";
        header("Location: ../../../../error.php");
    }
} catch (PDOException $e) {
    echo "<h3>Something went wrong while processing match request</h3> " . $e->getMessage();
} catch (Exception $e) {
    echo "<h3>Error:</h3> " . $e->getMessage();
}
