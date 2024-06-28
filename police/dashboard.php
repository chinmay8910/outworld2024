
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(21, 0, 107);
            margin: 0;
            padding: 0;
        }
        h2 {
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        form {
            border-radius: 5px;
            margin: 20px auto;
            text-align: center;
            padding: 20px;
            width: 80%;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-color: rgb(21, 0, 107);
        }
        form label {
            color: black;
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], select {
            padding: 6px;
            font-size: 14px;
            border: 1px solid rgb(21, 0, 107);
            border-radius: 4px;
            width: calc(50% - 20px);
            margin-bottom: 10px;
        }

        input[type="date"], select {
            padding: 6px;
            font-size: 14px;
            border: 1px solid rgb(21, 0, 107);
            border-radius: 4px;
            width: calc(50% - 20px);
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 16px;
            font-size: 14px;
            background-color: rgb(21, 0, 107);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #153889;
            
        }
        .role-filters {
            border-radius: 5px;
            margin: 20px auto;
            text-align: center;
            padding: 20px;
            width: 90%;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .role-filters a {
            padding: 10px 16px;
            font-size: 14px;
            background-color: rgb(21, 0, 107);
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            margin: 0 5px;
            display: inline-block;
            cursor: pointer;
        }
        .role-filters a:hover {
            background-color: #153889;
        }
        header {
            background-color: #fff;
            width: 100%;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }
        header img {
            height: 100px;
            width: auto;
        }
        header .nav-buttons {
            display: flex;
            gap: 10px;
        }
        header .nav-buttons a,
        header .logout-button {
            background-color: rgb(21, 0, 107);
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 15px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }
        header .nav-buttons a:hover,
        header .logout-button:hover {
            background-color: #153889;
        }
        header h2{
            color: rgb(21, 0, 107);
            margin-left: 150px;
        }
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: center;
            }
            header .nav-buttons {
                flex-direction: column;
                align-items: center;
            }
            form, .role-filters {
                width: 95%;
            }
            table {
                width: 95%;
            }
            input[type="text"], select, input[type="submit"] {
                width: 100%;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <img name="logo" type="logo" id="logo" src="logo.jpg">
        <h2>Outward Register</h2>
        <div class="nav-buttons">
            <a href="dashboard.php">Dashboard</a>
            <a href="register.html">Register</a>
            <button class="logout-button" onclick="location.href='login.html'">Logout</button>
        </div>
    </header>
    <div class="container">
        <form action="dashboard.php" method="GET">

            <label for="Contact_No">Contact Number:</label>
            <input type="text" id="Contact_No" name="Contact_No" placeholder="Enter contact number...">
            <label for="OutwardBook">Outward Book:</label>
            <select id="OutwardBook" name="OutwardBook">
                <option value="">All</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
            <label for="Reference_No">Reference Number:</label>
            <input type="text" id="Reference_No" name="Reference_No" placeholder="Enter reference number...">
            
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date">
       
             <label for="end_date">End Date:</label>
             <input type="date" id="end_date" name="end_date">

            <br>
             <input type="submit" value="Filter">
        <div class="role-filters">
            <a href="dashboard.php?Role=Assistant Police Inspector">Assistant Police Inspector</a>
            <a href="dashboard.php?Role=Police Inspector">Police Inspector</a>
            <a href="dashboard.php?Role=Police Sub-Inspector">Police Sub-Inspector</a>
        </div>
      
    
        <table>
            <thead>
                <tr>
                    <th>Serial no</th>
                    <th> 
                        <a href="dashboard.php?sort_column=Reference_No&sort=asc">Date ▲</a><br>
                        <a href="dashboard.php?sort_column=Reference_No&sort=desc">Date ▼</a>
                    </th>
                    <th>Police Station</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Sent_to</th>
                    <th>
                        <a href="dashboard.php?sort_column=Reference_No&sort=asc">Reference-No ▲</a><br>
                        <a href="dashboard.php?sort_column=Reference_No&sort=desc">Reference-No ▼</a>
                    </th>
                    <th>OutwardBook</th>
                    <th>Subject</th>
                    <th>Shera</th>
                    <th>Outward No.</th>
                </tr>
            </thead>
            <tbody>
            
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

// Sorting variables
$sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
$sort_column = isset($_GET['sort_column']) ? $_GET['sort_column'] : 'Date';

// Initialize the SQL query
$sql = "SELECT Serial_no, Date, Police_Station, Name, Contact_No, Sent_to, Reference_No, OutwardBook, Subject, role_name FROM cases WHERE 1=1";

// Function to add filters to the SQL query
function addFilter($field, $value) {
    global $sql, $conn;
    if (!empty($value)) {
        $filtered_value = mysqli_real_escape_string($conn, $value);
        $sql .= " AND $field LIKE '%$filtered_value%'";
    }
}

// Adding filters based on user input
addFilter('OutwardBook', isset($_GET['OutwardBook']) ? $_GET['OutwardBook'] : '');
addFilter('Contact_No', isset($_GET['Contact_No']) ? $_GET['Contact_No'] : '');
addFilter('role_name', isset($_GET['Role']) ? $_GET['Role'] : '');
addFilter('Reference_No', isset($_GET['Reference_No']) ? $_GET['Reference_No'] : '');

// Date range filter
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : "";
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : "";
if (!empty($start_date) && !empty($end_date)) {
    $start_date_formatted = date('Y-m-d', strtotime($start_date));
    $end_date_formatted = date('Y-m-d', strtotime($end_date));
    $sql .= " AND Date BETWEEN '$start_date_formatted' AND '$end_date_formatted'";
}

// Adding sorting
$sql .= " ORDER BY $sort_column $sort_order";

// Executing SQL query
$result = $conn->query($sql);

// Checking if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $formatted_string = $row["Serial_no"] . "/" . $row["role_name"] . "/" . $row["Reference_No"] . "/" . $row["Name"] . "/" . $row["Police_Station"] . "/" . date('Y', strtotime($row["Date"])) . "       /      " .  $row["Date"];

        echo "<tr>";
        echo "<td>" . $row["Serial_no"] . "</td>";
        echo "<td>" . (new DateTime($row["Date"]))->format('d/m/Y') . "</td>"; // Format date here
        echo "<td>" . $row["Police_Station"] . "</td>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Contact_No"] . "</td>";
        echo "<td>" . $row["Sent_to"] . "</td>";
        echo "<td>" . $row["Reference_No"] . "</td>";
        echo "<td>" . $row["OutwardBook"] . "</td>";
        echo "<td>" . $row["Subject"] . "</td>";
        echo "<td>" . $row["role_name"] . "</td>";
        echo "<td>" . $formatted_string . "</td>";  // Output the formatted string here
        echo "</tr>";
    }
} else {
    // No results found
    echo "<tr><td colspan='11'>No Data found</td></tr>";
}

// Closing connection
$conn->close();
?>



                    </tbody>
                </table>
                </div>
                </form>
                </body>
                </html>