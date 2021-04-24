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
                Dashboard / Insert Product Categories 
            </li> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-money"></i> Insert Product Categories
                </h3>
            </div>

            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Product Categories Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="p_cat_title">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Product Categories Discription</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="p_cat_desc" ></textarea>
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

        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_desc = $_POST['p_cat_desc'];
        $insert_p_cat = "insert into product_categories (p_cat_title,p_cat_desc) values('$p_cat_title','$p_cat_desc')";

        $run_p_cat = mysqli_query($con,$insert_p_cat);
        if($run_p_cat){
            echo "<script>alert('Product Categories Insert Successfully')</script>";
            echo "<script>window.open('index.php?view_product_cat','_self')</script>";
        }
    }
?>
<?php } ?>