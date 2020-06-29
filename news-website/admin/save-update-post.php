<?php

if(isset($_POST["submit"])){
    include "config.php";
    if(empty($_FILES["new-image"]["name"]))
    {
        
      $target=$_POST["old_image"];
    }else
    {

        $erros=array();
    
        $file_name=$_FILES["new-image"]["name"];
        $file_size=$_FILES["new-image"]["size"];
        $file_tmp=$_FILES["new-image"]["tmp_name"];
        $file_type=$_FILES["new-image"]["type"];
        $file_ext=explode(".",$file_name);
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

 $sql="UPDATE post SET title='{$_POST["post_title"]}',description='{$_POST["postdesc"]}',category={$_POST["category"]},post_img='{$image_name}' 
 WHERE post_id={$_POST["post_id"]};";
 if($_POST["old_category"]!=$_POST["category"]){
$sql.="UPDATE category SET post=post - 1 WHERE category_id={$_POST['old_category']};";
$sql.="UPDATE category SET post=post + 1 WHERE category_id={$_POST['category']}";

 }


if(mysqli_multi_query($conn,$sql)){

	 header("Location:http://localhost:70/news-website/admin/post.php");

  
}else
{
    echo "query failed";
}

mysqli_close($conn);
}



    


    




?>