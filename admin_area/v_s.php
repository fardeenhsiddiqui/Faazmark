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
                Dashboard / View Slides 
            </li> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Slider
                </h3>
            </div>
            <div class="panel-body">
                <?php
                    $get_s = "select * from slider";
                    $run_s = mysqli_query($con,$get_s);
                    while($row = mysqli_fetch_array($run_s)){

                        $s_id = $row['id'];
                        $s_name = $row['slider_name'];
                        $s_image = $row['slider_image'];
                                    
                ?>
                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" align="center">
                                <?php echo $s_name; ?>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <img src="slider_images/<?php echo $s_image; ?>" class="img-responsive">
                        </div>
                        <div class="panel-footer">
                            <center>
                                <a href="index.php?d_s=<?php echo $s_id; ?>" class="pull-left">
                                    <i class="fa fa-trash-o"></i> Delete
                                </a>
                                <a href="index.php?e_s=<?php echo $s_id; ?>" class="pull-right">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <div class="clearfix"></div>
                            </center>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


    <?php } ?>