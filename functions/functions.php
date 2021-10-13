<?php

$db = mysqli_connect("localhost","root","","rs1");


function getPCats()
{
    global $db;
    $get_prod_cate = "select * from product_categories";
    $run_prod_cate = mysqli_query($db,$get_prod_cate);

    while($row_prod_cate=mysqli_fetch_array($run_prod_cate))
    {
        $prod_cate_id = $row_prod_cate['prod_cate_id'];
        $prod_cate_title = $row_prod_cate['prod_cate_title'];
        
        echo "<li class='active'>
                <a class='f' href='shop.php?prod_cate=$prod_cate_id'> $prod_cate_title </a>
            </li>";
    }    
}

function add_cart_d(){
    
    global $db;
    
    if (isset($_GET['add_cart'])) 
    {
        
    if(isset($_SESSION['user'])){
        
        $user=$_SESSION['user'];
        $p_id = $_GET['add_cart'];
        
        $check_product = "select * from cart where pro_id='$p_id' and uname='$user'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "insert into cart (pro_id,uname) values ('$p_id','$user')";
            
            $run_query = mysqli_query($db,$query);
          

           echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }
        
    }
    else{
      echo "<script>alert('Please Login For add books in Cart')</script>";
            echo "<script>window.open('login.php','_self')</script>";
    }
  }
    
}
function add_cart_s()
  {
    
    global $db;
    
    if (isset($_GET['add_cart'])) 
    {
    
      if(isset($_SESSION['user']))
      {
        $user=$_SESSION['user'];
        $p_id = $_GET['add_cart'];
        $prod_cate=$_GET['prod_cate'];
        $check_product = "select * from cart where pro_id='$p_id' and uname='$user'";
        $run_check = mysqli_query($db,$check_product);

        if ($prod_cate==NULL) 
        {
          if(mysqli_num_rows($run_check)>0)
          {
            
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('shop.php','_self')</script>";
            
          }
          else
          {
            
            $query = "insert into cart (pro_id,uname) values ('$p_id','$user')";  
            $run_query = mysqli_query($db,$query);
            echo "<script>window.open('shop.php','_self')</script>";
          }

        }
        else
        {
          if(mysqli_num_rows($run_check)>0)
          {
            
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('shop.php?prod_cate=$prod_cate','_self')</script>";
            
          }
          else
          {
            
            $query = "insert into cart (pro_id,uname) values ('$p_id','$user')";
            $run_query = mysqli_query($db,$query);
            echo "<script>window.open('shop.php?prod_cate=$prod_cate','_self')</script>"; 
          }

        }
      }
      else{
      echo "<script>alert('Please Login For add books in Cart')</script>";
            echo "<script>window.open('login.php','_self')</script>";
    }
    
    }

  }


