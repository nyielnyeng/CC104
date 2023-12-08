<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];
$password = $_SESSION['password'];


$sql_user = "SELECT * FROM entry_details WHERE username='$username' AND password='$password'";
$result_user = $conn->query($sql_user);

if ($result_user->num_rows > 0) {
    $row_user = $result_user->fetch_assoc();
    $surname = $row_user['surName'];
    $firstName = $row_user['firstName'];
    $middleName = $row_user['middleName'];
    $course = $row_user['course'];
    $year = $row_user['year'];
    $username = $row_user['username'];
    $section = $row_user['sec'];
    $studentNumber = $row_user['studentNumber'];
} else {
    echo "Error fetching user data";
    exit();
}

// Check if the user has an uncompleted attendance record
$hasUncompletedRecord = false;
$sql_uncompleted_record = "SELECT * FROM attendance_history WHERE student_id = '$studentNumber' AND time_out IS NULL";
$result_uncompleted_record = $conn->query($sql_uncompleted_record);

if ($result_uncompleted_record->num_rows > 0) {
    $hasUncompletedRecord = true;
}

// Attendance Management
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'time_in' && !$hasUncompletedRecord) {
            $sql_time_in = "INSERT INTO attendance_history (student_id, time_in) VALUES ('$studentNumber', NOW())";
            $conn->query($sql_time_in);
            header("Location: profile2.php"); // Redirect after time in
            exit();
        } elseif ($_POST['action'] === 'time_out' && $hasUncompletedRecord) {
            // No need for a prompt here, as the confirmation is already handled
            $sql_time_out = "UPDATE attendance_history SET time_out = NOW() WHERE student_id = '$studentNumber' AND time_out IS NULL";
            $conn->query($sql_time_out);
            header("Location: profile2.php"); // Redirect after time out
            exit();
        }
    }
}

// Retrieve attendance history
$sql_history = "SELECT * FROM attendance_history WHERE student_id = '$studentNumber'";
$result_history = $conn->query($sql_history);

// Clear all attendance history
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_history'])) {
    $sql_clear_history = "DELETE FROM attendance_history WHERE student_id = '$studentNumber'";
    if ($conn->query($sql_clear_history) === TRUE) {
        header("Location: profile2.php");
        exit();
    } else {
        echo "Error clearing history: " . $conn->error;
    }
}

// Logout
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style2.css">
    <title>Profile Page</title>
</head>
<body>
    <div class="container">
        <center>
            <img src="defaultprofilephoto.png" height="100" width="100">
            <h1><?php echo $surname . ', ' . $firstName . ' ' . $middleName; ?></h1>
            <h3>@<?php echo $username; ?></h3>
            
            <h3><?php echo $course; ?></h3>
            <h3><?php echo $year; ?></h3>
            <h3><?php echo $section; ?></h3>
           
            <h3><i><?php echo $studentNumber; ?></i></h3>
        </center>

        <div class="scrollable-table">
            <center>
                <table>
                    <tr>
                        <th>Time In</th>
                        <th>Time Out</th>
                    </tr>
                    <?php while ($row_history = $result_history->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row_history['time_in']; ?></td>
                            <td><?php echo $row_history['time_out']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </center>
        </div>

        <div class="align-vertical">
            <form method="post">
                <input type="hidden" name="action" value="time_in">
                <button type="submit" <?php if ($hasUncompletedRecord) echo 'disabled'; ?>>Time In</button>
            </form>

            <form method="post">
                <input type="hidden" name="action" value="time_out">
                <button type="submit" <?php if (!$hasUncompletedRecord) echo 'disabled'; ?>>Time Out</button>
            </form>
        </div>

        <center>
            <div class="clear-history">
                <form method="post">
                    <button type="submit" name="clear_history" onclick="return confirm('Are you sure you want to clear all history?')">Clear History</button>
                </form>
            </div>

            <form method="post">
                <button type="submit" name="logout" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
            </form>
        </center>
    </div>
</body>
</html>