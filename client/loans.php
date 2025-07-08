<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
</head>
<body>

<?php
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
        </tr>
    </table>

    <?php
} else {
    // Display the form
    ?>

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
        <input type="number" id="amount" name="amount" required><br><br>

        <label for="interest">Interest Charged:</label>
        <input type="number" step="0.01" id="interest" name="interest" required><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
}
?>

</body>
</html>
