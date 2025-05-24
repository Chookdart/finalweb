<?php
session_start();
require_once('test_database.php');



if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['action']) && $_POST['action'] == 'register'){

    $username = $_POST['reg-name'];
    $email = $_POST['reg-email'];
    $password = password_hash($_POST['reg-pass'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if($stmt->execute()){
        echo "Registered Successfully!";
    }else{
        echo "There were errors while registering the data.";
    }
    $stmt->close();

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'login') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Prepare statement to get user by email
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Assuming your passwords are hashed, verify password
        if (password_verify($password, $row['password'])) {
            // Password correct, set session user_id
            $_SESSION['user_id'] = $row['id'];
            echo "Login Successful!";
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
$conn->close();
    $stmt->close();
}
}
?>