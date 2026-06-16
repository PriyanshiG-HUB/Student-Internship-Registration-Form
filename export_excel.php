<?php

$conn = new mysqli("localhost","root","","internshipregisteration");

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=students.xls");

echo "ID\tName\tEmail\tCGPA\n";

$result = $conn->query("SELECT * FROM internship_db");

while($row = $result->fetch_assoc()){

    echo $row['id']."\t";
    echo $row['first_name']." ".$row['last_name']."\t";
    echo $row['email']."\t";
    echo $row['cgpa']."\n";
}
?>