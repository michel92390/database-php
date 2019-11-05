<?php session_start();?>
<?php include("function.php");?>

<?php include("header.php");?>
            <table id="structure">
               <tr>
                  <td id="navigation">
                       &nbsp;
                  </td>
                  <td id="page">
                     <h2>Staff menu</h2>
                     <p>Welcome to the staff area.
                     <?php echo $_SESSION['user_name'];?>
                     </p>
                     <ul>
                        <li><a href="content.php">manage website content</a></li>
                        <li><a href="new_user.php">Add staff User</a></li>
                        <li><a href="logout.php">logout</a></li>
                    </ul>
                </td>
            </tr>
        </table>
<?php include("footer.php");?>