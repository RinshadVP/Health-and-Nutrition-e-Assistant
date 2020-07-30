
<?php
$regid=$_GET['reg_id'];

include("../connection/connection.php");

$qry=mysql_query("select * from nutri_reg where reg_id='$regid'")or die(mysql_error());
$res=mysql_fetch_assoc($qry);



if(isset($_POST['REGISTER']))
{
  $name=$_POST['name'];
  $Place=$_POST['place'];
  $dob=$_POST['Dob'];
  $contact=$_POST['contact'];
  $Email=$_POST['email'];
  $username=$_POST['username'];
  $Password=$_POST['pwd'];
mysql_query("update nutri_reg set name='$name',place='$Place',Dob='$dob',contact='$contact',email='$Email',username='$username',Password='$Password' where reg_id=$regid")or die(mysql_error());


header("location:nutrition_manage.php");
}
?>
<?php 
  include("header.html");
  ?>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      <h3 align="center"><b>UPDATE DETALES</b></h3>
      <!--form started-->
      <form class="form-horizontal" action="" method="post">
    <div class="form-group">


      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $res['Name'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="place">Place:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="place" placeholder="Enter place" name="place" value="<?php echo $res['Place'] ?>">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="Dob">Dob:</label>
      <div class="col-sm-10">          
        <input type="date" class="form-control" id="dob" placeholder="Enter Dob" name="Dob" value="<?php echo $res['DOB']?>">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="place">CONTACT:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="contact" placeholder="Enter NUMBER" name="contact" value="<?php echo $res['Contact']?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $res['Email']?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">username:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username"  value="<?php echo $res['Username']?> ">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" value=" <?php echo $res['Password'] ?>">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="REGISTER" class="btn btn-info">Update</button>
      </div>
    </div>
  </form>
      <!--close form -->
    </div>
  </div>
  
</div>
<?php 
  include("footer.html");
  ?>