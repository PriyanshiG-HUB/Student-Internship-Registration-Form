<?php
session_start();
if(
!isset($_SESSION['role']) || $_SESSION['role']!="admin"){
    die("Access Denied");
}

$conn = new mysqli(
"localhost",
"root",
"",
"internshipregisteration"
);

if(isset($_POST['import'])){

    $file = fopen(
    $_FILES['csv_file']['tmp_name'],"r");

    fgetcsv($file);

    while(($row = fgetcsv($file)) !== FALSE){

        $fname = $row[0];
    $lname = $row[1];
    $dob = $row[2];
    $mobile = $row[3];
    $email = $row[4];
    $password = password_hash("student123",PASSWORD_DEFAULT);
    $gender = $row[5];
    $department = $row[6];
    $position = $row[7];
    $sid = $row[8];
    $cgpa = $row[9];
    $status = "active";
    $role = "student";

        $stmt = $conn->prepare(
        "INSERT INTO internship_db(first_name,last_name,dob,mobile,email,password,gender,department,position,s_id,cgpa,status,role) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("sssssssssssss",$fname,$lname,$dob,$mobile,$email,$password,$gender,$department,$position,$sid,$cgpa,$status,$role);

        $stmt->execute();
    }

    fclose($file);

    header("Location:view.php");
    exit();
}


$records_per_page = 5;

$page = isset($_GET['page'])
? (int)$_GET['page']
: 1;

$offset = ($page - 1) * $records_per_page;

$total_result = $conn->query(
"SELECT COUNT(*) AS total
FROM internship_db
WHERE status='active'"
);

$total_row = $total_result->fetch_assoc();

$total_students = $total_row['total'];

$total_pages = ceil(
$total_students / $records_per_page
);

$result = $conn->query(
"SELECT *
FROM internship_db
WHERE status='active'
LIMIT $offset,$records_per_page"
);

$start = $offset + 1;
$end = min(
$offset + $records_per_page,
$total_students
);
?>

<!DOCTYPE html>
<html>
<head>
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
    margin-bottom:30px;
    flex-wrap:wrap;
    gap:15px;
}

.title-section{
    flex:1;
    text-align:center;
}

.action-section{
    display:flex;
    align-items:center;
    gap:10px;
}
h2{
    color:#333;
    font-size:36px;
    margin:0;
}

.add-btn{
    text-decoration:none;
    background:#198754;
    color:white;
    padding:12px 20px;
    border-radius:8px;
    font-weight:bold;
    border:none;
    cursor:pointer;
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

.pagination{
    margin-top:20px;
    text-align:center;
}

.pagination a,
.pagination span{

    display:inline-block;

    padding:10px 15px;

    margin:5px;

    text-decoration:none;

    border-radius:5px;

    background:#0d6efd;

    color:white;
}

.pagination a:hover{
    background:#0b5ed7;
}

.pagination .active{
    background:#198754;
}

</style>

</head>

<body>

<div class="container">

<div class="header">

<div class="title-section">
    <h2>Student Records</h2>
</div>

<div class="action-section">

    <a href="add.php" class="add-btn">
        + Add Student
    </a>

    <form method="POST"
          enctype="multipart/form-data"
          style="display:flex;align-items:center;gap:10px;">

        <input
        type="file"
        name="csv_file"
        accept=".csv"
        required>

        <button
        type="submit"
        name="import"
        class="add-btn">
            Import CSV
        </button>

    </form>

</div>

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
<p style="margin-top:15px;color:#666;text-align:center;font-size:18px;">
Showing
<strong>
<?php echo $start; ?>
</strong>

to

<strong>
<?php echo $end; ?>
</strong>

of

<strong>
<?php echo $total_students; ?>
</strong>

students

</p>
<div class="pagination">
    
<?php
if($page > 1){
    echo "<a href='view.php?page=".($page-1)."'>Previous</a>";
}

for($i=1;$i<=$total_pages;$i++){
    if($i == $page){
        echo "<span class='active'>".$i."</span>";
        }else{
            echo "<a href='view.php?page=".$i."'>".$i."</a>";
}
}

if($page < $total_pages){

echo "<a href='view.php?page=".($page+1)."'>Next</a>";
}
?>
</div>

<div class="export-section">
<a href="export_excel.php" class="export-btn excel">Export Excel</a>

<a href="export_word.php" class="export-btn word">Export Word</a>

<a href="export_pdf.php" class="export-btn pdf">Export PDF</a>
</div>
</div>

</body>
</html>
