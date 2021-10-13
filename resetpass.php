<?php
include 'config.php';

if (!isset($_GET["code"])) {
	
	exit("Can't Find Page");
}

$code=$_GET["code"];

$get=mysqli_query($con,"SELECT email,uname FROM resetp WHERE code='$code'");
if(mysqli_num_rows($get)==0)
{
	exit("Can't Find Page");
}

if (isset($_POST["pass1"]) and isset($_POST["pass2"])) {

  $pass1=$_POST['pass1'];
  $pass2=$_POST['pass2'];

  if ($pass1==$pass2){

	$pw=$pass1;
	$pw=md5($pw);
	
	$row=mysqli_fetch_array($get);
	$email=$row["email"];
  $uname=$row['uname'];

	$query=mysqli_query($con,"UPDATE user_login SET password='$pw' WHERE email='$email' AND username='$uname'");

	if ($query) {
		
		$query=mysqli_query($con,"DELETE FROM resetp WHERE code='$code'");

		exit("<script>alert('Your Password is Updated....!!!')</script> <script>window.open('login.php','_self')</script>");

	}
	else{
		exit("Something went wrong");
	}
}

}

?>
<?php
include 'header.php';
?>
<div class="container" style="margin-top: 200px" >
    <div class="row">
        
    
<div class="col-lg-12" >

            
              
            </div>
            <div class="col-lg-12">
              <div class="box text-center">
                <h1 style="font-family: cursive;">Reset Your Password</h1>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                
                <hr>
                <form method="post">
                  <div class="form-group form-inline justify-content-center">
                    <label><b>New Password:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                    <input type="password" name="pass1" class="form-control" style="width: 300px" required>
                  </div>
                  <div class="form-group form-inline justify-content-center">
                    <label><b>Confirm Password:-&nbsp;&nbsp;</b></label>
                    <input name="pass2" type="password" class="form-control" style="width: 300px" required>
                    
                  </div>
                  
                  
                  <div class="text-center justify-content-center">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>&nbsp;Update</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>



<?php
include 'footer.php';
?>

