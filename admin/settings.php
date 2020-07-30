<?php
require_once("../connection/connection.php");
#start insert
if (!isset($_SESSION)) {
  
  session_start();
}
if(isset($_SESSION['user_id']))
{
  $user_id= $_SESSION['user_id'];

}
else
{
  header("location:error.php");
}
require_once("../Connection/connection.php");
$uprf=mysql_query("select * from admin_login where id='$user_id'") or die(mysql_error());
$datas=mysql_fetch_assoc($uprf);
#include("connection.php");
#start insert
if(isset($_POST['login']))
{
  $username=$_POST['username'];
  $password=$_POST['pwd'];
$logqry=mysql_query("update admin_login set username='$username' ,  password='$password' where id='$user_id'") or die(mysql_error());
header("location:home.php");
}
?>
  
  <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<?php 
  include("header.html");
  ?>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-8">
      <h5 align="center"><b>CHANGE USERNAME OR PASSWORD</b></h5>
      <!--form started-->
      <form class="form-horizontal" method="post" action="">
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php  echo $datas['username']  ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="myInput" placeholder="Enter password" name="pwd" value="<?php  echo $datas['password']  ?>"><br>
        <input id="showpass" type="checkbox" onclick="myFunction()"><label for="showpass">Show Password</label>
      </div>
    </div>
    <div class="form-group">     
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="login" class="btn btn-info">Change</button>
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