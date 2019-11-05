
<?php include("connection.php");?>
<?php include("function.php");?>
<?php
     $id=$_GET['page'];

     if($page=get_page_by_id($id))
     {
         $query="DELETE FROM pages WHERE id = " . $id;
         $result=mysqli_query($connection, $query);
              if(mysqli_affected_rows()==1)
              {
                  header("location: content.php");
                  exit;
              }else{
                  echo "<p> Delete failed". mysqli_error()."</p>";
                  echo "<a href=\"content.php\"> Return to main page";
              }

     }else{
         header("location: content.php");
         exit;
     }
     ?>
     <?php mysqli_close($connection);?>