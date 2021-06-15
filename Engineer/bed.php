
<?php
session_start();
require 'inclu/config.php';
require 'inclu/header.php';

 if(!isset($_SESSION['username'])){

  header("location:login.php");
 }
 date_default_timezone_set('Asia/Bangkok');
$b_date =date("Y-m-d H:i:s");

if(isset($_POST['addbed'])){

  $house=$_POST['house'];
  $class=$_POST['class'];
  $bed=$_POST['b_name'];

  $select1=mysqli_query($connect,"SELECT*FROM `home`  WHERE `h_name`='$house'");
  while($hrow=mysqli_fetch_assoc($select1)){
    $hid=$hrow['h_id'];
  }
  $select2=mysqli_query($connect,"SELECT*FROM `class` WHERE `c_name`='$class'");
  while($crow=mysqli_fetch_assoc($select2)){
    $cid=$crow['c_id'];
  }

  $insert="INSERT INTO `bed_number`(`b_name`, `h_id`, `c_id`, `b_date`) VALUES ('$bed','$hid','$cid','$b_date')";
 if(mysqli_query($connect,$insert)){
  header("location:bed.php?add_ok");
  }else{
    echo '<script>alert("ຂໍ້ມູນມີຄວາມຜິດຜາດກະລຸນກວດຄືາອີກຄັ້ງ")</script>';
  }
}

/*========update=========*/
if(isset($_POST['bedEdit'])){

  $b_id=$_POST['b_id'];
  $b_home=$_POST['b_house'];
  $b_class=$_POST['b_class'];
  $b_bed=$_POST['b_bed'];

  $select="SELECT * FROM `bed_number` as b 
  INNER JOIN home as h ON b.h_id=h.h_id
  INNER JOIN class as c ON b.c_id=c.c_id where `b.b_id`='$b_id'";

  $hquery=mysqli_query($connect,"SELECT*FROM `home` where `h_name`='$b_home'");
  while($bh_row=mysqli_fetch_assoc($hquery)){
    $bh_id=$bh_row['h_id'];
  }
  $cquery=mysqli_query($connect,"SELECT*FROM `class` where `c_name`='$b_class'");
  while($bc_row=mysqli_fetch_assoc($cquery)){
    $bc_id=$bc_row['c_id'];
  }

  $update="UPDATE `bed_number` SET `b_name`='$b_bed',`h_id`=' $bh_id',`c_id`='$bc_id',`b_date`='$b_date' WHERE `b_id`='$b_id'";
  
  if(mysqli_query($connect,$update)){
     header("location:bed.php?ok");
  }else{
    echo 'error';
  }
}
/*=========#update===============*/

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
                              <th>ຕຽງ</th>
                              <th>ຫ້ອງ</th>
                              <th>ຕຶກ</th>
                              <th>date</th>
                              <th>ແກ້ໄຂ</th>
                              <th>ລົບ</th>
                              
                              </tr>
                          </thead>
                         <tbody>
                         <?php
                         
                         $select="SELECT * FROM `bed_number` as b 
                                INNER JOIN home as h ON b.h_id=h.h_id
                                INNER JOIN class as c ON b.c_id=c.c_id";
                                
                          $result=mysqli_query($connect,$select);
                          while($row=mysqli_fetch_assoc($result)){
                    
                         ?>
                              <tr>
                              <td><?=$row['b_id']?></td>
                              <td><?=$row['b_name']?></td>
                              <td><?=$row['c_name']?></td>  
                              <td><?=$row['h_name']?></td> 
                              <td><?=$row['b_date']?></td>     
                              <td>
                              <button type="button" class="btn btn-success btn-sm modalBed"  data-bs-toggle="modal" data-bs-target="#bed">
                              <i class="fa fa-edit" aria-hidden="true"></i>
                              </button>
                              </td>
                              <td><a href="class_delete.php?bedRemove=<?=$row['b_id']?>" 
                              onclick="return confirm('ທ່ານຕ້ອງການລົບ / ຕຽງ <?=$row['b_name']?> / ຫ້ອງ <?=$row['c_name']?> / ຕືກ <?=$row['h_name']?> ແທ້ບໍ?.')" class="btn btn-danger btn-sm" title="Delete">
                              <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                              </tr>
                         <?php }?>
                         </tbody>
                         
                    </table>
               </div> 

               <div class="card col-sm-2">
                 <form action="" method="post">
                   <div class="form-group">
                  <input type="hidden" name="add_id" id="">
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
                   <label>ຕຽງ</label>
                   <input type="text" name="b_name" class="form-control" required>
                   </div>
                   <button type="submit" class="btn btn-info" name="addbed">save</button>
                 </form> 
               </div>    
             </div>
          </div>
        </div>
        <!--------------------modal update--------------------->
            <!-- Modal -->
            <div class="modal fade" id="bed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="post">
                   <div class="modal-body">
                 
                    <div class="group">
                    <input type="hidden" name="b_id" id="b_id">
                      <label>ຕຶກ</label>
                      <select class="form-select" aria-label="Default select example" name="b_house" id="b_house">
                     
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
                        <select class="form-select" aria-label="Default select example" name="b_class" id="b_class">
                       
                        <?php
                        $bccon=mysqli_query($connect,"SELECT*FROM `class`");
                        while($bcrow=mysqli_fetch_assoc($bccon)){
                          
                        
                        ?>
                        <option value="<?=$bcrow['c_name']?>"><?=$bcrow['c_name']?></option>
                        <?php }?>
                        </select>
                      </div>
                      <div class="group">
                        <label>ຕຽງ</label>
                        <input type="text" class="form-control" name="b_bed" id="b_bed">
                      </div>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">No</button>
                    <button type="submit" name="bedEdit" class="btn btn-primary btn-sm">Save</button>
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
  $(document).ready(function(){
    $('#table').DataTable();
  });
  </script>
  <script>
     $(document).ready(function(){
          $('.modalBed').on('click',function(){
               $('#bed').modal('show');

               $tr=$(this).closest('tr');
                    var data=$tr.children('td').map(function(){
                         return $(this).text();
                    }).get();
                    console.log(data);
                    $('#b_id').val(data[0]);
                    $('#b_bed').val(data[1]);
                    $('#home').val(data[2]);
                    $('#b_house').val(data[3]);
               });
     });
  </script>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>