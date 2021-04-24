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
                Dashboard / Insert Categories 
            </li> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-money"></i> Insert Categories
                </h3>
            </div>

            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Categories Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cat_title">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Categories Discription</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="cat_desc" ></textarea>
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

        $cat_title = $_POST['cat_title'];
        $cat_desc = $_POST['cat_desc'];
        $insert_cat = "insert into categories (cat_title,cat_desc) values('$cat_title','$cat_desc')";

        $run_cat = mysqli_query($con,$insert_cat);
        if($run_cat){
            echo "<script>alert('Product Categories Insert Successfully')</script>";
            echo "<script>window.open('index.php?view_cat','_self')</script>";
        }
    }
?>
<?php } ?>