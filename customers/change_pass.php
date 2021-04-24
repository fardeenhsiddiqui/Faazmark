
<div class="box">
    <center>
        <h2>Change  your password</h2>
    </center>
    <form action="" class="group" method="post">
    <div class="form-group">
        <label>Enter your current Password</label>
        <input type="password"  name="old_password" class="form-control">
    </div>
    <div class="form-group">
        <label>Enter New Password</label>
        <input type="password"  name="new_password" class="form-control">
    </div>
    <div class="form-group">
        <label>Confirm New Password</label>
        <input type="password"  name="c_n_password" class="form-control">
    </div>
    <div class="text-center">
        <button name="update" class="btn btn-primary btn-lg" type="submit">
            Update Now
        </button>
    </div>
    </form>
</div>


<?php
    if(isset($_POST['update'])){
        $c_email = $_SESSION['customer_email'];
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $c_n_password = $_POST['c_n_password'];

        $select = "select * from customers where customer_email='$c_email' AND customer_pass='$old_password'";
        $run = mysqli_query($con,$select);
        $check_old = mysqli_num_rows($run);
        if($check_old==0){
            echo "<script>alert('your Current password is not valid.. Try again')</script>";
            exit();
        }else{
            if($new_password!=$c_n_password){
                echo "<script>alert('Your New password is not match to confirm password.. Try again')</script>";
                exit();
            }else{
                $update_pass = "update customers set customer_pass='$new_password' where customer_email='$c_email'";
                $run_q = mysqli_query($con,$update_pass);
                echo "<script>alert('Your password is changed')</script>";
                echo "<script>window.open('my_account.php?my_order','_self')</script>";
            }

        }
    }


?>
