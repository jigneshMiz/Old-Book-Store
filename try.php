<html>
<body>

<?php 
	$a=$_POST["bnm"];
	echo "book name: ".$a."<br />";
	echo "Author: ".$_POST["anm"]."<br />";
	echo "Course: ".$_POST["cnm"]."<br />";
	echo "Branch: ".$_POST["brnm"]."<br />";
	echo "Semester: ".$_POST['snm']."<br/>";
	echo "Subject: ".$_POST['subnm']."<br/>";
	echo "price: ".$_POST['pr']."<br/>";
	echo "Condition: ".$_POST['con']."<br/>";

	 if(isset($_POST['submit']))
	 {
	 	$target_path="uploads/";
	 	$target_path=$target_path.basename($_FILES['img']['name']);
	 	if(move_uploaded_file($_FILES['img']['tmp_name'], $target_path))
	 	{
	 		//$conn=new mysqli("localhost","root","","rs1");
	 		$sql="INSERT INTO user_upload(name,path) VALUES('$a','$target_path')";
	 		if($conn->query($sql)==TRUE)
	 		{
	 			echo "<br><br>";
	 		}
	 		else
	 		{
	 			echo "Error:".$sql.$conn->error;
	 		}

	 			$sql1="SELECT name,path FROM user_upload";
	 			$result=$conn->query($sql1);
	 			if($result->num_rows>0)
	 			{
	 				while($row=$result->fetch_assoc())
	 				{
	 					$name=$row['name'];
	 					$path=$row['path'];
	 					echo $name;
	 					echo "<img src='$path' height='280' width='320'>";
	 				}
	 			}
	 			$conn->close();
	 		}
	 	}
	 				
	 	
	 	
	 
?>
</body>
</html>