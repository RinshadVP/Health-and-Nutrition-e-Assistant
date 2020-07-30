<?php
require_once("../connection/connection.php");
$qry=mysql_query("select * from  reg_template_master") or die(mysql_error());
#start insert
if(isset($_POST['Registration']))
{
  $name=$_POST['name'];
  $class=$_POST['class'];
  $mealitem=$_POST['mealitem'];
  mysql_query("insert into reg_template_master(name,class,type) values('$name','$class','$mealitem')") or die(mysql_error());
  ?>
  <script type="text/javascript">
  alert("Food Template Created");
  window.location="template_master.php";
</script>
  <?php
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
      <h4 align="center"> Register Template Master</h4>
      <!--form started-->
      <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="Food name">Name:</label>
      <div class="col-sm-10">
        <input type="Foodname" class="form-control" id="Foodname" placeholder="Enter Foodname" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="time">Template Class:</label>
      <div class="col-sm-10">          
              <select name="class" class="form-control" required="">
          <option value="">Select Class</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Category">Type Of Meal:</label>
      <div class="col-sm-10">          
        <select name="mealitem" class="form-control" required="">
          <option value="">Select Type</option>
          <option value="Rice">Rice</option>
          <option value="Meat">Meat</option>
          <option value="Juice">Juice</option>
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
        <button type="submit" class="btn btn-default" name="Registration">Register</button>
      </div>
    </div>
  </form>
      
 <table border="1" class="table table-striped">
        <tr>
          <th>REG ID</th>
          <th>NAME</th>
          <th>CLASS</th>
          <th>TYPE</th>     
          <th>DELETE</th>
        </tr>
        <?php 

        if(mysql_num_rows($qry)>0)
        {
          $i=1;
            while ($data=mysql_fetch_assoc($qry)) {


              if(isset($_POST['delete'.$i]))
              {
                mysql_query("delete from reg_template_master where id=".$data['id']);
                header("location:template_master.php");

              }
                   
              
              ?>
<tr>
          <td><?php echo $data['id']?></td>
          <td><?php echo $data['name']?></td>
          <td><?php echo $data['class']?></td>
          <td><?php echo $data['type']?></td>
          <form method="post">
          <td><button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit"name="delete<?php echo $i ?>">DELETE</button></td>
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