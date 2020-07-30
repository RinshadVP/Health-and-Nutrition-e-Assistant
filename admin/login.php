<?php
$er="";
require_once("../Connection/connection.php");
#include("connection.php");
#start insert
if(isset($_POST['login']))
{
  $username=$_POST['username'];
  $password=$_POST['pwd'];
$logqry=mysql_query("select * from admin_login where username='$username' and password ='$password'") or die(mysql_error());
if(mysql_num_rows($logqry)>0)

{
  $ary=mysql_fetch_assoc($logqry);
  $user_id=$ary['id'];
  session_start();
  $_SESSION['user_id']=$user_id;

  header("location:home.php");

}
else
{
  $er="Incorrect Username Or Password";
}

}
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
      <h3 align="center"><b>LOGIN</b></h3>
      <!--form started-->
      <form class="form-horizontal" method="post" action="">
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
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
      <div class="col-sm-offset-2 col-sm-10">
        <p style="color:red"><?php echo $er ?></p>
        <button type="submit" name="login" class="btn btn-default">Login</button>
      </div>
    </div>
  </form>
      <!--close form -->
    </div>
  </div>
  
</div>

</body>
</html>