<!DOCTYPE html>
<html>
<head>
    <title>Form Data Display</title>
    <style>
        body {
            background-color: green;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .print-button {
            display: block;
            width: 100px;
            padding: 10px;
            margin: 20px auto;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }
    </style>
    <script>
        function printData() {
            var printButton = document.getElementById('printButton');
            printButton.style.display = 'none'; // Hide the print button before printing
            window.print(); // Open the print dialog
            printButton.style.display = 'block'; // Show the print button after printing
        }
    </script>
</head>
<body>

<div class="container">

<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$dbname = "internetbanking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and display the data from the database
$result = $conn->query("SELECT * FROM user_data");

if ($result->num_rows > 0) {
    echo "<h2>Stored Form Data</h2>";
    echo "<table>
            <tr>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>ID Number</th>
                <th>Phone Number</th>
                <th>Location</th>
                <th>Amount</th>
                <th>Interest Charged</th>
                <th>Loan Purpose</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['first_name']}</td>
                <td>{$row['second_name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['email']}</td>
                <td>{$row['id_number']}</td>
                <td>{$row['phone_number']}</td>
                <td>{$row['location']}</td>
                <td>{$row['amount']}</td>
                <td>{$row['interest']}</td>
                <td>{$row['loan_purpose']}</td>
              </tr>";
    }
    echo "</table>";

    // Print button
    echo '<button id="printButton" class="print-button" onclick="printData()">Print</button>';
} else {
    echo "No data found.";
}

// Close the connection
$conn->close();
?>

</div>

</body>
</html>
