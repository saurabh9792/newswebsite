<?php

include "config.php";

$categoryid=$_GET["id"];

$sql="DELETE FROM category WHERE category_id={$categoryid}";
$result=mysqli_query($conn,$sql) or die("Query failed");

if($result){

    header("Location:http://localhost:70/news-website/admin/category.php");

    mysqli_close($conn);
  }
?>