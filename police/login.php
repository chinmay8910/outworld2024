<?php
session_start();
$servername = "localhost";
$username = "root";  // change this if necessary
$password = "";  // change this if necessary
$dbname = "users";

// Create connection
$conn = new mysqli('localhost', 'root', '', 'cop');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT user_id, password_hash FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $password_hash);
    $stmt->fetch();

    if ($user_id && hash('sha256', $password) === $password_hash) {
        // Password is correct
        $_SESSION['user_id'] = $user_id;
        header("Location: dashboard.php");
    } else {
        // Invalid credentials
        echo "Invalid username or password";
    }

    $stmt->close();
}

$conn->close();
?>
