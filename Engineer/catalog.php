
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
if(isset($_POST['talogAdd'])){

     $talog_id=$_POST['talog_id'];
     $house=$_POST['house'];
     $class=$_POST['class'];
     $talog=$_POST['talog'];

     
  $hquery=mysqli_query($connect,"SELECT*FROM `home` where `h_name`='$house'");
  while($ta_row=mysqli_fetch_assoc($hquery)){
    $ta_id=$ta_row['h_id'];
  }
  $cquery=mysqli_query($connect,"SELECT*FROM `class` where `c_name`='$class'");
  while($cta_row=mysqli_fetch_assoc($cquery)){
    $cta_id=$cta_row['c_id'];
  }

     $catalog_add="INSERT INTO `catalog`(`talog_name`, `h_id`, `c_id`, `date`) VALUE('$talog','$ta_id','$cta_id','$date')";

     if(mysqli_query($connect,$catalog_add)){
         $msg='ເພີ່ມຂໍ້ມູນສໍາເລັດແລ້ວ';
     }else{
          echo 'error';
     }
}
 
if(isset($_POST['catalgEdit'])){

     $cata_id=$_POST['cata_id'];
     $ta_home=$_POST['ta_home'];
     $ta_class=$_POST['ta_class'];
     $catalog=$_POST['catalog'];

     $hquery=mysqli_query($connect,"SELECT*FROM `home` where `h_name`='$ta_home'");
     while($th_row=mysqli_fetch_assoc($hquery)){
     $th_id=$th_row['h_id'];
  }
  $cquery=mysqli_query($connect,"SELECT*FROM `class` where `c_name`='$ta_class'");
  while($tc_row=mysqli_fetch_assoc($cquery)){
    $tc_id=$tc_row['c_id'];
  }

  $update="UPDATE `catalog` SET `talog_name`='$catalog',`h_id`='$th_id',`c_id`='$tc_id',`date`='$date' WHERE `ta_id`='$cata_id'";

  if(mysqli_query($connect,$update)){
       header("location:catalog.php?update_id");
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
               <div class="row col-sm-12">
                    <div class="card col-sm-10">
                         <table class="table" id="table">
                              <thead>
                                   <tr>
                                        <th>ລ/ດ</th>
                                        <th>ອຸປະກອນ</th>
                                        <th>ຫ້ອງ</th>
                                        <th>ຕຶກ</th>
                                        <th>date</th>
                                        <th>ແກ້ໄຂ</th>
                                        <th>ລົບ</th>
                                   </tr>
                              </thead>
                              <tbody>
                              <?php
                                   $select=mysqli_query($connect,"SELECT * FROM `catalog` as ca
                                                                 INNER JOIN `home` as h ON ca.h_id=h.h_id
                                                                 INNER JOIN `class` as c ON ca.c_id=c.c_id");
                                             while($row=mysqli_fetch_assoc($select)){

                                             
                              ?>
                                   <tr>
                                        <td><?=$row['ta_id']?></td>
                                        <td><?=$row['talog_name']?></td>
                                        <td><?=$row['h_name']?></td>
                                        <td><?=$row['c_name']?></td>
                                        <td><?=$row['date']?></td>
                                        <td>
                                        <button type="button" class="btn btn-success btn-sm modalTalog"  data-bs-toggle="modal" data-bs-target="#catalog" title="Update">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                        </button>
                                        </td>
                                        <td>
                                        <a href="class_delete.php?catalog=<?=$row['ta_id']?>"
                                        onclick="return confirm('ທ່ານຕ້ອງການລົບ /<?=$row['talog_name']?>/ ໃນຫ້ອງ/<?=$row['c_name']?>/ ແທ້ບໍ່?')" class="btn btn-danger btn-sm" title="Delete">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        
                                        </td>
                                   
                                   </tr>
                                   <?php }?>
                              </tbody>
                         </table>
                    </div>
                    
                    <div class="card col-sm-2">
                         <form action="" method="post">
                         <div class="form-group">
                         <input type="hidden" name="talog_id" id="">
                         <label>ຕຶກ</label>
                              <select class="form-select" name="house" aria-label="Default select example">
                              <option selected>ຕົວເລືອກ</option>
                              <?php 
                                   $h_select=mysqli_query($connect,"SELECT*FROM `home`");
                                   while($h_row=mysqli_fetch_assoc($h_select)) {
                                   ?>
                                   <option value="<?=$h_row['h_name']?>"><?=$h_row['h_name']?></option>

                              <?php }?>

                         </select>
                         </div>
                         <div class="form-group">
                         <label>ຫ້ອງ</label>
                              <select class="form-select" name="class" aria-label="Default select example">
                              <option selected>ຕົວເລືອກ</option>
                              <?php 
                                   $c_select=mysqli_query($connect,"SELECT*FROM `class`");
                                   while($c_row=mysqli_fetch_assoc($c_select)) {
                                   ?>
                                   <option value="<?=$c_row['c_name']?>"><?=$c_row['c_name']?></option>

                              <?php }?>

                         </select>
                         </div>
                         <div class="form-group">
                         <label>ອຸປະກອນ</label>
                         <input type="text" name="talog" class="form-control" required>
                         </div>
                         <h6><?=$msg?></h6>
                         <button type="submit" class="btn btn-info" name="talogAdd">save</button>
                         </form> 
                         
                    </div>    
               </div>
          </div>  
     </div>      

      <!--------------------modal update--------------------->
            <!-- Modal -->
            <div class="modal fade" id="catalog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="post">
                   <div class="modal-body">
                 
                    <div class="group">
                    <input type="hidden" name="cata_id" id="cata_id">
                      <label>ຕຶກ</label>
                      <select class="form-select" aria-label="Default select example" name="ta_home" id="ta_house">
                     
                     <?php
                     $bhcon=mysqli_query($connect,"SELECT*FROM `home`");
                     while($bhrow=mysqli_fetch_assoc($bhcon)){
                      
                     
                     ?>
                      <option value="<?=$bhrow['h_name']?>"><?=$bhrow['h_name']?></option>
                     <?php }?>
                      </select>
                    </div>
                      <div class="group">
                        
                        <label>ຫ້ອງ</label>
                        <select class="form-select" aria-label="Default select example" name="ta_class" id="class">
                       
                        <?php
                        $bccon=mysqli_query($connect,"SELECT*FROM `class`");
                        while($bcrow=mysqli_fetch_assoc($bccon)){
                          
                        
                        ?>
                        <option value="<?=$bcrow['c_name']?>"><?=$bcrow['c_name']?></option>
                        <?php }?>
                        </select>
                      </div>
                      <div class="group">
                        <label>ຊື່ອຸປະກອນ</label>
                        <input type="text" class="form-control" name="catalog" id="talog">
                      </div>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">No</button>
                    <button type="submit" name="catalgEdit" class="btn btn-primary btn-sm">Save</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
        <!--------------------#modal update--------------------->
<!--------------#content-------------------------->
      </div>       
  </div>
    
  <?php
  require 'inclu/footer.php';
  ?>
 <script>
  $(document).ready(function() {
    $('#table').DataTable();
} );
</script>
<script>
     $(document).ready(function(){
          $('.modalTalog').on('click',function(){
               $('#catalog').modal('show');

               $tr=$(this).closest('tr');
                    var data=$tr.children('td').map(function(){
                         return $(this).text();
                    }).get();
                    console.log(data);
                    $('#cata_id').val(data[0]);
                    $('#talog').val(data[1]);
                    $('#ta_house').val(data[2]);
                    $('#b_house').val(data[3]);
               });
     });
  </script>