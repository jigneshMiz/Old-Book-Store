


<?php
include 'header.php';
?>
<?php

if (isset($_SESSION['user'])) {
	$user=$_SESSION['user'];
	$con=mysqli_connect("localhost","root","","rs1");
	$check_user="select * from user_login where username = '$user'";
	$run_user=mysqli_query($con,$check_user);
	$row_user=mysqli_fetch_array($run_user);
	$name=$row_user['name'];	
}


if (!isset($_SESSION['user'])) {
    
    exit("<script>alert('Please Login For Chat...!!!')</script> <script>window.open('login.php','_self')</script>");
}



?>


<div id="content" style="margin-top: 180px">
    <div class="container">
      <div class="row">
        
        <div class="col-md-3">
        	<div class=" card mb-1" style="height: 80px; padding-left: 10px; padding-top: 10px">
        	
        			<table>
        				<tr>
        					<td><i class='fas fa-user-circle' style="font-size: 50px;"></i></td>
        					<td><a href="profile.php?pro=uinfo" style="color: currentColor; font-size: 20px; font-family: cursive;" ><?php echo $name ?></a></td>
        				</tr>
        			</table>
        		
        		</div>
        	
        		<div class="card mb-4" style="height: 470px; padding-top: 20px; padding-left: 40px">


        			<a href="profile.php?pro=cart"><i class='fas fa-heart'>&nbsp;</i>My Wishlist</a><hr>
              <a href="profile.php?pro=pb"><i class='fas fa-shopping-bag'>&nbsp;</i>Purchased Book</a><hr>
        			<a href="profile.php?pro=bo"><i class='fas fa-book'>&nbsp;</i>My Books For Sale</a><hr>
        			<a href="profile.php?pro=sell"><i class='fas fa-tags'>&nbsp;</i>Sell Books</a><hr>
        			<a href="profile.php?pro=chat"><i class='fas fa-comments'>&nbsp;</i>My Chats</a><hr>
        			<a href="profile.php?pro=upuser"><i class='fas fa-user-edit'>&nbsp;</i>Manage Profile</a><hr>
        			<a href="profile.php?pro=cp"><i class='fas fa-key'>&nbsp;</i>Change Password</a><hr>
        			<a href="logout.php"><i class='fas fa-sign-out-alt'>&nbsp;</i>Logout</a><hr>
        			<a href="cont.php"><i class='far fa-comment-dots'>&nbsp;</i>Help</a>
        			
        		</div>
        	</div>
        	<div class="col-md-9">

				<?php
				
				if (isset($_GET['pro'])) {
					
					$pro=$_GET['pro'];
					if ($pro=='info') {
				
						
					}
					elseif ($pro=='cart') {
						
						include 'cart.php';	
					}
					elseif ($pro=='bo') {
					include 'book.php';
					}
					elseif ($pro=='sell') {
						include 'sell.php';
					}
					elseif ($pro=='upbookinfo') {
						include 'upbookinfo.php';
					}
					elseif ($pro=='cp') {
						include 'cp.php';
					}
					elseif ($pro=='uinfo') {
						include 'uinfo.php';
					}
					elseif ($pro=='upbook') {
						include 'upbook.php';
					}
					elseif ($pro=='upuser') {
						include 'upuser.php';
					}
					elseif ($pro=='chat') {
						include 'chat.php';
					}
					elseif ($pro=='uchat') {
						include 'uchat.php';
					}
          elseif ($pro=='pb') {
            include 'pb.php';
          }
					


				}
				else{
					include 'cart.php';
				}
				
				?>     		
        	</div>
        </div>
    </div>
</div>
<?php

if (isset($_SESSION['user'])) {

      $user=$_SESSION['user'];


if (isset($_GET['pro_id'])) {
      
      $pro_id=$_GET['pro_id'];
      $con=mysqli_connect("localhost","root","","rs1");
      $remove="delete from cart where pro_id='$pro_id' and uname='$user'";
      $run_remove=mysqli_query($con,$remove);
      
      if ($run_remove) {
         echo "<script>window.open('profile.php?pro=cart','_self')</script>";
      }
}
}

?>

<?php

if (isset($_SESSION['user'])) {

      $user=$_SESSION['user'];


if (isset($_GET['rno'])) {
      
      $pro_id=$_GET['rno'];
      $con=mysqli_connect("localhost","root","","rs1");
      $remove="delete from products where product_id='$pro_id' and uname='$user'";
      $run_remove=mysqli_query($con,$remove);
      
      if ($run_remove) {
      	echo "<script>alert('Your Book is Removed!!!')</script>";
         echo "<script>window.open('profile.php?pro=bo','_self')</script>";
      }
}
}

?>







<?php
include 'footer.php';
?>