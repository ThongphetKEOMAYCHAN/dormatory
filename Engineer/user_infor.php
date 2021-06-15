<?php
session_start();
require 'inclu/config.php';
require 'inclu/header.php';

 if(!isset($_SESSION['username'])){

  header("location:login.php");
 }


 
?>

  <div id="wrapper">
        <?php require 'inclu/sidebar.php';?>  

      <div id="page-content-wrapper">
        <?php require 'inclu/navbar.php';?>
        <?php require 'inclu/card.php';?>
        <!--------------content-------------------------->
        
        <div class="card">
        <div class="card-body">
        <a href="user_add.php" class="btn btn-primary">ເພີ່ມຂໍ້ມູນພະນັກງານ</a>
        
       
        <table id="example" class="display" style="width:100%">
         <thead>
               <th>id</th>
               <th>Username</th>
               <th>Sex</th>
               <th>Age</th>
               <th>Birthday</th>
               <th>Village</th>
               <th>District</th>
               <th>Province</th>
               <th>Tel</th>
               <th>Time</th>
               <th><i class="fa fa-trash" aria-hidden="true"></th>
               <th><i class="fa fa-edit" aria-hidden="true"></th>
         </thead>
         <tbody>
         <?php
         $sql="SELECT * FROM `employees`";

         $result=mysqli_query($connect,$sql);
         while($row=mysqli_fetch_assoc($result)){

         
         ?>
          <tr>
               <td><?=$row['em_id']?></td>
               <td><?=$row['em_name']?></td>
               <td><?=$row['em_sex']?></td>
               <td><?=$row['em_age']?></td>
               <td><?=$row['em_b']?></td>
               <td><?=$row['em_v']?></td>
               <td><?=$row['em_d']?></td>
               <td><?=$row['em_p']?></td>
               <td><?=$row['em_tel']?></td>
               <td><?=$row['em_date']?></td>
               <td>
               <a href="st_delete.php?emp_id=<?=$row['em_id']?>" onclick="return confirm('Do you want to delete ?.')" class="btn btn-danger btn-sm" title="Delete">
               <i class="fa fa-trash" aria-hidden="true"></i></a>
               </td>
               <td>
               <a href="user_update.php?id=<?=$row['em_id']?>" class="btn btn-success btn-sm" title="Update">
               <i class="fa fa-edit" aria-hidden="true"></i></a>
               </td>
          </tr>
          <?php } ?>
         </tbody>
        </table>
        </div>
        </div>
        <!--------------#content-------------------------->
      </div>       
  </div>
    
  <?php
  require 'inclu/footer.php';
  ?>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>