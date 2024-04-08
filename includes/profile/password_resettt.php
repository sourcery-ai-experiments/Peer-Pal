<?php 

include "../utils/start_session.php";
include "../utils/databaseConfig.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

function send_password_reset($get_name, $get_email, $token, $app_domain) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
        $mail->isSMTP();                        // Send using SMTP
        $mail->Host       = 'smtp.example.com'; // Set the SMTP server to send through
        $mail->SMTPAuth   = true;               // Enable SMTP authentication
        $mail->Username   = 'user@example.com'; // SMTP username
        $mail->Password   = 'secret';           // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption
        $mail->Port       = 465;                // TCP port to connect to

        //Recipients
        $mail->setFrom('from@example.com', $get_name);
        $mail->addAddress($get_email);         // Add a recipient

        //Content
        $mail->isHTML(true); 
        $mail->Subject = 'Password Reset';
        $mail->Body    = 'You are receiving this email because we received a password reset request for your account. <a href="' . $app_domain . '/password-reset.php?token=' . $token . '&email=' . $get_email . '">Reset Password</a>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['password_reset'])) {
    $email = $_POST['email'];

    // Create Token
    $token = md5(random_bytes(32)); // Generate a more secure token

    // Check if email sent exists in the database
    $sql_email_exists = $pdo->prepare("SELECT username, email FROM users WHERE email = ? LIMIT 1");
    $sql_email_exists->execute([$email]);
    $row = $sql_email_exists->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $get_name = $row["username"];
        $get_email = $row["email"];

        // Update token in the database
        $updateToken = $pdo->prepare("UPDATE users SET verify_token = ? WHERE email = ?");
        if ($updateToken->execute([$token, $get_email])) {
            // Send password reset email
            $app_domain = $_ENV['APP_DOMAIN'];
            send_password_reset($get_name, $get_email, $token, $app_domain);
            $_SESSION['status'] = "We emailed you a password reset link";
            header("Location: " . $_SERVER['HTTP_REFERER'] . "?success=1");
            exit();
        } else {
            $_SESSION['status'] = "Something went wrong";
            header("Location: " . $_SERVER['HTTP_REFERER'] . "?error=1");
            exit();
        }
    } else {
        $_SESSION['status'] = "No Email Found";
        header("Location: " . $_SERVER['HTTP_REFERER'] . "?error=1");
        exit();
    }
}
?>
