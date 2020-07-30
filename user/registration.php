<?php
require_once("../connection/connection.php");
#start insert
if(isset($_POST['REGISTER']))
{
  $name=$_POST['name'];
  $place=$_POST['place'];
  $dob=$_POST['dob'];
  $contact=$_POST['contact'];
  $pressure=$_POST['pressure'];
  $cholesterol=$_POST['cholesterol'];
  $suger=$_POST['suger'];
  $password=$_POST['password'];
  mysql_query("insert into user_reg(name,place,dob,contact,pressure,cholesterol,suger,password) values('$name','$place','$dob','$contact','$pressure','$cholesterol','$suger','$password')") or die(mysql_error());
  ?>
<script type="text/javascript">
  alert("Message");
  window.location="login.php";
</script>
  <?php

}
#end insert
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="place">Place:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="place" placeholder="Enter place" name="place">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="dob">DOB:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="txtfuturedate" placeholder="Select DOB" name="dob">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="place">CONTACT:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="place" placeholder="Enter NUMBER" name="contact">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="preasure">Preasure:</label>
      <div class="col-sm-10">          
        <select name="pressure" class="form-control" required="">
          <option value="">Select</option>
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
        	<option value="Low">Low</option>
          <option value="Normal">Normal</option>
          <option value="Border">Border</option>
          <option value="Patient">Patient</option>
          <option value="Critical">Critical</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">C-Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<script>
$("#txtfuturedate").datepicker({
    maxDate: 0
});
</script>
</html>