
<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Internship Registration</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f5f5f5;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    padding:20px;
}

.container{
    width:600px;
    max-width:100%;
    background:#f8d7da;
    padding:30px;
    border-radius:12px;
    box-shadow:0 4px 10px rgba(0,0,0,0.15);
}

h2{
    text-align:center;
    margin-bottom:25px;
    color:#333;
}

.form-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:6px;
    font-weight:600;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="date"],
select,
input[type="file"]{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:14px;
}

.radio-group,
.checkbox-group{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
    margin-top:5px;
}

.radio-group label,
.checkbox-group label{
    display:flex;
    align-items:center;
    gap:6px;
    font-weight:normal;
    cursor:pointer;
}

.btn-group{
    margin-top:20px;
    display:flex;
    gap:10px;
}

button{
    padding:10px 20px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:15px;
}

button[type="submit"]{
    background:#28a745;
    color:white;
}

button[type="submit"]:hover{
    background:#218838;
}

button[type="reset"]{
    background:#dc3545;
    color:white;
}

button[type="reset"]:hover{
    background:#c82333;
}

#message{
    margin-top:10px;
    font-weight:bold;
}

</style>
</head>

<body>

<div class="container">

<form action="" method="POST" enctype="multipart/form-data">

<h2>Student Internship Application</h2>

<div class="form-group">
<label>First Name</label>
<input type="text" id="First_Name" name="First_Name">
</div>

<div class="form-group">
<label>Last Name</label>
<input type="text" id="Last_Name" name="Last_Name">
</div>

<div class="form-group">
<label>Student ID</label>
<input type="text" id="s_id" name="s_id">
</div>

<div class="form-group">
<label>CGPA</label>
<input type="text" id="cgpa" name="cgpa" placeholder="Enter CGPA">
</div>

<div class="form-group">
<label>Date of Birth</label>
<input type="date" id="date" name="date">
</div>

<div class="form-group">
<label>Mobile Number</label>
<input type="text" id="phno" name="phno" placeholder="Enter 10-digit mobile number">
</div>

<div class="form-group">
<label>Email Address</label>
<input type="email" id="email" name="email">
</div>

<div class="form-group">
<label>Password</label>
<input type="password" id="paswd" name="paswd">
</div>

<div class="form-group">
<label>Gender</label>

<div class="radio-group">

<label>
<input type="radio" name="gender" value="male">
Male
</label>

<label>
<input type="radio" name="gender" value="female">
Female
</label>

<label>
<input type="radio" name="gender" value="other">
Other
</label>

</div>
</div>

<div class="form-group">
<label>Department</label>

<div class="checkbox-group">

<label>
<input type="checkbox" name="Dept[]" value="IT">
IT
</label>

<label>
<input type="checkbox" name="Dept[]" value="CSE">
CSE
</label>

<label>
<input type="checkbox" name="Dept[]" value="CE">
CE
</label>

<label>
<input type="checkbox" name="Dept[]" value="ECE">
ECE
</label>

</div>
</div>

<div class="form-group">
<label>Position Available</label>

<select name="PA">

<option value="Web Developer">Web Developer</option>

<option value="Data Analyst">Data Analyst</option>

<option value="Software Engineer">Software Engineer</option>

<option value="Data Scientist">Data Scientist</option>

</select>
</div>

<div class="form-group">
<label>Upload Resume</label>
<input type="file" id="resume" name="resume">
</div>

<p id="message"></p>

<div class="btn-group">
<button type="submit" name="submit">Submit</button>
<button type="reset">Reset</button>
</div>

</form>

</div>

<script src="script.js"></script>

</body>
</html>
