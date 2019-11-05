
<?php include("connection.php");?>
<?php include("function.php");?>
<?php
$menu_name=$_POST['menu_name'];
$content=$_POST['content'];
?>

<?php
$query="INSERT INTO tables(menu_name, content)";
$query.=" VALUES ('{$menu_name}','{$content}')";
if(mysqli_query($connection, $query)){
    header("location:content.php");
    exit;
}else{
    echo "<p> Subject creation failed.</p>";
    echo "<p>" .mysqli_error(). "</p>";
}
?>
<?php 
if(isset($connection)){
    mysqli_close($connection);
}
?>