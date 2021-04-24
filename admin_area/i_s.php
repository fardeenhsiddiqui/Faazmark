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
                Dashboard / Insert Slides 
            </li> 
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-money"></i> Insert Slide
                </h3>
            </div>

            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Slide Name:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="slider_name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Slide Image:</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="slider_image" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Slide Url:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="slider_url">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary form-control" name="submit" value="Submit Now">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){

        $slider_name = $_POST['slider_name'];
        $slider_url = $_POST['slider_url'];
        $slider_image = $_FILES['slider_image']['name'];

        $temp_name = $_FILES['slider_image']['tmp_name'];
        $view_slider = "select * from slider";

        $run_slider = mysqli_query($con,$view_slider);
        $count = mysqli_num_rows($run_slider);

        if($count<=4){

            move_uploaded_file($temp_name,"slider_images/$slider_image");
            $insert_slide = "insert into slider (slider_name,slider_image,slider_url) values('$slider_name','$slider_image','$slider_url')";

            $run_s = mysqli_query($con,$insert_slide);
            echo "<script>alert('New Slide Has Been Inserted Successfully')</script>";
            echo "<script>window.open('index.php?v_s','_self')</script>";
        }
        else{
            echo "<script>alert('You have already Inserted 4 slides')</script>";
            echo "<script>window.open('index.php?v_s','_self')</script>"; 
        }
    }
?>
    <?php } ?>