<?php

$con=mysqli_connect("localhost","root","","rs1");

$user="select * from user_login";

$run_user=mysqli_query($con,$user);

while ($row_user=mysqli_fetch_array($run_user)) {
	
	$id=$row_user['id'];
	$name=$row_user['name'];
	$login=$row_user['log_in'];

	echo "<div>
	<p><a href='abc.php?name=$name'>$name</a></p>";
	if ($login=="Online") {
		echo "<span>Online</span>";
	}
	else
	{
		echo "<span>Offline</span>";	
	}
	"
	</div>";
}


?>

