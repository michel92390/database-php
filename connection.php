<?php require("constant.php");?>
<?php
$connection=mysqli_connect("localhost","root","","cmsdb");
if(!$connection){
    die("database connection failed: ".mysqli_error());
}

$db_select=mysqli_select_db($connection, "cmsdb");
if(!$db_select){
    die("database selectionfailed: ".mysqli_error());
}
?>