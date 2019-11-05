
<?php include("connection.php");?>
<?php include("function.php");?>
<?php 
     if(isset($_POST['submit']))
     {
         $id=$_GET['page'];
         $menu_name=$_POST['menu_name'];
         $content=$_POST['content'];
         $query="UPDATE tables SET menu_name='{$menu_name}', content='{$content}' WHERE id={$id}";
         $result=mysqli_query($connection, $query);
     }
     ?>
<?php find_selected_page();?>
<?php include("header.php");?>
            <table id="structure">
              <tr>
                 <td id="navigation">
                
                  <?php
                  navigation();        
                  ?>
                  
                </td>
                <td id="page">
                  <h2>Edit page:<?php echo $sel_page['menu_name'];?></h2>
                  <form action="edit_page.php?page=<?php echo urlencode($sel_page['id']);?>" method="post">
                  <p>
                  page name:<input type="text" name="menu_name" value="<?php echo $sel_page['menu_name'];?>" id="menu_name" />
                  </p>
                  <p>Content:<br />
                  <textarea name="content" rows="20" cols="80"><?php echo $sel_page['content'];?></textarea>
                  </p>
                  <input type="submit" name="submit" value="Edit page" />
                  &nbsp:&nbsp;
                  <a href="delete_page.php?page=<?php echo $sel_page['id'];?>"> Delete page</a>
                  </form>
                  <br/>
                  <a href="content.php">Cancel</a>
                  </td>
                  </tr>
                  </table>
                  <?php include("footer.php");?>