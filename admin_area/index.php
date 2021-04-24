<?php
session_start();
include ("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
<?php 
    $admin_session = $_SESSION['admin_email'];
    $get_admin = "select * from admins where admin_email='$admin_session'";
    $run_admin = mysqli_query($con,$get_admin);
    $row_admin = mysqli_fetch_array($run_admin);
    $admin_id = $row_admin['admin_id'];
    $admin_name = $row_admin['admin_name'];
    $admin_email = $row_admin['admin_email'];
    $admin_image = $row_admin['admin_image'];
    $admin_country = $row_admin['admin_country'];
    $admin_job = $row_admin['admin_job'];
    $admin_contact = $row_admin['admin_contact'];
    $admin_about = $row_admin['admin_about'];

    $get_pro = "select * from products";
    $run_pro = mysqli_query($con,$get_pro);
    $count_pro = mysqli_num_rows($run_pro);

    $get_cust = "select * from customers";
    $run_cust = mysqli_query($con,$get_cust);
    $count_cust = mysqli_num_rows($run_cust);

    $get_p_cat = "select * from product_categories";
    $run_p_cat = mysqli_query($con,$get_p_cat);
    $count_p_cat = mysqli_num_rows($run_p_cat);

    $get_order = "select * from customer_order";
    $run_order = mysqli_query($con,$get_order);
    $count_order = mysqli_num_rows($run_order);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div id="wrapper row">
        <div class="col-lg-2 col-md-2">
            <?php include 'includes/sidebar.php'; ?>
        </div>
        <div class="col-lg-10 col-md-10">
            <div id="page-wrapper" >
                <div class="container-fluid">
                    <?php 
                        if(isset($_GET['dashboard'])){
                            include 'dashboard.php';
                        }
                        if(isset($_GET['insert_product'])){
                            include 'insert_product.php';
                        }
                        if(isset($_GET['view_product'])){
                            include 'view_product.php';
                        }
                        if(isset($_GET['delete_product'])){
                            include 'delete_product.php';
                        }
                        if(isset($_GET['edit_product'])){
                            include 'edit_product.php';
                        }
                        if(isset($_GET['insert_product_cat'])){
                            include 'insert_product_cat.php';
                        }
                        if(isset($_GET['view_product_cat'])){
                            include 'view_product_cat.php';
                        }
                        if(isset($_GET['d_p_cat'])){
                            include 'd_p_cat.php';
                        }
                        if(isset($_GET['e_p_cat'])){
                            include 'e_p_cat.php';
                        }

                        if(isset($_GET['insert_cat'])){
                            include 'insert_cat.php';
                        }
                        if(isset($_GET['view_cat'])){
                            include 'view_cat.php';
                        }
                        if(isset($_GET['d_cat'])){
                            include 'd_cat.php';
                        }
                        if(isset($_GET['e_cat'])){
                            include 'e_cat.php';
                        }
                        if(isset($_GET['i_s'])){
                            include 'i_s.php';
                        }
                        if(isset($_GET['v_s'])){
                            include 'v_s.php';
                        }
                        if(isset($_GET['d_s'])){
                            include 'd_s.php';
                        }
                        if(isset($_GET['e_s'])){
                            include 'e_s.php';
                        }
                        if(isset($_GET['view_customer'])){
                            include 'view_customer.php';
                        }
                        if(isset($_GET['delete_customer'])){
                            include 'delete_customer.php';
                        }
                        if(isset($_GET['view_order'])){
                            include 'view_order.php';
                        }
                        if(isset($_GET['delete_order'])){
                            include 'delete_order.php';
                        }
                        if(isset($_GET['view_payment'])){
                            include 'view_payment.php';
                        }
                        if(isset($_GET['delete_payment'])){
                            include 'delete_payment.php';
                        }
                        if(isset($_GET['insert_user'])){
                            include 'insert_user.php';
                        }
                        if(isset($_GET['view_user'])){
                            include 'view_user.php';
                        }
                        if(isset($_GET['delete_user'])){
                            include 'delete_user.php';
                        }
                        if(isset($_GET['edit_profile'])){
                            include 'edit_profile.php';
                        }
                    ?>
                </div> 
            </div>
        </div>
    </div>

<!-- i_s means insert slide -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
</body>
</html>

                <?php } ?>