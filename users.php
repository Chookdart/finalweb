<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please log in.");
}

$userId = $_SESSION['user_id'] ?? 0;


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = new mysqli("localhost", "root", "", "wisdomDB");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user ID from query string (e.g., users.php?id=1)
$userId = intval($_GET['id'] ?? 0);
echo "User ID received: $userId<br>";


// Get user info
$userStmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
$userStmt->bind_param("i", $userId);
$userStmt->execute();
$userResult = $userStmt->get_result();

if ($userResult->num_rows == 0) {
    echo "<h2>User not found for ID: $userId</h2>";
    exit;
}

$user = $userResult->fetch_assoc();

// Get user trips
$tripStmt = $conn->prepare("SELECT country, city, activities, info FROM trips WHERE user_id = ?");
$tripStmt->bind_param("i", $userId);
$tripStmt->execute();
$tripResult = $tripStmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        h2 { margin-top: 30px; }
        .trip { margin-bottom: 15px; padding: 10px; background: #f4f4f4; border-left: 4px solid #333; }
    </style>
</head>
<body>

<h1><?= htmlspecialchars($user['username']) ?>'s Profile</h1>
<p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>

<h2>Travel Logs</h2>

<?php if ($tripResult->num_rows > 0): ?>
    <?php while ($trip = $tripResult->fetch_assoc()): ?>
        <div class="trip">
            <strong>Country:</strong> <?= htmlspecialchars($trip['country']) ?><br>
            <strong>City:</strong> <?= nl2br(htmlspecialchars($trip['city'])) ?>
            <strong>Activities:</strong> <?= htmlspecialchars($trip['activities']) ?><br>
            <strong>Info:</strong> <?= nl2br(htmlspecialchars($trip['info'])) ?>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>No travel logs found.</p>
<?php endif; ?>

<?php
$userStmt->close();
$tripStmt->close();
$conn->close();
?>

</body>
</html>
