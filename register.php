
<?php

if(isset($_POST['submit']))
	
	{
	 $name=$_POST['fname']." ".$_POST['lname'];
	 $add=$_POST['add'];
	 $gen=$_POST['r1'];
	 $mo=$_POST['phone'];
	 $mail=$_POST['email'];
	 $city=$_POST['city'];
	 $pin=$_POST['pin'];
	 $uname=$_POST['uname'];
	 $pass=$_POST['pass'];
   $pass=md5($pass);
	 	$conn=new mysqli("localhost","root","","rs1");
	 		$sql="INSERT INTO user_login(name,address,gender,phone,email,city,pin,username,password,log_in) VALUES('$name','$add','$gen','$mo','$mail','$city','$pin','$uname','$pass','Online')";
	 		if($conn->query($sql)==TRUE)
	 		{
	 			echo "<br><br>";
	 			echo "<script>alert('You have been Registered Sucessfully')</script>";
	 			session_start();
	 			$_SESSION['user']=$uname;
	 			echo "<script>window.open('home.php','_self')</script>";

	 		}
	 		else
	 		{
	 			echo "Error:".$sql.$conn->error;
	 		}
	 		$conn->close();
	}
	

?>

<?php

include 'header.php';

?>
    <div id="all" style="margin-top: 200px">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="margin-top: 33px;">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Register</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12 ">
              <div class="box text-center">
                <h1>New account</h1>
                <p class="lead">Not our registered customer yet?</p>
                <hr>
                <form action="#" method="post">
                  <div class="form-group form-inline justify-content-center">
                  <label class="mb-2 mr-sm-5"><b>Name:- &nbsp;</b></label>
                  <input type="text" class="form-control mb-2 mr-sm-1" name="fname" placeholder="First Name" required>
                  <input type="text" class="form-control mb-2 mr-sm-1" name="lname" placeholder="Last Name">
                  </div>
                  <div class="form-group form-inline justify-content-center">
                  <label class="mb-2 mr-sm-4"><b>Address:- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                  <textarea  name="add" class="form-control mb-2 mr-sm-2" style="width: 370px"></textarea>
                  </div>
                   <div class="col-sm-9">
                <div class="form-group form-inline justify-content-center">
                  
                    <label class="col-sm-3 mb-2"><b> Gender:-</b></label>
                    <div class="custom-control custom-radio custom-control-inline ">
                      <input type="radio" class="custom-control-input" id="radio1" name="r1" value="Male" required>
                      <label class="custom-control-label" for="radio1">Male</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input" id="radio2"  name="r1" value="Female" required>
                      <label class="custom-control-label" for="radio2">Female</label>
                      </div>
                    </div>
                  </div>
                   <div class="form-group form-inline justify-content-center">
                  <label class="mr-sm-4 mb-2"><b>Phone No:-&nbsp;&nbsp;</b></label>
                  <input type="text"  name="phone" class="form-control mb-2 mr-sm-2" style="width: 370px" required>
                  </div>
                  <div class="form-group form-inline justify-content-center">
                    <label  class="mr-sm-5 mb-2"><b>E-mail:-&nbsp;&nbsp;</b></label>
                  <input type="email"  name="email" class="form-control mb-2 mr-sm-2" style="width: 370px" placeholder="example@xyz.com" required>
                  </div>
                  <div class="form-group form-inline justify-content-center">
                    <label class="mr-sm-5 mb-2"><b>City:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                    <select name="city" class="mb-2 mr-sm-2 form-control custom-select" style="width: 370px" required>
                          <option value="" selected>Select Your City</option>
                          <option value="Mehsana" >Mehsana</option>
                          <option value="Bhavnagar" >Bhavnagar</option>
                          <option value="Surat" >Surat</option>
                          <option value="Baroda" >Baroda</option>
                          <option value="Ahemdabad">Ahemdabad</option>
                          </select>
                  </div>
                   <div class="form-group form-inline justify-content-center">
                    <label class="mr-sm-4 mb-2"><b>Pin-Code:-&nbsp;&nbsp;&nbsp;</b></label>
                  <input type="text"  name="pin" class="form-control mb-2 mr-sm-2" style="width: 370px">
                  </div>
                  <div class="form-group form-inline justify-content-center">
                    <label class="mr-sm-4 mb-2"><b>Username:-&nbsp;&nbsp;</b></label>
                  <input type="text"  name="uname" class="form-control mb-2 mr-sm-2" style="width: 370px" required>
                  </div>
                  <div class="form-group form-inline justify-content-center">
                    <label class="mr-sm-4 mb-2"><b>Password:-&nbsp;&nbsp;&nbsp;</b></label>
                  <input type="password" name="pass" class="form-control mb-2 mr-sm-2" style="width: 370px" required>
                  </div>

                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary text-center"><i class="fa fa-user-md"></i> Register</button>
                  </div>
                 
  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php

include 'footer.php';

?>
