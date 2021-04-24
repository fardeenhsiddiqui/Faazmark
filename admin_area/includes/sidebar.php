<?php
     if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background:black">
    <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-exl-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        
        </button>
        <a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo $admin_name ?>
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile=<?php echo $admin_id?>">
                        <i class="fa fa-fw-user"></i> Profile
                    </a>
                </li>
                <li>
                    <a href="index.php?view_product">
                        <i class="fa fa-fw-envelope"></i> Products
                        <span class="badge"><?php echo $count_pro ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customer">
                        <i class="fa fa-fw-users"></i> Customers
                        <span class="badge"><?php echo $count_cust ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_product_cat">
                        <i class="fa fa-fw-gear"></i> Product Categories
                        <span class="badge"><?php echo $count_p_cat ?></span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">Logout
                        <i class="fa fa-fw fa-power-off"></i> 
                    </a>
                </li>

            </ul>
        </li>
    </ul>

    <div class="collapse navbar-collapse navbar-exl-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i> Dashboard
                </a>
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                    <i class="fa fa-fw fa-table"></i>Products </a>
                    <i class="fa fa-fw fa-caret-down"></i>
            
                <ul class="collapse" id="products">
                    <li>
                        <a href="index.php?insert_product">Insert Product</a>
                    </li>
                    <li>
                        <a href="index.php?view_product">View Product</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#product_cat">
                    <i class="fa fa-fw fa-table"></i>Product Catogery</a>
                    <i class="fa fa-fw fa-caret-down"></i>
            
                <ul class="collapse" id="product_cat">
                    <li>
                        <a href="index.php?insert_product_cat">Insert Product Catogeries</a>
                    </li>
                    <li>
                        <a href="index.php?view_product_cat">View Product Catogeries</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#categories">
                    <i class="fa fa-fw fa-table"></i>Catogeries </a>
                    <i class="fa fa-fw fa-caret-down"></i>
            
                <ul class="collapse" id="categories">
                    <li>
                        <a href="index.php?insert_cat">Insert Catogeries </a>
                    </li>
                    <li>
                        <a href="index.php?view_cat">View Catogeries </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#slider">
                    <i class="fa fa-fw fa-table"></i>Slider </a>
                    <i class="fa fa-fw fa-caret-down"></i>
            
                <ul class="collapse" id="slider">
                    <li>
                        <a href="index.php?i_s">Insert Slider</a>
                    </li>
                    <li>
                        <a href="index.php?v_s">View Slider</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="index.php?view_customer">
                    <i class="fa fa-fw fa-edit"></i>View Customer
                </a>
            </li>
            <li>
                <a href="index.php?view_order">
                    <i class="fa fa-fw fa-list"></i>View Order
                </a>
            </li>
            <li>
                <a href="index.php?view_payment">
                    <i class="fa fa-fw fa-pencil"></i>View Payment
                </a>
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#users">
                    <i class="fa fa-fw fa-table"></i>Users </a>
                    <i class="fa fa-fw fa-caret-down"></i>
            
                <ul class="collapse" id="users">
                    <li>
                        <a href="index.php?insert_user">Insert User</a>
                    </li>
                    <li>
                        <a href="index.php?view_user">View User</a>
                    </li>
                    <li>
                        <a href="index.php?edit_profile=<?php echo $admin_id ?>">Edit Profile</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    
</nav>
    <?php } ?>