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
        <a href="st_add.php" class="btn btn-primary">ເພີ່ມຂໍ້ມູນ</a>
        
       
        <table id="example" class="display" style="width:100%">
         <thead>
               <th>id</th>
               <th>Code</th>
               <th>Username</th>
               <th>Sex</th>
               <th>Age</th>
               <th>Birthday</th>
               <th>Village</th>
               <th>District</th>
               <th>Province</th>
               <th>Tel</th>
               <th>Time</th>
               <th>ຈ່າຍຄ່າ</th>
               <th>ອອກ</th>
               <th><i class="fa fa-trash" aria-hidden="true"></th>
               <th><i class="fa fa-edit" aria-hidden="true"></th>
         </thead>
         <tbody>
         <?php
         $select="SELECT * FROM `students`";

         $result=mysqli_query($connect,$select);
         while($row=mysqli_fetch_assoc($result)){

         
         ?>
          <tr>
               <td><?=$row['st_id']?></td>
               <td><?=$row['st_code']?></td>
               <td><?=$row['st_name']?></td>
               <td><?=$row['st_sex']?></td>
               <td><?=$row['st_age']?></td>
               <td><?=$row['st_b']?></td>
               <td><?=$row['st_v']?></td>
               <td><?=$row['st_d']?></td>
               <td><?=$row['st_p']?></td>
               <td><?=$row['tell']?></td>
               <td><?=$row['st_date']?></td>
               <td>
               <a href="register.php?stid=<?=$row['st_id']?>" class="btn btn-primary btn-sm">ລົງທະບຽນ</a></td>
               <td><a href="st_out.php?st=<?=$row['st_id']?>" class="btn btn-primary btn-sm">ອອກ</a></td>
               <td>
               <a href="st_delete.php?s_id=<?=$row['st_id']?>" onclick="return confirm('Do you want to delete /<?=$row['st_name']?>/?.')" class="btn btn-danger btn-sm" title="Delete">
               <i class="fa fa-trash" aria-hidden="true"></i></a>
               </td>
               <td>
               <a href="st_update.php?id=<?=$row['st_id']?>" class="btn btn-success btn-sm" title="Update">
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