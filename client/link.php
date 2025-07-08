<?php
session_start();

// Simulate login mechanism
// To log in, visit this page with `?login=true` in the URL
if (isset($_GET['login']) && $_GET['login'] === 'true') {
    $_SESSION['loggedin'] = true;
    echo "<script>alert('You are now logged in!');</script>";
}

// To log out, visit this page with `?logout=true` in the URL
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    $_SESSION['loggedin'] = false;
    echo "<script>alert('You are now logged out!');</script>";
}

// Check login status
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;

// Array of YouTube Videoes links and corresponding image thumbnails
$concerts = [
    ["link" => "https://www.youtube.com/watch?v=1G4isv_Fylg", "image" => "https://img.youtube.com/vi/1G4isv_Fylg/0.jpg"],
    ["link" => "https://www.youtube.com/watch?v=dQw4w9WgXcQ", "image" => "https://img.youtube.com/vi/dQw4w9WgXcQ/0.jpg"],
    ["link" => "https://www.youtube.com/watch?v=ktvTqknDobU", "image" => "https://img.youtube.com/vi/ktvTqknDobU/0.jpg"],
    ["link" => "https://www.youtube.com/watch?v=3JZ_D3ELwOQ", "image" => "https://img.youtube.com/vi/3JZ_D3ELwOQ/0.jpg"],
    ["link" => "https://www.youtube.com/watch?v=L_jWHffIx5E", "image" => "https://img.youtube.com/vi/L_jWHffIx5E/0.jpg"],
    ["link" => "https://www.youtube.com/watch?v=eVTXPUF4Oz4", "image" => "https://img.youtube.com/vi/eVTXPUF4Oz4/0.jpg"],
    ["link" => "https://www.youtube.com/watch?v=Zi_XLOBDo_Y", "image" => "https://img.youtube.com/vi/Zi_XLOBDo_Y/0.jpg"],
    ["link" => "https://www.youtube.com/watch?v=2Vv-BfVoq4g", "image" => "https://img.youtube.com/vi/2Vv-BfVoq4g/0.jpg"],
    ["link" => "https://www.youtube.com/watch?v=kJQP7kiw5Fk", "image" => "https://img.youtube.com/vi/kJQP7kiw5Fk/0.jpg"],
    ["link" => "https://www.youtube.com/watch?v=CevxZvSJLk8", "image" => "https://img.youtube.com/vi/CevxZvSJLk8/0.jpg"],
    ["link" => "https://www.youtube.com/watch?v=RgKAFK5djSk", "image" => "https://img.youtube.com/vi/RgKAFK5djSk/0.jpg"],
    ["link" => "https://www.youtube.com/watch?v=hT_nvWreIhg", "image" => "https://img.youtube.com/vi/hT_nvWreIhg/0.jpg"]
];

// Shuffle and pick 10 random Videos
shuffle($concerts);
$randomConcerts = array_slice($concerts, 0, 10);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Videos Links with Images</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        img {
            width: 120px;
            height: auto;
            border-radius: 5px;
        }
    </style>
    <script>
        function checkLogin(event) {
            const isLoggedIn = <?php echo json_encode($isLoggedIn); ?>;
            if (!isLoggedIn) {
                event.preventDefault();
                alert('You must log in to view this link.');
            }
        }
    </script>
</head>
<body>
    <h2 style="text-align: center;">Random YouTube Videos Links</h2>
    <div style="text-align: center; margin-bottom: 20px;">
        <?php if ($isLoggedIn): ?>
            <p>Welcome! You are logged in.</p>
            <a href="?logout=true" style="color: red;">Log Out</a>
        <?php else: ?>
            <p>You are not logged in.</p>
            <a href="?login=true" style="color: green;">Log In</a>
        <?php endif; ?>
    </div>
    <table>
        <tr>
            <th>#</th>
            <th>Thumbnail</th>
            <th>Video Link</th>
        </tr>
        <?php foreach ($randomConcerts as $index => $concert): ?>
        <tr>
            <td><?php echo $index + 1; ?></td>
            <td><img src="<?php echo $concert['image']; ?>" alt="Concert Thumbnail"></td>
            <td>
                <a href="<?php echo $concert['link']; ?>" target="_blank" onclick="checkLogin(event)">
                    Watch Video <?php echo $index + 1; ?>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
