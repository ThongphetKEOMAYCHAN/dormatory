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

     $st_code=$_POST['st_code'];
     $st_name=$_POST['st_name'];
     $st_sex=$_POST['st_sex'];
     $st_age=$_POST['st_age'];
     $st_b=$_POST['st_b'];
     $st_v=$_POST['st_v'];
     $st_d=$_POST['st_d'];
     $st_p=$_POST['st_p'];
     $st_tel=$_POST['st_tel'];
     
     $select=mysqli_query($connect,"SELECT*FROM `students` where `st_code`='$st_code'");
     if(mysqli_num_rows($select)){

          echo '<script>alert("ມີແລ້ວຂໍ້ມູນແລ້ວກາລຸນາລອງອີກຄັ້ງ!")</script>';
     }else{
          $add="INSERT INTO `students` (`st_code`, `st_name`, `st_sex`, `st_age`, `st_b`, `st_v`, `st_d`, `st_p`, `tell`, `st_date`) 
          VALUES ('$st_code','$st_name','$st_sex','$st_age','$st_b','$st_v','$st_d','$st_p','$st_tel','$date')";

          
          if(mysqli_query($connect,$add)){
               header("location: st_all.php");
               
          }else{
               echo 'error';
          }
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
                    <h4>ເພີ່ມຂໍ້ມູນນັກສຶກສາ</h4>
                    </center>
                   

                   <div class="row mt-5 col-md-12">
                    <div class="form-group col-md-2">
                         <label>ລະຫັດນັກສຶກສາ</label>
                         <input type="text" name="st_code" class="form-control" placeholder="ລະຫັດນັກສຶກສາ" required>  
                    </div>
                    <div class="form-group col-md-3">
                         <label>ຊື່ ແລະ ນາມສະກຸນ</label>
                         <input type="text" class="form-control" name="st_name" placeholder="ຊື່ ແລະ ນາມສະກຸນ"  required>
                         </div> 
                    <div class="form-group col-md-2">
                         <label>ເພດ</label>
                         <select class="form-select" name="st_sex">
                         <option value=""></option>
                         <option value="ຊາຍ">ຊາຍ</option>
                         <option value="ຍີງ">ຍີງ</option>
                         </select>           
                    </div>
                    <div class="form-group col-md-2">    
                    <label>ອາຍຸ</label>
                         <input type="text" name="st_age" class="form-control" placeholder="ອາຍຸ" required>
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ວັນເດືອນປີເກີດ</label>
                         <input type="date" name="st_b" class="form-control" placeholder="ວັນເດືອນປີເກີດ" required>
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ບ້ານ</label>
                         <input type="text" name="st_v" class="form-control" placeholder="ບ້ານເກີດ" required>
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ເມືອງ</label>
                         <input type="text" name="st_d" class="form-control" placeholder="ເມືອງ" required>
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ແຂວງ</label>
                         <input type="text" name="st_p" class="form-control" placeholder="ແຂວງ" required>
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ເບີໂທ</label>
                         <input type="number" name="st_tel" class="form-control" placeholder="ເບີໂທ" required>
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