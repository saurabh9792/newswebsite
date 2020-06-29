<?php

if(isset($_POST["submit"])){
	include "config.php";

  $categoryid=$_POST["cat_id"];
  $categoryname=$_POST["cat_name"];
 
 $sql ="UPDATE category SET category_name='{$categoryname}' WHERE category_id={$categoryid}";

if (mysqli_query($conn,$sql))
{

	 header("Location:http://localhost:70/news-website/admin/category.php");

  
}else
{
    die("query failed");
}

mysqli_close($conn);
}



?>