<?php
session_start();
require 'inclu/config.php';
require 'inclu/header.php';

date_default_timezone_set('Asia/Bangkok');
$date =date("Y-m-d H:i:s");
 if(!isset($_SESSION['username'])){

  header("location:login.php");
 }


$id=$_GET['id'];
$select="SELECT*FROM `employees` where `em_id`='$id'";
$result=mysqli_query($connect,$select);
while($row=mysqli_fetch_assoc($result)){
     $em_id=$row['em_id'];
     $emname=$row['em_name'];
     $emsex=$row['em_sex'];
     $emage=$row['em_age'];
     $emb=$row['em_b'];
     $emv=$row['em_v'];
     $emd=$row['em_d'];
     $emp=$row['em_p'];
     $emtel=$row['em_tel'];
     
}
if(isset($_POST['update'])){

     $em_name=$_POST['emp_name'];
     $em_sex=$_POST['emp_sex'];
     $em_age=$_POST['emp_age'];
     $em_b=$_POST['emp_b'];
     $em_v=$_POST['emp_v'];
     $em_d=$_POST['emp_d'];
     $em_p=$_POST['emp_p'];
     $em_tel=$_POST['emp_tel'];

    $emp_edit="Update `employees` SET `em_name`='$em_name', `em_sex`='$em_sex', `em_age`='$em_age', `em_b`='$em_b', 
                                        `em_v`='$em_v', `em_d`='$em_d', `em_p`='$em_p', `em_tel`='$em_tel', `em_date`='$date' WHERE `em_id`='$id'";

    if(mysqli_query($connect,$emp_edit)){
         header("location:user_infor.php");
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
                    <center>
                    <h4>ແກ້ໄຂຂໍ້ມູນພະນັກງານ</h4>
                    </center>
                   

                   <div class="row mt-5 col-md-12">
                    <div class="form-group col-md-3">
                         <label>ຊື່ ແລະ ນາມສະກຸນ</label>
                         <input type="text" class="form-control" name="emp_name" value="<?=$emname?>">
                         </div> 
                    <div class="form-group col-md-2">
                         <label>ເພດ</label>
                         <select class="form-select" name="emp_sex">
                         <option value="<?=$emsex?>"><?=$emsex?></option>
                         <option value="ຊາຍ">ຊາຍ</option>
                         <option value="ຍີງ">ຍີງ</option>
                         </select>           
                    </div>
                    <div class="form-group col-md-2">    
                    <label>ອາຍຸ</label>
                         <input type="text" name="emp_age" class="form-control" value="<?=$emage?>">
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ວັນເດືອນປີເກີດ</label>
                         <input type="date" name="emp_b" class="form-control" value="<?=$emb?>">
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ບ້ານ</label>
                         <input type="text" name="emp_v" class="form-control" value="<?=$emv?>">
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ເມືອງ</label>
                         <input type="text" name="emp_d" class="form-control" value="<?=$emd?>">
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ແຂວງ</label>
                         <input type="text" name="emp_p" class="form-control" value="<?=$emp?>">
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ເບີໂທ</label>
                         <input type="number" name="emp_tel" class="form-control" value="<?=$emtel?>">
                    </div>
                   </div>
                   <button type="submit" name="update" class="btn btn-success">Update</button>
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