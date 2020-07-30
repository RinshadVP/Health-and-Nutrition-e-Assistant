
<?php
$cres="";
$sres="";
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
$totalfat="";
$totalsugar="";
$totalfiber="";
$totalCarbohydrates="";
$totalwater="";
$totalminerals="";
$totalProtein="";
$totalvitamins="";
require_once("../Connection/connection.php");
if($_GET['food'])
{
$foodname=$_GET['food'];
}
$res=mysql_query("SELECT ingrediens,quantity FROM `food_ingri_reg` where food_name='$foodname'") or die(mysql_error());
while ($foodingri=mysql_fetch_assoc($res)) {

	$ingriname=$foodingri['ingrediens'];
	$ingriquantity=$foodingri['quantity'];
  	#ingriedients facts	
  		$ingi_fact=mysql_query("SELECT * FROM `nutri_facts_reg` where Name='$ingriname'")or die(mysql_error());
  		while ($foodingri_facts=mysql_fetch_assoc($ingi_fact))
  		 {
  		 	$fill=substr($ingriquantity, 0, 1);
  		 	$totalfat=($totalfat+($foodingri_facts['Fat']*$fill));
  		 	$totalsugar=($totalsugar+($foodingri_facts['sugar']*$fill));
  		 	$totalfiber=($totalfiber+($foodingri_facts['fiber']*$fill));
  		 	$totalCarbohydrates=($totalCarbohydrates+($foodingri_facts['Carbohydrates']*$fill));
  		 	$totalwater=($totalwater+($foodingri_facts['water']*$fill));
  		 	$totalminerals=($totalminerals+($foodingri_facts['minerals']*$fill));
  		 	$totalProtein=($totalProtein+($foodingri_facts['Protein']*$fill));
  		 	$totalvitamins=($totalvitamins+($foodingri_facts['vitamins']*$fill));

  		 }
  		 
  	 }
    $totalpres=$totalfiber+$totalCarbohydrates;
  	// echo $totalfat;
  	//echo "<br>";
  	// echo $totalsugar;
  	// echo $total_fat;
  	 #get user information
  	 $prof=mysql_query("select * from user_reg where Reg_id='$user_id'")or die(mysql_error());
$profdata=mysql_fetch_assoc($prof);
$presureval=$profdata['pressure']; 
 $cholesterolval=$profdata['cholesterol'];
$sugerval=$profdata['suger'];


#cross match result here
#cholestrol 
  if($cholesterolval=="Low" && $totalfat<10)	 
  {
    $cres="No Problem";
  }
  elseif ($cholesterolval=="Low" && $totalfat>10)
  {
   $cres="No Problem";
  }
  elseif ($cholesterolval=="Normal" && $totalfat<10)
   {
     $cres="No Problem";
   }
   elseif ($cholesterolval=="Normal" && $totalfat>10)
   {
     $cres="No Problem";
   }
   elseif ($cholesterolval=="Border" && $totalfat<10)
   {
     $cres="No Problem";
   }
   elseif ($cholesterolval=="Border" && $totalfat>10)
   {
     $cres="Please Avoid This Food";
   }
   elseif ($cholesterolval=="Patient" && $totalfat<10)
   {
     $cres="Please Avoid This Food";
   }
   elseif ($cholesterolval=="Patient" && $totalfat>10)
   {
     $cres="Avoid This Food this Is Danger For Your Health";
   }
   elseif ($cholesterolval=="Critical" && $totalfat<10)
   {
     $cres="Avoid This Food this Is Danger For Your Health";
   }
   elseif ($cholesterolval=="Critical" && $totalfat>10)
   {
     $cres="Avoid This Food this Is Very Danger For Your Health Fat is More";
   }
#close cholestrol
#sugar 
  if($sugerval=="Low" && $totalsugar<10)   
  {
    $sres="No Problem";
  }
  elseif ($sugerval=="Low" && $totalsugar>10)
  {
   $sres="No Problem";
  }
  elseif ($sugerval=="Normal" && $totalsugar<10)
   {
     $sres="No Problem";
   }
   elseif ($sugerval=="Normal" && $totalsugar>10)
   {
     $sres="No Problem";
   }
   elseif ($sugerval=="Border" && $totalsugar<10)
   {
     $sres="No Problem";
   }
   elseif ($sugerval=="Border" && $totalsugar>10)
   {
     $sres="Please Avoid This Food";
   }
   elseif ($sugerval=="Patient" && $totalsugar<10)
   {
     $sres="Please Avoid This Food";
   }
   elseif ($sugerval=="Patient" && $totalsugar>10)
   {
     $sres="Avoid This Food this Is Danger For Your Health";
   }
   elseif ($sugerval=="Critical" && $totalsugar<10)
   {
     $sres="Avoid This Food this Is Danger For Your Health";
   }
   elseif ($sugerval=="Critical" && $totalsugar>10)
   {
     $sres="Avoid This Food this Is Very Danger For Your Health Sugar is More";
   }
#close sugar
#pressure
  if($presureval=="Low" && $totalpres<10)   
  {
    $pres="No Problem";
  }
  elseif ($presureval=="Low" && $totalpres>10)
  {
   $pres="No Problem";
  }
  elseif ($presureval=="Normal" && $totalpres<10)
   {
     $pres="No Problem";
   }
   elseif ($presureval=="Normal" && $totalpres>10)
   {
     $pres="No Problem";
   }
   elseif ($presureval=="Border" && $totalpres<10)
   {
     $pres="No Problem";
   }
   elseif ($presureval=="Border" && $totalpres>10)
   {
     $pres="Please Avoid This Food";
   }
   elseif ($presureval=="Patient" && $totalpres<10)
   {
     $pres="Please Avoid This Food";
   }
   elseif ($presureval=="Patient" && $totalpres>10)
   {
     $pres="Avoid This Food this Is Danger For Your Health";
   }
   elseif ($presureval=="Critical" && $totalpres<10)
   {
     $pres="Avoid This Food this Is Danger For Your Health";
   }
   elseif ($presureval=="Critical" && $totalpres>10)
   {
     $pres="Avoid This Food this Is Very Danger For Your Health Sugar is More";
   }
#close pressure
#feedback
   if(isset($_POST['fsubmit']))
   {
    $message=$_POST['feedback'];
    $date=date("Y-m-d");
    mysql_query("insert into `feedback` (user_id,message,date) values ('$user_id','$message','$date')") or die(mysql_error());
   }
?>


<?php
include("header.html");

?>
<br>
<table border="1" align="center" width="30%" cellspacing="10" cellpadding="10">
  <tr>
    <td colspan="3" align="center"><b>Cross Match Results</b></td>
  </tr>
  <tr>
    <td>Preasure</td>
    <td>:</td>
    <td><?php echo $pres ?></td>
  </tr>
  <tr>
    <td>cholesterol</td>
     <td>:</td>
    <td><?php echo $cres ?> </td>
  </tr>
  <tr>
    <td>suger</td>
     <td>:</td>
    <td><?php echo $sres ?></td>
  </tr>
  <tr>
    <td colspan="3" align="right"><button id="show">Feedback</button></td>
  </tr>
</table>
<br>
<div id="div1" style="display: none">
  <div class="container">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <form method="post">
  <textarea name="feedback" class="form-control" placeholder="Enter Feedbak" required=""></textarea>
  <br>
  <button name="fsubmit" class="btn btn-info" type="submit">Submit</button>
  </form>
      </div>
      <div class="col-sm-4"></div>
    </div>
    
  </div>
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#show").click(function(){
    $("#div1").show();
  });
});
</script>
<?php
include("footer.html");

?>