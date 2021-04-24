<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
<?php
    if(isset($_GET['e_p_cat'])){

        $edit_cat_id = $_GET['e_p_cat'];
        $get_p_cat = "select * from product_categories where p_cat_id='$edit_cat_id'";
        $run_cat_edit = mysqli_query($con,$get_p_cat);
        $row_edit = mysqli_fetch_array($run_cat_edit);

        $pcat_id = $row_edit['p_cat_id'];
        $pcat_title = $row_edit['p_cat_title'];
        $pcat_desc = $row_edit['p_cat_desc'];
    }
?>


    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa-fa-dashboard"></i> Dashboard / Edit Product Categories
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa a-money fa-w"></i> Edit Product Categories
                    </h3>
                </div>
                
                <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Product Categories Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="p_cat_title" value="<?php echo $pcat_title; ?> ">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Product Categories Discription</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" rows="5" name="p_cat_desc" ><?php echo $pcat_desc; ?></textarea>
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

        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_desc = $_POST['p_cat_desc'];

       
        $update_p_cat = "update product_categories set p_cat_title='$p_cat_title', p_cat_desc='$p_cat_desc' where p_cat_id='$pcat_id'";

        $run_p_cat = mysqli_query($con,$update_p_cat);
        if($run_p_cat){
            echo "<script>alert('Product Categories has been Updated Successfully')</script>";
            echo "<script>window.open('index.php?view_product_cat','_self')</script>";
        }

    }

?>
<?php } ?>