
<?php
include("../connection/connection.php");

$qry=mysql_query("select * from feedback")or die(mysql_error());
?>

<?php include("header.html"); ?>
<div class="container">
  <div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col-sm-8">
<table border="1" class="table table-striped">
        <tr>
          <th>ID</th>
          <th>SENDER</th>
          <th>MESSAGE</th>
          <th>DATE</th> 
           <th>DELETE</th>    
        </tr>
      
        <?php
   $i=1;

    if (mysql_num_rows($qry)>0) {

      while ($res=mysql_fetch_assoc($qry)) {

        if(isset($_POST['delete'.$i]))
        {
          $id=$res['id'];
          mysql_query("delete from feedback where id='$id'" );
          header("location:".$_SERVER['PHP_SELF']);

        }


        ?>
        <tr>
          <td><?php echo $res['id'] ?></td>
          <td align="center"><a href="user_view.php?user_id=<?php echo $res['user_id'] ?>"><i class="fa fa-eye"></i></a></td>
          <td><?php echo $res['message'] ?></td>
          <td><?php echo $res['date'] ?></td>
          <form method="post">
          <td><input type="submit" value="delete" class="btn btn-info" name="delete<?php echo $i?>"/></td>
      </form>
    </tr>
      <?php
       $i++;
        }} ?>
        </table>
    
  </div>
  <div class="col-sm-2">
    
  </div>
</div>
</div>
  
<?php include("footer.html"); ?>