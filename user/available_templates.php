<?php
require_once("../Connection/connection.php");

if(isset($_POST['bserch']))
{
	$serch=$_POST['serch'];
$qry1=mysql_query("SELECT DISTINCT master_name FROM  `master_food_reg` where  master_name LIKE '%$serch%'") or die(mysql_error());
}
else
{
	$qry1=mysql_query("SELECT DISTINCT master_name FROM  `master_food_reg` ") or die(mysql_error());
}
?>
<?php
include("header.html");

?>

<div class="container">
	<br>
	<div class="row">
	<div class="col-sm-4">
		<form method="post">
	<input class="form-control" type="text" name="serch" placeholder="Enter Food Name" required="">
	</div>
	<div class="col-sm-1">
	<button type="submit" class="btn btn-info" name="bserch">Search</button>
	</div>
	<div class="col-sm-3">
	<a href="available_foods.php"><button type="button" class="btn btn-info" name="b">View All</button></a>
	</form>
	</div>
</div>
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
  				<a class="btn btn-primary btn-lg" href="template_croosmatch.php?template=<?php echo $master_name ?>" role="button">Cross Match</a>
			</div>
	</div>
			<?php
		}
	}

	else
	{
		?>
	     <p style="color:red">&nbsp&nbsp&nbspNo Result</p>
	     <?php
	}

	?>
</div>
</div>
<?php
include("footer.html");

?>