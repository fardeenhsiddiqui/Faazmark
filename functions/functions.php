<?php 
  $con = mysqli_connect("localhost","root","","ecom");

  /*Connection of ip address  */

  function getUserIP() {  
      switch (true){
     
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];   
        
        //whether ip is from the share internet 
        case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];

        //whether ip is from the proxy  
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];   
        
        //whether ip is from the remote address   
        default : return $_SERVER['REMOTE_ADDR'];  
  
        }
    }  

    /*Carting section */
    function addCart(){
        global $con;
        if(isset($_GET['add_cart'])){
            $ip_add = getUserIP();
            $p_id = $_GET['add_cart'];
            $product_qty = $_POST['product_qty'];
            $product_size = $_POST['product_size'];
            $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
            $run_product = mysqli_query($con,$check_product);

            if(mysqli_num_rows($run_product)>0){
                echo "<script>alert('This Product is already added in cart')</script>";
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            }
            else{
                $query = "insert into cart (p_id,ip_add,qty,size) values('$p_id','$ip_add','$product_qty','$product_size')";
                $run_query = mysqli_query($con,$query);
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            }
        }
    }

    // item count for cart
    function item(){
        global $con;
        $ip_add = getUserIP();
        $get_items = "select * from cart where ip_add='$ip_add'";
        $run_item = mysqli_query($con,$get_items);
        $count = mysqli_num_rows($run_item);
        echo "$count";
    }

      // total price for cart
    function totalPrice(){
        global $con;
        $ip_add = getUserIP();
        $total = 0;
        $select_c = "select * from cart where ip_add='$ip_add'";
        $run_c = mysqli_query($con,$select_c);
        while($record=mysqli_fetch_array($run_c)){

            $pro_id = $record['p_id'];
            $pro_qty = $record['qty'];
            $get_price = "select * from products where product_id='$pro_id'";
            $run_price = mysqli_query($con,$get_price);
            while($row=mysqli_fetch_array($run_price)){

                $sub_total = $row['product_price']*$pro_qty;
                $total += $sub_total;
            }

        }
        echo $total;
        
    }

  /*For product category in Main side or index site */
  function getPro(){

    global $con;

    $get_product = "select * from products order by 1 DESC LIMIT 0,8";
    $run_product = mysqli_query($con,$get_product);
    while($row_product=mysqli_fetch_array($run_product)){

        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img1 = $row_product['product_img1'];

        echo "
                <div class='col-md-4 col-sm-6 single'>
                    <div class='product'>

                        <a href='details.php?pro_id=$pro_id'>
                            <img src='admin_area/product_images/$pro_img1' class='img-responsive image-resize'>
                            <div class='text'>
                                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                <p class='price'>INR $pro_price</p>
                                <p class='buttons'>
                                    <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                                    <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                        <i class='fa fa-shopping-cart'>Add to cart</i>
                                    </a>
                                </p>
                            </div>
                        </a>

                    </div>
                </div>
            ";
    }

  }



  /*For product category in shop site */
        function getPCats(){

            global $con;

            $get_p_cat = "select * from product_categories";
            $run_p_cat = mysqli_query($con,$get_p_cat);
            while($row_p_cat=mysqli_fetch_array($run_p_cat)){

                $p_cat_id = $row_p_cat['p_cat_id'];
                $p_cat_title = $row_p_cat['p_cat_title'];

                echo "<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
               
        
            } 
        }


    /*For  category in shop site */
        function getCats(){

            global $con;

            $get_cat = "select * from categories";
            $run_cat = mysqli_query($con,$get_cat);
            while($row_cat=mysqli_fetch_array($run_cat)){

                $cat_id = $row_cat['cat_id'];
                $cat_title = $row_cat['cat_title'];

                echo "<li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>";
            
        
            } 
        }


    /*For  get product categories product */
    function getpcatpro(){

        global $con;
        if(isset($_GET['p_cat'])){
            $p_cat_id=$_GET['p_cat'];
            $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
            $run_p_cat = mysqli_query($con,$get_p_cat);
            $row_p_cat = mysqli_fetch_array($run_p_cat);

                $p_cat_title = $row_p_cat['p_cat_title'];
                $p_cat_desc = $row_p_cat['p_cat_desc'];

            $get_product = "select * from products where p_cat_id='$p_cat_id'";
            $run_product = mysqli_query($con,$get_product);
            $count = mysqli_num_rows($run_product);

            if($count==0){
                echo "
                    <div class='box'>
                    <h1>No Product Found In This Product Category</h1>
                    </div>
                ";
            }else{
                echo "
                    <div class='box'>
                    <h1>$p_cat_title</h1>
                    <p>$p_cat_desc</p> 
                    </div> ";
            }

            while($row_product=mysqli_fetch_array($run_product)){

                $pro_id = $row_product['product_id'];
                $pro_title = $row_product['product_title'];
                $pro_price = $row_product['product_price'];
                $pro_img1 = $row_product['product_img1'];
            
                echo "
                    <div class='col-md-4 col-sm-6 single'>
                        <div class='product'>

                            <a href='details.php?pro_id=$pro_id'>
                                <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                                <div class='text'>
                                    <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                    <p class='price'>INR $pro_price</p>
                                    <p class='buttons'>
                                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                            <i class='fa fa-shopping-cart'>Add to cart</i>
                                        </a>
                                    </p>
                                </div>
                            </a>

                        </div>
                    </div>
                ";
           
           
            }
        
    
            
        }
    }



     /*For  get  categories */
     function getCatpro(){

        global $con;
        if(isset($_GET['cat'])){
            $cat_id=$_GET['cat'];
            $get_cat = "select * from categories where cat_id='$cat_id'";
            $run_cat = mysqli_query($con,$get_cat);
            $row_cat = mysqli_fetch_array($run_cat);

                $cat_title = $row_cat['cat_title'];
                $cat_desc = $row_cat['cat_desc'];

            $get_product = "select * from products where cat_id='$cat_id'";
            $run_product = mysqli_query($con,$get_product);
            $count = mysqli_num_rows($run_product);

            if($count==0){
                echo "
                    <div class='box'>
                    <h1>No Product Found In This Product Category</h1>
                    </div>
                ";
            }else{
                echo "
                    <div class='box'>
                    <h1>$cat_title</h1>
                    <p>$cat_desc</p> 
                    </div> ";
            }

            while($row_product=mysqli_fetch_array($run_product)){

                $pro_id = $row_product['product_id'];
                $pro_title = $row_product['product_title'];
                $pro_price = $row_product['product_price'];
                $pro_img1 = $row_product['product_img1'];
            
                echo "
                    <div class='col-md-4 col-sm-6 single'>
                        <div class='product'>

                            <a href='details.php?pro_id=$pro_id'>
                                <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                                <div class='text'>
                                    <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                    <p class='price'>INR $pro_price</p>
                                    <p class='buttons'>
                                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                            <i class='fa fa-shopping-cart'>Add to cart</i>
                                        </a>
                                    </p>
                                </div>
                            </a>

                        </div>
                    </div>
                ";
           
           
            }
        
    
            
        }
    }

?>