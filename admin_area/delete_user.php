<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<?php
    if(isset($_GET['delete_user'])){
        
        $d_id = $_GET['delete_user'];
        $delete_u = "delete from admins where admin_id='$d_id'";
        $run_delete = mysqli_query($con,$delete_u);

        if($run_delete){
            echo "<script>alert('One User has been deleted')</script>";
            echo "<script>window.open('index.php?view_user','_self')</script>";
        }
    }

?>

<?php } ?>