<?php session_start();?>
<?php include("connection.php");?>
<?php include("function.php");?>
<?php include("header.php");?>
<?php
  
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
    $errors = array();
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $hashed_password = sha1($password);
 
    $query  = "SELECT id, username ";
    $query .= "FROM users ";
    $query .= "WHERE username = '{$username}'";
    $query .= "AND hashed_password = '{$hashed_password}'";
    $query .= "LIMIT 1";
    $result_set = mysqli_query($connection, $query);
    confirm_query($result_set);
        if (mysqli_num_rows($result_set) == 1) {
            $found_user = mysqli_fetch_array($result_set);
            $_SESSION['user_id']=$found_user['id'];
            $_SESSION['user_name']=$found_user['username'];
            header("location: staff.php");
            exit;
        }else{
            $message = "Username/Password combination incorrect.<br />
            please make sure your caps lock key is off and try again.";
        
        }
    }
        else{
            $username ="";
            $password ="";
        
}
?>
 <h2>Login</h2>
<?php if(!empty($message)) {
echo   "<p class=\"message\">".$message."</p>";}?>
<form action="login.php" method="post">
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
        <td colspan="2"><input type="submit" name="submit" value="login" /></td>
    </tr>
</table>
</form>