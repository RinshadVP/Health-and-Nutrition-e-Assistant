<?php
require_once("../Connection/connection.php");
$qry1=mysql_query("SELECT DISTINCT master_name FROM  `master_food_reg` ") or die(mysql_error());

?>

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

			$master_name=$aray1['master_name'];
			#query for available food ingridiens
			$res=mysql_query("SELECT food,quanity FROM `master_food_reg` where master_name='$master_name'") or die(mysql_error());
			?>
				<div class="col-sm-4">
			<div style="padding:30px;border:1px solid #dee2e6;height: 300px">
  				<h4 class="display-8"><b><?php echo $aray1['master_name']; ?></b></h4>
  				<hr class="my-4">
  				<p><b>Foods</b></p>
  				<?php
  				while ($foods=mysql_fetch_assoc($res)) {
  				
  				?>
  				<?php echo $foods['food']  ?>-<?php echo $foods['quanity']  ?> | 
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