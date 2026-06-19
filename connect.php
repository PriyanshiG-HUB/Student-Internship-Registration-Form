<?php
$servername="localhost";
$username="root";
$password="";
$dbname="internshipregisteration";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection Failed : "
    .$conn->connect_error);
}

if(isset($_POST['submit'])){

    $fname=$_POST['First_Name'];
    $lname=$_POST['Last_Name'];
    $s_id=$_POST['s_id'];
    $cgpa=$_POST['cgpa'];
    $dob=$_POST['date'];
    $mobile=$_POST['phno'];
    $email=$_POST['email'];

    $passwordHash=
    password_hash(
    $_POST['password'],
    PASSWORD_DEFAULT
    );

    $gender=
    $_POST['gender'] ?? "";

    $department=
    isset($_POST['Dept'])
    ? implode(", ",$_POST['Dept'])
    : "";

    $position=$_POST['PA'];

    $check=$conn->prepare(
    "SELECT email
     FROM internship_db
     WHERE email=?"
    );

    $check->bind_param("s",$email);

    $check->execute();

    $result=
    $check->get_result();

    if($result->num_rows>0){

        echo "<script>
        alert('Email already exists');
        </script>";
        exit;
    }

    if(!file_exists("uploads")){
        mkdir("uploads",0777,true);
    }

    $resume=$_FILES['resume']['name'];

    $tempname=$_FILES['resume']['tmp_name'];

    $extension=strtolower(pathinfo($resume,PATHINFO_EXTENSION));

    $allowed=['pdf','doc','docx'];

    if(!in_array($extension,$allowed)){
        die("Only PDF DOC DOCX allowed");
    }

    $folder="uploads/".time()."_".$resume;

    move_uploaded_file($tempname,$folder);

    $stmt=$conn->prepare(
        "INSERT INTO internship_db (first_name,last_name,s_id,dob,mobile,email,password,gender,department,position,cgpa,resume) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)"
    );

    $stmt->bind_param("ssssssssssss",$fname,$lname,$s_id,$dob,$mobile,$email,$passwordHash,$gender,$department,$position,$cgpa,$folder);

    if($stmt->execute()){
        echo "<script>
            alert('Registration Successful');
            window.location='login.php';
        </script>";
    }
    else{
        echo "Error : "
        .$stmt->error;
    }
}
?>