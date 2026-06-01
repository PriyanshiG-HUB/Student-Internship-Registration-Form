<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f5f5f5;
}

.container{
    width: 400px;
    max-width: 90%;
    border: 1px solid black;
    padding: 25px;
    border-radius: 10px;
    background-color: rgba(238, 195, 202, 0.736);
}

form div{
    margin-bottom: 12px;
}

input[type="text"],
input[type="date"],
input[type="email"],
input[type="password"],
select,
input[type="file"] {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button{
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
</style>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Student Internship Application</h2>
            <div id="personal-info">
                <label for="First_Name">First Name:</label>
                <input type="text" id="First_Name" name="First_Name" required>

                <label for="Last_Name">Last Name:</label>
                <input type="text" id="Last_Name" name="Last_Name" required>
            </div>

            <div id="contact-info">
                <label for="date">Date of Birth:</label>
                <input type="date" id="date" name="date" required>
            </div>
                
            <div id="contact-info">
                <label for="phno">Mobile Number:</label>
                <input type="text" id="phno" name="phno" required pattern="[0-9]{10}" placeholder="Enter 10-digit mobile number">
            </div>
            <div>
                <label for="email">Email Address :</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email address">
            </div>
            <div>
                <label for="paswd">Password :</label>
                <input type="password" id="paswd" name="paswd" required>
            </div>
            <div>
                <label for="gender">Gender:</label>
                <input type="radio" name="gender" id="male" value="male">
                <label for="male">Male</label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="female">Female</label>
                <input type="radio" name="gender" id="other" value="other">
                <label for="other">Other</label>
            </div>
            <div>
                <label for="Dept">Department:</label>
                <input type="checkbox" name="Dept[]" value="IT"> IT
                <input type="checkbox" name="Dept[]" value="CSE"> CSE
                <input type="checkbox" name="Dept[]" value="CE"> CE
                <input type="checkbox" name="Dept[]" value="ECE"> ECE
            </div>
            <div id="PA">
                <label for="PA">Position Available:</label>
                <select id="PA" name="PA">
                    <option value="Web Developer">Web Developer</option>
                    <option value="Data Analyst">Data Analyst</option>
                    <option value="Software Engineer">Software Engineer</option>
                    <option value="Data Scientist">Data Scientist</option>
                </select>
            </div>
            <div>
                <label for="resume">Upload Resume:</label>
                <input type="file" id="resume" name="resume">
            </div>
                <div>
                    <button type="submit" name="submit">Submit</button>   
                    <button type="reset">Reset</button>
                </div>

        </form>
    </div>
</body>
</html>