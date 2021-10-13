<?php

include 'header.php';

?>

<div id="dem" class="carousel slide top1" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators s">
    <li data-target="#dem" data-slide-to="0" class="active"></li>
    <li data-target="#dem" data-slide-to="1"></li>
    <li data-target="#dem" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/img/book5.jpg" alt="">
      <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white "><span class="w3-padding w3-black w3-opacity-min w3-animate-bottom t "><b>OB</b></span> 
      <span class=" t w3-text-light-grey w3-animate-bottom">Old BookStall</span></h1>
  </div>
    </div>
    <div class="carousel-item">
      <img src="image/img/book4.jpg" alt="" >
      <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white "><span class="w3-padding w3-black w3-opacity-min w3-animate-bottom fa fa-arrow-circle-left t"><b>A room without books is like a body without a soul.</b></span></h1>
  </div>
    </div>
    <div class="carousel-item">
      <img src="image/img/book3.jpg" alt="">
      <div class="w3-display-middle w3-margin-top w3-center">
      <h1 class="w3-xxlarge w3-text-white ">
      <span class=" w3-text-black w3-animate-bottom w3-myfont t">“There is no friend as loyal as a book.”</span></h1>
    </div>
  </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#dem" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#dem" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<div class="w3-display-container w3-mobile">
<p>

</p>
</div>

<div id="content">
<div id="advantages">
          <div class="container">
            <div class="row mb-4 ">
              <div class="col-md-4 ">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100 ">
                  <div class="icon x"><i class="fa fa-heart "></i></div>
                  <h3><a href="#">We love our customers</a></h3>
                  <p class="mb-0 "></p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-tags"></i></div>
                  <h3><a href="#">Best prices</a></h3>
                  <p class="mb-0"></p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                  <h3><a href="#">100% satisfaction guaranteed</a></h3>
                  <p class="mb-0"></p>
                </div>
              </div>
            </div>
            <!-- /.row-->
          </div>
          <!-- /.container-->
        </div>

       <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Recently added</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="product-slider owl-carousel owl-theme">
<?php
  if (isset($_SESSION['user'])) {
    
    $uname=$_SESSION['user'];
  
  $conn=new mysqli("localhost","root","","rs1");
  $sql1="SELECT * FROM products  where uname != '$uname' ORDER BY product_id DESC LIMIT 10";
    $result=$conn->query($sql1);
        if($result->num_rows>0)
        {
          while($row=$result->fetch_assoc())
          {
                  $pro_id = $row['product_id'];
                  $bname = $row['bname'];
                  $price = $row['price'];
                  $image = $row['img'];
           
?>
             <div class='item'>
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
                                <a class='btn btn-primary' href='details.php?pro_id=<?php echo "$pro_id" ?>&add_cart=<?php echo "$pro_id" ?>'><i class='fa fa-shopping-cart'></i>Add To Wishlist</a>
                              </p>
                            </div>
                          </div>
                </div>
              <?php
          }
        }
      
      }
      else
      {
        $conn=new mysqli("localhost","root","","rs1");
  $sql1="SELECT * FROM products  ORDER BY product_id DESC LIMIT 10";  //ASE for top to bottom and DESC for bottom to top
    $result=$conn->query($sql1);
        if($result->num_rows>0)
        {
          while($row=$result->fetch_assoc())
          {
                  $pro_id = $row['product_id'];
                  $bname = $row['bname'];
                  $price = $row['price'];
                  $image = $row['img'];
           
?>
             <div class='item'>
                <div class='product'>
                            <div class='w3-hover-opacity w3-display-container'>
                              <a href='details.php'><img src= <?php echo "book_img/$image" ?> width='252' height='200'></a>
                              
                            </div>
                            <div class='text'>
                              <h3><a href='#'>Java</a></h3>
                             <?php
                             /*  if ($price=='Free') {
                                echo "<p class='price'>$price</p>";  
                              }
                              else
                              {
                                echo "<p class='price'>Rs.$price</p>";
                              } */
                              ?>
                             
                            </div>
                          </div>
                </div>
            <?php
          }
        }
      }
?>
                
              </div>
             
            </div>
            
          </div>
          
        

        <div class="container">
          <div class="col-md-12">
            <div class="box slideshow">
              <h3>Popular Trending Books</h3>
              <p class="lead">Books are our Friend</p>
              <div id="get-inspired" class="owl-carousel owl-theme">
                <div class="item"><a href="#"><img src="image/img/b2.jpg" alt="Get inspired" width="500px" height="500px"></a></div>
                <div class="item"><a href="#"><img src="image/img/b3.jpg" alt="Get inspired" width="500px" height="500px"></a></div>
                <div class="item"><a href="#"><img src="image/img/all.jpg" alt="Get inspired" width="500px" height="500px"></a></div>
              </div>
            </div>
          </div>
        </div>
</div>

<?php

include 'footer.php';

?>