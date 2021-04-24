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
                Dashboard / View Product    
            </li> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Products Categories
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product Categories id</th>
                                <th>Product Categories Title</th>
                                <th>Product Categories Description</th>
                                <th>Product Categories Delete</th>
                                <th>Product Categories Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $get_p_cat = "select * from product_categories";
                                $run_p_cat = mysqli_query($con,$get_p_cat);
                                while($row = mysqli_fetch_array($run_p_cat)){

                                    $p_cat_id = $row['p_cat_id'];
                                    $p_cat_title = $row['p_cat_title'];
                                    $p_cat_desc = $row['p_cat_desc'];
                                    $i++;
                                
                            ?>
                
                            <tr>
                                <td><?php echo $i ?></td>
                                <td> <?php echo $p_cat_title; ?></td>
                                <td width="300"> <?php echo $p_cat_desc; ?></td>
                                
                                <td>
                                    <a href="index.php?d_p_cat=<?php echo $p_cat_id; ?>">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?e_p_cat=<?php echo $p_cat_id; ?>">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                </td>
                                
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php } ?>