<?php
#connection code
$con=mysql_connect("localhost","root","");
if($con)
{
mysql_select_db("db_health",$con);
}
else
{
	echo "Not Connected";
}
#end connection
?>
