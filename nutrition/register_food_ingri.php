<?php

require_once("../Connection/connection.php");
$time="";
$item="";
$food="";
if(isset($_POST['save']))
{
  $time=$_POST['Time'];
  $item=$_POST['item'];
  $food=$_POST['food'];
  $ingrens=$_POST['ingrinames'];
  $quantity=$_POST['quantity'];

  mysql_query("insert into food_ingri_reg(food_name,ingrediens,quantity) values('$food','$ingrens','$quantity')")or die(mysql_error());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register food master</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
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
      <h4 align="center"> Register Food</h4>
      <!--form started-->
      <form class="form-horizontal" action="" method="post">
        <div class="form-group">
      <label class="control-label col-sm-2" for="time">Time:</label>
      <div class="col-sm-10">          
       <select name="Time" id="time" class="form-control" required="" onChange="change_food();">
        <?php
          if($time!="")
          {
            ?>
               <option selected="" value="<?php echo $time ?>"><?php echo $time ?></option>
            <?php
          }
        ?>
          <option value="">Select Time</option>
          <option value="dinner">Dinner</option>
          <option value="lunch">Lunch</option>
          <option value="supper">Supper</option>
          <option value="break fast">Break fast</option>
        </select>
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-2" for="Select item">Select Item:</label>
      <div class="col-sm-10">          
        <select name="item" id="item" class="form-control" required="" onChange="change_food();">
          <?php
          if($item!="")
          {
            ?>
               <option selected="" value="<?php echo $item ?>"><?php echo $item ?></option>
            <?php
          }
        ?>
          <option value="">Select Item</option>
          <option value="curry">Curry</option>
          <option value="source">Sauce</option>
          <option value="rice">Rice</option>
          <option value="snacks">Snacks</option>
          <option value="Other">Other</option>
        </select>
      </div>
      </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Food Name"> Food Name:</label>
      <div class="col-sm-10">          
     <select name="food" class="form-control" id="food" required="">
      <?php
          if($food!="")
          {
            ?>
               <option selected="" value="<?php echo $food ?>"><?php echo $food ?></option>
            <?php
          }
        ?>
          <option value="">Select Food</option>
    </select> 
      </div>
    </div>
     <div class="form-group">        
        <div class="col-sm-2"></div>
         <label class="control-label col-sm-4" for=" Add Food Item"> Add Food Ingredients:</label> 
      <div class="col-sm-4">
        <button id="add" type="button" name="add" class="btn btn-default" style="color:red"><b>+</b></button>
      </div>
    </div>
    <div id="showitem" style="display: none">
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="Select food Ingredient">Ingredients Category:</label>
      <div class="col-sm-10">          
     <select name="Select food Item" id="ingredients" class="form-control" onChange="change_ingredients();">
          <option value="">Select Category</option>
          <option value="">Select Category</option>
          <option value="oil">Oil</option>
          <option value="vegitable">Vegitable</option>
          <option value="fruit">Fruit</option>
          <option value="spices">Spices</option>
          <option value="herb">Herb</option>
          <option value="meat">Meat</option>
          <option value="flour">Flour</option>
          <option value="dairyproducts">Dairyproducts</option>
          <option value="juices">Juices</option>
          <option value="Rices">Rices</option>
          <option value="Waters">Waters</option>
          <option value="Powder">Powder</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Select food Ingredient">Ingredients Name:</label>
      <div class="col-sm-10">          
     <select name="ingrinames" id="ingrinames" class="form-control" required="">
          <option value="">Select Name</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Quantity">Quantity [in grams]:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Food name" placeholder="Enter Quantity" name="quantity">
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

<!--depend select box script ---->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
function change_food()
{
  var time = $("#time").val();
  var item = $("#item").val();
     $.ajax({
    type: "POST",
    url: "food_select.php",
    data: "time="+time+'&item='+item,
    //data:'dpt='+dpt+'&type='+type,
    cache: false,
    success: function(response)
      {
          //alert(response);return false;
        $("#food").html(response);
      }
      });
  
}
</script>

<script>
function change_ingredients()
{
  var ingredients = $("#ingredients").val();
     $.ajax({
    type: "POST",
    url: "ingredients_select.php",
    data: "ingredients="+ingredients,
    cache: false,
    success: function(response)
      {
          //alert(response);return false;
        $("#ingrinames").html(response);
      }
      });
  
}
</script>


<!--close depend select box ----->

</body>


</html>

<?php 
  include("footer.html");
  ?>
