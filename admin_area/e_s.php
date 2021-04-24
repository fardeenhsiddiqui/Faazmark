<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<?php
    if(isset($_GET['e_s'])){

        $edit_id = $_GET['e_s'];
        $get_s = "select * from slider where id='$edit_id'";
        $run_edit = mysqli_query($con,$get_s);
        $row_edit = mysqli_fetch_array($run_edit);

        $s_id = $row_edit['id'];
        $slider_name = $row_edit['slider_name'];
        $slider_image = $row_edit['slider_image'];
        $slider_url = $row_edit['slider_url'];
    }
?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Slider
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-w"></i> Edit Slider
                    </h3>
                </div>
                
                <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Slider Name:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="s_name" value="<?php echo $slider_name; ?> ">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Slider Image</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="s_image" >
                            <br>
                            <img src="slider_images/<?php echo $slider_image; ?>" width="70" height="70" class="img-responsive">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Slider Url:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="s_url" value="<?php echo $slider_url; ?> ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary form-control" name="update" value="Edit Now">
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['update'])){

        $s_name = $_POST['s_name'];
        $s_url = $_POST['s_url'];
        $s_image = $_FILES['s_image']['name'];

        $temp_name = $_FILES['s_image']['tmp_name'];
        move_uploaded_file($temp_name,"slider_images/$s_image");

       
        $update_s = "update slider set slider_name='$s_name', slider_image='$s_image', slider_url='$s_url' where id='$s_id'";

        $run_s = mysqli_query($con,$update_s);
        if($run_s){
            echo "<script>alert('Slider has been Updated Successfully')</script>";
            echo "<script>window.open('index.php?v_s','_self')</script>";
        }

    }

?>

<?php } ?>