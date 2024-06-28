<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";  // change this if necessary
$password = "";  // change this if necessary
$dbname = "cop";  // default database for connection

// Create connection
$conn = new mysqli('localhost', 'root', '', 'cop');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the reference number from the POST request
$data = json_decode(file_get_contents('php://input'), true);
$Reference_No = $data['Reference_No'];

// Prepare and bind
$stmt = $conn->prepare("SELECT Police_Station, Contact_No, Name, role_name, OutwardBook FROM cases WHERE Reference_No = ?");
$stmt->bind_param("s", $Reference_No);
$stmt->execute();
$stmt->bind_result($Police_Station, $Contact_No, $Name, $role_name, $OutwardBook);

// Fetch the result
if ($stmt->fetch()) {
    echo json_encode([
        'Police_Station' => $Police_Station,
        'Name' => $Name,
        'Contact_No' => $Contact_No,
        'role_name' => $role_name,
        'OutwardBook' => $OutwardBook,

    ]);
} else {
    echo json_encode(['error' => 'Reference number not found']);
}

$stmt->close();
$conn->close();
?>
