
<?php
require_once("../connection/connection.php");
#start insert
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
$qry=mysql_query("select * from  nutri_reg where reg_id='$user_id'") or die(mysql_error());
$ary=mysql_fetch_assoc($qry);
?>
<?php
include("header.html");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Change User Details</title>
</head>
  <body>
    <br>
    <br>
  	<table border="0" align="center" width="30%" cellpadding="10" cellspacing="10" frame="box">
        <tr>
          <td colspan="3" align="center"><b>PROFILE</b></td>
        </tr>
        <tr>
          <td width="50%">Register Id</td>   
          <td>:</td>
          <td width="50%"><?php echo $ary['reg_id'] ?></td>
        </tr>
        <tr>
          <td width="50%">Name</td>   
          <td>:</td>
          <td width="50%"><?php echo $ary['Name'] ?></td>
        </tr>
        <tr>
           <td>Place</td>
           <td>:</td>
          <td><?php echo $ary['Place'] ?></td>
         </tr> 
        <tr>
           <td>DOB</td>
           <td>:</td>
          <td><?php echo $ary['DOB'] ?></td>
         </tr> 
         <tr>
          <td>Contact</td>
          <td>:</td>
          <td><?php echo $ary['Contact'] ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><?php echo $ary['Email'] ?></td>
        </tr>
    </table>
</body>
</html>
<?php

include("footer.html");



?>