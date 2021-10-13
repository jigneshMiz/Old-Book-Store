<?php 

    session_start();
    include("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Old BookStall Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
   
   <div class="container"><!-- container begin -->
       <form action="" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Admin Login </h2>
           
           <input type="text" class="form-control" placeholder="Username" name="uname" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           
       </form><!-- form-login finish -->
   </div><!-- container finish -->
    
</body>
</html>


<?php 

    if(isset($_POST['login'])){
        
        $a_uname = mysqli_real_escape_string($con,$_POST['uname']);
        
        $a_pass = mysqli_real_escape_string($con,$_POST['pass']);
        
        $get_admin = "select * from admin where a_uname='$a_uname' AND a_pass='$a_pass'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $count = mysqli_num_rows($run_admin);
        
        if($count==1){
            
            $_SESSION['a_uname']=$a_uname;
            
            echo "<script>alert('Logged in. Welcome Back')</script>";

            header('location:index.php?dashboard');
            
            
        }else{
            
            echo "<script>alert('Email or Password is Wrong !')</script>";
            
        }
        
    }

?>