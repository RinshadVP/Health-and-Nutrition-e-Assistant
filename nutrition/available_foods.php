<?php
require_once("../Connection/connection.php");
$qry1=mysql_query("SELECT DISTINCT food_name FROM  `food_ingri_reg` ") or die(mysql_error());

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	<?php
include("header.html");

?>
<div class="container">
	<br>
	<div class="row">
	<?php
	if(mysql_num_rows($qry1)>0)
	{
		while($aray1=mysql_fetch_assoc($qry1))
		{

			$foodname=$aray1['food_name'];
			#query for available food ingridiens
			$res=mysql_query("SELECT ingrediens,quantity FROM `food_ingri_reg` where food_name='$foodname'") or die(mysql_error());
			?>
				<div class="col-sm-4">
			<div style="padding:30px;border:1px solid #dee2e6;height: 300px">
  				<h4 class="display-8"><b><?php echo $aray1['food_name']; ?></b></h4>
  				<hr class="my-4">
  				<p><b>Ingredients</b></p>
  				<?php
  				while ($foodingri=mysql_fetch_assoc($res)) {
  				
  				?>
  				<?php echo $foodingri['ingrediens']  ?>-<?php echo $foodingri['quantity']  ?>gm | 
  			<?php } ?> 
  			<br>
  			<br>
			</div>
	</div>
			<?php
		}
	}

	?>
</div>
</div>
<?php
include("footer.html");
?>
</body>
</html>