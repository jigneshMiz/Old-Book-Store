<?php
session_start();

$con=mysqli_connect("localhost","root","","rs1");
$user=$_SESSION['user'];
$upm=mysqli_query($con,"UPDATE user_login SET log_in='Offline',on_time=NOW() WHERE username='$user'");


	session_destroy();
header('location:login.php');




?>