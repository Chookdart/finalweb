<?php
session_start();
require 'test_database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $otp = $_POST['otp'];
    $email = $_SESSION['reset_email'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND otp_code = ? AND otp_expiration >= NOW()");
    $stmt->bind_param("ss", $email, $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->fetch_assoc()) {
        // OTP is valid
        $_SESSION['otp_verified'] = true;
        header("Location: reset_password.php");
        exit();
    } else {
        echo "Invalid or expired OTP.";
    }
}
?>

<form method="POST">
    <input type="text" name="otp" required placeholder="Enter OTP">
    <button type="submit">Verify OTP</button>
</form>
