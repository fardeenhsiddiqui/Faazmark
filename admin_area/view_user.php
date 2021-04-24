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
                Dashboard / View User 
            </li> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View User
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>User No</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Image</th>
                                <th>User Country</th>
                                <th>User Phone Number</th>
                                <th>User Job</th>
                                <th>User About</th>
                                <th>Customer Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $get_u = "select * from admins";
                                $run_u = mysqli_query($con,$get_u);
                                while($row = mysqli_fetch_array($run_u)){

                                    $admin_id = $row['admin_id'];
                                    $admin_name = $row['admin_name'];
                                    $admin_email = $row['admin_email'];
                                    $admin_image = $row['admin_image'];
                                    $admin_country = $row['admin_country'];
                                    $admin_contact = $row['admin_contact'];
                                    $admin_job = $row['admin_job'];
                                    $admin_about = $row['admin_about'];
                                    $i++;
                                
                            ?>
                
                            <tr>
                                <td><?php echo $i ?></td>
                                <td> <?php echo $admin_name;?></td>
                                <td> <?php echo $admin_email; ?></td>
                                <td> <img src="admin_images/<?php echo $admin_image; ?>" alt="wait" class="img-responsive"></td>

                                <td> <?php echo $admin_country; ?></td>
                                <td> <?php echo $admin_contact; ?></td>
                                <td> <?php echo $admin_job; ?></td>
                                <td> <?php echo $admin_about; ?></td>
                                
                                <td>
                                    <a href="index.php?delete_user=<?php echo $admin_id; ?>">
                                        <i class="fa fa-trash-o"></i> Delete
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