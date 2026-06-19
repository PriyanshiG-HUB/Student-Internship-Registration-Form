<?php

session_start();

if(!isset($_SESSION['student_id'])){
    header("Location: login.php");
    exit();
}

?>

<h1>
Welcome
<?php echo $_SESSION['student_name']; ?>
</h1>

<?php

if($_SESSION['role']=="admin"){

?>

<a href="view.php">
Manage Students
</a>

<?php

}else{

?>

<a href="student_view.php">
View My Profile
</a>

<?php

}

?>

<br><br>

<a href="logout.php">
Logout
</a>