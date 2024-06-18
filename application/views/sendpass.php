<?php

$email = $_POST["email"];
// Load Composer's autoloader
require __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Generate a unique token for password reset
$token = bin2hex(random_bytes(32));
$token_hash = hash("sha256", $token);
$token_expiry = date("Y-m-d H:i:s", time() + 60 * 30);
// date('Y-m-d H:i:s', strtotime('+15 minutes'));
$host = "localhost";
$dbname = "wallmaster";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

// return $mysqli;

$sql = "UPDATE user
        SET reset_token = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);
// Ensure database connection is established
// Assuming you have a CodeIgniter model named User_model
// $this->load->model('User_model');

$this->db->where('email', $email);
$this->db->update('users', [
    'reset_token' => $token,
    'reset_token_expires_at' => $token_expiry
]);

$stmt->bind_param("sss", $token_hash, $token_expiry, $email);

$stmt->execute();
// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                    // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
    $mail->SMTPAuth   = true;           // Enable SMTP authentication
    $mail->Username   = 'rnexpro@gmail.com';  // SMTP username
    $mail->Password   = 'ggwn gjrb sawv odso';  // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;            // TCP port to connect to

    // Recipients
    $mail->setFrom('noreply@gmail.com');
    $mail->addAddress($email); // Add a recipient

    // Email content
    $reset_link = 'https://client.rnexpro.com/welcome/reset?email=' . urlencode($email) . '&token=' . $token;
    $mail->isHTML(true);                      // Set email format to HTML
    $mail->Subject = 'noreply';
    $mail->Body    = 'We received a request to reset your password for your account. <br><br>
    Please click <a href=" ' . $reset_link . ' ">HERE</a> to reset your password. <br><br>
    For security reasons, this link will expire in 24 hours. If you did not request a password reset, please ignore this email or contact our support team if you have any concerns. <br><br>
    Thank you for using Rnexpro. <br><br>
    Best regards, <br>
    The Rnexpro Team <br><br>
    Please do not reply to this email as it is not monitored.';

    // Send the email
    $mail->send();
    echo 'Message has been sent, Please check your inbox.';
} catch (Exception $e) {
    echo "Invalid Email. Mailer Error: {$mail->ErrorInfo}";
}
?>
