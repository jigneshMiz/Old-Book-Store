<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="font-awesome.min.css">

<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="try1.css">

<link rel="icon" type="image/png" href="image\icon\book-ico.png"/>
<link rel="stylesheet" href="bootstrap-4.0.0\dist\css\bootstrap.min.css">

<link rel="stylesheet" href="style.default.css">
<link rel="stylesheet" href="new/vendor/owl.carousel/assets/owl.carousel.css">
<link rel="stylesheet" href="new/vendor/owl.carousel/assets/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="try2.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

  <script src="bootstrap-4.0.0\assets\js\vendor\jquery-slim.min.js"></script>
  <script src="bootstrap-4.0.0\assets\js\vendor\popper.min.js"></script>
  <script src="bootstrap-4.0.0\dist\js\bootstrap.min.js"></script>
  <script src="new/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="new/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="new/js/front.js"></script>

  
   
</head>
<body >
	
  <div class="w3-bar w3-light-gray w3-wide w3-card fixed-top c ">
    <a class="w3-bar-item w3-button w3-padding-large top w3-hide-medium w3-hide-large w3-right" style="margin-top:15px" href="javascript:void(0)" onclick="myFunction('nav')" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="home.php" class="w3-bar-item w3-button w3-padding-large top ">
    	<img src="image\icon\logo2.png" alt="IMG-LOGO" width=160>
    </a>
    <a href="home.php" class="w3-bar-item w3-button w3-padding-large top w3-hide-small">Home</a>
    <!--<button onclick="myFunction('find')" class="w3-bar-item w3-button w3-padding-large top w3-hide-small w3-wide">Search Book</button>-->
    <button type="button" class="w3-bar-item w3-button w3-padding-large w3-wide" data-toggle="collapse" data-target="#demo" style="margin-top: 40px">Search Book</button>


    <a href="shop.php" class="w3-bar-item w3-button w3-padding-large top w3-hide-small w3-wide">Buy books</a>
    
    <?php
    session_start();
    if (!isset($_SESSION['user'])) {
      echo '<a href="register.php" class="w3-bar-item w3-button w3-padding-large top w3-hide-small">Register</a>'; 
    }
    
    ?>
     <a href="about.php" class="w3-bar-item w3-button w3-padding-large top w3-hide-small">About</a>
    <?php
    include 'nav.php';
    ?>
    <form action="search.php" method="get">
  <div id="demo" class="collapse" style=" margin-top: 100px">
    <input type="text" name="user_query" class=" w3-input w3-white w3-mobile w3-card a" placeholder="So,What Are You Searching Today...">
    <button class=" w3-button w3-dark-grey w3-mobile w3-card b" style="margin-top: 33px">Search</button>
   
  </div>
</form>


    <!--<form method="post" action="shop.php?prod_cate=2">
    <div id="find" class="w3-hide w3-container top4 ">
    <input type="text" class=" w3-input w3-white w3-mobile w3-card a" placeholder="So,What Are You Searching Today...">
    <button class=" w3-button w3-dark-grey w3-mobile w3-card b">Search</button>
    </div>
  </form>-->
  </div>


<div id="nav" class="w3-bar-block w3-light-gray w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:80px">
  <a href="#band" class="w3-bar-item w3-button w3-padding-large w3-wide" onclick="myFunction()">Home</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-wide" onclick="myFunction()">Register</a>
      <!--<div  class="w3-dropdown-click" onclick="myDropFunc()">
      <button class="w3-padding-large w3-button w3-wide " title="More">Categories <i class="fa fa-caret-down"></i></button>     
      <div id="drop" class="w3-dropdown-content w3-bar-block w3-card-4 w3-dark-gray w3-border">
        <a href="#" class="w3-bar-item w3-button w3-mobile w3-wide ">Link1</a>
        <a href="#" class="w3-bar-item w3-button w3-mobile w3-wide">Link2</a>
        <a href="#" class="w3-bar-item w3-button w3-mobile w3-wide">Link3</a>
 		<a href="#" class="w3-bar-item w3-button w3-mobile w3-wide">Link4</a>
 		<a href="#" class="w3-bar-item w3-button w3-mobile w3-wide">Link5</a>     
      </div>-->
  </div>
      <!--<<a href="#" class="w3-bar-item w3-button w3-padding-large w3-wide" onclick="myFunction()">About</a>-->
</div>
