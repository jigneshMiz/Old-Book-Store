<?php
if (!isset($_SESSION['user'])) {
    
    exit("<script>alert('Please Login For Chat...!!!')</script> <script>window.open('login.php','_self')</script>");
}

?>

<?php

if (isset($_SESSION['user'])) {
	
	$suser=$_SESSION['user'];
	$con=mysqli_connect("localhost","root","","rs1");

	$sel2="select * from user_login where username='$suser'";
	$run_sel2=mysqli_query($con,$sel2);
	$row_sel2=mysqli_fetch_array($run_sel2);
	$sname=$row_sel2['name'];




if (isset($_GET['prod'])) {

	
	$prod_id=$_GET['prod'];

	$sel="select * from products where product_id='$prod_id'";
	$run_sel=mysqli_query($con,$sel);
	$row_sel=mysqli_fetch_array($run_sel);
	$runame=$row_sel['uname'];
	$_SESSION['name1']=$runame;

	$sel3="select * from user_login where username='$runame'";
	$run_sel3=mysqli_query($con,$sel3);
	$row_sel3=mysqli_fetch_array($run_sel3);
	$rname=$row_sel3['name'];
	$rlogin=$row_sel3['log_in'];



	$sel4="select * from schat";
	$run_sel4=mysqli_query($con,$sel4);
	$c=mysqli_num_rows($run_sel4);

	if ($c==0) {
		
		$ins="insert into schat (sname,rname,suname,runame) values('$sname','$rname','$suser','$runame')";
        $r_ins=mysqli_query($con,$ins);
       $upt="update schat set pro_id='$prod_id' where (suname='$suser' AND runame='$runame')";
        $run_upt=mysqli_query($con,$upt);

	}
	else{

		$sel5="select * from schat where (suname='$suser' AND runame='$runame') OR (suname='$runame' AND runame='$suser')";
		$run_sel5=mysqli_query($con,$sel5);
		$c1=mysqli_num_rows($run_sel5);

		if ($c1==0) {

		$ins1="insert into schat (sname,rname,suname,runame) values('$sname','$rname','$suser','$runame')";
        $r_ins1=mysqli_query($con,$ins1);
        $upt="update schat set pro_id='$prod_id' where (suname='$suser' AND runame='$runame')";
        $run_upt=mysqli_query($con,$upt);
		}
       else
        {
        $upt="update schat set pro_id='$prod_id',s_status='',r_status='',status='' where (suname='$suser' AND runame='$runame') OR (suname='$runame' AND runame='$suser')";
        $run_upt=mysqli_query($con,$upt);   
        }

	}

?>

<div class="card" style="padding-top: 10px; padding-left: 10px; height: 550px">
    <div class="row">
        <a class="text-muted" style="font-family: cursive; font-size: 25px; margin-left: 20px ">My Chats--><?php echo $rname ?><i>(<?php echo $rlogin ?>)</i></a>
        <a class="text-muted" style="font-family: cursive; font-size: 20px; margin-left: 40px">id=> <?php echo $prod_id ?></a>
        <a href='profile.php?pro=chat&deal=ok&aid=<?php echo "$prod_id" ?>&bid=<?php echo "$runame" ?>' class="btn btn-primary" style="font-family: cursive; font-size: 20px; margin-left: 40px">Deal</a>
        <a class="text-muted" style="font-family: cursive; font-size: 20px; margin-left: 40px">or</a>
        <a href='profile.php?pro=chat&deal=not&aid=<?php echo "$prod_id" ?>&bid=<?php echo "$runame" ?>' class="btn btn-danger" style="font-family: cursive; font-size: 20px; margin-left: 40px">Not</a>
        
        </div>
        <hr class="sty">
        

<style>
    
.scroll{
    width: 810px;
    height: 400px;
    overflow: scroll;

}
</style>
        
        <div id="show" class="scroll">

         
        	
    </div>
    <form method="post">
    <div class="row" style="margin-left: 3px; margin-bottom: 10px">
    <div><textarea class="form-control" cols="90" rows="3" name="cht" placeholder="Write here.............."></textarea></div>
    <div><button type="submit" class="btn btn-primary" name="submit" value="submit" style="height: 72px; width: 70px"><i style="font-size: 30px" class="fas fa-send"></i></button></div>
    </div>
</form>
    
</div>


<?php

if (isset($_POST['submit'])) {
    
    $msg=$_POST['cht'];

    if ($msg=="") {
        echo "msg not send";
    }
    elseif (strlen($msg)>100) {
        echo "Too long";
    }
    else
    {
        $in="insert into chat (s_name,r_name,msg_cont,msg_status,msg_date,s_uname,r_uname) values('$sname','$rname','$msg','unread',NOW(),'$suser','$runame')";
        $r_in=mysqli_query($con,$in);
    }
}

?>


<script src="jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
       $(document).ready(function() {
            setInterval(function () {
                $('#show').load('chat_data.php')
                $("#show").scrollTop($("#show")[0].scrollHeight);
            }, 1000);
        });
   </script>

<?php
}

elseif (isset($_GET['pid'])) {
		
		$sid=$_GET['pid'];

	$sel1="select * from user_login where id='$sid'";
	$run_sel1=mysqli_query($con,$sel1);
	$row_sel1=mysqli_fetch_array($run_sel1);
	$runame=$row_sel1['username'];
	$rname=$row_sel1['name'];
	$rlogin=$row_sel1['log_in'];
	$_SESSION['name1']=$runame;
    $sel6="select * from schat where (runame='$runame' AND suname='$suser') OR (suname='$runame' AND runame='$suser')";
    $run_sel6=mysqli_query($con,$sel6);
    $row_sel6=mysqli_fetch_array($run_sel6);
    $prod_id=$row_sel6['pro_id'];

?>

<div class="card" style="padding-top: 10px; padding-left: 10px; height: 550px">
    <div class="row">
        <a class="text-muted" style="font-family: cursive; font-size: 25px; margin-left: 20px ">My Chats--><?php echo $rname ?><i>(<?php echo $rlogin ?>)</i></a>
        <a class="text-muted" style="font-family: cursive; font-size: 20px; margin-left: 40px">id=> <?php echo $prod_id ?></a>
        <a href='profile.php?pro=chat&deal=ok&aid=<?php echo "$prod_id" ?>&bid=<?php echo "$runame" ?>' class="btn btn-primary" style="font-family: cursive; font-size: 20px; margin-left: 40px">Deal</a>
        <a class="text-muted" style="font-family: cursive; font-size: 20px; margin-left: 40px">or</a>
        <a href='profile.php?pro=chat&deal=not&aid=<?php echo "$prod_id" ?>&bid=<?php echo "$runame" ?>' class="btn btn-danger" style="font-family: cursive; font-size: 20px; margin-left: 40px">Not</a>
        
        </div>
        <hr class="sty">

<style>
    
.scroll{
    width: 810px;
    height: 400px;
    overflow: scroll;

}
</style>
        
        <div id="show" class="scroll">

         
        	
    </div>
    <form method="post">
    <div class="row" style="margin-left: 3px; margin-bottom: 10px">
    <div><textarea class="form-control" cols="90" rows="3" name="cht" placeholder="Write here.............."></textarea></div>
    <div><button type="submit" class="btn btn-primary" name="submit" value="submit" style="height: 72px; width: 70px"><i style="font-size: 30px" class="fas fa-send"></i></button></div>
    </div>
</form>
    
</div>


<?php

if (isset($_POST['submit'])) {
    
    $msg=$_POST['cht'];

    if ($msg=="") {
        echo "msg not send";
    }
    elseif (strlen($msg)>100) {
        echo "Too long";
    }
    else
    {
        $in="insert into chat (s_name,r_name,msg_cont,msg_status,msg_date,s_uname,r_uname) values('$sname','$rname','$msg','unread',NOW(),'$suser','$runame')";
        $r_in=mysqli_query($con,$in);
    }
}

?>


<script src="jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
       $(document).ready(function() {
            setInterval(function () {
                $('#show').load('chat_data.php')
                $("#show").scrollTop($("#show")[0].scrollHeight);
            }, 1000);
        });
   </script>

<?php
}


}
else
{
    echo "<script>window.open('login.php','_self')</script>";
    echo "<script>alert('Please Login For Chat...!!!')</script>";
}

?>