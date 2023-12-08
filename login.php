<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "database1";

$conn = mysqli_connect($server_name, $username, $password, $database_name);
if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
}

if (isset($_POST['save'])) {
    $surName = $_POST['surName'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $sem = $_POST['sem'];
    $sec = $_POST['sec'];
    $studentNumber = $_POST['studentNumber'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $surName = mysqli_real_escape_string($conn, $surName);
    $firstName = mysqli_real_escape_string($conn, $firstName);
    $middleName = mysqli_real_escape_string($conn, $middleName);
    $course = mysqli_real_escape_string($conn, $course);
    $year = mysqli_real_escape_string($conn, $year);
    $sem = mysqli_real_escape_string($conn, $sem);
    $sec = mysqli_real_escape_string($conn, $sec);
    $studentNumber = mysqli_real_escape_string($conn, $studentNumber);
    $email = mysqli_real_escape_string($conn, $email);
    $birthdate = mysqli_real_escape_string($conn, $birthdate);
    $address = mysqli_real_escape_string($conn, $address);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

   
    $check_query = "SELECT * FROM entry_details WHERE studentNumber = '$studentNumber' OR username = '$username'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) == 0) {
        
        $sql_query = "INSERT INTO entry_details (surName, firstName, middleName, course, year, sem, sec, studentNumber, email, birthdate, address, username, password)
        VALUES ('$surName','$firstName','$middleName','$course','$year','$sem','$sec','$studentNumber','$email','$birthdate','$address','$username','$password')";

        if (mysqli_query($conn, $sql_query)) {
            ?>
            <script type="text/javascript">
                alert("New Details Entry inserted successfully!");
                window.location.href="login.html";
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Error: <?php echo mysqli_error($conn); ?>");
                window.location.href="login.html";
            </script>
            <?php
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("Error: Duplicate Student Number or Username. Please choose unique values."); 
            window.location.href="login.html";  
        </script>
        <?php
    }
    

    mysqli_close($conn);
}
?>
