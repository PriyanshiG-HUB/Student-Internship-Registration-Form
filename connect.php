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

// Run only when form is submitted
if (isset($_POST['submit'])) {

    $fname = $_POST['First_Name'];
    $lname = $_POST['Last_Name'];
    $dob = $_POST['date'];
    $mobile = $_POST['phno'];
    $email = $_POST['email'];

    // Password Hashing
    $password = password_hash($_POST['paswd'], PASSWORD_DEFAULT);

    // Gender
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";

    // Department
    $department = isset($_POST['Dept'])
        ? implode(", ", $_POST['Dept'])
        : "";

    // Position
    $position = $_POST['PA'];

    // File Upload
    $resume = $_FILES['resume']['name'];
    $tempname = $_FILES['resume']['tmp_name'];

    $folder = "uploads/" . $resume;

    move_uploaded_file($tempname, $folder);

    // Insert Query
    $sql = "INSERT INTO internship_db
(first_name, last_name, dob, mobile, email, password, gender, department, position, resume) VALUES ('$fname', '$lname', '$dob', '$mobile', '$email', '$password', '$gender', '$department', '$position', '$resume')";
    

    // Execute Query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Application Submitted Successfully');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>