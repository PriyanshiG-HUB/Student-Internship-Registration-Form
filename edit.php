<?php

$conn = new mysqli(
"localhost",
"root",
"",
"internshipregisteration"
);

$id = $_GET['id'];

$stmt = $conn->prepare(
"SELECT * FROM internship_db WHERE id=?"
);

$stmt->bind_param("i",$id);
$stmt->execute();

$row = $stmt->get_result()->fetch_assoc();

if(isset($_POST['update'])){

    $fname  = $_POST['fname'];
    $lname  = $_POST['lname'];
    $sid    = $_POST['sid'];
    $email  = $_POST['email'];
    $mobile = $_POST['mobile'];
    $cgpa   = $_POST['cgpa'];

    $stmt = $conn->prepare(
    "UPDATE internship_db
    SET
    first_name=?,
    last_name=?,
    s_id=?,
    email=?,
    mobile=?,
    cgpa=?
    WHERE id=?"
    );

    $stmt->bind_param(
    "ssssssi",
    $fname,
    $lname,
    $sid,
    $email,
    $mobile,
    $cgpa,
    $id
    );

    if($stmt->execute()){

        header("Location:view.php");
        exit();

    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>

<style>

body{
    background:#f4f6f9;
    font-family:Arial;
}

.container{
    width:500px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}

h2{
    text-align:center;
    margin-bottom:20px;
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
    background:#0d6efd;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#0b5ed7;
}

</style>
</head>

<body>

<div class="container">

<h2>Edit Student</h2>

<form method="POST">

<input
type="text"
name="fname"
value="<?php echo $row['first_name']; ?>"
required>

<input
type="text"
name="lname"
value="<?php echo $row['last_name']; ?>"
required>

<input
type="text"
name="sid"
value="<?php echo $row['s_id']; ?>"
required>

<input
type="email"
name="email"
value="<?php echo $row['email']; ?>"
required>

<input
type="text"
name="mobile"
value="<?php echo $row['mobile']; ?>"
required>

<input
type="text"
name="cgpa"
value="<?php echo $row['cgpa']; ?>"
required>

<button type="submit" name="update">
Update Student
</button>

</form>

</div>

</body>
</html>
