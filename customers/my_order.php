<div class="box">
    <center>
        <h1>
            My Order
        </h1>
        <p>If you feel any question please free to <a href="../contactus.php">Contact us</a> our customer are available 24/7. 
        </p>
    </center>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Due Amount</th>
                    <th>Invoice Number</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Order Date</th>
                    <th>Paid/Unpaid</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $customer_session = $_SESSION['customer_email'];
                    $get_customer = "select * from customers where customer_email='$customer_session'";
                    $run_customer = mysqli_query($con,$get_customer);
                    $row_customer = mysqli_fetch_array($run_customer);
                    $customer_id = $row_customer['customer_id'];
                    $get_order = "select * from customer_order where customer_id='$customer_id'";
                    $run_order = mysqli_query($con,$get_order);
                    $i = 0;
                    while($row_order=mysqli_fetch_array($run_order)){

                        $order_id = $row_order['order_id'];
                        $order_due_amount = $row_order['due_amount'];
                        $order_invoice = $row_order['invoice_no'];
                        $order_qty = $row_order['qty'];
                        $order_size = $row_order['size'];
                        $order_date = substr($row_order['order_date'], 0,11);
                        $order_status = $row_order['order_status'];
                        $i++;
                        if($order_status=='pending'){
                            $order_status = "Unpaid";
                        }else{
                            $order_status = "Paid";
                        }
                    
                ?>


                <tr>
                    <th><?php echo $i; ?></th>
                    <th>INR <?php echo $order_due_amount; ?></th>
                    <th><?php echo $order_invoice; ?></th>
                    <th><?php echo $order_qty; ?></th>
                    <th><?php echo $order_size; ?></th>
                    <th><?php echo $order_date; ?></th>
                    <th><?php echo $order_status; ?></th>
                    <th><a href="confirm.php?order_id=<?php echo $order_id ?>" target="_blank" class="btn btn-primary btn-sm">Confirm If Paid</a></th>
                </tr>
                    <?php } ?>
            </tbody>

        </table>
    </div>
</div>