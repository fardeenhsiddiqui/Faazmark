<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<?php
    if(isset($_GET['delete_payment'])){
        
        $d_id = $_GET['delete_payment'];
        $delete_s = "delete from payments where payment_id='$d_id'";
        $run_delete = mysqli_query($con,$delete_s);

        if($run_delete){
            echo "<script>alert('One Payment Order has been deleted')</script>";
            echo "<script>window.open('index.php?view_payment','_self')</script>";
        }
    }

?>

<?php } ?>