<?php

$conn = new mysqli("localhost","root","","internshipregisteration");

$id = $_GET['id'];

$stmt = $conn->prepare(
"UPDATE internship_db
SET status='deleted'
WHERE id=?"
);

$stmt->bind_param("i",$id);

$stmt->execute();

header("Location:view.php");
exit();

?>