<?php

$conn = new mysqli("localhost","root","","internshipregisteration");

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM internship_db WHERE id=$id");

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
    }
}
?>

<form method="POST">

<input type="text" name="fname" value="<?php echo $row['first_name']; ?>">

<input type="text" name="lname" value="<?php echo $row['last_name']; ?>">

<input type="text" name="cgpa" value="<?php echo $row['cgpa']; ?>">

<button type="submit" name="update">Update</button>
</form>