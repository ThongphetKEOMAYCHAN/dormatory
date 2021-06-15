<?php
session_start();
require 'inclu/config.php';
require 'inclu/header.php';

date_default_timezone_set('Asia/Bangkok');
$date =date("Y-m-d H:i:s");
 if(!isset($_SESSION['username'])){

  header("location:login.php");
 }
$pay=$_GET['pay_id'];

$select="SELECT * FROM `payment` as p INNER JOIN `students` as s ON p.st_id=s.st_id
INNER JOIN `item` as t ON p.t_id=t.tem_id 
INNER JOIN `year` as y ON p.y_id=y.y_id 
INNER JOIN `home` as h ON p.h_id=h.h_id
INNER JOIN `class` as c ON p.c_id=c.c_id
INNER JOIN `bed_number` as b ON p.b_id=b.b_id
INNER JOIN `inclass` as nc ON p.in_id=nc.in_id where `p_id`='$pay'";


$result=mysqli_query($connect,$select);
while($row=mysqli_fetch_assoc($result)){

     $stcode=$row['st_code'];
     $stname=$row['st_name'];
     $inclass=$row['in_name'];
     $stem=$row['iterm'];
     $styear=$row['y_name'];
     $sthome=$row['h_name'];
     $stclass=$row['c_name'];
     $stbed=$row['b_name'];
     $payment=$row['p_name'];

}

 
if(isset($_POST['register'])){
     $st_code=$_POST['st_code'];
     $st_name=$_POST['st_name'];
     $in_class=$_POST['in_class'];
     $st_item=$_POST['st_item'];
     $st_year=$_POST['st_year'];
     $st_home=$_POST['st_home'];
     $st_class=$_POST['st_class'];
     $st_bed=$_POST['st_bed'];
     $st_pay=$_POST['st_money'];


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
   
     $register="UPDATE `payment` SET `p_name`='$st_pay',`h_id`='$stid',`t_id`='$st_em',`h_id`='$hid',`c_id`='$cid',`b_id`='$stb_id',`y_id`='$sty_id',`in_id`='$stin',`date`='$date' WHERE `p_id`='$pay'";
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
               <form method="post">
               <div class="card-body">
               <div class="form-group col-md-3">    
                    <label>ຈໍານວນເງີນຊໍາລະ</label>
                    <input type="number" name="st_money" id="" class="form-control" value="<?=$payment?>">
                    </div>
                   <div class="row mt-5 col-md-12">
                    <div class="form-group col-md-2">
                        
                         <input type="hidden" name="st_code" class="form-control" id="" value="<?=$stcode?>">
                   </select>
                    </div>
                    <div class="form-group col-md-3">
                         
                         <input type="hidden" name="st_name" class="form-control" id="" value="<?=$stname?>">
                    </div> 
                    <div class="form-group col-md-2">
                        <input type="hidden" name="in_class" class="form-control" id="" value="<?=$inclass?>">
                    </div>
                    <div class="form-group col-md-2">    
                    <input type="hidden" name="st_item" class="form-control" id="" value="<?=$stem?>">
                    </div>
                    <div class="form-group col-md-3">    
                   <input type="hidden" name="st_year" class="form-control" id="" value="<?=$styear?>">
                    </div>
                    <div class="form-group col-md-3">    
                        <input type="hidden" name="st_home" class="form-control" id="" value="<?=$sthome?>">
                    </div>
                    <div class="form-group col-md-3">    
                        <input type="hidden" name="st_class" class="form-control" id="" value="<?=$stclass?>">
                    <div class="form-group col-md-3">    
                        <input type="hidden" name="st_bed" class="form-control" id="" value="<?=$stbed?>">
                    </div>                
                   </div>
                   </div>
                   <button type="submit" name="register" class="btn btn-primary">ແກ້ໄຂ</button>
                   </div>
               </form>     
          </div>
        </div>
        
        <!--------------#content-------------------------->
      </div>       
  </div>
    
  <?php
  require 'inclu/footer.php';
  ?>