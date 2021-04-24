<?php
    $customer_email = $_SESSION['customer_email'];
    $get_customer = "select * from customers where customer_email='$customer_email'";
    $run_customer = mysqli_query($con,$get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
     
    $customer_id = $row_customer['customer_id'];
    $customer_name = $row_customer['customer_name'];
    $customer_country = $row_customer['customer_country'];
    $customer_city = $row_customer['customer_city'];
    $customer_contact = $row_customer['customer_contact'];
    $customer_address = $row_customer['customer_address'];
    $customer_img = $row_customer['customer_image'];


?>
<div class="box">
    <center>
        <h2>Edit Your Account</h2>
    </center>
            <form action="" method="post" class="form" enctype="multipart/form-data">
    
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" name="c_name" required="" class="form-control" value="<?php echo $customer_name; ?>">
                    </div>
                    <div class="form-group">
                        <label>Customer Email</label>
                        <input type="text"  name="c_email" required="" class="form-control" value="<?php echo $customer_email; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text"  name="c_country" required="" class="form-control" value="<?php echo $customer_country; ?>">
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text"  name="c_city" required="" class="form-control" value="<?php echo $customer_city; ?>">
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text"  name="c_number" required="" class="form-control" value="<?php echo $customer_contact; ?>">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text"  name="c_address" required="" class="form-control"
                        value="<?php echo $customer_address; ?>">
                    </div>
                    <div class="form-group">
                        <label>Customer Image</label>
                        <input type="file"  name="c_image"  class="form-control" required="">
                        <img src="customer_images/<?php echo $customer_img; ?>" class="img-responsive" height="80" width="100">
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" name="update" class="btn btn-primary">
                            Update Now
                        </button>
                    </div>
                </form>
              
</div>

<?php
    if(isset($_POST['update'])){

        $get_name = $_POST['c_name'];
        $get_email = $_POST['c_email'];
        $get_country = $_POST['c_country'];
        $get_city = $_POST['c_city'];
        $get_number = $_POST['c_number'];
        $get_address = $_POST['c_address'];
        $get_image = $_FILES['c_image']['name'];
        $get_image_tmp = $_FILES['c_image']['tmp_name'];

        move_uploaded_file($get_image_tmp,"customer_images/$get_image");

        $update_c = "update customers set customer_name='$get_name',customer_email='$get_email',customer_country='$get_country',customer_city='$get_city',customer_contact='$get_number',customer_address='$get_address',customer_image='$get_image' where customer_id='$customer_id'";

        $run_customer = mysqli_query($con,$update_c);
        if($run_customer){
            echo "<script>alert('Your details updated.')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
?>