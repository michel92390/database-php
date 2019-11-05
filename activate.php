<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();
//connect to the database so we can check, edit, or insert data to our users table
include("config.php");
//include out functions file giving us access to the protect() function made earlier
include("functions.php");
?>
<html>
<head>
<title>Login with Users Online Tutorial</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<?php
echo md5('other');
//get the code that is being checked and protect it before assigning it to a variable
$code = protect($_GET['code']);
//check if there was no code found
if(!$code){
//if not display error message
echo "<center>Unfortunatly there was an error there!</center>";
}else{
//other wise continue the check
//select all the rows where the accounts are not active
$res = mysqli_query($con"SELECT * FROM `users` WHERE `active` = '0'");
//loop through this script for each row found not active
while($row = mysqli_fetch_assoc($res)){
//check if the code from the row in the database matches the one from the user
if($code == md5($row['username']).$row['rtime']){
//if it does then activate there account and display success message
$res1 = mysqli_query($con,"UPDATE `users` SET `active` = '1' WHERE `id` = '".$row['id']."'");
echo "<center>You have successfully activated your account!</center>";
}
}
}
?>
</div>
</body>
</html>