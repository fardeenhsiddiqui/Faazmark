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
                Dashboard / View Customer 
            </li> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Customers
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Customer No</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Image</th>
                                <th>Customer Country</th>
                                <th>Customer City</th>
                                <th>Customer Phone Number</th>
                                <th>Customer Address</th>
                                <th>Customer Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $get_cust = "select * from customers";
                                $run_cust = mysqli_query($con,$get_cust);
                                while($row = mysqli_fetch_array($run_cust)){

                                    $customer_id = $row['customer_id'];
                                    $customer_name = $row['customer_name'];
                                    $customer_email = $row['customer_email'];
                                    $customer_image = $row['customer_image'];
                                    $customer_country = $row['customer_country'];
                                    $customer_city = $row['customer_city'];
                                    $customer_contact = $row['customer_contact'];
                                    $customer_address = $row['customer_address'];
                                    $i++;
                                
                            ?>
                
                            <tr>
                                <td><?php echo $i ?></td>
                                <td> <?php echo $customer_name;?></td>
                                <td> <?php echo $customer_email; ?></td>
                                <td> <img src="../customers/customer_images/<?php echo $customer_image; ?>"          alt="wait" class="img-responsive"></td>

                                <td> <?php echo $customer_country; ?></td>
                                <td> <?php echo $customer_city; ?></td>
                                <td> <?php echo $customer_contact; ?></td>
                                <td> <?php echo $customer_address; ?></td>
                                
                                <td>
                                    <a href="index.php?delete_customer=<?php echo $customer_id; ?>">
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