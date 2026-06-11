
<?php

session_start();

if(
!isset($_SESSION['student_id'])
){
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body>

<h1>
Welcome
<?php
echo $_SESSION['student_name'];
?>
</h1>

<p>
Email :
<?php
echo $_SESSION['email'];
?>
</p>

<a href="logout.php">
Logout
</a>

</body>
</html>
