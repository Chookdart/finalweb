<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    die("User session not found.");
}

$user_id = $_SESSION['user_id'];
$conn = new mysqli("localhost", "root", "", "wisdomDB");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$city = $_POST['city'];
$country = $_POST['country'];
$activities = isset($_POST['activity']) ? implode(", ", $_POST['activity']) : "";
$info = isset($_POST['info']) ? implode(", ", $_POST['info']) : "";

// ✅ Now including user_id in the insert
$sql = "INSERT INTO trips (user_id, city, country, activities, info) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issss", $user_id, $city, $country, $activities, $info);

if ($stmt->execute()) {
    echo "Trip preferences saved successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
