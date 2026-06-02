<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internshipregisteration";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form Submit
if (isset($_POST['submit'])) {

    $fname = $_POST['First_Name'];
    $lname = $_POST['Last_Name'];
    $dob = $_POST['date'];
    $mobile = $_POST['phno'];
    $email = $_POST['email'];

    // Password Hashing
    $password = password_hash($_POST['paswd'], PASSWORD_DEFAULT);

    $gender = $_POST['gender'];

    // Department
    $department = implode(", ", $_POST['Dept']);

    $position = $_POST['PA'];

    // File Upload
    $resume = $_FILES['resume']['name'];
    $tempname = $_FILES['resume']['tmp_name'];

    $folder = "uploads/" . $resume;

    move_uploaded_file($tempname, $folder);

    // Insert Query
    $sql = "INSERT INTO `internship_db` (`First Name`, `Last Name`, `Date of Birth`, `Mobile Number`, `Email Address`, `Password`, `Gender`, `Department`, `Position Available`, `Resume`) VALUES ('$fname', '$lname', '$dob', '$mobile', '$email', '$password', '$gender', '$department', '$position', '$resume')";

    // Execute Query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Application Submitted Successfully');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>
