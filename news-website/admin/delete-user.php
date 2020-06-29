<?php

include "config.php";

$userid=$_GET["id"];

$sql="DELETE FROM user WHERE user_id={$userid}";
$result=mysqli_query($conn,$sql) or die("Query failed");

if($result){

    header("Location:http://localhost:70/news-website/admin/users.php");

    mysqli_close($conn);
  }
?>