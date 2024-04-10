<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to bottom, lightgrey, lightyellow);
        }
    </style>
</head>
<body>

<?php
// Include database connection and start session
include("./includes/utils/databaseConfig.php");
// include("./utils/start_session.php");

try {
    // Fetch match requests for the current user
    $fetch_requests_sql = "SELECT match_requests.id, match_requests.requested_id, match_requests.requester_id, users.username, users.email FROM match_requests JOIN users ON match_requests.requester_id = users.id WHERE match_requests.requested_id = :current_user_id AND match_requests.status = 'pending'";
    $fetch_requests_stmt = $pdo->prepare($fetch_requests_sql);
    $fetch_requests_stmt->bindParam(':current_user_id', $_SESSION['user_id']);
    $fetch_requests_stmt->execute();
    $match_requests = $fetch_requests_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display match requests to the current user
    if (!empty($match_requests)) {
        echo "<main class='container'>";
        echo "<div class='row justify-content-center mt-5'>";
        echo "<div class='col-md-6'>";
        echo "<h1 class='text-center'>Match Requests</h1>";
        echo "<ul class='list-group'>";
        foreach ($match_requests as $request) {
            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
            echo "<div>";
            echo "Username: <strong>{$request['username']}</strong><br>Email: <strong>{$request['email']}</strong>";
            echo "</div>";
            echo "<form action='../includes/profile/process_match_request.php' method='post' class='d-flex'>";
            echo "<input type='hidden' name='request_id' value='{$request['id']}' />";
            echo "<input type='hidden' name='requester_id' value='{$request['requester_id']}' />";
            echo "<input type='hidden' name='requested_id' value='{$request['requested_id']}' />";
            echo "<button type='submit' name='accept' class='btn btn-primary btn-lg me-2'>Accept</button>";
            echo "<button type='submit' name='reject' class='btn btn-danger btn-lg'>Reject</button>";
            echo "</form>";
            echo "</li>";
        }
        echo "</ul>";
        echo "</div>";
        echo "</div>";
        echo "</main>";
    } else {
        echo "<main class='container'>";
        echo "<div class='row justify-content-center mt-5'>";
        echo "<div class='col-md-6'>";
        echo "<h2 class='text-center text-muted'>No pending match requests.</h2>";
        echo "</div>";
        echo "</div>";
        echo "</main>";
    }
} catch (PDOException $e) {
    echo "<h3>Something went wrong while fetching match requests</h3> " . $e->getMessage();
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
