<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<?php
    if(isset($_GET['delete_order'])){
        
        $d_id = $_GET['delete_order'];
        $delete_s = "delete from customer_order where order_id='$d_id'";
        $run_delete = mysqli_query($con,$delete_s);

        if($run_delete){
            echo "<script>alert('One Customer Order has been deleted')</script>";
            echo "<script>window.open('index.php?view_order','_self')</script>";
        }
    }

?>

<?php } ?>