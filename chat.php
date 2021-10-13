
<div class="card" style="padding-top: 10px; padding-left: 10px; height: 550px">
        <a class="text-muted" style="font-family: cursive; font-size: 30px; margin-left: 30px ">My Chats</a><hr class="sty">
<?php

if (isset($_SESSION['user'])) {

	$suser=$_SESSION['user'];


if (isset($_GET['xno'])) {
      
      $pro_id=$_GET['xno'];
      $con=mysqli_connect("localhost","root","","rs1");
      $chk="select * from schat where (suname='$pro_id' AND runame='$suser') OR (suname='$suser' AND runame='$pro_id')";
      $run_chk=mysqli_query($con,$chk);
      $row_chk=mysqli_fetch_array($run_chk);

      $s_uname=$row_chk['suname'];
      $r_uname=$row_chk['runame'];
      $s_delete=$row_chk['s_delete'];
      $r_delete=$row_chk['r_delete'];



     if ($s_uname==$suser AND $r_uname==$pro_id) {

     		$upt="update schat set s_delete='delete' where (suname='$suser' AND runame='$pro_id') OR (suname='$pro_id' AND runame='$suser')";
      $run_upt=mysqli_query($con,$upt);
      
      if ($run_upt) {
      	echo "<script>alert('done!!!')</script>";
         echo "<script>window.open('profile.php?pro=chat','_self')</script>";
      }
      }
      else
      {

     		$upt="update schat set r_delete='delete' where (suname='$suser' AND runame='$pro_id') OR (suname='$pro_id' AND runame='$suser')";
      $run_upt=mysqli_query($con,$upt);
      
      if ($run_upt) {
      	echo "<script>alert('done!!!')</script>";
         echo "<script>window.open('profile.php?pro=chat','_self')</script>";
      }
     		
     	}

    $chk1="select * from schat where s_delete='delete' AND r_delete='delete'";
    $run_chk1=mysqli_query($con,$chk1);
    $row_chk1=mysqli_fetch_array($run_chk1);
    $suname=$row_chk1['suname'];
    $runame=$row_chk1['runame'];

    $del="delete from chat where (s_uname='$suname' AND r_uname='$runame') OR (s_uname='$runame' AND r_uname='$suname')";
    $run_del=mysqli_query($con,$del);

    $del1="delete from schat where s_delete='delete' AND r_delete='delete'";
    $run_del1=mysqli_query($con,$del1);



}

	$con=mysqli_connect("localhost","root","","rs1");	

	$sel3="select * from schat where suname='$suser' OR runame='$suser'";
	$run_sel3=mysqli_query($con,$sel3);

	while ($row_sel3=mysqli_fetch_array($run_sel3)) {
		
			$rname=$row_sel3['rname'];
			$runame=$row_sel3['runame'];
			$s_uname=$row_sel3['suname'];
			$sname=$row_sel3['sname'];
			$s_delete=$row_sel3['s_delete'];
			$r_delete=$row_sel3['r_delete'];

?>


<?php
if ($suser==$s_uname ) {	

if ($s_delete!=='delete') {


        			
        	$sel1="select * from user_login where username='$runame'";
			$run_sel1=mysqli_query($con,$sel1);
			$row_sel1=mysqli_fetch_array($run_sel1);
			$login=$row_sel1['log_in'];
			$time=$row_sel1['on_time'];
			$user_id=$row_sel1['id'];



			$sel2="select * from chat where s_uname='$runame' AND r_uname='$suser' AND msg_status='unread'";
			$run_sel2=mysqli_query($con,$sel2);
			$count=mysqli_num_rows($run_sel2);




?>
<div class="card" style="height: 100px;margin-left: 10px; margin-right: 10px; padding-top: 15px; padding-left:10px; color: lightblue; ">
        	<div class="row" >
        	<div class=" col-md-2">
        	<a><i class="fas fa-user-circle" style="font-size: 70px"></i></a>
        </div>

        <div >
        	<table cellpadding="3" style="margin-left: -20px; margin-top: -10px">
        		<tr>
        			
				
        			<td><a href='profile.php?pro=uchat&pid=<?php echo "$user_id" ?>' style="font-size: 20px; font-family: cursive;"><?php echo $rname ?></a></td>
        			<td><i  style="font-size: 10px;" class="text-muted">(<?php echo $login ?>)</i></td>
        		</tr>
        		<tr>
        			<td><a class="text-muted" style="font-size: 10px; font-family: cursive;">Message(<?php echo $count ?>)</a></td>
        		</tr>
        		<tr>
        			<td><a class="text-muted" style="font-size: 12px; font-family: cursive;">Last Online</a></td>
        			<td>:</td>
        			<?php

        			if ($login=='Online') {

        				echo "<td><a style='font-size: 12px; font-family: cursive; color:green;'>Currently Online</a></td>";
        				
        			}
        			else
        			{
        				echo "<td><a class='text-muted' style='font-size: 12px; font-family: cursive;'>$time</a></td>";
        			}

        			?>
        			<td><a href='profile.php?pro=chat&xno=<?php echo "$runame" ?>' style=" color: red;  font-size: 12px; font-family: cursive;">delete</a></td>
        		</tr>

        	
        	</table>
        </div>
        </div>
    </div>


<?php
}
}
else
{
	if ($r_delete!=='delete') {
		
	
	$sel1="select * from user_login where username='$s_uname'";
			$run_sel1=mysqli_query($con,$sel1);
			$row_sel1=mysqli_fetch_array($run_sel1);
			$login=$row_sel1['log_in'];
			$time=$row_sel1['on_time'];
			$user_id=$row_sel1['id'];

			$sel2="select * from chat where s_uname='$s_uname' AND r_uname='$suser' AND msg_status='unread'";
			$run_sel2=mysqli_query($con,$sel2);
			$count=mysqli_num_rows($run_sel2);
			

?>
<div class="card" style="height: 100px;margin-left: 10px; margin-right: 10px; padding-top: 15px; padding-left:10px; color: lightblue; ">
        	<div class="row">
        	<div class=" col-md-2">
        	<a><i class="fas fa-user-circle" style="font-size: 70px"></i></a>
        </div>

<div>
        	<table cellpadding="3" style="margin-left: -20px; margin-top: -10px">
        		<tr>
        			
				
        			<td><a href='profile.php?pro=uchat&pid=<?php echo "$user_id" ?>' style="font-size: 20px; font-family: cursive;"><?php echo $sname ?></a></td>
        			<td><i style="font-size: 10px" class="text-muted">(<?php echo $login ?>)</i></td>
        		</tr>
        		<tr>
        			<td><a class="text-muted" style="font-size: 10px; font-family: cursive;">Message(<?php echo $count ?>)</a></td>
        		</tr>
        		<tr>
        			<td><a class="text-muted" style="font-size: 12px; font-family: cursive;">Last Online</a></td>
        			<td>:</td>
        			<?php

        			if ($login=='Online') {

        				echo "<td><a style='font-size: 12px; font-family: cursive; color:green;'>Currently Online</a></td>";
        				
        			}
        			else
        			{
        				echo "<td><a class='text-muted' style='font-size: 12px; font-family: cursive;'>$time</a></td>";
        			}

        			?>
        			<td><a href='profile.php?pro=chat&xno=<?php echo "$s_uname" ?>' style="color: red;font-size: 12px; font-family: cursive;">delete</a></td>

        		</tr>
        	
        	</table>
        </div>
         </div>
    </div>

<?php
}

}
				
}

if (isset($_GET['deal'])) {
    
    $deal=$_GET['deal'];
    $pro_id=$_GET['aid'];
    $uname=$_GET['bid'];

    if ($deal=='ok') {

    $sel4="select * from schat where (pro_id='$pro_id' AND suname='$suser') OR (pro_id='$pro_id' AND runame='$suser')";
    $run_sel4=mysqli_query($con,$sel4);
    $row_sel4=mysqli_fetch_array($run_sel4);
    $suname=$row_sel4['suname'];
    $runame=$row_sel4['runame'];

    if ($suname==$suser && $runame==$uname) {

      $sel4="update schat set s_status='ok' where (suname='$suser' AND runame='$uname') OR (suname='$uname' AND runame='$suser')";
    $run_sel4=mysqli_query($con,$sel4);
     if ($run_sel4) {
        echo "<script>alert('done!!!')</script>";
        //echo "<script>window.open('profile.php?pro=chat','_self')</script>";
        
      }
      
    }
    else
    {
      $sel4="update schat set r_status='ok' where (suname='$suser' AND runame='$uname') OR (suname='$uname' AND runame='$suser')";
    $run_sel4=mysqli_query($con,$sel4);
     if ($run_sel4) {
        echo "<script>alert('done!!!')</script>";
        //echo "<script>window.open('profile.php?pro=chat','_self')</script>";
      
      }
    }
    }
    elseif ($deal=='not') {

    $sel4="select * from schat where (pro_id='$pro_id' AND suname='$suser') OR (pro_id='$pro_id' AND runame='$suser')";
    $run_sel4=mysqli_query($con,$sel4);
    $row_sel4=mysqli_fetch_array($run_sel4);
    $suname=$row_sel4['suname'];
    $runame=$row_sel4['runame'];

    if ($suname==$suser && $runame==$uname) {

      $sel4="update schat set s_status='not' where (suname='$suser' AND runame='$uname') OR (suname='$uname' AND runame='$suser')";
    $run_sel4=mysqli_query($con,$sel4);
     if ($run_sel4) {
        echo "<script>alert('done!!!')</script>";
        //echo "<script>window.open('profile.php?pro=chat','_self')</script>";
        
      }
      
    }
    else
    {
      $sel4="update schat set r_status='not' where (suname='$suser' AND runame='$uname') OR (suname='$uname' AND runame='$suser')";
    $run_sel4=mysqli_query($con,$sel4);
     if ($run_sel4) {
        echo "<script>alert('done!!!')</script>";
        //echo "<script>window.open('profile.php?pro=chat','_self')</script>";
      
      }
    }
    
    }
    $suser=$_SESSION['user'];

   $con=mysqli_connect("localhost","root","","rs1");
      $chk1="select * from schat where (suname='$uname' AND runame='$suser') OR (suname='$suser' AND runame='$uname')";
      $run_chk1=mysqli_query($con,$chk1);
      $row_chk1=mysqli_fetch_array($run_chk1);
      $prod_id=$row_chk1['pro_id'];
      $s_status=$row_chk1['s_status'];
      $r_status=$row_chk1['r_status'];

      if ($s_status=='ok' && $r_status=='ok') {
          
      $chk2="update schat set status='Success' where (suname='$uname' AND runame='$suser') OR (suname='$suser' AND runame='$uname')";
      $run_chk2=mysqli_query($con,$chk2);

       $chk3="update products set buyer='$uname' where product_id='$prod_id' and uname='$suser'";
      $run_chk3=mysqli_query($con,$chk3);
      echo "<script>window.open('profile.php?pro=chat','_self')</script>";
      }
      else
      {
        $chk2="update schat set status='Pending' where (suname='$uname' AND runame='$suser') OR (suname='$suser' AND runame='$uname')";
      $run_chk2=mysqli_query($con,$chk2);
      $chk3="update products set buyer='' where product_id='$prod_id' and uname='$suser'";
      $run_chk3=mysqli_query($con,$chk3);
      echo "<script>window.open('profile.php?pro=chat','_self')</script>";

}

   
}

}

?>



    </div>
