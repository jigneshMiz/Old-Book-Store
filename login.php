
<?php


if (isset($_POST['uname']) and isset($_POST['pass'])) {

session_start();

$conn=new mysqli("localhost","root","","rs1");
$uname=$_POST['uname'];
	$pass=$_POST['pass'];

  $pass=md5($pass);


	$query="SELECT * FROM user_login WHERE username = '$uname' AND password='$pass'";
	$result=$conn->query($query);
	 $row=mysqli_fetch_assoc($result);

	 if(mysqli_num_rows($result)>0){
	 	$_SESSION['user']=$uname;
	 	//header('location:profile.php?pro=uinfo');
    $upm=mysqli_query($conn,"UPDATE user_login SET log_in='Online' WHERE username='$uname'");
    header('location:profile.php?pro=uinfo');

	 
	 }
	 else{
	 	echo "<script>alert('Wrong Username and Password !!!')</script>";
	 	echo "<script>window.open('login.php','_self')</script>";
	 }
}







?>

<?php
include 'header.php';
?>
<div class="container" style="margin-top: 200px" >
	<div class="row">
		
	
<div class="col-lg-12" >

              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="margin-top: 33px;">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Login</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12">
              <div class="box text-center">
                <h1>Login</h1>
                <p class="lead">Already our customer?</p>
                
                <hr>
                <form action="#" method="post">
                  <div class="form-group form-inline justify-content-center">
                    <label><b>Username:-&nbsp;&nbsp;</b></label>
                    <input type="text" name="uname" class="form-control" style="width: 300px">
                  </div>
                  <div class="form-group form-inline justify-content-center">
                    <label><b>Password:-&nbsp;&nbsp;</b></label>
                    <input name="pass" type="password" class="form-control" id="pa" style="width: 300px">
                    
                  </div>
                  <div class="col-sm-11">
                  <input type="checkbox">  Show Password
              </div>
                  <div class="col-sm-11 form-group justify-content-center">
                  	<a class="" href="reqreset.php">Forgot Password?</a></br>
                  	<label>New Here?</label>
                  	<a href="register.php"> Register</a>
                  </div>
                  <div class="text-center justify-content-center">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Log in</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>



<?php
include 'footer.php';
?>
