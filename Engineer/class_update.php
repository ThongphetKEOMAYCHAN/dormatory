
<?php
session_start();
require 'inclu/config.php';
require 'inclu/header.php';

 if(!isset($_SESSION['username'])){

  header("location:login.php");
 }

 /* -----------------update---------------*/ 
$hid="";

/*
$u_cid=$_GET['u_id'];

*/
$u_cid=$_GET['u_id'];
$up_select="SELECT * FROM `class` as c INNER JOIN `home` as h ON c.h_id=h.h_id WHERE c.c_id='$u_cid'";

$query=mysqli_query($connect,$up_select);
while($row=mysqli_fetch_assoc($query)){
     
     $house=$row['h_name'];
     $number=$row['c_name'];

}

if(isset($_POST['u_edit'])){

     // $c_id=$_POST['c_id'];
      $uh_name=$_POST['u_home'];
      $uc_name=$_POST['u_class'];
 
      /*$c_select=mysqli_query($connect,"SELECT*FROM `class` where `c_name`='$c_name'");
      while($c_row=mysqli_fetch_array($c_select)){
           $cid=$c_row['c_id'];
 
      }*/
      $h_select=mysqli_query($connect,"SELECT*FROM `home` where `h_name`='$uh_name'");
      while($h_row=mysqli_fetch_assoc($h_select)){
           $hid=$h_row['h_id'];
 
      }
      $update="UPDATE `class` SET `h_id`='$hid',`c_name`='$uc_name' WHERE `c_id`='$u_cid'";
     
      if(mysqli_query($connect,$update)){
           
      header("location:class.php?edit");
      }
      
      
 }
/* -----------------#update---------------*/ 

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
               <div class="mb-3 col-sm-2">
               <label>ຕຶກ</label>
               <input type="text" class="form-control" name="u_home" value="<?=$house?>">
               </div>
               <div class="mb-3 col-sm-2">
               <label>ຫ້ອງ</label>
               <input type="text" class="form-control" name="u_class" value="<?=$number?>">
               </div>
               
               <button type="submit" name="u_edit" class="btn btn-primary">Submit</button>
               </form>
          </div>
        </div>
        <!--------------#content-------------------------->
      </div>       
  </div>
    
  <?php
  require 'inclu/footer.php';
  ?>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນຕາມທີຕ້ອງການໄດ້</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
                    <form action="" method="post">
                    <div class="modal-body">
                    <div class="form-group">
                         <input type="hidden" name="uc_id" id="">
                         <label>ຕຶກ</label>
                         <select class="form-select" name="u_home" id="home" aria-label="Default select example">
                         <option selected></option>
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
                              <input type="text" name="u_class" class="form-control" id="u_class">
                         </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">NO</button>
                              <button type="submit" name="u_edit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                    </form>
          </div>
          </div>
          </div>
        <!---------------#modal update---------------->
        <!--------------#content-------------------------->
      </div>       
  </div>
   
  <script>
     $(document).ready(function(){
          $('.modalUpdate').on('click',function(){
               $('#exampleModal').modal('show');

               $tr=$(this).closest('tr');
                    var data=$tr.children('td').map(function(){
                         return $(this).text();
                    }).get();
                    console.log(data);
                    $('#home').val(data[1]);
                    $('#u_class').val(data[2]);
               });
     });
  </script>
