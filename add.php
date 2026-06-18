
<?php

$conn = new mysqli("localhost","root","","internshipregisteration");

if(isset($_POST['add'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sid = $_POST['sid'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $cgpa = $_POST['cgpa'];

    $stmt = $conn->prepare(
    "INSERT INTO internship_db (first_name,last_name,s_id,mobile,email,cgpa,status) VALUES(?,?,?,?,?,?,'active')"
    );

    $stmt->bind_param("ssssss",$fname,$lname,$sid,$mobile,$email,$cgpa);

    if($stmt->execute()){
        header("Location:view.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>

<style>
body{
background:#f4f6f9;
font-family:Arial;
}

.container{
width:500px;
margin:50px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.2);
}

input{
width:100%;
padding:10px;
margin:10px 0;
border:1px solid #ccc;
border-radius:5px;
}

button{
width:100%;
padding:12px;
background:#198754;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
}
</style>
</head>
<body>
<div class="container">
<h2>Add Student</h2>
<form method="POST">
    <input type="text" name="fname" placeholder="First Name" required>
    <input type="text" name="lname" placeholder="Last Name" required>
    <input type="text" name="sid" placeholder="Student ID" required>
    <input type="text" name="mobile" placeholder="Mobile Number" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="cgpa" placeholder="CGPA" required>
    <button type="submit" name="add">Add Student</button>

</form>
</div>
</body>
</html>
