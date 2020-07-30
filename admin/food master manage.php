<?php
include("../connection/connection.php");

$qry=mysql_query("select * from nutri_reg")or die(mysql_error());
?>
 <?php 
  include("header.html");
  ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-2"><br>
				 <?php //include("sidemenu.php") ?>

			</div>
			<div class="col-sm-8">
				<br>
				<br>
				<table  border="1px"  class="table table-striped">
						<tr>
		<th>ID</th>
		<th>NAME</th>
		<th>PLACE</th>
		<th>DOB</th>
		<th>CONTACT</th>
		<th>E_MAIL</th>
		<th>USERNAME</th>
		<th>PASSWORD</th>
		<th>EDIT</th>
		<th>DELETE</th>
	</tr>
	
	<?php
	 $i=1;

		if (mysql_num_rows($qry)>0) {

			while ($res=mysql_fetch_assoc($qry)) {

				if(isset($_POST['delete'.$i]))
				{
					$id=$res['reg_id'];
					mysql_query("delete from nutri_reg where reg_id='$id'" );
					header("loacation:".$_SERVER['PHP_SELF']);

				}

					if(isset($_POST['edit'.$i]))
				{
					
					//header("loacation:nutrition_update.php");
					echo $id=$res['reg_id'];
					header("location:nutrition_update.php?reg_id=".$res['reg_id']);
				}


				?>
		<tr>
		<td><?php echo $res['reg_id'] ?></td>
		<td><?php echo $res['Name'] ?></td>
		<td><?php echo $res['Place'] ?></td>
		<td><?php echo $res['DOB'] ?></td>
		<td><?php echo $res['Contact'] ?></td>
		<td><?php echo $res['Email'] ?></td>
		<td><?php echo $res['Username'] ?></td>
		<td><?php echo $res['Password'] ?></td>

		<form method="post">


		<td><input type="submit" value="EDIT" class="btn btn-info" name="edit<?php echo $i?>"/></td>

		<td><input type="submit" class="btn btn-danger" value="DELETE" name="delete<?php echo $i?>"/></td></form>
	</tr>
				<?php

				$i++;
			}
		}
	?>
	
</table>
	
		</div>


</div>
 <div class="col-sm-2">
    </div>
    <?php 
      include("footer.html");

      ?>
