<?php
$conn = new mysqli("localhost","root","","internshipregisteration");

$result = $conn->query("SELECT * FROM internship_db WHERE status='active'");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Students</title>
</head>
<body>

<h2>Student Records</h2>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>CGPA</th>
<th>Action</th>
</tr>

<?php while($row=$result->fetch_assoc()){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>
<?php
echo $row['first_name']." ".$row['last_name'];
?>
</td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['cgpa']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['id']; ?>">
Edit
</a>

|

<a href="delete.php?id=<?php echo $row['id']; ?>">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>
<br><br>
<a href="export_excel.php">Export Excel</a>

<a href="export_word.php">Export Word</a>

<a href="export_pdf.php">Export PDF</a>

</body>
</html>