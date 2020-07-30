 <?php
require_once("../connection/connection.php");

session_start();
 $user_id= $_SESSION['user_id'];

$qry=mysql_query("SELECT * FROM `user_reg` where Reg_id='$user_id'");
$arra=mysql_fetch_array($qry);


 if(isset($_POST['REGISTER']))
{
  $name=$_POST['name'];
  $place=$_POST['place'];
  $dob=$_POST['dob'];
  $contact=$_POST['contact'];
  $pressure=$_POST['pressure'];
  $cholesterol=$_POST['cholesterol'];
  $suger=$_POST['suger'];

  mysql_query("update user_reg set name='$name',place='$place',dob='$dob',contact='$contact',pressure='$pressure',cholesterol='$cholesterol',suger='$suger'  where Reg_id=$user_id")  or die(mysql_error());

  header("location:home.php");
}
?>

<?php
include("header.html");

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
 
</head>
<body>
 
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-8">
      <h3 align="center"><b>USER REGISTRATION</b></h3>
      <!--form started-->
      <form class="form-horizontal" action="" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $arra['name']?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="place">Place:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="place" placeholder="Enter place" name="place" value="<?php echo $arra['place']?>">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="dob">DOB:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="txtfuturedate" placeholder="Select DOB" name="dob" value="<?php echo $arra['dob']?>">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="place">CONTACT:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="place" placeholder="Enter NUMBER" name="contact" value="<?php echo $arra['contact']?>">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="preasure">Preasure:</label>
      <div class="col-sm-10">          
        <select name="pressure" class="form-control" required="">
          <option value="">Select</option>
          <?php
          if($arra['pressure']!="")
          {
            ?>
            <option selected="" value="<?php echo $arra['pressure'] ?>"><?php echo$arra['pressure'] ?></option>
            <?php
          }

        
          ?>
          <option value="Low">Low</option>
          <option value="Normal">Normal</option>
        	<option value="Border">Border</option>
        	<option value="Patient">Patient</option>
        	<option value="Critical">Critical</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="cholesterol">cholesterol:</label>
      <div class="col-sm-10">          
        <select name="cholesterol" class="form-control" required="">
          <option value="">Select</option>

          <?php
          if($arra['cholesterol']!="")
          {
            ?>
            <option selected="" value="<?php echo $arra['cholesterol'] ?>"><?php echo$arra['cholesterol'] ?></option>
            <?php
          } 
          ?>

          <option value="Low">Low</option>
          <option value="Normal">Normal</option>
          <option value="Border">Border</option>
          <option value="Patient">Patient</option>
          <option value="Critical">Critical</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="suger">suger:</label>
      <div class="col-sm-10">          
        <select name="suger" class="form-control" required="">
          <option value="">Select</option>

           <?php
          if($arra['suger']!="")
          {
            ?>
            <option selected="" value="<?php echo $arra['suger'] ?>"><?php echo$arra['suger'] ?></option>
            <?php
          }
          ?>
        	<option value="Low">Low</option>
          <option value="Normal">Normal</option>
          <option value="Border">Border</option>
          <option value="Patient">Patient</option>
          <option value="Critical">Critical</option>
        </select>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="REGISTER" name="REGISTER" class="btn btn-default">REGISTER</button>
      </div>
    </div>
  </form>
      <!--close form -->
    </div>
  </div>
  
</div>

</body>

</html>

<?php
include("footer.html");

?>
