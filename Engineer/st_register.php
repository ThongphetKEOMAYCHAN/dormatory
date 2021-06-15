<?php
session_start();
require 'inclu/config.php';
require 'inclu/header.php';

$msg="";
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
        
        <table id="example" class="display" style="width:100%">
         <thead>
               <th>ລະຫັດນັກສຶກສາ</th>
               <th>ຊື່ ແລະ ນາມສະກຸນ</th>
               <th>ນອກແຜນ ຫຼື ໃນແຜນ</th>
               <th>ພາກວິຊາ</th>
               <th>ປີ</th>
               <th>ຫໍພັກຕຶກ</th>
               <th>ຫ້ອງນອນ</th>
               <th>ເລກນອນ</th>
               <th>ຊໍາລະຄ່າ</th>
               <th>date</th>
               <th><i class="fa fa-edit" aria-hidden="true"></th>
               <th><i class="fa fa-trash" aria-hidden="true"></th>
         </thead>
         <tbody>
         <?php
         
         $select="SELECT * FROM `payment` as p INNER JOIN `students` as s ON p.st_id=s.st_id
                                             INNER JOIN `item` as t ON p.t_id=t.tem_id 
                                             INNER JOIN `year` as y ON p.y_id=y.y_id 
                                             INNER JOIN `home` as h ON p.h_id=h.h_id
                                             INNER JOIN `class` as c ON p.c_id=c.c_id
                                             INNER JOIN `bed_number` as b ON p.b_id=b.b_id
                                             INNER JOIN `inclass` as nc ON p.in_id=nc.in_id where `p_name`>='290000'";
                                             
                                            
 
         $result=mysqli_query($connect,$select);
         while($row=mysqli_fetch_assoc($result)){
      
         ?>
          <tr>
        
               <td><?=$row['st_code']?></td>
               <td><?=$row['st_name']?></td>
               <td><?=$row['in_name']?></td>
               <td><?=$row['iterm']?></td>
               <td><?=$row['y_name']?></td>
               <td><?=$row['h_name']?></td>
               <td><?=$row['c_name']?></td>
               <td><?=$row['b_name']?></td>
               <td><?=$row['p_name']?></td>
               <td><?=$row['date']?></td>
               <td>
               <a href="register_update.php?pay_id=<?=$row['p_id']?>" class="btn btn-success btn-sm" title="Update">
               <i class="fa fa-edit" aria-hidden="true"></i></a>
               </td>
               <td>
               <a href="st_delete.php?pay=<?=$row['p_id']?>" onclick="return confirm('Do you want to delete /<?=$row['st_name']?>/?.')" class="btn btn-danger btn-sm" title="Delete">
               <i class="fa fa-trash" aria-hidden="true"></i></a>
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