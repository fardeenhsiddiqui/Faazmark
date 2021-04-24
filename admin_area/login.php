<?php
session_start();
include ("includes/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
    <div class="container">
        <form action="" class="form-login" method="post">
            <h2 class="form-login-heading">Admin Login</h2>
            
            <input type="text" class="form-control" name="admin_email" placeholder="Email Address" required>
            
            <input type="password" class="form-control" name="admin_pass" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">
                Log in
            </button>
            <h4 class="forgot-password">
                <a href="forgot_password.php"> Lost your password? Forgot Password</a>
            </h4>
        </form>
    </div>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
</body>
</html>

<?php
    if(isset($_POST['admin_login'])){
        $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
        $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
        $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
        $run_admin = mysqli_query($con,$get_admin);
        $count = mysqli_num_rows($run_admin);
        if($count==1){
            $_SESSION['admin_email'] = $admin_email;
            echo "<script>alert('You are logged')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        else{
            echo "<script>alert('Email/Password is wrong')</script>";
        }
    }

?>