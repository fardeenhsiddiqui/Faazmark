<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<?php
    if(isset($_GET['delete_customer'])){
        
        $d_id = $_GET['delete_customer'];
        $delete_c = "delete from customers where customer_id='$d_id'";
        $run_delete = mysqli_query($con,$delete_c);

        if($run_delete){
            echo "<script>alert('One customer has been deleted')</script>";
            echo "<script>window.open('index.php?view_customer','_self')</script>";
        }
    }

?>

<?php } ?>