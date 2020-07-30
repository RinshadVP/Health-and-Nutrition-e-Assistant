<?php

require_once("../Connection/connection.php");
$qry=mysql_query("select * from reg_food_master") or die(mysql_error());
$mealitem="";
$foodclass="";
$name="";
if(isset($_POST['save']))
{
  $mealitem=$_POST['mealitem'];
  $foodclass=$_POST['foodclass'];
  $name=$_POST['name'];
  $food=$_POST['food'];
  $quantity=$_POST['quantity'];

  mysql_query("insert into master_food_reg(master_name,food,quanity) values('$name','$food','$quantity')")or die(mysql_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register food Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#cancel").click(function(){
    $("#showitem").hide();
  });
  $("#add").click(function(){
    $("#showitem").show();
  });
});
</script>
</head>
<body>
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
      <h4 align="center">Create Food Template</h4>
      <!--form started-->
      <form class="form-horizontal" action="" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="Select item">Meal Type:</label>
      <div class="col-sm-10">          
        <select name="mealitem" id="type" class="form-control" required="" onChange="change_food();">
           <?php
          if($mealitem!="")
          {
            ?>
               <option selected="" value="<?php echo $mealitem ?>"><?php echo $mealitem ?></option>
            <?php
          }
        ?>
          <option value="">Select Type</option>
          <option value="Rice">Rice</option>
          <option value="Meat">Meat</option>
          <option value="Juice">Juice</option>
          <option value="Other">Other</option>
        </select>
      </div>
      </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="Select Stage">Select Class:</label>
      <div class="col-sm-10">          
        <select name="foodclass" id="fclass" class="form-control" required="" onChange="change_food();">
           <?php
          if($foodclass!="")
          {
            ?>
               <option selected="" value="<?php echo $foodclass ?>"><?php echo $foodclass ?></option>
            <?php
          }
        ?>
          <option value="">Select Class</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
        </select>
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="Name">Name:</label>
      <div class="col-sm-10">
        <select name="name" id="templatename" class="form-control" required="">
             <?php
          if($name!="")
          {
            ?>
               <option selected="" value="<?php echo $name ?>"><?php echo $name ?></option>
            <?php
          }
        ?>
          <option value="">Select Name</option>
          
        </select>
      </div>
    </div>
       
      <div class="form-group">        
        <div class="col-sm-2"></div>
         <label class="control-label col-sm-4" for=" Add Food Item"> Add Food:</label> 
      <div class="col-sm-4">
        <button id="add" type="button" name="add" class="btn btn-default" style="color:red"><b>+</b></button>
      </div>
    </div>
     <div id="showitem" style="display: none">
    <div class="form-group">
      <label class="control-label col-sm-2" for=" Select Food Item">Select Food:</label>
      <div class="col-sm-10">          
     <select name="food" class="form-control" required="">
          <option value="">Select Food</option>
          <?php
          while ($ary=mysql_fetch_assoc($qry)) {
            ?>
              <option value="<?php echo $ary['Foodname'];?>"><?php echo $ary['Foodname'];  ?></option>
            <?php
          }
          ?>
         
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="NOs">Quantity [No]:</label>
      <div class="col-sm-10">
        <input type="Quantity" class="form-control" id="Food name" placeholder="Enter Quantity" name="quantity">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="save" class="btn btn-info">Save</button>
        <button type="button" id="cancel" class="btn btn-info">Cancel</button>
      </div>
    </div>
  </div>
  </form>
      <!--close form -->
    </div>
  </div>
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
function change_food()
{
  var type = $("#type").val();
  var fclass = $("#fclass").val();
     $.ajax({
    type: "POST",
    url: "template_select.php",
    data: "type="+type+'&fclass='+fclass,
    //data:'dpt='+dpt+'&type='+type,
    cache: false,
    success: function(response)
      {
          //alert(response);return false;
        $("#templatename").html(response);
      }
      });
  
}
</script>
</body>
</html>
<?php 
  include("footer.html");
  ?>
