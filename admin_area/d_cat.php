<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<?php
    if(isset($_GET['d_cat'])){
        
        $d_cat_id = $_GET['d_cat'];
        $delete_cat = "delete from categories where cat_id='$d_cat_id'";
        $run_delete = mysqli_query($con,$delete_cat);

        if($run_delete){
            echo "<script>alert('One categories has been deleted')</script>";
            echo "<script>window.open('index.php?view_cat','_self')</script>";
        }
    }

?>

<?php } ?>