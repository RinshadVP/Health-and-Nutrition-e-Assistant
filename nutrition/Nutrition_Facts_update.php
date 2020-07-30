<?php

$regid=$_GET['Reg_id'];
include("../connection/connection.php");



$qry=mysql_query("select * from nutri_facts_reg where Reg_id='$regid'")or die(mysql_error());
$res=mysql_fetch_assoc($qry);


 if(isset($_POST['Register']))
{
  $Name=$_POST['itemname'];
  $category=$_POST['category'];
  $Fat=$_POST['Fat'];
  $Carbohydrates=$_POST['Carbohydrates'];
  $water=$_POST['water'];
  $sugar=$_POST['sugar'];
  $fiber=$_POST['fiber'];
  $minerals=$_POST['minerals'];
  $protein=$_POST['protein'];
  $vitamins=$_POST['vitamins'];
  mysql_query("update nutri_facts_reg set Name='$Name',category='$category',Fat='$Fat',sugar='$sugar',fiber='$fiber',Carbohydrates='$Carbohydrates',water='$water',minerals='$minerals',Protein='$protein',vitamins='$vitamins'  where Reg_id=$regid")  or die(mysql_error());

  header("location:Nutrition_Facts_manage.php");
}
?>
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
      <h4 align="center">Nutrition Facts Registration</h4>
      <!--form started-->
      <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="itemname">Item Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="itemname" placeholder="Enter itemname" name="itemname" value="<?php echo $res['Name']?>">
      </div>
    </div>   
    <div class="form-group">
      <label class="control-label col-sm-2" for="category">Category:</label>
      <div class="col-sm-10">      
        <select name="category" class="form-control" required="">
          <option value="">Select Category</option>
          <?php
          if($res['Category']!="")
          {
            ?>
            <option selected="" value="<?php echo $res['Category'] ?>"><?php echo$res['Category'] ?></option>
            <?php
          }

          ?>
          
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
        <input type="text" class="form-control" id="Fat" placeholder="Enter Fats" name="Fat" value="<?php echo $res['Fat']?>">
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="sugar">Sugar:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="sugar" placeholder="Enter Sugar" name="sugar" value="<?php echo $res['sugar']?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="fiber">Fiber:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fiber" placeholder="Enter Fiber" name="fiber" value="<?php echo $res['fiber']?>">
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="carbohydrates">Carbohydrates:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Carbohydrates" placeholder="Enter Carbohydrates" name="Carbohydrates" value="<?php echo $res['Carbohydrates']?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="water">Water:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="water" placeholder="Enter Water" name="water" value="<?php echo $res['water']?>">
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="minerals">Minerals:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="minerals" placeholder="Enter Minerals" name="minerals" value="<?php echo $res['minerals']?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="protein">Protein:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="protein" placeholder="Enter Protein" name="protein" value="<?php echo $res['Protein']?>">
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="vitamins">Vitamins:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="vitamins" placeholder="Enter Vitamins" name="vitamins" value="<?php echo $res['vitamins']?>">
      </div>
    </div> 
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="clear" class="btn btn-info">clear</button>
         <button type="Register" class="btn btn-info" name="Register">Register</button>
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