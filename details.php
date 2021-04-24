<?php
    session_start();
    include("includes/db.php");
    include("functions/functions.php");
?>
<?php
    if(isset($_GET['pro_id'])){
        $pro_id = $_GET['pro_id'];
        $get_product = "select * from products where product_id='$pro_id'";
        $run_product = mysqli_query($con,$get_product);
        $row_product = mysqli_fetch_array($run_product);

        $product_id = $row_product['p_cat_id'];
        $p_title = $row_product['product_title'];
        $p_price = $row_product['product_price'];
        $p_desc = $row_product['product_desc'];
        $p_img1 = $row_product['product_img1'];
        $p_img2 = $row_product['product_img2'];
        $p_img3 = $row_product['product_img3'];
        $p_keyword = $row_product['product_keyword'];

        $get_p_cat = "select * from product_categories where p_cat_id='$product_id'";
        $run_p_cat = mysqli_query($con,$get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_id = $row_p_cat['p_cat_id'];
        $p_cat_title = $row_p_cat['p_cat_title'];
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
                            <a href="cart.php">Shoping</a>
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
                <li>Shop</li>
                <li><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_title ?></a>
                </li>
            </ul>
        </div>

        <div class="col-md-3">
            <?php
                include("includes/sidebar.php");           
           ?>
        </div>

        <div class="col-md-9">
            <div class="row" id="productmain">
                <div class="col-sm-6">
                    <div id="mainimage">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                             
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active"><center>
                                <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive">
                                </center>
                                </div>

                                <div class="item"><center>
                                <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive">
                                </center>
                                </div>

                                <div class="item"><center>
                                <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive">
                                </center>
                                </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="box">
                        <h1 class="text-center">
                            <?php echo $p_title ?>
                        </h1>
                        <?php 
                            addCart();
                        ?>
                        <form action="details.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="col-md-5 control-label">Product Quantity</label>
                                <div class="col-md-7">
                                    <select name="product_qty" class="form-control" id="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-5 control-label">Product Size</label>
                                <div class="col-md-7">
                                    <select name="product_size" class="form-control" id="">
                                        <option value="">Select a size</option>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="Extra Large">Extra Large</option>
                                    </select>
                                </div>
                            </div>
                            <p class="price"> INR <?php echo $p_price ?></p>
                            <p class="text-center buttons">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-shopping-cart"></i>Add to cart
                                </button>
                            </p>
                        </form>
                    </div><!--===================  box  ================= -->

                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div><!--===================  row  ================= -->

            <div class="box" id="details">
                <h4>Product Details</h4>
                <p><?php echo $p_desc ?></p>
                <h4>Size</h4>
                <ul>
                    <li>Small</li>
                    <li>Medium</li>
                    <li>Large</li>
                    <li>Extra Large</li>
                </ul>
            </div>

            <div class="row same-height-row">
                <div class="col-md-12 col-sm-12">
                    <div class="box same-height headline">
                        <h3 class="text-center">You also Like Thes Products</h3>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                <?php
                   $get_product = "select * from products where product_keyword like '%$p_keyword%' order by 1 LIMIT 0,3";
                   $run_product = mysqli_query($con,$get_product);
                   while($row=mysqli_fetch_array($run_product)){
                       $pro_id = $row['product_id'];
                       $product_title = $row['product_title'];
                       $product_price = $row['product_price'];
                       $product_img1 = $row['product_img1'];
                         
                       echo "
                            <div class='col-md-3 col-sm-3 single'>
                                <div class='center-responsivce'>
                                    <div class='product same-height'>
                                        <a href='details.php?pro_id=$pro_id'>
                                            <img src='admin_area/product_images/$product_img1' class='img-responsive'>
                                        </a>
                                        <div class='text'>
                                            <h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
                                            <p class='price'>INR $product_price</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       ";
                   }
                ?>
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