
<?php

$conn = new mysqli(
"localhost",
"root",
"",
"internshipregisteration"
);

$password = password_hash(
"admin123",
PASSWORD_DEFAULT
);

$stmt = $conn->prepare(
"INSERT INTO internship_db
(
first_name,
last_name,
s_id,
dob,
mobile,
email,
password,
gender,
department,
position,
cgpa,
resume,
role,
status
)
VALUES
(
'Admin',
'User',
'ADMIN001',
'2000-01-01',
'9999999999',
'admin@gmail.com',
?,
'Male',
'IT',
'Administrator',
10,
'',
'admin',
'active'
)"
);

$stmt->bind_param("s",$password);

if($stmt->execute()){
    echo "Admin Created Successfully";
}
?>
