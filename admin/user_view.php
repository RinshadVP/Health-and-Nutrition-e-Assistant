<?php
include("../connection/connection.php");
 $user_id=$_GET['user_id'];
 echo $user_id;
$qry=mysql_query("select * from user_reg where Reg_id='$user_id'")or die(mysql_error());
$ary=mysql_fetch_assoc($qry);
?>

<?php include("header.html"); ?>
<div class="container">
  <div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col-sm-8">
<table border="1" class="table table-striped">
        <tr>
         <td> NAME</td>

         <td> <?php echo $ary['name'];?></td>
         </tr> 
         <tr>
         <td> PLACE</td>
         <td>  <?php echo $ary['place'];?></td> 
          </tr>
         <td> DOB</td>
         <td> <?php echo $ary['dob']; ?></td> 
         <tr>
         <td> CONTACT</td>
         <td> <?php echo $ary['contact'];?></td> 
     </tr>
        </tr>
    </table>
      </div>
  <div class="col-sm-2">
    
  </div>
</div>
</div>
  
<?php include("footer.html"); ?>
</body>
</html>