<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<?php
    if(isset($_GET['d_s'])){
        
        $d_id = $_GET['d_s'];
        $delete_s = "delete from slider where id='$d_id'";
        $run_delete = mysqli_query($con,$delete_s);

        if($run_delete){
            echo "<script>alert('One slider has been deleted')</script>";
            echo "<script>window.open('index.php?v_s','_self')</script>";
        }
    }

?>

<?php } ?>