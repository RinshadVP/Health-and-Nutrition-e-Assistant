
<?php
if (!isset($_SESSION)) {
	
	session_start();
}
if(isset($_SESSION['user_id']))
{
	echo $_SESSION['user_id'];

}
else
{
	header("location:error.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>