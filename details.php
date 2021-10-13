<?php
include 'header.php';
include 'functions/functions.php';

?>
<?php
if (isset($_GET['pro_id'])) {
    $con=mysqli_connect("localhost","root","","rs1");
    $product_id = $_GET['pro_id'];
    $get_product = "select * from products where product_id='$product_id'";
    $run_product = mysqli_query($con,$get_product);
    $row_product = mysqli_fetch_array($run_product);
    $prod_cate_id = $row_product['prod_cate_id'];
    $uname= $row_product['uname'];
    $bname = $row_product['bname'];
    $aname = $row_product['aname'];
    $pname = $row_product['pname'];
    $price = $row_product['price'];
    $des = $row_product['des'];
    $cond = $row_product['cond'];
    $image = $row_product['img'];
    $get_prod_cate = "select * from product_categories where prod_cate_id='$prod_cate_id'";
    $run_prod_cate = mysqli_query($con,$get_prod_cate);    
    $row_prod_cate = mysqli_fetch_array($run_prod_cate);
    $prod_cate_title = $row_prod_cate['prod_cate_title'];
    $prod_cate = $row_prod_cate['prod_cate_id'];
    $conn=mysqli_connect("localhost","root","","rs1");
    $get_user = "select * from user_login where username='$uname'";
    $run_user = mysqli_query($conn,$get_user);
    $row_user =mysqli_fetch_assoc($run_user);
    $name = $row_user['name'];
    $city = $row_user['city'];
    $email = $row_user['email'];

}
?>
<div class="container" style="margin-top: 200px">
    <div class="rows">
        <div class="col-lg-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item"><a href="shop.php">Buy Books</a></li>
              <li class="breadcrumb-item"><a href='shop.php?prod_cate=<?php echo "$prod_cate" ?>'><?php echo $prod_cate_title ?></a></li>
              <li aria-current="page" class="breadcrumb-item active"><?php echo $bname ?></li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-11 card" style="height:70px; margin-left: 42px">
             <h4 class="text-center" style="margin-top: 20px"><?php echo $bname ?></h4>    
        </div>
        <div class="col-lg-12">
            <div class="row" style="margin-left: 20px">
                <div class="col-sm-4 card det">
                    <div>
                        <img src= <?php echo "book_img/$image" ?> width='300' height='300'>
                    </div>
                </div>
                <div class="col-sm-5 card det" >
                    <div> 
                        <p class="lead"><b>Product Details :-</b></p>
                        <hr class="sty">
                    </div>
                    <div>
                        <table  cellspacing="10" cellpadding="10">
                            <tr>
                                <td class="text-muted" width="100px">Book Name</td>
                                <td class="text-muted" width="40px">:</td>
                                <td><?php echo $bname ?></td>
                            </tr>
                            <tr >
                                <td class="text-muted" width="100px">Author</td>
                                <td class="text-muted" width="40px">:</td>
                                <td><?php echo $aname ?></td>
                            </tr>
                             <tr >
                                <td class="text-muted" width="100px">Publisher</td>
                                <td class="text-muted" width="40px">:</td>
                                <td><?php echo $pname ?></td>
                            </tr>
                             <tr >
                                <td class="text-muted" width="100px">Category</td>
                                <td class="text-muted" width="40px">:</td>
                                <td><?php echo $prod_cate_title ?></td>
                            </tr>
                             <tr >
                                <td class="text-muted" width="100px">Condition</td>
                                <td class="text-muted" width="40px">:</td>
                                <td><?php echo $cond ?></td>
                            </tr>
                             <tr >
                                <td class="text-muted" width="100px">MRP</td>
                                <td class="text-muted" width="40px">:</td>
                                <td>
                                <?php 
                                if ($price!=='Free') {
                                    echo "Rs.".$price;
                                }
                                else
                                {
                                    echo $price;
                                }
                                ?>
                                    
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-sm-2 card det">
                    <?php add_cart_d(); ?>
                    <?php 

                        if (isset($_SESSION['user'])) {

                     ?>
                    <div style="margin-bottom: 20px;"><a  class="btn-primary btn" href='profile.php?pro=uchat&prod=<?php echo "$product_id" ?>'>Chat&nbsp;<i class="fas fa-comments"></i></a></div>
                    <?php }
                    else
                    {
                    ?>
                    <div style="margin-bottom: 20px;" ><a class="btn-primary btn" href='login.php'>Login For Chat</a></div>
                    <?php

                    } 
                    ?>
                     <?php 

                        if (isset($_SESSION['user'])) {

                     ?>
                    <div><a class="btn btn-primary" style="color: black;" href='details.php?pro_id=<?php echo "$product_id" ?>&add_cart=<?php echo "$product_id" ?>'>Add to Wishlist<i class="fas fa-shopping-cart"></i></a></div>
                    <?php }
                    else
                    {
                    ?>
                    <div ><a class="btn btn-primary" style="color: black;" href='details.php?pro_id=<?php echo "$product_id" ?>&add_cart=<?php echo "$product_id" ?>'>Add to Wishlist<i class="fas fa-shopping-cart"></i></a></div>

                    <?php

                    } 
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5 card" style=" height: 220px; margin-left: 80px; padding-top: 20px; margin-top: 5px; padding-left: 20px">
                    <div> 
                        <p class="lead text-muted"><b>Book Description :-</b></p>
                        <hr class="sty">
                    </div>
                    <p><?php echo $des ?></p>
                </div>
                <div class="col-sm-5 card" style="padding-top: 20px; padding-left: 20px; margin-top: 5px;">
                    <div> 
                        <p class="lead text-muted"><b>Contact Details :-</b></p>
                        <hr class="sty">
                    </div>
                    <table>
                        <tr>
                            <td class="text-muted" width="100px">Seller Name</td>
                            <td class="text-muted" width="40px">:</td>
                            <td><?php echo $name ?></td>
                        </tr>
                    </table>
                    <hr>
                    <table>
                        <tr>
                            <td class="text-muted" width="100px">City</td>
                            <td class="text-muted" width="40px">:</td>
                            <td><?php echo $city ?></td>
                        </tr>
                    </table>
                    <hr>
                    <table>
                        <tr>
                            <td class="text-muted" width="100px">E-mail</td>
                            <td class="text-muted" width="40px">:</td>
                            <td>
                                <?php
                                if ($email==Null) {
                                    echo "N/A";
                                }
                                else{
                                    echo $email;    
                                } 
                                 
                                ?>
                                    
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 card" style="margin-left: 80px; padding-top: 20px; margin-top: 5px">
                    <h3 class="text-center">Books You Maybe Like</h3>
                </div>
            </div>

                    <div id="content">
                    <div class="container" style="margin-top: 10px">
                        <div class="product-slider owl-carousel owl-theme">
                    <?php
                    if (isset($_SESSION['user'])) {
                        
                        $user=$_SESSION['user'];
                        $product_id=$_GET['pro_id'];
                        $con=mysqli_connect("localhost","root","","rs1");
                        $get_products = "select * from products where uname != '$user' and product_id != '$product_id' order by rand() LIMIT 0,5";
                        $run_products = mysqli_query($con,$get_products);
                        while($row_products=mysqli_fetch_array($run_products)){
                            $pro_id = $row_products['product_id'];
                            $bname = $row_products['bname'];
                            $image = $row_products['img'];
                            $price = $row_products['price'];
                        ?>
                    <div class='item' style="margin-right: 5px;">
                <div class='product'>
                            <div class='w3-hover-opacity w3-display-container'>
                              <a href='details.php?pro_id=<?php echo "$pro_id" ?>'><img src= <?php echo "book_img/$image" ?> width='252' height='200'></a>
                              <div class='w3-display-middle w3-display-hover w3-xlarge'>
                                <button class='w3-button w3-black' ><a href='profile.php?pro=uchat&prod=<?php echo "$pro_id" ?>'>Chat</a></button>
                              </div>
                            </div>
                            <div class='text text-center'>
                              <h3><a href='details.php?pro_id=<?php echo "$pro_id" ?>'><?php echo $bname ?> </a></h3>
                             <?php
                              if ($price=='Free') {
                                echo "<p class='price'>$price</p>";  
                              }
                              else
                              {
                                echo "<p class='price'>Rs.$price</p>";
                              }
                              ?>
                              <p class='buttons'>
                                <a class='btn btn-default' href='details.php?pro_id=<?php echo "$pro_id" ?>'>View Details</a>
                                <a class='btn btn-primary' href='details.php?pro_id=<?php echo "$pro_id" ?>&add_cart=<?php echo "$pro_id" ?>'><i class='fa fa-shopping-cart'></i>Add To Cart</a>
                              </p>
                            </div>
                          </div>
                </div>
                        <?php
                    }
                }
                else
                {
                    $product_id=$_GET['pro_id'];
                   $con=mysqli_connect("localhost","root","","rs1");
                        $get_products = "select * from products where product_id != '$product_id' order by rand() LIMIT 0,5";
                        $run_products = mysqli_query($con,$get_products);
                        while($row_products=mysqli_fetch_array($run_products)){
                            $pro_id = $row_products['product_id'];
                            $bname = $row_products['bname'];
                            $image = $row_products['img'];
                            $price = $row_products['price'];
                        ?>
                    <div class='item' style="margin-right: 5px;">
                <div class='product'>
                            <div class='w3-hover-opacity w3-display-container'>
                              <a href='details.php?pro_id=<?php echo "$pro_id" ?>'><img src= <?php echo "book_img/$image" ?> width='252' height='200'></a>
                              <div class='w3-display-middle w3-display-hover w3-xlarge'>
                                <button class='w3-button w3-black' ><a href='profile.php?pro=uchat&prod=<?php echo "$pro_id" ?>'>Chat</a></button>
                              </div>
                            </div>
                            <div class='text text-center'>
                              <h3><a href='details.php?pro_id=<?php echo "$pro_id" ?>'><?php echo $bname ?> </a></h3>
                             <?php
                              if ($price=='Free') {
                                echo "<p class='price'>$price</p>";  
                              }
                              else
                              {
                                echo "<p class='price'>Rs.$price</p>";
                              }
                              ?>
                              <p class='buttons'>
                                <a class='btn btn-default' href='details.php?pro_id=<?php echo "$pro_id" ?>'>View Details</a>
                                <a class='btn btn-primary' href='details.php?pro_id=<?php echo "$pro_id" ?>&add_cart=<?php echo "$pro_id" ?>'><i class='fa fa-shopping-cart'></i>Add To Wishlist</a>
                              </p>
                            </div>
                          </div>
                </div>
                <?php      
                }
            }
                ?>
          
            </div>
        </div>
        </div>                         
    </div>
</div>
</div>

      
<?php
include 'footer.php';
?>
