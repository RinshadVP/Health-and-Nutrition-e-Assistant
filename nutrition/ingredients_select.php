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
$ingredients = $_POST['ingredients'];
$sql= "select * from nutri_facts_reg where Category='$ingredients'";
$query = $db->query($sql);
echo '<option value="">Select Name</option>';
while($res = $query->fetch_assoc()){
echo '<option value="'.$res['Name'].'">'.$res['Name'].'</option>';
	
}
?>