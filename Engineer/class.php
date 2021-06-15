
<?php
session_start();
require 'inclu/config.php';
require 'inclu/header.php';
$uc_id="";
$hid="";

 if(!isset($_SESSION['username'])){

  header("location:login.php");
 }

if(isset($_POST['add_class'])){

     /*$c_id=$_POST['add_id'];*/
     $h_name=$_POST['house'];
     $c_name=$_POST['c_name'];
     
     $c_select=mysqli_query($connect,"SELECT*FROM `class` where `c_name`='$c_name'");
     while($c_row=mysqli_fetch_array($c_select)){
          $cid=$c_row['c_id'];

     }
     $select=mysqli_query($connect,"SELECT*FROM `home` where `h_name`='$h_name'");
     while($h_row=mysqli_fetch_assoc($select)){
          $h=$h_row['h_id'];

     }
     
          $insert="INSERT INTO `class`(`h_id`, `c_name`) VALUES ('$h','$c_name')";
          $query=mysqli_query($connect,$insert);
         
          if($query){
               header("location:class.php?add");
              
     }   
 
}
if(isset($_POST['add_price'])){

     $price=$_POST['price'];

     $pr_select=mysqli_query($connect,"SELECT*FROM `amout` where `a_name`='$price'");
     if(mysqli_num_rows($pr_select)){
          echo 'error price';
     }else{
          $ass_price="INSERT INTO `amout`(`a_name`) VALUES ('$price')";
          $query2=mysqli_query($connect,$ass_price);
          
          if($query2){
               header("location:class.php?add_price");
          
          }   
     
}
}

/*=======================update========================*/

if(isset($_POST['u_edit'])){

      $c_id=$_POST['uc_id'];
      $uh_name=$_POST['u_home'];
      $uc_name=$_POST['u_class'];
 
      $up_select="SELECT * FROM `class` as c INNER JOIN `home` as h ON c.h_id=h.h_id WHERE c.c_id='$c_id'";
      
      $h_select=mysqli_query($connect,"SELECT*FROM `home` where `h_name`='$uh_name'");
      while($h_row=mysqli_fetch_assoc($h_select)){
           $hid=$h_row['h_id'];
 
      }
      $update="UPDATE `class` SET `h_id`='$hid',`c_name`='$uc_name' WHERE `c_id`='$c_id'";
     
      if(mysqli_query($connect,$update)){
           
      header("location:class.php?edit");
      }
      
         
 }
 /*=======================#update========================*/
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
                              <th>ຕຶກ</th>
                              <th>ຫ້ອງ</th>
                              <th>ລາຄ່າ</th>
                              <th>ແກ້ໄຂ</th>
                              <th>ລົບ</th>
                              </tr>
                         <tbody>
                         <?php
                         $select="SELECT*FROM `class` as c INNER JOIN `home` as h ON c.h_id=h.h_id
                                                           INNER JOIN `amout` as m ON c.a_id=m.a_id";
                         $result=mysqli_query($connect,$select);

                         while($row=mysqli_fetch_assoc($result)){

                         
                         ?>
                              <tr>
                              <td><?=$row['c_id']?></td>
                              <td><?=$row['h_name']?></td>
                              <td><?=$row['c_name']?></td>     
                              <td><?=$row['a_name']?></td>
                              <td>
                              <button type="button" class="btn btn-success btn-sm modalUpdate"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                              <i class="fa fa-edit" aria-hidden="true"></i>
                              </button>
                              </td>
                              <td><a href="class_delete.php?delete_id=<?=$row['c_id']?>" 
                              onclick="return confirm('ທ່ານຕ້ອງການລົບ / ຫ້ອງ <?=$row['c_name']?> / ຕືກ <?=$row['h_name']?> ແທ້ບໍ?.')" class="btn btn-danger btn-sm" title="Delete">
                              <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                              </tr>
                         <?php }?>
                         </tbody>
                         </thead>
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
                   <input type="text" name="c_name" class="form-control" required>
                   </div>
                   <button type="submit" class="btn btn-info btn-sm" name="add_class">save</button>
                 </form> 
               </div>   
             </div>  
          </div>
        </div>

       <!---------------modal update---------------->

        <!-- Button trigger modal -->
          

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
                         <input type="hidden" name="uc_id" id="c_id">
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
          $('.modalUpdate').on('click',function(){
               $('#exampleModal').modal('show');

               $tr=$(this).closest('tr');
                    var data=$tr.children('td').map(function(){
                         return $(this).text();
                    }).get();
                    console.log(data);
                    $('#c_id').val(data[0]);
                    $('#home').val(data[1]);
                    $('#u_class').val(data[2]);
               });
     });
  </script>
