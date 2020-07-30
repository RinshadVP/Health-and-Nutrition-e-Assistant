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
$type = $_POST['type'];
$class = $_POST['fclass'];
$sql= "select * from reg_template_master where type='$type' and class='$class'";
$query = $db->query($sql);
echo '<option value="">Select State</option>';
while($res = $query->fetch_assoc()){
echo '<option value="'.$res['name'].'">'.$res['name'].'</option>';	
}
?>