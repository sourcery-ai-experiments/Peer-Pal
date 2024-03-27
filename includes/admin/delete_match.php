<?php
// Include the database connection
include "../utils/databaseConfig.php";

// Verify that buddy_id is set 
if (isset($_POST['buddy_id']) && !empty($_POST['buddy_id'])) {
    $buddy_id = $_POST['buddy_id'];

    try {
        $delete_match_script = "DELETE FROM buddies WHERE id = ?";
        $delete_match_stmt = $pdo->prepare($delete_match_script);
        $delete_match_stmt->execute([$buddy_id]);

        // Redirect back to the dashboard after successful deletion
        header("Location: ../../../../dashboard.php");
        exit();
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
    }
} else {
    // Redirect to the dashboard if buddy_id is not provided or empty
    header("Location: ../../../../dashboard.php");
    exit();
}
?>
