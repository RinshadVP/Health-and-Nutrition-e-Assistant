<?php
require_once("../connection/connection.php");
#start insert
if(isset($_POST['Register']))
{
  $itemname=$_POST['itemname'];
  $category=$_POST['category'];
  $Fat=$_POST['Fat'];
  $Carbohydrates=$_POST['Carbohydrates'];
  $water=$_POST['water'];
  $sugar=$_POST['sugar'];
  $fiber=$_POST['fiber'];
  $minerals=$_POST['minerals'];
  $protein=$_POST['protein'];
  $vitamins=$_POST['vitamins'];
  mysql_query("insert  into nutri_facts_reg(Name,Category,Fat,sugar,fiber,Carbohydrates,water,minerals,Protein,vitamins) values('$itemname','$category','$Fat','$sugar','$fiber','$Carbohydrates','$water','$minerals','$protein','$vitamins')") or die(mysql_error());
  ?>
<script type="text/javascript">
  alert("value saved");
 // window.location="food item Ingredients.php";
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
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      <h4 align="center">Nutrition Facts Registration</h4>
      <!--form started-->
      <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="itemname">Item Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="itemname" placeholder="Enter itemname" name="itemname">
      </div>
    </div>   
    <div class="form-group">
      <label class="control-label col-sm-2" for="category">Category:</label>
      <div class="col-sm-10">      
        <select name="category" class="form-control" required="">
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
      <div class="col-sm-2">
      </div>
      <div class="col-sm-10">
        <p style="color: blue">Facts Amount per 100 grams</p>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="fat">Fats:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Fat" placeholder="Enter Fats" name="Fat">
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="cholesterol">Sugar:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="cholesterol" placeholder="Enter Sugar" name="sugar">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="sodium">Fiber:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="sodium" placeholder="Enter Fiber" name="fiber">
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="sodium">Carbohydrates:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="sodium" placeholder="Enter Carbohydrates" name="Carbohydrates">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="sodium">Water:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="sodium" placeholder="Enter Water" name="water">
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="pottassium">Minerals:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pottassium" placeholder="Enter Minerals" name="minerals">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="carbohydrate">Protein:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="carbohydrate" placeholder="Enter Protein" name="protein">
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="protein">Vitamins:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="protein" placeholder="Enter Vitamins" name="vitamins">
      </div>
    </div> 
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="clear" class="btn btn-info">Clear</button>
         <button type="Register" class="btn btn-info" name="Register">Register</button>
      </div>
    </div>
  </form>
      <!--close form -->
    </div>
  </div>
  
  <div class="col-sm-2"></div>
</div>
  <?php 
      include("footer.html");

      ?>