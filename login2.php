<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM entry_details WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User authenticated successfully
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];

    // Display success alert
    echo '<script>alert("Successfully logged in!");';
    echo 'window.location.href = "profile2.php";</script>';
    exit(); 
    
    
} else {
    echo '<script>alert("Invalid username or password");';
    echo 'window.location.href = "login.html";</script>';
    exit(); 
}

$conn->close();
?>
