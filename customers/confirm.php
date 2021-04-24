<?php
    session_start();
    if(!isset($_SESSION['customer_email'])){
        echo "<script>window.open('../checkout.php','_self')</script>";
    }else {

    include("includes/db.php");
    include("../functions/functions.php");

    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Service-site</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">

</head>
<body>
    <div id="top" ><!--  Top bar start -->
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                    <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo " Welcome Guest";
                        }else{
                            echo "Welcome: " .$_SESSION['customer_email']. "";
                        }

                    ?>
                </a>
                <a href="#">Shopping Cart Total Price: INR <?php totalPrice() ?>, Total Items <?php item(); ?></a>
            </div>

            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="customer_registration.php">Register</a>
                    </li>
                    <li>
                        <a href="my_account.php">My Account</a>
                    </li>
                    <li>
                        <a href="../cart.php">Goto Cart</a>
                    </li>
                    <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php'>Login</a>";
                            }else{
                                echo "<a href='logout.php'>Logout</a>";
                            }

                        ?>
                    </li>
                </ul>
            </div>
        
        </div>
    
    </div><!--  Top bar end -->

    <div class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand home">
                    <img src="../images/FaAz.jpeg" alt="FaAzMarK" class="hidden-xs img-responsive" width="100" height="100">
                    <img src="../images/FaAz.jpeg" alt="FaAzMarK" class="visible-xs img-responsive" width="100" height="100">
                </a>
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   <span calss="sr-only"></span>
                   <i class="fa fa-align-justify"></i>
                </button>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   <span calss="sr-only"></span>
                   <i class="fa fa-search"></i>
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li >
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="../shop.php">Shop</a>
                        </li>
                        <li class="active">
                            <a href="my_account.php">My Account</a>
                        </li>
                        <li>
                            <a href="../cart.php">Shopping</a>
                        </li>
                        <li>
                            <a href="../about.php">About</a>
                        </li>
                        <li>
                            <a href="../services.php">Services</a>
                        </li>
                        <li>
                            <a href="../contactus.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <a href="cart.php" class="btn btn-primary navbar-btn right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php item(); ?> Items In Cart</span>
                </a>

                <div class="navbar-collapse collapse right">
                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>
                <div class="collapse clearfix" id="search">
                    <form action="../result.php" class="navbar-form" method="get">
                        <div class="input-group">
                            <input type="text" name="user_query" placeholder="Search" class="form-control" required>   
                           <span class="input-group-btn"><button type="submit" value="Search" name="search" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button></span> 
                        </div>
                    </form>
                </div>

        </div>

    </div>
 <!--========================================== -->

<div id="content">
    <div class="container">
        <!--========================================== -->
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li>My Account</li>
            </ul>
        </div>

        <div class="col-md-3">
            <?php
                include("includes/sidebar.php");           
           ?>
        </div>
        <!--========================================== -->
        <div class="col-md-9">
            <div class="box">
                <h1 align="center"> Please confirm your payment</h1>
                <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Invoice Number</label>
                        <input type="text"  name="invoice_number" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="text"  name="amount" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Select Payment Mode</label>
                        <select name="payment_mode" id="" class="form-control">
                            <option value="">Bank Transfer</option>
                            <option value="Paypal">Paypal</option>
                            <option value="PayuMoney">PayuMoney</option>
                            <option value="PayTm">PayTm</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Transection Number</label>
                        <input type="text"  name="trfr_number" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Payment Date</label>
                        <input type="date"  name="date" class="form-control" required="">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="confirm_payment"  class="btn btn-primary btn-lg">
                            Confirm Payment
                        </button>
                    </div>
                    
                </form>

                <?php
                    if(isset($_POST['confirm_payment'])){
                        $update_id = $_GET['update_id'];
                        $invoice_number = $_POST['invoice_number'];
                        $amount = $_POST['amount'];
                        $trfr_number = $_POST['trfr_number'];
                        $date = $_POST['date'];
                        $payment_mode = $_POST['payment_mode'];
                        $complete = "Complete";

                        $insert = "insert into payments (invoice_no,amount,payment_mode,ref_no,payment_date) values('$invoice_number','$amount','$payment_mode','$trfr_number','$date')";

                        $run_insert = mysqli_query($con,$insert);

                        $update_q = "update customer_order set order_status ='$complete' where order_id='$update_id'";
                        $run_q = mysqli_query($con,$update_q);


                        echo "<script>alert('Your order has been received')</script>";
                        echo "<script>window.open('my_account.php?order','_self')</script>";

                    }


                ?>
            </div>
        </div>
    </div>
</div>

<!--========================================== -->

<?php
include("includes/footer.php");
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
</body>
</html>

<?php } ?>