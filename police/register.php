<?php
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $Police_Station = $_POST['Police_Station'];
    $Name = $_POST['Name'];
    $contact_no = $_POST['Contact_No'];
    $Sent_to = $_POST['Sent_to'];
    $Reference_No = $_POST['Reference_No'];
    $Subject = $_POST['Subject'];
    $role_name = $_POST['role_name'];
    $outward_book = $_POST['OutwardBook'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO cases (Date, Police_Station, Name, Contact_No, Sent_to, Reference_No, Subject, role_name, OutwardBook) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error in preparing statement: " . $conn->error);
    }
    
    $stmt->bind_param("sssisssss", $date, $Police_Station, $Name, $contact_no, $Sent_to, $Reference_No, $Subject, $role_name, $outward_book);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: dashboard.php?message=success");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>
