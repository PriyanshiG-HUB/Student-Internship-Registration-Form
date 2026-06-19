<?php
session_start();

if(isset($_SESSION['student_id'])){
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Here</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background: linear-gradient(
    135deg,
    #667eea,
    #764ba2
    );
}

.login-card{
    border-radius:20px;
    overflow:hidden;
}

.card-header{
    background:#212529;
    color:white;
    text-align:center;
    padding:25px;
}

.card-header h2{
    margin:0;
    font-weight:bold;
}

.btn-login{
    width:100%;
}

</style>

</head>

<body>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg login-card">
                <div class="card-header">
                    <h2>Login Here</h2>
                    <p class="mb-0">Enter your email and password</p>
                </div>

            <div class="card-body p-4">
            <form action="login_process.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="d-grid">
                <button type="submit" class="btn btn-success btn-lg">Login</button>
                </div>
            </form>
            </div>
            <div class="card-footer text-center">
            <small class="text-muted">Internship Registration System</small>
            </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>