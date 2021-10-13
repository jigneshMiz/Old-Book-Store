<?php

include 'config.php';

if (isset($_POST['uname']) and isset($_POST['email'])) {

    $uname=$_POST['uname'];
    $email=$_POST['email'];
    
    $chk="select * from user_login where username='$uname' AND email='$email'";
    $run_chk=mysqli_query($con,$chk);

    if (mysqli_num_rows($run_chk)==0) {
        
        exit("<script>alert('Wrong Username OR E-mail id....!!!')</script> <script>window.open('reqreset.php','_self')</script>");
    
    }
}

?>



<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config.php';


if (isset($_POST['uname']) and isset($_POST['email'])) {

    $email=$_POST['email'];
    $uname=$_POST['uname'];

    $code=uniqid(true);
    $query=mysqli_query($con,"INSERT INTO resetp(code,email,uname) VALUES('$code','$email','$uname')");
    if (!$query) {
        
        exit("Error");
    }

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'rs224036@gmail.com';                     // SMTP username
    $mail->Password   = '*123456#';                               // SMTP password
    $mail->SMTPSecure = 'tls'; 
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);                                 // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('rs224036@gmail.com', 'rahul');
    $mail->addAddress($email);     // Add a recipient
    $mail->addReplyTo('no-reply@gmail.com', 'No-Reply');
    

   

    // Content
    $url="http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"]). "/resetpass.php?code=$code";
    $mail->isHTML(true);                                  
    $mail->Subject = 'Your Password Reset Link';
    $mail->Body    = "<h1>You requested a password reset</h1>
                        Click <a href='$url'>this link</a> to do so";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<script>alert('Reset Password Link has been Sent To Your E-mail....!!!')</script> <script>window.open('reqreset.php','_self')</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit();
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
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item"><a href="login.php">Login</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Forgot Password</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12">
              <div class="box text-center">
                <h1 style="font-family: cursive;">Forgot Password</h1>
                <p class="text-muted">If you have any questions, please feel free to <a href="cont.php">contact us</a>, our customer service center is working for you 24/7.</p>
                
                <hr>
                <form method="post">
                  <div class="form-group form-inline justify-content-center">
                    <label><b>Username:-&nbsp;&nbsp;</b></label>
                    <input type="text" name="uname" class="form-control" style="width: 300px">
                  </div>
                  <div class="form-group form-inline justify-content-center">
                    <label><b>E-mail:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                    <input name="email" type="text" class="form-control" style="width: 300px">
                    
                  </div>
                  
                  
                  <div class="text-center justify-content-center">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Send</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>



<?php
include 'footer.php';
?>
