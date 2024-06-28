<?php
session_start();

// Assume OTP is stored in session for simplicity
$valid_otp = $_SESSION['otp']; // In a real application, OTP should be stored securely

// Get the posted OTP
$data = json_decode(file_get_contents('php://input'), true);
$entered_otp = $data['otp'];

if ($entered_otp == $valid_otp) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
