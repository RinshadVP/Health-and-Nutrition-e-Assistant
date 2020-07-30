<?php
$host= "localhost";
$username= "root";
$password = "";
$db_name = "db_health";
$db = new mysqli($host,$username,$password,$db_name);
if($db->connect_error)
{
	die("connection failed:". $db->connect_error);
	
}
?>

<?php
//include('db_config.php');
//require_once("../Connection/connection.php");
$time1 = $_POST['time'];
$item1 = $_POST['item'];
$sql= "select * from reg_food_master where Time='$time1' and Category='$item1'";
$query = $db->query($sql);
echo '<option value="">Select Name</option>';
while($res = $query->fetch_assoc()){
echo '<option value="'.$res['Foodname'].'">'.$res['Foodname'].'</option>';
	
}
?>