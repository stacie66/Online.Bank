<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
    <style>
        body {
            background-color: green;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <script>
        function updateInterest() {
            var amount = document.getElementById('amount').value;
            var interest = document.getElementById('interest');
            
            if (amount == 10000) {
                interest.value = 5;
            } else if (amount == 30000) {
                interest.value = 5;
            } else if (amount == 40000) {
                interest.value = 6;
            } else if (amount == 50000) {
                interest.value = 7;
            } else if (amount == 70000) {
                interest.value = 8;
            } else if (amount == 80000) {
                interest.value = 8;
            } else if (amount == 90000) {
                interest.value = 9;
            } else if (amount == 100000) {
                interest.value = 10;
            } else {
                interest.value = "";
            }
        }
    </script>
</head>
<body>

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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = htmlspecialchars($_POST['first_name']);
    $secondName = htmlspecialchars($_POST['second_name']);
    $age = htmlspecialchars($_POST['age']);
    $email = htmlspecialchars($_POST['email']);
    $idNumber = htmlspecialchars($_POST['id_number']);
    $phoneNumber = htmlspecialchars($_POST['phone_number']);
    $location = htmlspecialchars($_POST['location']);
    $amount = htmlspecialchars($_POST['amount']);
    $interest = htmlspecialchars($_POST['interest']);
    $loanPurpose = htmlspecialchars($_POST['loan_purpose']); // New field for loan purpose

    // Insert data into the database
    $sql = "INSERT INTO user_data (first_name, second_name, age, email, id_number, phone_number, location, amount, interest, loan_purpose)
            VALUES ('$firstName', '$secondName', '$age', '$email', '$idNumber', '$phoneNumber', '$location', '$amount', '$interest', '$loanPurpose')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();

    // Display the data in a table
    ?>

    <h2>Form Data</h2>
    <table border="1">
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
        </tr>
        <tr>
            <td><?php echo $firstName; ?></td>
            <td><?php echo $secondName; ?></td>
            <td><?php echo $age; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $idNumber; ?></td>
            <td><?php echo $phoneNumber; ?></td>
            <td><?php echo $location; ?></td>
            <td><?php echo $amount; ?></td>
            <td><?php echo $interest; ?></td>
            <td><?php echo $loanPurpose; ?></td>
        </tr>
    </table>

    <?php
} else {
    // Display the form
    ?>
    <center>
    <h2>Fill the Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="second_name">Second Name:</label>
        <input type="text" id="second_name" name="second_name" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="id_number">ID Number:</label>
        <input type="text" id="id_number" name="id_number" required><br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required><br><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required><br><br>

        <label for="amount">Amount:</label>
        <select id="amount" name="amount" required onchange="updateInterest()">
            <option value="">Select Amount</option>
            <option value="10000">10,000</option>
            <option value="30000">30,000</option>
            <option value="40000">40,000</option>
            <option value="50000">50,000</option>
            <option value="70000">70,000</option>
            <option value="80000">80,000</option>
            <option value="90000">90,000</option>
            <option value="100000">100,000</option>
        </select><br><br>

        <label for="interest">Interest Charged (%):</label>
        <input type="number" step="0.01" id="interest" name="interest" readonly><br><br>

        <label>Loan Purpose:</label><br>
        <input type="radio" id="purpose_business" name="loan_purpose" value="Business Launching" required>
        <label for="purpose_business">Business Launching</label><br>
        
        <input type="radio" id="purpose_home_improvement" name="loan_purpose" value="Home Improvement" required>
        <label for="purpose_home_improvement">Home Improvement</label><br>
        
        <input type="radio" id="purpose_education" name="loan_purpose" value="Education" required>
        <label for="purpose_education">Education</label><br>
        
        <input type="radio" id="purpose_house_buying" name="loan_purpose" value="House Buying" required>
        <label for="purpose_house_buying">House Buying</label><br>
        
        <input type="radio" id="purpose_investment" name="loan_purpose" value="Investment" required>
        <label for="purpose_investment">Investment</label><br>
        
        <input type="radio" id="purpose_other" name="loan_purpose" value="Other" required>
        <label for="purpose_other">Other</label><br><br>

        <input type="submit" value="Submit">
    </form>
    </center>
    <?php
}
?>

</body>
</html>
