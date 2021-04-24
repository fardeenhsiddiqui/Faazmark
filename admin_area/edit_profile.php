<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
<?php
    if(isset($_GET['edit_profile'])){

        $edit_id = $_GET['edit_profile'];
        $get_a = "select * from admins where admin_id='$edit_id'";
        $run_edit = mysqli_query($con,$get_a);
        $row_edit = mysqli_fetch_array($run_edit);

        $a_id = $row_edit['admin_id'];
        $a_name = $row_edit['admin_name'];
        $a_email = $row_edit['admin_email'];
        $a_image = $row_edit['admin_image'];
        $a_country = $row_edit['admin_country'];
        $a_contact = $row_edit['admin_contact'];
        $a_job = $row_edit['admin_job'];
        $a_about = $row_edit['admin_about'];
        
    }
?>


    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Edit edit_profile
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-w"></i> Edit Profile
                    </h3>
                </div>
                
                <div class="panel-body">
                    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">User Name:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_name" class="form-control" required=""
                                value="<?php echo $a_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Admin Email:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_email" class="form-control" required="" value="<?php echo $a_email; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Admin Country:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_country" class="form-control" required="" value="<?php echo $a_country; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Admin Contact:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_contact" class="form-control" required="" value="<?php echo $a_contact; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Admin Job:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_job" class="form-control" required="" value="<?php echo $a_job; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Admin Image</label>
                            <div class="col-md-3">
                                <input type="file" name="admin_image" class="form-control" >
                            </div>
                            <div class="col-md-3">
                                <img src="admin_images/<?php echo $a_image; ?>" class="img-responsive" height="100" width="100">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">About:</label>
                            <div class="col-md-6">
                                <textarea name="about" id="" cols="28" rows="6" class="form-control"><?php echo $a_about; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                            </label>
                            <div class="col-md-6">
                                <input type="submit" name="update" value="Update" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php
    if(isset($_POST['update'])){

        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_country = $_POST['admin_country'];
        $admin_contact = $_POST['admin_contact'];
        $admin_job = $_POST['admin_job'];
        $admin_about = $_POST['admin_about'];

        $admin_image = $_FILES['admin_image']['name'];
        $tmp = $_FILES['admin_image']['tmp_name'];
        move_uploaded_file($tmp,"admin_images/$admin_image");
       

       
        $update_a = "update admins set admin_name='$admin_name', admin_email='$admin_email', admin_country='$admin_country', admin_contact='$admin_contact', admin_job='$admin_job',admin_about='$admin_about', admin_image='$admin_image' where admin_id='$a_id'";

        $run_a = mysqli_query($con,$update_a);
        if($run_a){
            echo "<script>alert('Profile has been Updated Successfully')</script>";
            echo "<script>window.open('login.php','_self')</script>";
            session_destroy();
        }

    }

?>
<?php } ?>