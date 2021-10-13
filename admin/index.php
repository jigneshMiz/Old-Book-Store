<?php 

    session_start();
    include("includes/db.php");
    
    if(!isset($_SESSION['a_uname'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        
        $admin_session = $_SESSION['a_uname'];
        
        $get_admin = "select * from admin where a_uname='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $a_id = $row_admin['a_id'];
        
        $a_name = $row_admin['a_name'];
        
        $a_email = $row_admin['a_email'];
        
        $get_products = "select * from products";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_products = mysqli_num_rows($run_products);
        
        $get_customers = "select * from user_login";
        
        $run_customers = mysqli_query($con,$get_customers);
        
        $count_customers = mysqli_num_rows($run_customers);
        
        $get_p_categories = "select * from product_categories";
        
        $run_p_categories = mysqli_query($con,$get_p_categories);
        
        $count_p_categories = mysqli_num_rows($run_p_categories);

        $get_pb = "select * from products where buyer!=''";
        
        $run_pb = mysqli_query($con,$get_pb);
        
        $count_pb = mysqli_num_rows($run_pb);
        
        

?>

<!DOCTYPE html>
<html>
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Old BookStall Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                }  if(isset($_GET['insert'])){
                        
                        include("insert.php");
                        
                }   if(isset($_GET['view_p'])){
                        
                        include("view_p.php");
                        
                }   if(isset($_GET['delete_p'])){
                        
                        include("delete_p.php");
                        
                }   if(isset($_GET['edit_p'])){
                        
                        include("edit_p.php");
                        
                }   if(isset($_GET['insert_cate'])){
                        
                        include("insert_cate.php");
                        
                }   if(isset($_GET['view_cate'])){
                        
                        include("view_cate.php");
                        
                }   if(isset($_GET['delete_cate'])){
                        
                        include("delete_cate.php");
                        
                }   if(isset($_GET['edit_cate'])){
                        
                        include("edit_cate.php");

                }   if(isset($_GET['view_u'])){
                        
                        include("view_u.php");
                        
                }   if(isset($_GET['delete_u'])){
                        
                        include("delete_u.php");
                        
                }   if(isset($_GET['view_a'])){
                        
                        include("view_a.php");
                        
                }   if(isset($_GET['delete_a'])){
                        
                        include("delete_a.php");
                        
                }   if(isset($_GET['insert_a'])){
                        
                        include("insert_a.php");
                        
                }   if(isset($_GET['edit_a'])){
                        
                        include("edit_a.php");
                        
                }
                if(isset($_GET['sold'])){
                        
                        include("sold.php");
                        
                }
        
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>


<?php } ?>