<?php
include("../connection/connection.php");


$qry=mysql_query("select * from nutri_facts_reg")or die(mysql_error());
?> 
      <?php 
  include("header.html");
  ?>
  <div class="container">
    <div class="row">
    <div class="col-sm-12">
    	<div class="table table-responsive">
<table  border="1px" class="table table-striped">
	<tr>
		<th>ID</th>
		<th>NAME</th>
		<th>CATEGORY</th>
		<th>FAT</th>
		<th>SUGAR</th>
		<th>FIBER</th>
		<th>CARBOHYDRATES</th>
		<th>WATER</th>
		<th>MINERALS</th>
		<th>PROTEIN</th>
		<th>VITAMINS</th>
		<th>EDIT</th>
		<th>DELETE</th>
	</tr>
	<?php

	$i=1;

		if (mysql_num_rows($qry)>0) {

			while ($res=mysql_fetch_assoc($qry)) {

				if(isset($_POST['delete'.$i]))
				{
					$ID=$res['Reg_id'];
					mysql_query("delete from nutri_facts_reg where Reg_id='$ID'");
					header("location:".$_SERVER['PHP_SELF']);
				}

				if(isset($_POST['edit'.$i]))
				{
				echo $ID=$res['Reg_id'];
				header("location:Nutrition_facts_update.php?Reg_id=".$res['Reg_id']);
					
				}


				?>
		<tr>
		<td><?php echo $res['Reg_id'] ?></td>
		<td><?php echo $res['Name'] ?></td>
		<td><?php echo $res['Category'] ?></td>
		<td><?php echo $res['Fat'] ?></td>
		<td><?php echo $res['sugar'] ?></td>
		<td><?php echo $res['fiber'] ?></td>
		<td><?php echo $res['Carbohydrates'] ?></td>
		<td><?php echo $res['water'] ?></td>
		<td><?php echo $res['minerals'] ?></td>
		<td><?php echo $res['Protein'] ?></td>
		<td><?php echo $res['vitamins'] ?></td>


			<form method="post">

		<td><input class="btn btn-info" type="submit" value="EDIT" name="edit<?php echo($i) ?>"></td>

		<td><input class="btn btn-danger" type="submit" value="DELETE" onclick="return confirm('Are you sure?')" name="delete<?php echo($i) ?>" />  </td>
	</form>
	</tr>
				<?php
				$i++;
			}
		}
	?>
	
</table>
</div>
</div>
</div>
</div>
  <?php 
      include("footer.html");

      ?>
