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
                Dashboard / View Categories    
            </li> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Categories
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Categories id</th>
                                <th>Categories Title</th>
                                <th>Categories Description</th>
                                <th>Categories Delete</th>
                                <th>Categories Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $get_cat = "select * from categories";
                                $run_cat = mysqli_query($con,$get_cat);
                                while($row = mysqli_fetch_array($run_cat)){

                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    $cat_desc = $row['cat_desc'];
                                    $i++;
                                
                            ?>
                
                            <tr>
                                <td><?php echo $i ?></td>
                                <td> <?php echo $cat_title; ?></td>
                                <td width="300"> <?php echo $cat_desc; ?></td>
                                
                                <td>
                                    <a href="index.php?d_cat=<?php echo $cat_id; ?>">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?e_cat=<?php echo $cat_id; ?>">
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