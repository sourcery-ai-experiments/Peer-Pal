<?php 

try {

  // SQL to fetch users
  $fetch_all_users_sql = "SELECT * FROM users";
  $fetch_all_users_stmt = $pdo->prepare($fetch_all_users_sql);
  $fetch_all_users_stmt->execute();
  $users = $fetch_all_users_stmt->fetchAll(PDO::FETCH_ASSOC);

  // SQL to fetch Buddies
  $fetch_all_buddies_sql = "SELECT b.*, u1.username as user1_username, u2.username as user2_username
                            FROM buddies b
                            JOIN users u1 ON b.user1_id = u1.id
                            JOIN users u2 ON b.user2_id = u2.id";
  $fetch_all_buddies_stmt = $pdo->prepare($fetch_all_buddies_sql);
  $fetch_all_buddies_stmt->execute();
  $buddies = $fetch_all_buddies_stmt->fetchAll(PDO::FETCH_ASSOC);

  // Display a list of users

  if (!empty($users)) {
    echo "<div class='container'>";
    echo "<div class='row'>";
    
    // Users Section
    echo "<div class='col-md-6'>";
    echo "<div class='card'>";
    echo "<div class='card-header'><h2 class='text-center'>Users</h2></div>";
    echo "<div class='card-body'>";
    echo "<ul class='list-group'>";
    foreach($users as $user) {
      echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
      echo "<a href='user_details.php?username={$user['username']}'>{$user['username']}</a>";
      echo "<form action='../includes/admin/delete_user.php' method='post'>";
      echo "<input type='hidden' name='user_id' value='{$user['id']}'>";
      echo "<button type='submit' class='btn btn-primary' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</button>";
      echo "</form>";
      echo "</li>";
    }
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    
    // Matches Section
    echo "<div class='col-md-6'>";
    echo "<div class='card'>";
    echo "<div class='card-header'><h2 class='text-center'>Matches</h2></div>";
    echo "<div class='card-body'>";
    echo "<ul class='list-group'>";
    foreach($buddies as $buddy) {
      echo "<li class='list-group-item text-center'>";
      echo "<p>{$buddy['user1_username']} - {$buddy['user2_username']}</p>";
      echo "<form action='../includes/admin/delete_match.php' method='post'>";
      echo "<input type='hidden' name='buddy_id' value='{$buddy['id']}'>";
      echo "<button type='submit' class='btn btn-primary' onclick='return confirm(\"Are you sure you want to delete this match?\");'>Delete Match</button>";
      echo "</form>";
      echo "</li>";
    }
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo "</div>"; 
    echo "</div>"; 
  }

} catch (PDOException $e) {
  echo "<h3>Error: </h3>" . $e->getMessage();
}
?>
