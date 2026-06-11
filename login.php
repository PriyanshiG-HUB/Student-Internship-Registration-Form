
<?php
session_start();

if(isset($_SESSION['student_id'])){
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Login</title>

<style>

body{
    font-family:Arial;
    background:#f5f5f5;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.container{
    width:400px;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}

input{
    width:100%;
    padding:10px;
    margin:10px 0;
}

button{
    width:100%;
    padding:10px;
    background:#28a745;
    color:white;
    border:none;
}

</style>

</head>
<body>

<div class="container">

<h2>Student Login</h2>

<form action="login_process.php" method="POST">

<input
type="email"
name="email"
placeholder="Enter Email"
required>

<input
type="password"
name="password"
placeholder="Enter Password"
required>

<button type="submit">
Login
</button>

</form>

</div>

</body>
</html>

