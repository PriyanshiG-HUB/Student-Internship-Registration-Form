<?php

$conn = new mysqli(
"localhost",
"root",
"",
"internshipregisteration"
);

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=students.doc");

echo "<h2>Student Records</h2>";

$result = $conn->query("SELECT * FROM internship_db");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>CGPA</th>
</tr>";

while($row = $result->fetch_assoc()){

echo "<tr>";

echo "<td>".$row['id']."</td>";

echo "<td>"
.$row['first_name']." "
.$row['last_name'].
"</td>";

echo "<td>".$row['email']."</td>";

echo "<td>".$row['cgpa']."</td>";

echo "</tr>";
}

echo "</table>";
?>