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
                        <li class="active">
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
                <li><a href="index.php">Home</a></li>
                <li>
                    Contact Us
                </li>
            </ul>
        </div>
        
        <div class="col-md-3">
            <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                    <h3panel-title>
                        TYPES OF ISSUES
                    </h3panel-title>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked category-menu">
                        <li><a href="#"> Help with your issues</a></li>
                        <li><a href="#">Help with your order</a></li>
                        <li><a href="#">Help with other issues</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
            if(!isset($_SESSION['customer_email'])){
                ?>
        <div class="col-md-9">
            <div class="box">
                <h2 class="text-muted">Help Center</h2>
                <div>
                <center>
                    <img src="https://img1a.flixcart.com/www/linchpin/fk-cp-zion/img/help-centre-login_c08f8f.png" class="img-responsive" width="180" height="180">
                    <br>
                    <h3>Login to get help with your recent issues</h3>
                    <br>
                    <a href="checkout.php">
                        <button class="btn btn-primary" type="button">Log In</button>
                    </a>
                </center>
                <br><br>
                </div>
            </div>
        </div>

        <?php
            }else{
        ?>

        <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h2>Contact Us</h2>
                        <p class="text-muted">If you have any question, Please fell free to contact us, our customer service center is working for you 24/7.</p>
                    </center>
                </div>

                <form action="contactus.php" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text"  name="email" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text"  name="subject" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Massage</label>
                        <textarea name="massage" id="" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i>Send Massage
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <?php } ?>

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
        $senderName = mysqli_real_escape_string($con,$_POST['name']);
        $senderEmail = mysqli_real_escape_string($con,$_POST['email']);
        $senderSubject = mysqli_real_escape_string($con,$_POST['subject']);
        $senderMassage = mysqli_real_escape_string($con,$_POST['massage']);

        $get_insert = "insert into contact_us (c_name,c_email,c_subject,c_massage) values('$senderName','$senderEmail','$senderSubject','$senderMassage')";
        $run = mysqli_query($con,$get_insert);
        $html=  "<table>
                    <tr>
                        <td>Name</td>
                        <td>$senderName</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>$senderEmail</td>
                    </tr>
                    <tr>
                        <td>Subject </td>
                        <td>$senderSubject</td>
                    </tr>
                    <tr>
                        <td>Massage</td>
                        <td>$senderMassage</td>
                    </tr>
                </table>";

        include('smtp/PHPMailerAutoload.php');
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host="smtp.gmail.com";
        $mail->Port=587;
        $mail->SMTPSecure="tls";
        $mail->SMTPAuth=true;
        $mail->Username="echofhs123@gmail.com";
        $mail->Password="echo#786";
        $mail->SetFrom("echofhs123@gmail.com");
        $mail->addAddress("fardeenhassan98@gmail.com");
        $mail->isHTML(true);
        $mail->Subject="New Contact Us";
        $mail->Body="$html";
        $mail->SMTPOptions=array('ss1'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_siged'=>false
        ));
        if($mail->send()){
            $html= "<table>
                    <tr>
                        <td>Hlo,$senderName</td>
                    </tr>
                    <tr>
                        <td>Thanks for feedback Sir</td>
                    </tr>
                    </table>";
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host="smtp.gmail.com";
            $mail->Port=587;
            $mail->SMTPSecure="tls";
            $mail->SMTPAuth=true;
            $mail->Username="echofhs123@gmail.com";
            $mail->Password="echo#786";
            $mail->SetFrom("echofhs123@gmail.com");
            $mail->addAddress($senderEmail);
            $mail->isHTML(true);
            $mail->Subject="FaAzMarK Online Shoping";
            $mail->Body="$html";
            $mail->SMTPOptions=array('ss1'=>array(
                'verify_peer'=>false,
                'verify_peer_name'=>false,
                'allow_self_siged'=>false
            ));
            $mail->send();
            echo "<script>alert('Your mail sent Thanks for this feedback')</script>";
        }else{
            echo "<script>alert('Your mail not sent some issues that time please try again after some time')</script>";
        }


    }
    
?>
<!-- $receiverEmail = "fardeenhsiddiqui98@gmail.com";
        mail($receiverEmail,$senderName,$senderSubject,$senderMassage,$senderEmail);
        
        //Customer mail
        $email = $_POST['email'];
        $subject = "Welcome to our website";
        $msg = "I shall get you soon, thanks for sending email";
        $from = "fardeenhsiddiqui98@gmail.com";
        mail($email,$subject,$msg,$from); -->