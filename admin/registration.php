<?php
require_once("../connection/connection.php");
#start insert
if(isset($_POST['REGISTER']))
{
  $name=$_POST['name'];
  $Place=$_POST['place'];
  $dob=$_POST['Dob'];
  $contact=$_POST['contact'];
  $Email=$_POST['email'];
  $username=$_POST['username'];
  $Password=$_POST['pwd'];
  mysql_query("insert into nutri_reg(Name,Place,DOB,Contact,Email,Username,Password) values('$name','$Place','$dob','$contact','$Email','$username','$Password')") or die(mysql_error());
  ?>
<script type="text/javascript">
  alert("Account Created");
  window.location="registration.php";
</script>
  <?php

}
#end insert
?>

  <?php 
  include("header.html");
  ?>
  <div class="container">
    <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <h4 align="center"><b>NUTRITION REGISTRATION</b></h4>
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
      <label class="control-label col-sm-2" for="Dob">Dob:</label>
      <div class="col-sm-10">          
        <input type="date" class="form-control" id="place" placeholder="Enter Dob" name="Dob">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="place">Contact:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="place" placeholder="Enter NUMBER" name="contact">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">username:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="REGISTER" class="btn btn-info">REGISTER</button>
      </div>
    </div>
  </form>
</div>
</div>
  <div class="col-sm-2"></div>
</div>
  <?php 
      include("footer.html");

      ?>