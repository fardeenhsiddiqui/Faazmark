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
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
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
                        <li>
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
                    <span><?php item(); ?>  Items In Cart</span>
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
                <li>
                    Registration
                </li>
            </ul>
        </div>

        <div class="col-md-3">
            <?php
                include("includes/sidebar.php");           
           ?>
        </div>

        <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h2>Customer Registration</h2>
                    
                    </center>
                </div>

                <form action="customer_registration.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" name="c_name" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Customer Email</label>
                        <input type="email"  name="c_email" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Customer Password</label>
                        <input type="password"  name="c_pass" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text"  name="c_country" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text"  name="c_city" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="tel"  name="c_contact" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text"  name="c_address" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file"  name="c_image" required="" class="form-control">
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i>Register
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
        <!--========================================== -->







        <!--========================================== -->

<?php
include("includes/footer.php");
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
</body>
</html>

<?php
    if(isset($_POST['submit'])){

        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];
        $c_image = $_FILES['c_image']['name'];
        $c_tmp_image = $_FILES['c_image']['tmp_name'];
        $c_ip = getUserIP();

        move_uploaded_file($c_tmp_image,"customers/customer_images/$c_image");

        $c_insert = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";

        $c_run = mysqli_query($con,$c_insert);
        $sel_cart = "select * from cart where ip_add='$c_ip'";
        $run_cart = mysqli_query($con,$sel_cart);
        $check_cart = mysqli_num_rows($run_cart);
        if($check_cart){
            
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('You have been register successfully')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('You have been register successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }

    }
?>
