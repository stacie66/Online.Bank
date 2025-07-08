<?php
session_start();
include('conf/config.php');

// Register new account
if (isset($_POST['create_account'])) {
    $name = $_POST['name'];
    $national_id = $_POST['national_id'];
    $client_number = $_POST['client_number'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = sha1(md5($_POST['password']));
    $address  = $_POST['address'];

    // Insert captured information to a database table
    $query = "INSERT INTO iB_clients (name, national_id, client_number, phone, email, password, address) VALUES (?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    // Bind parameters
    $rc = $stmt->bind_param('sssssss', $name, $national_id, $client_number, $phone, $email, $password, $address);
    $stmt->execute();

    // Declare a variable which will be passed to alert function
    if ($stmt) {
        $success = "Account Created";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}

/* Persist System Settings On Brand */
$ret = "SELECT * FROM `iB_SystemSettings` ";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();
while ($auth = $res->fetch_object()) {
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php include("dist/_partials/head.php"); ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <p><?php echo $auth->sys_name; ?> - Sign Up</p>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign Up To Use Our IBanking System</p>

                <form method="post" id="signupForm">
                    <div class="input-group mb-3">
                        <input type="text" name="name" required class="form-control" placeholder="Client Full Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" required name="national_id" class="form-control" placeholder="National ID Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-tag"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3" style="display:none">
                        <?php
                        $length = 4;
                        $_Number =  substr(str_shuffle('0123456789'), 1, $length); ?>
                        <input type="text" name="client_number" value="iBank-CLIENT-<?php echo $_Number; ?>" class="form-control" placeholder="Client Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="phone" required class="form-control" placeholder="Client Phone Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="address" required class="form-control" placeholder="Client Address">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map-marker"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" required class="form-control" placeholder="Client Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" required class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4">
                            <button type="submit" name="create_account" class="btn btn-success btn-block">Sign Up</button>
                        </div>
                    </div>
                </form>

                <p class="mb-0">
                    <a href="pages_client_index.php" class="text-center">Login</a>
                </p>

            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <script>
        // Add form validation
        document.getElementById('signupForm').addEventListener('submit', function(event) {
            // Get form field values
            var name = document.getElementsByName('name')[0].value;
            var national_id = document.getElementsByName('national_id')[0].value;
            var phone = document.getElementsByName('phone')[0].value;
            var password = document.getElementById('password').value;

            // Regex patterns for validation
            var namePattern = /^[A-Za-z\s]+$/; // Full name only letters
            var idPattern = /^\d+$/; // National ID only digits
            var phonePattern = /^\d{10,}$/; // Phone number at least 10 digits
            var passwordPattern = /^.{6,}$/; // Password at least 6 characters

            // Validate Full Name (letters only)
            if (!namePattern.test(name)) {
                alert('Client Full Name must contain only letters.');
                event.preventDefault(); // Prevent form submission if validation fails
                return;
            }

            // Validate National ID (digits only)
            if (!idPattern.test(national_id)) {
                alert('National ID must be a number.');
                event.preventDefault(); // Prevent form submission if validation fails
                return;
            }

            // Validate Phone Number (at least 10 digits, digits only)
            if (!phonePattern.test(phone)) {
                alert('Phone Number must contain at least 10 digits.');
                event.preventDefault(); // Prevent form submission if validation fails
                return;
            }

            // Validate Password (minimum 6 characters)
            if (!passwordPattern.test(password)) {
                alert('Password must be at least 6 characters long.');
                event.preventDefault(); // Prevent form submission if validation fails
                return;
            }
        });
    </script>

</body>
</html>
<?php
}
?>
