
<?php
require_once("../Connection/connection.php");
if (!isset($_SESSION)) {
	
	session_start();
}
if(isset($_SESSION['user_id']))
{
	$user_id= $_SESSION['user_id'];

}
else
{
	header("location:error.php");
}
$prof=mysql_query("select * from user_reg where Reg_id='$user_id'")or die(mysql_error());
$profdata=mysql_fetch_assoc($prof);
?>

<?php
include("header.html");

?>



<table border="0" width="35%" cellspacing="10" cellpadding="10" align="center" frame="border">
	<tr>
		<td align="center" colspan="3"><b>USER PROFILE</b></td>
	</tr>
	<tr>
		<td>Register Id</td>
		<td>:</td>
		<td><?php echo $profdata['Reg_id'] ?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td>:</td>
		<td><?php echo $profdata['name'] ?></td>
	</tr>
	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php echo $profdata['place'] ?></td>
	</tr>
	<tr>
		<td>Date Of Birth</td>
		<td>:</td>
		<td><?php echo $profdata['dob'] ?></td>
	</tr>
	<tr>
		<td>Contact</td>
		<td>:</td>
		<td><?php echo $profdata['contact'] ?></td>
	</tr>
	<tr>
		<td>Pressure</td>
		<td>:</td>
		<td><?php echo $profdata['pressure'] ?></td>
	</tr>
	<tr>
		<td>Cholesterol</td>
		<td>:</td>
		<td><?php echo $profdata['cholesterol'] ?></td>
	</tr>
	<tr>
		<td>Suger</td>
		<td>:</td>
		<td><?php echo $profdata['suger'] ?></td>
	</tr>
	<tr>
		<td colspan="3" align="center"><a href="reg.php">Update Profile</a></td>
	</tr>
</table>
<?php
include("footer.html");

?>
