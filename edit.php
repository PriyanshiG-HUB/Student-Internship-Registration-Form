
<?php

$conn = new mysqli(
"localhost",
"root",
"",
"internshipregisteration"
);

$id = $_GET['id'];

$result = $conn->query(
"SELECT * FROM internship_db WHERE id=$id"
);

$row = $result->fetch_assoc();

if(isset($_POST['update'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cgpa = $_POST['cgpa'];

    $sql =
    "UPDATE internship_db
    SET first_name='$fname',
    last_name='$lname',
    cgpa='$cgpa'
    WHERE id=$id";

    if($conn->query($sql)){
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
    width:450px;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 8px 20px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    color:#333;
    margin-bottom:25px;
}

.form-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:6px;
    font-weight:bold;
    color:#555;
}

input{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:15px;
}

input:focus{
    outline:none;
    border-color:#667eea;
    box-shadow:0 0 5px rgba(102,126,234,0.5);
}

.btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    background:#28a745;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    background:#218838;
}

.back-btn{
    display:block;
    text-align:center;
    margin-top:15px;
    text-decoration:none;
    color:#667eea;
    font-weight:bold;
}

.back-btn:hover{
    text-decoration:underline;
}

</style>

</head>

<body>

<div class="container">

<h2>Edit Student Record</h2>

<form method="POST">

<div class="form-group">
<label>First Name</label>
<input
type="text"
name="fname"
value="<?php echo $row['first_name']; ?>"
required>
</div>

<div class="form-group">
<label>Last Name</label>
<input
type="text"
name="lname"
value="<?php echo $row['last_name']; ?>"
required>
</div>

<div class="form-group">
<label>CGPA</label>
<input type="text" name="cgpa" value="<?php echo $row['cgpa']; ?>" required></div>

<button type="submit" name="update"class="btn">Update Record</button>
</form>
<a href="view.php" class="back-btn">← Back to Student Records</a>
</div>
</body>
</html>
