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
                Dashboard / View Payment
            </li> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Payment
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Payment No</th>
                                <th>Invoice No</th>
                                <th>Amount Paid</th>
                                <th>Payment Mode</th>
                                <th>Reference No.</th>
                                <th>Payment Date</th>
                                <th>Delete Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $get_p = "select * from payments";
                                $run_p = mysqli_query($con,$get_p);
                                while($row = mysqli_fetch_array($run_p)){

                                    $payment_id = $row['payment_id'];
                                    $invoice_no = $row['invoice_no'];
                                    $amount = $row['amount'];
                                    $payment_mode = $row['payment_mode'];
                                    $ref_no = $row['ref_no'];
                                    $payment_date = $row['payment_date'];
                                    $i++;
                                
                            ?>
                
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $invoice_no; ?></td>
                                <td> INR <?php echo $amount; ?></td>
                                <td> <?php echo $payment_mode; ?></td>
                                <td> <?php echo $ref_no; ?></td>
                                <td> <?php echo $payment_date; ?></td>
                                
                                <td>
                                    <a href="index.php?delete_payment=<?php echo $payment_id; ?>">
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