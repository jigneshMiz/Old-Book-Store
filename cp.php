<div class="card" style="padding-top: 10px; padding-left: 10px; height: 400px">
        <a class="text-muted" style="font-family: cursive; font-size: 30px">Change Your Password</a><hr class="sty">
        <form method="post" action="#">
        	<table cellpadding="10">
        		<tr>
        			<td style="font-size: 20px;font-family: cursive;">Old Password</td>
        			<td>:-</td>
        			<td><input type="text" class="form-control" name="opss"></td>
        		</tr>
        		<tr>
        			<td style="font-size: 20px;font-family: cursive;">New Password</td>
        			<td>:-</td>
        			<td><input type="text" class="form-control" name="npss"></td>
        		</tr>
        	<tr>
        		<td></td>
        		<td></td>
        	<td><button type="submit" name="submit" value="submit" class="btn btn-primary text-center justify-content-center"><i class="fas fa-key">&nbsp;</i>Update</button></td>
        </tr>
        	</table>
        </form>

    </div>

<?php

if (isset($_POST['submit'])) {
	
	if (isset($_SESSION['user'])) {
		
		$user=$_SESSION['user'];
		$opss=$_POST['opss'];
		$npss=$_POST['npss'];

		if ($opss==$npss) {
			echo "<script>alert('Both Are Same Password')</script>";
		}
		else
		{
			$con=mysqli_connect("localhost","root","","rs1");
			$check_op="select * from user_login where username='$user' and password='$opss'";
			$run_check_op=mysqli_query($con,$check_op);
			$find=mysqli_num_rows($run_check_op);
			if ($find==0) {
				
				echo "<script>alert('Sorry....Your Old Password Is Wrong!!!')</script>";
			}
			else
			{
				
				$change_p="update user_login set password='$npss' where username='$user' and password='$opss'";
				$run_change_p=mysqli_query($con,$change_p);
				if ($run_change_p) {
					
					echo "<script>alert('Your Password has been Updated!!!')</script>";
				}
		}
		}
	}
}

?>