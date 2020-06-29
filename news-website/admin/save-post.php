<?php

if(isset($_POST["submit"])){
include "config.php";
if(isset($_FILES["fileToUpload"]))
{
    $erros=array();

    $file_name=$_FILES["fileToUpload"]["name"];
    $file_size=$_FILES["fileToUpload"]["size"];
    $file_tmp=$_FILES["fileToUpload"]["tmp_name"];
    $file_type=$_FILES["fileToUpload"]["type"];
    $file_ext=end(explode(".",$file_name));
    $extension=array("jpg","png","jpeg");

  if(in_array($file_ext,$extension===false))
  {
   $erros[]="file extension is invalid plz choose a jpg ,png ,jpeg";
  }   
  if($file_size > 2097152)
  {
    $erros[]="file-size must be 2mb or lower ";
  }
  $new_name=time(). "-" .basename($file_name);
  $target ="upload/".$new_name;
  $image_name=$new_name;

if(empty($erros)==true){
  move_uploaded_file($file_tmp,$target) or die("image not upload") ;

}else
{
  print_r($erros);
  die();
}

}

session_start();
$title=mysqli_real_escape_string($conn,$_POST["post_title"]);
$discription=mysqli_real_escape_string($conn,$_POST["postdesc"]);
$category=mysqli_real_escape_string($conn,$_POST["category"]);
$date=date("d ,M,Y");
$author=$_SESSION["user_id"];

$sql="INSERT INTO post(	title,description,category,post_date,author,post_img)
                    VALUES('{$title}','{$discription}','{$category}','{$date}','{$author}','{$image_name}');";
$sql.="UPDATE category SET post=post + 1 WHERE category_id ={$category}";                    


if(mysqli_multi_query($conn,$sql))

 {
   
	 header("Location:http://localhost:70/news-website/admin/post.php");

	
   }else
   {
       echo "<div class='alert alert-danger'>Query failed</div>";
   }
}
?>