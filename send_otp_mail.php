<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

// Set your variables
function sendOtpToEmail($userEmail, $otp) {
    $mail = new PHPMailer(true);

try {
    // SMTP server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'lwisdompunzalan@gmail.com'; // Your Gmail address
    $mail->Password   = 'wiax vpts yzde dqoc';    // Your App password (not Gmail password)
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Sender and recipient
     $mail->setFrom('lwisdompunzalan@gmail.com', 'Mail');
     $mail->addAddress($userEmail);

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Your OTP Code';
    $mail->Body    = "<h2>OTP Code</h2><p>Your code is <strong>$otp</strong></p>";

    // Send email
    $mail->send();
    echo 'OTP has been sent to your email.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
