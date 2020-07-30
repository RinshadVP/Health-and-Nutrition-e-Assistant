<?php
require_once("../connection/connection.php");
$qry=mysql_query("select * from  reg_food_master") or die(mysql_error());

if(isset($_POST['Registration']))
{
  $Foodname=$_POST['Foodname'];
  $Time=$_POST['Time'];
  $Category=$_POST['Category'];
  mysql_query("insert into reg_food_master(Foodname,time,category) values('$Foodname','$Time','$Category')") or die(mysql_error());
   header("location:food_master.php");
}
?>

 <?php 
  include("header.html");
  ?>

<div class="container">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      <h4 align="center"> Register Food Master</h4>
      <!--form started-->
      <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="Food name">Foodname:</label>
      <div class="col-sm-10">
        <input type="Foodname" class="form-control" id="Foodname" placeholder="Enter Foodname" name="Foodname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="time">Time:</label>
      <div class="col-sm-10">          
       <select name="Time" class="form-control">
          <option value="dinner">Dinner</option>
          <option value="lunch">Lunch</option>
          <option value="supper">Supper</option>
          <option value="break fast">Break fast</option>
        </select>
        <!-- <input type="checkbox" value="Brick Fast" name="ch"> Brick Fast
        <input type="checkbox" value="Dinner" name="ch"> Dinner
         <input type="checkbox" value="Lunch" name="ch"> Lunch
          <input type="checkbox" value="Supper" name="ch"> Supper-->
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Category">Category:</label>
      <div class="col-sm-10">          
        <select name="Category" class="form-control">
          <option value="curry">Curry</option>
          <option value="source">Source</option>
          <option value="rice">Rice</option>
           <option value="snacks">Snacks</option>
            <option value="Other">Other</option>
        </select>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info" name="Registration">Register</button>
      </div>
    </div>
  </form>
   <table border="1" class="table table-striped">
        <tr>
          <th>REG ID</th>
          <th>FOOD NAME</th>
          <th>TIME</th>
          <th>CATEGORY</th>     
          <th>DELETE</th>
        </tr>
        <?php 

        if(mysql_num_rows($qry)>0)
        {
          $i=1;
            while ($data=mysql_fetch_assoc($qry)) {


              if(isset($_POST['delete'.$i]))
              {
                mysql_query("delete from reg_food_master where Reg_id=".$data['Reg_id']);
                header("location:food_master.php");

              }
                   
              
              ?>
<tr>
          <td><?php echo $data['Reg_id']?></td>
          <td><?php echo $data['Foodname']?></td>
          <td><?php echo $data['Time']?></td>
          <td><?php echo $data['Category']?></td>
          <form method="post">
            
          <td><button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')" name="delete<?php echo $i ?>">Delete</button></td>
        </form>
        </tr>

         <?php
              $i++;
            }
        }
        

        ?>
        
      </table>
      
</div>
 <div class="col-sm-2">
    </div>
    <?php 
      include("footer.html");

      ?>