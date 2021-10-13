
<?php

include 'header.php';
include 'functions/functions.php';

?>

  <div id="content" style="margin-top: 200px">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li aria-current="page" class="breadcrumb-item active">Buy Books</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-3">
        <?php
        include 'sidenav.php';
        ?>
      </div>
      <!--<div class="banner"><a href="#"><img src="new/img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div>-->
        <div class="col-md-9">
          <?php 
               
                if(!isset($_GET['prod_cate']))
                {
                    
                      echo "

                       <div class='box'>
                           <h1>All Books</h1>
              <p>here You can find All books which is uploaded by users</p>
                       </div>

                       ";
                        
                    }
                   
               ?>
          <!--<div class="box">
            
          </div>-->
          <div class="row">

            <?php
          
            if (isset($_SESSION['user'])) {

                $uname=$_SESSION['user'];
            
            
              if(!isset($_GET['prod_cate']))
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

                $con=mysqli_connect("localhost","root","","rs1");
                $start_from = ($page-1) * $per_page;
                $get_products = "select * from products where uname != '$uname' and buyer='' order by 1 DESC LIMIT $start_from,$per_page";
                $run_products = mysqli_query($con,$get_products);

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
                                <button  class='w3-button w3-black' ><a href='profile.php?pro=uchat&prod=<?php echo "$pro_id" ?>'>Chat</a></button>
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
                                <a class='btn btn-primary' href='shop.php?pro_id=<?php echo "$pro_id" ?>&add_cart=<?php echo "$pro_id" ?>'><i class='fa fa-shopping-cart'></i>Add To Wishlist</a>
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
              $query = "select * from products where uname!='$uname' and buyer=''";
              $result = mysqli_query($con,$query);
              $total_records = mysqli_num_rows($result);
              $total_pages = ceil($total_records / $per_page);
                
                echo "<li class='page-item '><a class='page-link' href='shop.php?page=1'> ".'First Page'." </a></li>";
                
                for($i=1; $i<=$total_pages; $i++)
                  {
                    echo "<li class='page-item'><a class='page-link active' href='shop.php?page=".$i."'> ".$i." </a></li>";  
                  };
                  echo "<li class='page-item'><a class='page-link' href='shop.php?page=$total_pages'> ".'Last Page'." </a></li>";
          }
        }
        else{
         if(!isset($_GET['prod_cate']))
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

                $con=mysqli_connect("localhost","root","","rs1");
                $start_from = ($page-1) * $per_page;
                $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
                $run_products = mysqli_query($con,$get_products);

                while($row_products=mysqli_fetch_array($run_products))
                {
                  $pro_id = $row_products['product_id'];
                  $bname = $row_products['bname'];
                  $price = $row_products['price'];
                  $image = $row_products['img'];

                ?>  <div class='col-md-4 col-sm-6'>
                          <div class='product'>
                            <div class='w3-hover-opacity w3-display-container'>
                              <a href='details.php?pro_id=<?php echo "$pro_id" ?>'><img src= <?php echo "book_img/$image" ?> width='252' height='200'></a>
                              <div class='w3-display-middle w3-display-hover w3-xlarge'>
                                <button class='w3-button w3-black'><a href='profile.php?pro=uchat&prod=<?php echo "$pro_id" ?>'>Chat</a></button>
                              </div>
                            </div>
                            <div class='text'>
                              <h3><a href='details.php?pro_id=<?php echo "$pro_id" ?>'> <?php echo $bname ?> </a></h3>
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
                                <a class='btn btn-default' href= 'details.php?pro_id=<?php echo "$pro_id" ?>' >View Details</a>
                                <a class='btn btn-primary' href='shop.php?pro_id=<?php echo "$pro_id" ?>&add_cart=<?php echo "$pro_id" ?>'><i class='fa fa-shopping-cart'></i>Add To Wishlist</a>
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
              $query = "select * from products";
              $result = mysqli_query($con,$query);
              $total_records = mysqli_num_rows($result);
              $total_pages = ceil($total_records / $per_page);
                
                echo "<li class='page-item '><a class='page-link' href='shop.php?page=1'> ".'First Page'." </a></li>";
                
                for($i=1; $i<=$total_pages; $i++)
                  {
                    echo "<li class='page-item'><a class='page-link active' href='shop.php?page=".$i."'> ".$i." </a></li>";  
                  };
                  echo "<li class='page-item'><a class='page-link' href='shop.php?page=$total_pages'> ".'Last Page'." </a></li>";
          } 
        }
        ?> 
      </ul>
    </center>
  

    <?php
    add_cart_s();
    getpcatpro();

    ?>
          </div>     
        </div>
      </div>
    </div>
  

<?php

include 'footer.php';

?>