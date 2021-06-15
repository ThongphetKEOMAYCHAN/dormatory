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
$select="SELECT*FROM `students` where `st_id`='$id'";
$result=mysqli_query($connect,$select);
while($row=mysqli_fetch_assoc($result)){

     $st_id=$row['st_id'];
     $scode=$row['st_code'];
     $sname=$row['st_name'];
     $sex=$row['st_sex'];
     $sage=$row['st_age'];
     $sb=$row['st_b'];
     $sv=$row['st_v'];
     $sd=$row['st_d'];
     $sp=$row['st_p'];
     $stel=$row['tell']; 
}
if(isset($_POST['update'])){

     $st_code=$_POST['st_code'];
     $st_name=$_POST['st_name'];
     $st_sex=$_POST['st_sex'];
     $st_age=$_POST['st_age'];
     $st_b=$_POST['st_b'];
     $st_v=$_POST['st_v'];
     $st_d=$_POST['st_d'];
     $st_p=$_POST['st_p'];
     $st_tel=$_POST['st_tel'];

     $update="UPDATE `students` SET `st_code`='$st_code',`st_name`='$st_name',`st_sex`='$st_sex',`st_age`='$st_age',
     `st_b`='$st_b',`st_v`='$st_v',`st_d`='$st_d',`st_p`='$st_p',`tell`='$st_tel',`st_date`='$date' WHERE `st_id`='$id'";

    if(mysqli_query($connect,$update)){
         header("location:st_all.php?update");
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
                    <h4>ແກ້ໄຂຂໍ້ມູນນັກສຶກສາ</h4>
                    </center>
                   

                   <div class="row mt-5 col-md-12">
                    <div class="form-group col-md-2">
                         <label>ລະຫັດນັກສຶກສາ</label>
                         <input type="text" name="st_code" class="form-control"  value="<?=$scode?>">  
                    </div>
                    <div class="form-group col-md-3">
                         <label>ຊື່ ແລະ ນາມສະກຸນ</label>
                         <input type="text" class="form-control" name="st_name" value="<?=$sname?>">
                         </div> 
                    <div class="form-group col-md-2">
                         <label>ເພດ</label>
                         <select class="form-select" name="st_sex">
                         <option value="<?=$sex?>"><?=$sex?></option>
                         <option value="ຊາຍ">ຊາຍ</option>
                         <option value="ຍີງ">ຍີງ</option>
                         </select>           
                    </div>
                    <div class="form-group col-md-2">    
                    <label>ອາຍຸ</label>
                         <input type="text" name="st_age" class="form-control" value="<?=$sage?>">
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ວັນເດືອນປີເກີດ</label>
                         <input type="date" name="st_b" class="form-control" value="<?=$sb?>">
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ບ້ານ</label>
                         <input type="text" name="st_v" class="form-control" value="<?=$sv?>">
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ເມືອງ</label>
                         <input type="text" name="st_d" class="form-control" value="<?=$sd?>">
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ແຂວງ</label>
                         <input type="text" name="st_p" class="form-control" value="<?=$sp?>">
                    </div>
                    <div class="form-group col-md-3">    
                    <label>ເບີໂທ</label>
                         <input type="number" name="st_tel" class="form-control" value="<?=$stel?>">
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