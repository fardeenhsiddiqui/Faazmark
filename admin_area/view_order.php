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
                Dashboard / View Order 
            </li> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Order
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Customer Email</th>
                                <th>Product Title</th>
                                <th>Total Amount</th>
                                <th>Invoice Number</th>
                                <th>Product Qty</th>
                                <th>Product Size</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                                <th>Delete Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $get_order = "select * from customer_order";
                                $run_order = mysqli_query($con,$get_order);
                                while($row = mysqli_fetch_array($run_order)){

                                    $order_id = $row['order_id'];
                                    $customer_id = $row['customer_id'];
                                    $product_id = $row['product_id'];
                                    $due_amount = $row['due_amount'];
                                    $invoice_no = $row['invoice_no'];
                                    $qty = $row['qty'];
                                    $size = $row['size'];
                                    $order_date = $row['order_date'];
                                    $order_status = $row['order_status'];
                                    $i++;
                                
                            ?>
                
                            <tr>
                                <td><?php echo $i ?></td>
                                <td> 
                                    <?php 
                                        $get_em = "select * from customers where customer_id='$customer_id'";
                                        $run_em = mysqli_query($con,$get_em);
                                        $f_email = mysqli_fetch_array($run_em);
                                        $email = $f_email['customer_email'];
                                        echo $email;
                                    
                                    ?>
                                </td>
                                <td>
                                    <?php  
                                        $get_t = "select * from products where product_id='$product_id'";
                                        $run_t = mysqli_query($con,$get_t);
                                        $f_title = mysqli_fetch_array($run_t);
                                        $title = $f_title['product_title'];
                                        echo $title;
                                    ?>
                                 </td>
                                <td> INR <?php echo $due_amount; ?></td>
                                <td> <?php echo $invoice_no; ?></td>
                                <td> <?php echo $qty; ?></td>
                                <td> <?php echo $size; ?></td>
                                <td> <?php echo $order_date; ?></td>
                                <td> <?php echo $order_status; ?></td>
                                
                                <td>
                                    <a href="index.php?delete_order=<?php echo $order_id; ?>">
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