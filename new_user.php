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
        

  
<?php
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $hashed_password = sha1($password);

    $query = "INSERT INTO users (
        username, hashed_password) VALUES (
            '{$username}', '{$hashed_password}')";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $message = "The user was successfully created.";
        }else{
            $message = "The user could not be created.";
            $message .= "<br />".mysqli_error();
        }
    }
        else{
            $username ="";
            $password ="";
        
}

?>
 <h2>Create new user</h2>
<?php if(!empty($message)) {
echo   "<p class=\"message\">".$message."</p>";}?>
<form action="new_user.php" method="post">
<table>
   <tr>
       <td>Username:</td>
       <td><input  type="text" name="username" maxlength="30" value="<?php echo htmlentities($username);?>" /></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input  type="password" name="password" maxlength="30" value="<?php echo htmlentities($password);?>" /></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="submit" value="Create user" /></td>
    </tr>
</table>
</form>