
<?php

session_start();

$conn = new mysqli(
"localhost",
"root",
"",
"internshipregisteration"
);

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare(
"SELECT * FROM internship_db
WHERE email=?"
);

$stmt->bind_param("s",$email);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows == 1){

    $row = $result->fetch_assoc();

    if(
        password_verify(
        $password,
        $row['password']
        )
    ){

        $_SESSION['student_id']
        = $row['id'];

        $_SESSION['student_name']
        = $row['first_name'];

        $_SESSION['email']
        = $row['email'];

        header(
        "Location: dashboard.php"
        );

        exit();

    }
    else{

        echo "<script>
        alert('Wrong Password');
        window.location='login.php';
        </script>";

    }

}
else{

    echo "<script>
    alert('Email Not Found');
    window.location='login.php';
    </script>";

}
?>
