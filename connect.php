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
    $s_id = $_POST['s_id'];
    $cgpa = $_POST['cgpa'];
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
(first_name, last_name, s_id, dob, mobile, email,password, gender, department, position,cgpa, resume) VALUES ('$fname', '$lname', '$s_id', '$dob','$mobile', '$email', '$password','$gender', '$department', '$position','$cgpa', '$resume')";

    // Execute Query
    if ($conn->query($sql) === TRUE) {

    // Get newly inserted student id
    $student_id = $conn->insert_id;

    // Find matching internship based on selected position
    $getInternship = "
    SELECT i_id
    FROM internship
    WHERE i_role = '$position'
    LIMIT 1
    ";

    $result = $conn->query($getInternship);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        $internship_id = $row['i_id'];

        // Insert into application table
        // $app_sql = "
        // INSERT INTO application
        // (student_id, internship_id, application_status)
        // VALUES
        // ($student_id, $internship_id, 'Applied')
        // ";

        // $conn->query($app_sql);
    }

    echo "<script>alert('Application Submitted Successfully');</script>";

} else {
    echo "Error: " . $conn->error;
}
}

?>