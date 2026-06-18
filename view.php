
<?php

$conn = new mysqli(
"localhost",
"root",
"",
"internshipregisteration"
);

$result = $conn->query(
"SELECT * FROM internship_db
WHERE status='active'"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Student Records</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#f4f6f9;
    padding:40px;
}

.container{
    max-width:1200px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

h2{
    color:#333;
}

.add-btn{
    text-decoration:none;
    background:#198754;
    color:white;
    padding:10px 18px;
    border-radius:5px;
    font-weight:bold;
}

.add-btn:hover{
    background:#157347;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#343a40;
    color:white;
    padding:12px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f8f9fa;
}

.action-btn{
    text-decoration:none;
    color:white;
    padding:8px 12px;
    border-radius:5px;
    margin:2px;
    display:inline-block;
}

.edit-btn{
    background:#0d6efd;
}

.edit-btn:hover{
    background:#0b5ed7;
}

.delete-btn{
    background:#dc3545;
}

.delete-btn:hover{
    background:#bb2d3b;
}

.export-section{
    margin-top:25px;
    text-align:center;
}

.export-btn{
    text-decoration:none;
    color:white;
    padding:10px 18px;
    border-radius:5px;
    margin:5px;
    display:inline-block;
    font-weight:bold;
}

.excel{
    background:#198754;
}

.word{
    background:#0d6efd;
}

.pdf{
    background:#dc3545;
}

.export-btn:hover{
    opacity:0.9;
}

.no-record{
    text-align:center;
    padding:20px;
    font-weight:bold;
    color:#666;
}

</style>

</head>

<body>

<div class="container">

<div class="header">

<h2>Student Records</h2>

<a href="add.php" class="add-btn">
+ Add Student
</a>

</div>

<table>

<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Student ID</th>
<th>Email</th>
<th>Mobile</th>
<th>CGPA</th>
<th>Action</th>
</tr>

<?php

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['first_name']; ?></td>

<td><?php echo $row['last_name']; ?></td>

<td><?php echo $row['s_id']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['mobile']; ?></td>

<td><?php echo $row['cgpa']; ?></td>

<td>

<a
href="edit.php?id=<?php echo $row['id']; ?>"
class="action-btn edit-btn">
Edit
</a>

<a
href="delete.php?id=<?php echo $row['id']; ?>"
class="action-btn delete-btn"
onclick="return confirm('Are you sure you want to delete this student?')">
Delete
</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>
<td colspan="8" class="no-record">
No Records Found
</td>
</tr>

<?php
}
?>

</table>

<div class="export-section">

<a
href="export_excel.php"
class="export-btn excel">
Export Excel
</a>

<a
href="export_word.php"
class="export-btn word">
Export Word
</a>

<a
href="export_pdf.php"
class="export-btn pdf">
Export PDF
</a>

</div>

</div>

</body>
</html>
