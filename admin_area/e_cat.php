<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
<?php
    if(isset($_GET['e_cat'])){

        $edit_cat_id = $_GET['e_cat'];
        $get_cat = "select * from categories where cat_id='$edit_cat_id'";
        $run_cat_edit = mysqli_query($con,$get_cat);
        $row_edit = mysqli_fetch_array($run_cat_edit);

        $cat_id = $row_edit['cat_id'];
        $cat_title = $row_edit['cat_title'];
        $cat_desc = $row_edit['cat_desc'];
    }
?>


    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Categories
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-w"></i> Edit Categories
                    </h3>
                </div>
                
                <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Categories Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cat_title" value="<?php echo $cat_title; ?> ">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Categories Discription</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" rows="5" name="cat_desc" ><?php echo $cat_desc; ?></textarea>
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

        $cat_title = $_POST['cat_title'];
        $cat_desc = $_POST['cat_desc'];

       
        $update_cat = "update categories set cat_title='$cat_title', cat_desc='$cat_desc' where cat_id='$cat_id'";

        $run_cat = mysqli_query($con,$update_cat);
        if($run_cat){
            echo "<script>alert('Categories has been Updated Successfully')</script>";
            echo "<script>window.open('index.php?view_cat','_self')</script>";
        }

    }

?>
<?php } ?>