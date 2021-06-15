<?php
session_start();
require 'inclu/config.php';
require 'inclu/header.php';
date_default_timezone_set('Asia/Bangkok');
$date =date("Y-m-d H:i:s");
$msg="";
 if(!isset($_SESSION['username'])){

  header("location:login.php");
 }

 
 if(isset($_POST['payment'])){
  $st_code=$_POST['st_code'];
  $st_name=$_POST['st_name'];
  $in_class=$_POST['in_class'];
  $st_item=$_POST['st_item'];
  $st_year=$_POST['st_year'];
  $st_home=$_POST['st_home'];
  $st_class=$_POST['st_class'];
  $st_bed=$_POST['st_bed'];
  $st_pay=$_POST['money'];


  $st_select1=mysqli_query($connect,"SELECT*FROM `students`  WHERE `st_code`='$st_code' and `st_name`='$st_name'");
  while($st_row=mysqli_fetch_assoc($st_select1)){
    $stid=$st_row['st_id'];
  }
  $st_tem=mysqli_query($connect,"SELECT * FROM `item` WHERE `iterm`='$st_item'");
  while($tem_row=mysqli_fetch_assoc($st_tem)){
    $st_em=$tem_row['tem_id'];
  }
  $stclass_select=mysqli_query($connect,"SELECT * FROM `inclass` WHERE `in_name`='$in_class'");
  while($stin_row=mysqli_fetch_assoc($stclass_select)){
    $stin=$stin_row['in_id'];
  }
  $select1=mysqli_query($connect,"SELECT*FROM `home`  WHERE `h_name`='$st_home'");
  while($hrow=mysqli_fetch_assoc($select1)){
    $hid=$hrow['h_id'];
  }
  $select2=mysqli_query($connect,"SELECT*FROM `class` WHERE `c_name`='$st_class'");
  while($crow=mysqli_fetch_assoc($select2)){
    $cid=$crow['c_id'];
  }
  $sty_select=mysqli_query($connect,"SELECT*FROM `year` WHERE `y_name`='$st_year'");
  while($sty_row=mysqli_fetch_assoc($sty_select)){
    $sty_id=$sty_row['y_id'];
  }
  $bed_select=mysqli_query($connect,"SELECT*FROM `bed_number` WHERE `b_name`='$st_bed'");
  while($stb_row=mysqli_fetch_assoc($bed_select)){
    $stb_id=$stb_row['b_id'];
  }
  $m_select=mysqli_query($connect,"SELECT*FROM `amout` WHERE `a_name`='$st_pay'");
  while($m_row=mysqli_fetch_assoc($bed_select)){
    $sm_id=$m_row['a_id'];
  }
  $register="UPDATE `payment` SET `m_id`='$sm_id',`h_id`='$stid',`t_id`='$st_em',`h_id`='$hid',`c_id`='$cid',`b_id`='$stb_id',`y_id`='$sty_id',`in_id`='$stin',`date`='$date' WHERE `p_id`='$payget'";
                 if(mysqli_query($connect,$register)){
                      header("location:st_register.php?update_successfully");
                 }
                 

  
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
        
        <table id="paytal" class="display" style="width:100%">
         <thead>
               <th>ລະຫັດນັກສຶກສາ</th>
               <th>ຊື່ ແລະ ນາມສະກຸນ</th>
               <th>ນອກແຜນ ຫຼື ໃນແຜນ</th>
               <th>ພາກວິຊາ</th>
               <th>ປີ</th>
               <th>ຫໍພັກຕຶກ</th>
               <th>ຫ້ອງນອນ</th>
               <th>ເລກນອນ</th>
               
         </thead>
         <tbody>
         <?php
         
         $select="SELECT * FROM `payment` as p INNER JOIN `students` as s ON p.st_id=s.st_id
                                             INNER JOIN `item` as t ON p.t_id=t.tem_id 
                                             INNER JOIN `year` as y ON p.y_id=y.y_id 
                                             INNER JOIN `home` as h ON p.h_id=h.h_id
                                             INNER JOIN `class` as c ON p.c_id=c.c_id
                                             INNER JOIN `bed_number` as b ON p.b_id=b.b_id
                                             INNER JOIN `inclass` as nc ON p.in_id=nc.in_id where `h_name`='E5'";
                                           
                                            
                        

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
    $('#paytal').DataTable();
} );
</script>
