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
        echo "<main class='match-request-main'>";
        echo "<div class='match-request-content'>";
        echo "<h2>Match Requests</h2>";
        foreach ($match_requests as $request) {
            // print_r($request);
            echo "<li>";
            echo "Username: {$request['username']} | Email: {$request['email']} ";
            // Option to accept or reject the match request (via form submission)
            echo "<form action='../includes/profile/process_match_request.php' method='post'>";
            echo "<input type='hidden' name='request_id' value='{$request['id']}' />";
            echo "<input type='hidden' name='requester_id' value='{$request['requester_id']}' />";
            echo "<input type='hidden' name='requested_id' value='{$request['requested_id']}' />";
            echo "<input type='submit' name='accept' value='Accept' />";
            echo "<input type='submit' name='reject' value='Reject' />";
            echo "</form>";
            echo "</li>";
        }
        echo "</div>";
        echo "</main>";
    } else {
        echo "<main class='match-request-none'>";
        echo "<div class='match-request-content'>";
        echo "<h2 class='error-text'>No pending match requests.</h2>";
        echo "</div>";
        echo "</main>";
    }
} catch (PDOException $e) {
    echo "<h3>Something went wrong while fetching match requests</h3> " . $e->getMessage();
}
