
<?php

session_start();

if(!isset($_SESSION['student_id'])){
    header("Location:login.php");
    exit();
}

$conn = new mysqli(
"localhost",
"root",
"",
"internshipregisteration"
);

$email = $_SESSION['email'];

$stmt = $conn->prepare(
"SELECT * FROM internship_db WHERE email=?"
);

$stmt->bind_param("s",$email);

$stmt->execute();

$row = $stmt->get_result()->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>

<title>Student Profile</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(
    135deg,
    #667eea,
    #764ba2
    );
}

.container{
    width:700px;
    background:white;
    padding:35px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    margin-bottom:25px;
    color:#333;
}

.profile-table{
    width:100%;
    border-collapse:collapse;
}

.profile-table td{
    padding:12px;
    border-bottom:1px solid #ddd;
}

.profile-table td:first-child{
    font-weight:bold;
    width:220px;
    color:#444;
}

.resume-btn{
    text-decoration:none;
    background:#0d6efd;
    color:white;
    padding:8px 15px;
    border-radius:5px;
}

.resume-btn:hover{
    background:#0b5ed7;
}

.logout-btn{
    display:block;
    width:200px;
    margin:25px auto 0;
    text-align:center;
    text-decoration:none;
    background:#dc3545;
    color:white;
    padding:12px;
    border-radius:8px;
    font-weight:bold;
}

.logout-btn:hover{
    background:#bb2d3b;
}

</style>

</head>

<body>

<div class="container">

<h2> Welcome <?php echo $row['first_name']; ?> </h2>

<table class="profile-table">

<tr>
<td>First Name</td>
<td><?php echo $row['first_name']; ?></td>
</tr>

<tr>
<td>Last Name</td>
<td><?php echo $row['last_name']; ?></td>
</tr>

<tr>
<td>Student ID</td>
<td><?php echo $row['s_id']; ?></td>
</tr>

<tr>
<td>Date of Birth</td>
<td><?php echo $row['dob']; ?></td>
</tr>

<tr>
<td>Mobile Number</td>
<td><?php echo $row['mobile']; ?></td>
</tr>

<tr>
<td>Email</td>
<td><?php echo $row['email']; ?></td>
</tr>

<tr>
<td>Gender</td>
<td><?php echo $row['gender']; ?></td>
</tr>

<tr>
<td>Department</td>
<td><?php echo $row['department']; ?></td>
</tr>

<tr>
<td>Position Applied</td>
<td><?php echo $row['position']; ?></td>
</tr>

<tr>
<td>CGPA</td>
<td><?php echo $row['cgpa']; ?></td>
</tr>

<tr>
<td>Resume</td>
<td>
<a
href="<?php echo $row['resume']; ?>"
target="_blank"
class="resume-btn">
View Resume
</a>
</td>
</tr>

</table>

<a href="logout.php" class="logout-btn">
Logout
</a>

</div>

</body>
</html>
