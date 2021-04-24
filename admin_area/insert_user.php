<?php
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>
                    Dashboard / Insert User  
                </li> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-w"></i> Insert User
                    </h3>
                </div>
                
                <div class="panel-body">
                    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">User Name:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_name" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Admin Email:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_email" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Admin Pass:</label>
                            <div class="col-md-6">
                                <input type="password" name="admin_pass" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Admin Country:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_country" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Admin Contact:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_contact" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Admin Job:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_job" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Admin Image</label>
                            <div class="col-md-6">
                                <input type="file" name="admin_image" class="form-control" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">About:</label>
                            <div class="col-md-6">
                                <textarea name="about" id="" cols="28" rows="6" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                            </label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    if(isset($_POST['submit'])){

        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_pass = $_POST['admin_pass'];
        $admin_country = $_POST['admin_country'];
        $admin_contact = $_POST['admin_contact'];
        $admin_job = $_POST['admin_job'];
        $about = $_POST['about'];

        $admin_image = $_FILES['admin_image']['name'];
        $temp_image = $_FILES['admin_image']['tmp_name'];

        move_uploaded_file($temp_image, "admin_images/$admin_image");


        $insert_user = "insert into admins (admin_name, admin_email, admin_pass, admin_image, admin_contact, admin_country,admin_job , admin_about) value('$admin_name','$admin_email','$admin_pass','$admin_image','$admin_contact','$admin_country','$admin_job','$about')";

        $run_user = mysqli_query($con,$insert_user);

        if($run_user){
            echo "<script>alert('User Insert Successfully')</script>";
            echo "<script>window.open('index.php?view_user','_self')</script>";
        }
    }

?>

<?php } ?>