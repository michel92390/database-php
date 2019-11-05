<html>
<head>
<title>Login with Users Online Tutorial</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<form action="login.php" method="post">
<div id="border">
<table cellpadding="2" cellspacing="0" border="0">
<tr>
<td>Username:</td>
<td><input type="text" name="username" /></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="password" /></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Login" /></td>20
</tr>
<tr>
<td align="center" colspan="2"><a href="register.php">Register</a> | <a href="forgot.php">Forgot Pass</a></td>
</tr>
</table>
</div>
</form>
</body>
</html>
<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();
ob_start();
//connect to the database so we can check, edit, or insert data to our users table
include("config.php");
//include out functions file giving us access to the protect() function made earlier
include("functions.php");
?>
<?php
//If the user has submitted the form
if($_POST['submit']){
//protect the posted value then store them to variables
$username = protect($_POST['username']);
$password = protect($_POST['password']);
//Check if the username or password boxes were not filled in
if(!$username || !$password){
//if not display an error message
echo "<center>You need to fill in a <b>Username</b> and a <b>Password</b>!</center>";
}else{
//if the were continue checking
//select all rows from the table where the username matches the one entered by the user
$res = mysqli_query($con,"SELECT * FROM `users` WHERE `username` = '".$username."'");
$num = mysqli_num_rows($res);
//check if there was not a match
if($num == 0){
//if not display an error message
echo "<center>The <b>Username</b> you supplied does not exist!</center>";
}else{
//if there was a match continue checking
//select all rows where the username and password match the ones submitted by the user
$res = mysqli_query($con,"SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '". md5($password)."'");
$num = mysqli_num_rows($res);
//check if there was not a match
if($num == 0){
//if not display error message
echo "<center>The <b>Password</b> you supplied does not match the one for that username!</center>";
}else{
//if there was continue checking
//split all fields fom the correct row into an associative array
$row = mysqli_fetch_assoc($res);
//check to see if the user has not activated their account yet
if($row['active'] != 1){
//if not display error message
echo "<center>You have not yet <b>Activated</b> your account!</center>";
}else{
//if they have log them in
//set the login session storing there id - we use this to see if they are logged in or not
$_SESSION['uid'] = $row['id'];
//show message
echo "<center>You have successfully logged in!</center>";
//update the online field to 50 seconds into the future
$time = date('U')+50;
mysqli_query($con,"UPDATE `users` SET `online` = '".$time."' WHERE `id` = '".$_SESSION['uid']."'");
//redirect them to the usersonline page
header('Location: usersOnline.php');
}
}
}
}
}
?>
<?php
ob_end_flush();
?>
