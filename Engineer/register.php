<?php
session_start();
require 'inclu/config.php';
require 'inclu/header.php';

date_default_timezone_set('Asia/Bangkok');
$date =date("m.d.y");

 if(!isset($_SESSION['username'])){

  header("location:login.php");
 }
$st=$_GET['stid'];
$select="SELECT*FROM `students` where `st_id`='$st'";
$result=mysqli_query($connect,$select);
while($srow=mysqli_fetch_assoc($result)){
     $scode=$srow['st_code'];
     $sname=$srow['st_name'];
     
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
     //$st_pay=$_POST['st_money'];

   

          $st_select1=mysqli_query($connect,"SELECT*FROM `students`  WHERE `st_code`='$st_code' and `st_name`='$st_name'");
          while($st_row=mysqli_fetch_assoc($st_select1)){
            $stid=$st_row['st_id'];
            
          }
          $stem_select=mysqli_query($connect,"SELECT * FROM `item` WHERE `iterm`='$st_item'");
          while($tem_row=mysqli_fetch_assoc($stem_select1)){
            $stem=$tem_row['tem_id'];
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
       
     
          
               $register="INSERT INTO `payment`(`st_id`, `t_id`, `h_id`, `c_id`, `b_id`, `y_id`,`in_id`, `date`) 
               VALUES ('$stid','$stin',' $hid',' $cid',' $stb_id','$sty_id','$stin','$date')";
     if(mysqli_query($connect,$register)){
          header("location:st_all.php?registered");
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
                   <div class="row mt-5 col-md-12">
                    <div class="form-group col-md-2">
                         <label>ລະຫັດນັກສຶກສາ</label>
                         <input type="text" name="st_code" class="form-control" id="" value="<?=$scode?>">
                   </select>
                    </div>
                    <div class="form-group col-md-3">
                         <label>ຊື່ ແລະ ນາມສະກຸນ</label>
                         <input type="text" name="st_name" class="form-control" id="" value="<?=$sname?>">
                    </div> 
                    <div class="form-group col-md-2">
                         <label>ນອກແຜນ ຫຼື ໃນແຜນ</label>
                         <select class="form-select" name="in_class" aria-label="Default select example">
                    <option selected></option>
                    <?php 
                         $insql=mysqli_query($connect,"SELECT*FROM `inclass`");
                         while($inrow=mysqli_fetch_assoc($insql)) {
                         ?>
                         <option value="<?=$inrow['in_name']?>"><?=$inrow['in_name']?></option>

                    <?php }?>

                   </select>              
                    </div>
                    <div class="form-group col-md-2">    
                    <label>ພາກວິຊາ</label>
                    <select class="form-select" name="st_item" aria-label="Default select example">
                    <?php
                    $item=mysqli_query($connect,"SELECT*FROM `item`");
                    while($tem_row=mysqli_fetch_array($item)){
                    
                    
                    ?>
                         <option value="<?=$tem_row['iterm']?>"><?=$tem_row['iterm']?></option>
                         <?php }?>
                   </select>
                    </div>
                    <div class="form-group col-md-2">    
                    <label>ປີ</label>
                    <select class="form-select" name="st_year" aria-label="Default select example">
                    <option selected>ປີຮຽນ</option>
                    <?php 
                         $y_select=mysqli_query($connect,"SELECT*FROM `year`");
                         while($y_row=mysqli_fetch_assoc($y_select)) {
                         ?>
                         <option value="<?=$y_row['y_name']?>"><?=$y_row['y_name']?></option>

                    <?php }?>

                   </select>
                    </div>
                    <div class="form-group col-md-3">    
                         <label>ຕຶກ</label>
                         <select class="form-select" name="st_home" aria-label="Default select example">
                         <option selected>ຕົວເລືອກ</option>
                         <?php 
                              $h_select=mysqli_query($connect,"SELECT*FROM `home`");
                              while($h_row=mysqli_fetch_assoc($h_select)) {
                              ?>
                              <option value="<?=$h_row['h_name']?>"><?=$h_row['h_name']?></option>

                         <?php }?>

                    </select>
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ຫ້ອງ</label>
                    <select class="form-select" name="st_class" aria-label="Default select example">
                    <option selected>ຕົວເລືອກ</option>
                    <?php 
                         $c_select=mysqli_query($connect,"SELECT*FROM `class`");
                         while($c_row=mysqli_fetch_assoc($c_select)) {
                         ?>
                         <option value="<?=$c_row['c_name']?>"><?=$c_row['c_name']?></option>

                    <?php }?>

                   </select>
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ຕຽງນອນ</label>
                    <select class="form-select" name="st_bed" aria-label="Default select example">
                    <option selected>ເລກຕຽງນອນ</option>
                    <?php 
                         $b_select=mysqli_query($connect,"SELECT*FROM `bed_number`");
                         while($b_row=mysqli_fetch_assoc($b_select)) {
                         ?>
                         <option value="<?=$b_row['b_name']?>"><?=$b_row['b_name']?></option>

                    <?php }?>

                   </select>
                    </div>
                   </div>
                   <button type="submit" name="register" class="btn btn-primary">ລົງທະບຽນ</button>
                   </div>
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