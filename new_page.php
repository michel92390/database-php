<?php include("connection.php");?>
<?php include("function.php");?>
<?php include("header.php");?>
<?php
find_selected_page();
?>

            <table id="structure">
              <tr>
                 <td id="navigation">
                  &nbsp;
                  <ul class="pages">
                  <?php
                  navigation();        
                  ?>
                   </ul>
                  <br/>
                      <a href="new_page.php">+ Add a new page</a>
                      <br/>
                </td>
                <td id="page">
                  <h2>Add page</h2>
                  <form action="create_page.php" method="post">
                  <p>
                  page name:<input type="text" name="menu_name" value="" id="menu_name" />
                  </p>
                  <p>Content:<br />
                  <textarea name="content" rows="20" cols="60"></textarea>
                  </p>
                  <input type="submit" value="Add page" />
                  </form>
                  <a href="content.php">Cancel</a>
                  </td>
                  </tr>
                  </table>
                  <?php include("footer.php");?>