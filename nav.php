<?php
	
    if(isset($_SESSION['user']))
    {
      $conn=new mysqli("localhost","root","","rs1");
      $user=$_SESSION['user'];
      $cart="select * from cart where uname = '$user'";
      $run_cart=mysqli_query($conn,$cart);
      $count = mysqli_num_rows($run_cart);
      $query="SELECT * FROM user_login WHERE username = '$user'";
      $result=$conn->query($query);
      $row=mysqli_fetch_assoc($result);
    	if(mysqli_num_rows($result)>0)
    	{
    		echo '<a href="profile.php?pro=uinfo" class="w3-padding-large w3-hover-red w3-hide-small w3-right top">'.$row['name'].'<i class="fas fa-user"></i></a>';
        echo '<a href="profile.php?pro=cart" class="w3-padding-large w3-hover-grey w3-hide-small w3-right" style=" position:absolute; margin-top:105px; margin-left:430px">('.$count.')Wishlist<i class="fas fa-heart"></i></a>';
        echo '<a href="logout.php" class="w3-padding-large w3-hover-grey w3-hide-small" style=" position:absolute; margin-top:105px; margin-left:330px">Logout<i class="fas fa-sign-out-alt"></i></a>';
    		
    	}
	}
		else{
     echo '<a href="login.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right top"> Login<i class="fas fa-user"></i></a>';
  }
?>