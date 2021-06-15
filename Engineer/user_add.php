<?php
session_start();
require 'inclu/config.php';
require 'inclu/header.php';

date_default_timezone_set('Asia/Bangkok');
$date =date("Y-m-d H:i:s");
 if(!isset($_SESSION['username'])){

  header("location:login.php");
 }


 
if(isset($_POST['add'])){

     $em_id=$_POST['em_id'];
     $em_name=$_POST['em_name'];
     $em_sex=$_POST['em_sex'];
     $em_age=$_POST['em_age'];
     $em_b=$_POST['em_b'];
     $em_v=$_POST['em_v'];
     $em_d=$_POST['em_d'];
     $em_p=$_POST['em_p'];
     $em_tel=$_POST['em_tel'];

     $add="INSERT INTO `employees` (`em_name`, `em_sex`, `em_age`, `em_b`, `em_v`, `em_d`, `em_p`, `em_tel`, `em_date`) 
                              VALUES ('$em_name','$em_sex','$em_age','$em_b','$em_v','$em_d','$em_p','$em_tel','$date' )";

                              
                              if(mysqli_query($connect,$add)){
                                   header("location: user_infor.php");
                                   
                              }else{
                                   echo 'error';
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
                    <h4>ເພີ່ມຂໍ້ມູນພະນັກງານ</h4>
                    </center>
                   

                   <div class="row mt-5 col-md-12">
                    <div class="form-group col-md-3">
                         <label>ຊື່ ແລະ ນາມສະກຸນ</label>
                         <input type="text" class="form-control" name="em_name" placeholder="ຊື່ ແລະ ນາມສະກຸນ"  required>
                         </div> 
                    <div class="form-group col-md-2">
                         <label>ເພດ</label>
                         <select class="form-select" name="em_sex">
                         <option value=""></option>
                         <option value="ຊາຍ">ຊາຍ</option>
                         <option value="ຍີງ">ຍີງ</option>
                         </select>           
                    </div>
                    <div class="form-group col-md-2">    
                    <label>ອາຍຸ</label>
                         <input type="text" name="em_age" class="form-control" placeholder="ອາຍຸ" required>
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ວັນເດືອນປີເກີດ</label>
                         <input type="date" name="em_b" class="form-control" placeholder="ວັນເດືອນປີເກີດ" required>
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ບ້ານ</label>
                         <input type="text" name="em_v" class="form-control" placeholder="ບ້ານເກີດ" required>
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ເມືອງ</label>
                         <input type="text" name="em_d" class="form-control" placeholder="ເມືອງ" required>
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ແຂວງ</label>
                         <input type="text" name="em_p" class="form-control" placeholder="ແຂວງ" required>
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ເບີໂທ</label>
                         <input type="number" name="em_tel" class="form-control" placeholder="ເບີໂທ" required>
                    </div>
                   </div>
                   <button type="submit" name="add" class="btn btn-primary">ເພີ່ມ</button>
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