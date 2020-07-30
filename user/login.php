<?php
$er="";
require_once("../Connection/connection.php");
#include("connection.php");
#start insert
if(isset($_POST['login']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];
$logqry=mysql_query("select Reg_id,name,password from user_reg where  name='$username' and password ='$password'") or die(mysql_error());
if(mysql_num_rows($logqry)>0)

{
  $ary=mysql_fetch_assoc($logqry);
  $user_id=$ary['Reg_id'];
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
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Slide Login Form Flat Responsive Widget Template :: w3layouts</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	 <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->

	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	<!-- //web font -->

</head>
<body>

<!-- main -->
<div class="w3layouts-main"> 
	<div class="bg-layer">
		<h1>Health & Nutrition e-Assistance</h1>
		<div class="header-main">
			<div class="main-icon">
				<span class="fa fa-eercast"></span>
			</div>
			<div class="header-left-bottom">
				<form action="#" method="post">
					<div class="icon1">
						<span class="fa fa-user"></span>
						<input type="text" class="form-control" id="username" placeholder="User Name" name="username" />
					</div>
					<div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password" required=""/>
					</div>
					<div class="login-check">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Keep me logged in</label>
					</div>
					<div class="bottom">
						<button  name="login" class="btn">Log In</button>
					</div>
					<div class="links">
						<p><a href="../index.php">Home</a></p>
                        <p><a href="#">Forgot Password</a></p>
						<p class="right"><a href="registration.php">New User? Register</a></p>
						<div class="clear"></div>
					</div>
				</form>	
			</div>
		<!-- copyright -->
		<div class="copyright">
			<p>© 2019 Health and Nutrition e-Assistant . All Rights Reserved | Design by <a href="http://w3layouts.com/"> SINET</a></p>
		</div>
		<!-- //copyright --> 
	</div>
</div>	
<!-- //main -->

</body>
</html>