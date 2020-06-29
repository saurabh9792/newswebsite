<?php

if(isset($_POST["submit"])){
    include "config.php";
    if(empty($_FILES["logo"]["name"]))
    {
        
         $file_name=$_POST["old_logo"];
    }else
    {

        $erros=array();
    
        $file_name=$_FILES["logo"]["name"];
        $file_size=$_FILES["logo"]["size"];
        $file_tmp=$_FILES["logo"]["tmp_name"];
        $file_type=$_FILES["logo"]["type"];
        $file_ext=explode(".",$file_name);
        $extension=array("jpg","png","jpeg");
    
      move_uploaded_file($file_tmp,"images/".$file_name) or die("image not upload") ;
    

    }

 $sql="UPDATE setting SET websitename='{$_POST["website_name"]}',logo='{$file_name}',footerdesc='{$_POST["footer_desc"]}'";


if (mysqli_query($conn,$sql))
{

	 header("Location:http://localhost:70/news-website/admin/setting.php");

  
}else
{
    echo "query failed";
}

mysqli_close($conn);
}



    


    




?>