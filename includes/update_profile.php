<?php 

// Check if a session is not already active
include("./utils/start_session.php");


// Check if the user is logged in

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
  try {
    // GET form data
    include("./dbh.inc.php");
    include("./actions/auth_check.php");
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $nationality = $_POST["nationality"];
    $gender = $_POST["gender"];
    $faculty = $_POST["faculty"];
    $study_mode = $_POST["study_mode"];
    $photo = $_POST["photo"];
    $program_type = $_POST["program_type"];
    $about_me = $_POST["about_me"];
    $student_type = $_POST["student_type"];

    // Check if "user" session variable is set
    if (!isset($_SESSION['user_id'])) {
        throw new Exception("User session not set.");
    }

    // Write the SQL Script to update to database

    $sql = "UPDATE users SET first_name = ?, last_name = ?, date_of_birth = ?, nationality = ?, gender = ?, faculty = ?, study_mode = ?, photo = ?, program_type = ?, about_me = ?, student_type = ? WHERE id = ?";

    $result = $pdo->prepare($sql);
    $result->execute([$first_name, $last_name, $date_of_birth, $nationality, $gender, $faculty, $study_mode, $photo, $program_type, $about_me, $student_type, $_SESSION['user_id']]);

    header("Location: ../profile.php");
    exit; // Ensure no further code execution after redirection
  } catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
  }
}
?>
