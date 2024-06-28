<?php
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['username'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

// Database connection (update credentials as needed)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cop";

// Create connection
$conn = new mysqli('localhost', 'root', '', 'cop');
// Check connection
if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

// Fetch email based on session user ID
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT email FROM users WHERE username = ?");
if (!$stmt) {
    echo json_encode(['error' => 'Prepare statement failed: ' . $conn->error]);
    exit();
}
$stmt->bind_param("s", $username);
if (!$stmt->execute()) {
    echo json_encode(['error' => 'Execute statement failed: ' . $stmt->error]);
    exit();
}
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();
$conn->close();

if ($email) {
    echo json_encode(['email' => $email]);
} else {
    echo json_encode(['error' => 'Email not found for user ID: ' . $username]);
}
?>