function getpcatpro(){
    
    global $db;

    if (isset($_SESSION['user'])) 
    {
        $uname=$_SESSION['user'];
        
        if(isset($_GET['prod_cate']))
        {
             $per_page=6;
                if(isset($_GET['page']))
                {
                  $page = $_GET['page'];
                }
                else
                {
                  $page=1;
                }
                $start_from = ($page-1) * $per_page;
            $prod_cate_id = $_GET['prod_cate'];
            $get_prod_cate ="select * from product_categories where prod_cate_id='$prod_cate_id'";
            $run_prod_cate = mysqli_query($db,$get_prod_cate);
            $row_prod_cate = mysqli_fetch_array($run_prod_cate);
            $prod_cate_title = $row_prod_cate['prod_cate_title'];
            $prod_cate_des = $row_prod_cate['prod_cate_des'];
            $get_products ="select * from products where prod_cate_id='$prod_cate_id' and uname != '$uname' and buyer='' order by 1 DESC LIMIT $start_from,$per_page";
            $run_products = mysqli_query($db,$get_products);
            $count = mysqli_num_rows($run_products);

            if($count==0)
            {
                echo "<div class='box'>
                        <h1> No Product Found In This Product Categories </h1>
                    </div>";
            
            }
            else
            {
                echo "<div class='box'>
                        <h1> $prod_cate_title </h1>
                        <p> $prod_cate_des </p>
                    </div>";
            }

            while($row_products=mysqli_fetch_array($run_products))
            {
                $pro_id = $row_products['product_id'];
                $bname = $row_products['bname'];
                $price = $row_products['price'];
                $image = $row_products['img'];
            ?>
                 <div class='col-md-4 col-sm-6'>
                          <div class='product'>
                            <div class='w3-hover-opacity w3-display-container'>
                              <a href='details.php?pro_id=<?php echo "$pro_id" ?>'><img src= <?php echo "book_img/$image" ?> width='252' height='200'></a>
                              <div class='w3-display-middle w3-display-hover w3-xlarge'>
                                <button class='w3-button w3-black' ><a href='profile.php?pro=uchat&prod=<?php echo "$pro_id" ?>'>Chat</a></button>
                              </div>
                            </div>
                            <div class='text'>
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
                                <a class='btn btn-primary' href='shop.php?prod_cate=<?php echo "$prod_cate_id" ?>&pro_id=<?php echo "$pro_id" ?>&add_cart=<?php echo "$pro_id" ?>'><i class='fa fa-shopping-cart'></i>Add To Wishlist</a>
                              </p>
                            </div>
                          </div>
                        </div>
                        <?php

            }
             ?>
            </div>

          <center>
          <ul class="pagination justify-content-center"><!-- pagination Begin -->
            <?php
              $con=mysqli_connect("localhost","root","","rs1");
              $query = "select * from products where prod_cate_id='$prod_cate_id' and uname!='$uname' and buyer=''";
              $result = mysqli_query($con,$query);
              $total_records = mysqli_num_rows($result);
              $total_pages = ceil($total_records / $per_page);
                
                echo "<li class='page-item '><a class='page-link' href='shop.php?prod_cate=$prod_cate_id&page=1'> ".'First Page'." </a></li>";
                
                for($i=1; $i<=$total_pages; $i++)
                  {
                    echo "<li class='page-item'><a class='page-link active' href='shop.php?prod_cate=$prod_cate_id&page=".$i."'> ".$i." </a></li>";  
                  };
                  echo "<li class='page-item'><a class='page-link' href='shop.php?prod_cate=$prod_cate_id&page=$total_pages'> ".'Last Page'." </a></li>";
          } 
        
    
        ?> 
      </ul>
    </center>
        
<?php
    }
    else
    {

        if(isset($_GET['prod_cate']))
        {
         $per_page=6;
                if(isset($_GET['page']))
                {
                  $page = $_GET['page'];
                }
                else
                {
                  $page=1;
                }
                $start_from = ($page-1) * $per_page;
            $prod_cate_id = $_GET['prod_cate'];
            $get_prod_cate ="select * from product_categories where prod_cate_id='$prod_cate_id'";
            $run_prod_cate = mysqli_query($db,$get_prod_cate);
            $row_prod_cate = mysqli_fetch_array($run_prod_cate);
            $prod_cate_title = $row_prod_cate['prod_cate_title'];
            $prod_cate_des = $row_prod_cate['prod_cate_des'];
            $get_products ="select * from products where prod_cate_id='$prod_cate_id' order by 1 DESC LIMIT $start_from,$per_page";
            $run_products = mysqli_query($db,$get_products);
            $count = mysqli_num_rows($run_products);

            if($count==0)
            {
                echo "<div class='box'>
                        <h1> No Product Found In This Product Categories </h1>
                    </div>";
            }
            else
            {
                echo "<div class='box'>
                        <h1> $prod_cate_title </h1>
                        <p> $prod_cate_des </p>
                    </div>";
            }
            while($row_products=mysqli_fetch_array($run_products))
            {
                $pro_id = $row_products['product_id'];
                $bname = $row_products['bname'];
                $price = $row_products['price'];
                $image = $row_products['img'];
            ?>
                 <div class='col-md-4 col-sm-6'>
                          <div class='product'>
                            <div class='w3-hover-opacity w3-display-container'>
                              <a href='details.php?pro_id=<?php echo "$pro_id" ?>'><img src= <?php echo "book_img/$image" ?> width='252' height='200'></a>
                              <div class='w3-display-middle w3-display-hover w3-xlarge'>
                                <button class='w3-button w3-black' ><a href="login.php">Chat</a></button>
                              </div>
                            </div>
                            <div class='text'>
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
                                <a class='btn btn-primary' href=''shop.php?pro_id=<?php echo "$pro_id" ?>&add_cart=<?php echo "$pro_id" ?>'><i class='fa fa-shopping-cart'></i>Add To Wishlist</a>
                              </p>
                            </div>
                          </div>
                        </div>
                        <?php
            }
            ?>
            </div>

          <center>
          <ul class="pagination justify-content-center"><!-- pagination Begin -->
            <?php
              $con=mysqli_connect("localhost","root","","rs1");
              $query = "select * from products where prod_cate_id='$prod_cate_id'";
              $result = mysqli_query($con,$query);
              $total_records = mysqli_num_rows($result);
              $total_pages = ceil($total_records / $per_page);
                
                echo "<li class='page-item '><a class='page-link' href='shop.php?prod_cate=$prod_cate_id&page=1'> ".'First Page'." </a></li>";
                
                for($i=1; $i<=$total_pages; $i++)
                  {
                    echo "<li class='page-item'><a class='page-link active' href='shop.php?prod_cate=$prod_cate_id&page=".$i."'> ".$i." </a></li>";  
                  };
                  echo "<li class='page-item'><a class='page-link' href='shop.php?prod_cate=$prod_cate_id&page=$total_pages'> ".'Last Page'." </a></li>";
          } 
        }
    }
        ?> 
      </ul>
    </center>

