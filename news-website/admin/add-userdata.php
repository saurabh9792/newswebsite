<?php

if(isset($_POST["save"])){
	include "config.php";

 $fname=mysqli_real_escape_string($conn,$_POST["fname"]);
 $lname=mysqli_real_escape_string($conn,$_POST["lname"]);
 $user=mysqli_real_escape_string($conn,$_POST["user"]);
 $password=md5($_POST["password"]);
 $role=mysqli_real_escape_string($conn,$_POST["role"]);

$sql ="SELECT username FROM user WHERE username='{$user}'";
$result=mysqli_query($conn,$sql) or die("Query failed");

if (mysqli_num_rows($result) >0){
	
	echo "<p style='color:red;text-align:center;margin:10px 0px;'>Username is already exists</p>";

}else{
	$sql1="INSERT INTO user (first_name,last_name,username,password,role) VALUES ('{$fname}','{$lname}','{$user}','{$password}','{$role}')";
	$result1=mysqli_query($conn,$sql1) or die("Query is unsucessful");

 
   

	 header("Location:http://localhost:70/news-website/admin/users.php");

	 mysqli_close($conn);
  

}

}
?>