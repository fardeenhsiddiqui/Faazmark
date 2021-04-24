<?php
    session_start();
    include("includes/db.php");
    include("functions/functions.php");
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
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php'>My Account</a>";
                            }else{
                                echo "<a href='customers/my_account.php?my_order'>My Account</a>";
                            }
                        ?>
                    </li>
                    <li>
                        <a href="cart.php">Goto Cart</a>
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
                    <img src="images/FaAz.jpeg" alt="FaAzMarK" class="hidden-xs img-responsive" width="100" height="100">
                    <img src="images/FaAz.jpeg" alt="FaAzMarK" class="visible-xs img-responsive" width="100" height="100">
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
                            <a href="index.php">Home</a>
                        </li>
                        <li >
                            <a href="shop.php">Shop</a>
                        </li>
                        <li>
                            <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php'>My Account</a>";
                            }else{
                                echo "<a href='customers/my_account.php?my_order'>My Account</a>";
                            }
                            ?>
                        </li>
                        <li class="active">
                            <a href="cart.php">Shopping</a>
                        </li>
                        <li>
                            <a href="about.php">About</a>
                        </li>
                        <li>
                            <a href="services.php">Services</a>
                        </li>
                        <li>
                            <a href="contactus.php">Contact Us</a>
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
                    <form action="result.php" class="navbar-form" method="get">
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
                <li>Cart</li>
            </ul>
        </div>

        <div class="col-md-9" id="cart">
            <div class="box">
                <form action="cart.php" method="post" enctype="multipart-form-data">
                    <h1>Shopping Cart</h1>
                    <?php
                        $ip_add = getUserIP();
                        $select_c = "select * from cart where ip_add='$ip_add'";
                        $run_c = mysqli_query($con,$select_c);
                        $count = mysqli_num_rows($run_c);

                    
                    ?>
                    <p class="text-muted">Currently you have <?php echo $count; ?> item(s) in ypur cart</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Priced</th>
                                    <th>Size</th>
                                    <th colspan="1">Delete</th>
                                    <th colspan="1">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $total = 0;
                                    $sub_total = 0;
                                    while($row=mysqli_fetch_array($run_c)){
                                        $pro_id = $row['p_id'];
                                        $pro_qty = $row['qty'];
                                        $pro_size = $row['size'];
                                        $get_product = "select * from products where product_id='$pro_id'";
                                        $run_pro = mysqli_query($con,$get_product);
                                        while($row_p=mysqli_fetch_array($run_pro)){
                                            
                                            $p_title = $row_p['product_title'];
                                            $p_img1 = $row_p['product_img1'];
                                            $p_price = $row_p['product_price'];
                                            $sub_total = $row_p['product_price']*$pro_qty;
                                            $total = $total + $sub_total ;
                                     
                                ?>
                                <tr>
                                    <td><img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive"></td>
                                    <td><?php echo $p_title ?></td>
                                    <td><?php echo $pro_qty ?></td>
                                    <td>INR <?php echo $p_price ?></td>
                                    <td><?php echo $pro_size ?></td>
                                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
                                    <td>INR <?php echo $sub_total ?></td>
                                </tr>
                                    <?php  } } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <th colspan="2">INR <?php echo $total ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="index.php" class="btn btn-default">
                                <i class="fa fa-chevron-left"></i>Continue Shopping
                            </a>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-default" type="submit" name="update" value="Update Cart">
                                <i class="fa fa-refresh">Update Cart</i>
                            </button>
                            <a href="checkout.php" class="btn btn-primary">
                                Proceed to checkout <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <?php 
                function update_cart(){
                    global $con;
                    if(isset($_POST['update'])){
                        foreach ($_POST['remove'] as $remove_id){
                            $delete_product = "delete from cart where p_id='$remove_id'";
                            $run_del = mysqli_query($con,$delete_product);
                            if($run_del){
                                echo "<script>window.open('cart.php','_self')</script>";
                            }
                        }
                    }
                }
                echo @$up_cart = update_cart()
            ?>

            <div class="row same-height-row">
                <div class="col-md-3 col-sm-6">
                    <div class="box same-height headline">
                        <h3 class="text-center">You also Like Thes Products</h3>
                    </div>
                </div>
                <div class="center-responsivce col-md-3">
                    <div class="product same-height">
                        <a href="">
                            <img src="admin_area/product_images/tshirt1.jpeg" class="img-responsive">
                        </a>
                        <div class="text">
                            <h3><a href="details.php">Mardaz Park of 5 Multicolor Cottom v-neck</a></h3>
                            <p class="price">INR 299</p>
                        </div>
                    </div>
                </div>
                <div class="center-responsivce col-md-3">
                    <div class="product same-height">
                        <a href="">
                            <img src="admin_area/product_images/tshirt1.jpeg" class="img-responsive">
                        </a>
                        <div class="text">
                            <h3><a href="details.php">Mardaz Park of 5 Multicolor Cottom v-neck</a></h3>
                            <p class="price">INR 299</p>
                        </div>
                    </div>
                </div>
                <div class="center-responsivce col-md-3">
                    <div class="product same-height">
                        <a href="">
                            <img src="admin_area/product_images/tshirt1.jpeg" class="img-responsive">
                        </a>
                        <div class="text">
                            <h3><a href="details.php">Mardaz Park of 5 Multicolor Cottom v-neck</a></h3>
                            <p class="price">INR 299</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="box" id="order-summary">
                <div class="box-header">
                    <h3>Order Summary</h3>
                </div>
                <p class="text-muted">
                    Shipping and additional costs are calculated based on the values you have entered
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Order Subtotal</td>
                                <th>INR <?php echo $sub_total ?></th>
                            </tr>
                            <tr>
                                <td>Shipping and handling</td>
                                <td>INR 0</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>INR 0</td>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <th>INR <?php echo $total ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
