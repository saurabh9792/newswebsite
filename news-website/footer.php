

<div id ="footer"  style="background-color:rgba(255, 99, 71, 1);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    <?php
     include "config.php";
    $sql="SELECT * FROM setting ";
      $result=mysqli_query($conn,$sql) or die("Query is unsucessful");
      if(mysqli_num_rows($result) > 0)
        {
         while($row=mysqli_fetch_assoc($result))
            {
      ?>    
       <span><?php echo $row["footerdesc"];?></a></span>
            </div>
            <?php
            }
        }
            ?>
        </div>
    </div>
</div>
</body>
</html>
