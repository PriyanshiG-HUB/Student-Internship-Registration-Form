<?php
$conn = new mysqli("localhost","root","","internshipregisteration");
$result = $conn->query("SELECT * FROM internship_db WHERE status='active'");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Students</title>
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

h2{
    text-align:center;
    color:#333;
    margin-bottom:25px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th{
    background:#343a40;
    color:white;
    padding:12px;
}

table td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

table tr:hover{
    background:#f1f1f1;
}

.action-btn{
    text-decoration:none;
    color:white;
    padding:8px 14px;
    border-radius:5px;
    margin:0 3px;
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

</style>

</head>

<body>

<div class="container">

<h2>Student Records</h2>

<table>

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

<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['cgpa']; ?></td>

<td>

<a class="action-btn edit-btn" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

<a class="action-btn delete-btn" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>

</td>
</tr>

<?php } ?>

</table>

<div class="export-section">

<a class="export-btn excel" href="export_excel.php">Export Excel</a>

<a class="export-btn word" href="export_word.php">Export Word</a>

<a class="export-btn pdf" href="export_pdf.php">Export PDF</a>

</div>

</div>

</body>
</html>
