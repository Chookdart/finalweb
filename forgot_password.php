<?php
session_start();

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$conn = new mysqli("localhost", "root", "", "wisdomDB");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    $otp = rand(100000, 999999);
    $expiry = date("Y-m-d H:i:s", strtotime("+10 minutes"));

    $stmt = $conn->prepare("UPDATE users SET otp_code = ?, otp_expiration = ? WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("sss", $otp, $expiry, $email);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
         $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'lwisdompunzalan@gmail.com';      // Replace
            $mail->Password   = 'wiax vpts yzde dqoc';          // Replace with app password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('lwisdompunzalan@gmail.com', 'Wisdom');
            $mail->addAddress($email);
            $mail->Subject = 'Your Password Reset OTP Code';
            $mail->Body    = "Your OTP code is: $otp \nThis code is valid for 10 minutes.";

            $mail->send();
            header("Location: reset_password.php?email=" . urlencode($email));
            exit;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No user found with that email.";
    }

    $stmt->close();
}
$conn->close();
?>



<form action="forgot_password.php" method="POST">
  <input type="email" name="email" placeholder="Enter your email" required>
  <a href="reset_password.php"><button type="submit" name="send_otp">Send OTP</button></a>
</form>
