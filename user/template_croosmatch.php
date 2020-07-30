
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
if($_GET['template'])
{
$templatename=$_GET['template'];
}



$temp=mysql_query("SELECT food,quanity FROM `master_food_reg` where master_name='$templatename'") or die(mysql_error());
while ($foodsname=mysql_fetch_assoc($temp)) 
{
  $foodname=$foodsname['food'];
  $foodquantity=$foodsname['quanity'];

#old code
$res=mysql_query("SELECT ingrediens,quantity FROM `food_ingri_reg` where food_name='$foodname'") or die(mysql_error());
while ($foodingri=mysql_fetch_assoc($res)) {

	$ingriname=$foodingri['ingrediens'];
	$ingriquantity=$foodingri['quantity'];
  	#ingriedients facts	
  		$ingi_fact=mysql_query("SELECT * FROM `nutri_facts_reg` where Name='$ingriname'")or die(mysql_error());
  		while ($foodingri_facts=mysql_fetch_assoc($ingi_fact))
  		 {
  		 	$fill=substr($ingriquantity, 0, 1);
  		 	$totalfat=($totalfat+(($foodingri_facts['Fat']*$fill)*$foodquantity));
  		 	$totalsugar=($totalsugar+(($foodingri_facts['sugar']*$fill)*$foodquantity));
  		 	$totalfiber=($totalfiber+(($foodingri_facts['fiber']*$fill)*$foodquantity));
  		 	$totalCarbohydrates=($totalCarbohydrates+($foodingri_facts['Carbohydrates']*$fill));
  		 	$totalwater=($totalwater+(($foodingri_facts['water']*$fill)*$foodquantity));
  		 	$totalminerals=($totalminerals+(($foodingri_facts['minerals']*$fill)*$foodquantity));
  		 	$totalProtein=($totalProtein+(($foodingri_facts['Protein']*$fill)*$foodquantity));
  		 	$totalvitamins=($totalvitamins+(($foodingri_facts['vitamins']*$fill)*$foodquantity));

  		 }
  		 
  	 }

#close old
     }
      $totalpres=$totalfiber+$totalCarbohydrates;
  	// echo $totalfat;
  	 //echo "<br>";
  	 //echo $totalsugar;
  	// echo $total_fat;
  	 #get user information
  	 $prof=mysql_query("select * from user_reg where Reg_id='$user_id'")or die(mysql_error());
$profdata=mysql_fetch_assoc($prof);
$presureval=$profdata['pressure'];
$cholesterolval=$profdata['cholesterol'];
$sugerval=$profdata['suger'];


#cross match result here
  
#cross match result here
#cholestrol 
  if($cholesterolval="Low" && $totalfat<100)   
  {
    $cres="No Problem";
  }
  elseif ($cholesterolval="Low" && $totalfat>100)
  {
   $cres="No Problem";
  }
  elseif ($cholesterolval="Normal" && $totalfat<100)
   {
     $cres="No Problem";
   }
   elseif ($cholesterolval="Normal" && $totalfat>100)
   {
     $cres="No Problem";
   }
   elseif ($cholesterolval="Border" && $totalfat<100)
   {
     $cres="No Problem";
   }
   elseif ($cholesterolval="Border" && $totalfat>100)
   {
     $cres="Please Avoid This Food";
   }
   elseif ($cholesterolval="Patient" && $totalfat<100)
   {
     $cres="Please Avoid This Food";
   }
   elseif ($cholesterolval="Patient" && $totalfat>100)
   {
     $cres="Avoid This Food this Is Danger For Your Health";
   }
   elseif ($cholesterolval="Critical" && $totalfat<100)
   {
     $cres="Avoid This Food this Is Danger For Your Health";
   }
   elseif ($cholesterolval="Critical" && $totalfat>100)
   {
     $cres="Avoid This Food this Is Very Danger For Your Health Fat is More";
   }
#close cholestrol
#sugar 
  if($sugerval="Low" && $totalsugar<100)   
  {
    $sres="No Problem";
  }
  elseif ($sugerval="Low" && $totalsugar>100)
  {
   $sres="No Problem";
  }
  elseif ($sugerval="Normal" && $totalsugar<100)
   {
     $sres="No Problem";
   }
   elseif ($sugerval="Normal" && $totalsugar>100)
   {
     $sres="No Problem";
   }
   elseif ($sugerval="Border" && $totalsugar<100)
   {
     $sres="No Problem";
   }
   elseif ($sugerval="Border" && $totalsugar>100)
   {
     $sres="Please Avoid This Food";
   }
   elseif ($sugerval="Patient" && $totalsugar<100)
   {
     $sres="Please Avoid This Food";
   }
   elseif ($sugerval="Patient" && $totalsugar>100)
   {
     $sres="Avoid This Food this Is Danger For Your Health";
   }
   elseif ($sugerval="Critical" && $totalsugar<100)
   {
     $sres="Avoid This Food this Is Danger For Your Health";
   }
   elseif ($sugerval="Critical" && $totalsugar>100)
   {
     $sres="Avoid This Food this Is Very Danger For Your Health Sugar is More";
   }
#close sugar
#pressure
  if($presureval="Low" && $totalpres<100)   
  {
    $pres="No Problem";
  }
  elseif ($presureval="Low" && $totalpres>100)
  {
   $pres="No Problem";
  }
  elseif ($presureval="Normal" && $totalpres<100)
   {
     $pres="No Problem";
   }
   elseif ($presureval="Normal" && $totalpres>100)
   {
     $pres="No Problem";
   }
   elseif ($presureval="Border" && $totalpres<100)
   {
     $pres="No Problem";
   }
   elseif ($presureval="Border" && $totalpres>100)
   {
     $pres="Please Avoid This Food";
   }
   elseif ($presureval="Patient" && $totalpres<100)
   {
     $pres="Please Avoid This Food";
   }
   elseif ($presureval="Patient" && $totalpres>100)
   {
     $pres="Avoid This Food this Is Danger For Your Health";
   }
   elseif ($presureval="Critical" && $totalpres<100)
   {
     $pres="Avoid This Food this Is Danger For Your Health";
   }
   elseif ($presureval="Critical" && $totalpres>100)
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