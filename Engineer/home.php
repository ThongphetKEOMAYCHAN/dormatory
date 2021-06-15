
<?php
session_start();
require 'inclu/config.php';
require 'inclu/header.php';

 if(!isset($_SESSION['username'])){

  header("location:login.php");
 }

 if(isset($_POST['insert'])){
  $h_name=$_POST['house_name'];
  
  foreach($h_name as $key=>$value){
      $select=mysqli_query($connect,"SELECT*FROM `home` WHERE `h_name`='$value'");
      if(mysqli_num_rows($select)){
         
         header("location:home.php?add_home_id");
      }else{

      $insert="INSERT INTO `home`(`h_name`) VALUES ('".$value."')";
      $result=mysqli_query($connect,$insert);
  
  }
}
}
if(isset($_POST['update'])){

  $h_id=$_POST['h_id'];
  $hname=$_POST['h_name'];

  $update="UPDATE `home` SET `h_name`='$hname' WHERE `h_id`='$h_id'";
   if(mysqli_query($connect,$update)){
     header("location:home.php?update");
   }
}
if(isset($_GET['house_id'])){

  $h_id=($_GET['house_id']);
  $h_delete=mysqli_query($connect,"DELETE FROM `home` WHERE `h_id`='$h_id'");
  if($h_delete){
    header("location:home.php?h_id_Deleted");
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
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body">
                      <form method="post">
                        <table class="table table-borderless" id="table_class">
                          <tr>
                            <th>ເພີ່ມຕືກ</th>
                          </tr>
                          <tr>
                            <td><input type="text" name="house_name[]" class="form-control" required></td>
                            <td><input type="button" name="add" id="add" class="form-control btn btn-primary btn-sm" value="+"></td>
                          </tr>
                        </table>
                        <button type="submit" name="insert" class="btn btn-success">save</button>
                      </form>
                    </div>
                  </div>
                </div>
    
                  <div class="col-sm-8">
                  <table class="table table-hover" id="table">
                    <thead>
                      <tr>
                        <th>ລ/ດ</th>
                        <th>ຕືກ</th>
                        <th><i class="fa fa-edit" aria-hidden="true"></i></th>
                        <th><i class="fa fa-trash" aria-hidden="true"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $sql=mysqli_query($connect,"SELECT*FROM `home`");
                    while($row=mysqli_fetch_assoc($sql)){

                    
                    ?>
                      <tr>
                        <td><?=$row['h_id']?></td>
                        <td><?=$row['h_name']?></td>
                        <td>
                        <button type="button" class="btn btn-success btn-sm editbtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                        </button> 
                        </td>
                        <td><a href="home.php?house_id=<?=$row['h_id']?>" onclick="return confirm('ທ່ານຕ້ອງການລົບ/ ຕຶກ/ <?=$row['h_name']?> / ແທ້ບໍ່?')" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash" aria-hidden="true"></a></td>
                      
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!---------modal----------->
          <!-- Button trigger modal -->
            
            <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="" method="post">
                  <div class="modal-body">
                    <input type="hidden" name="h_id" id="h_id">
                    <div class="form-group">
                    <h5>ແກ້ໄຂຂໍ້ມູນຕຶກ</h5>
                      <input type="text" class="form-control" name="h_name" id="h_name">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                    <button type="submit" class="btn btn-primary" name="update">Save</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          <!---------#modal----------->
        <!--------------#content-------------------------->
      </div>       
  </div>
    
  <?php
  require 'inclu/footer.php';
  ?>
  <script>
  $(document).ready(function(){
    var html='<tr><td><input type="text" name="house_name[]" class="form-control" ></td><td><input type="button" name="add" id="remove" class="form-control btn btn-danger btn-sm" value="-"></td></tr>';
  $('#add').click(function(){
    $('#table_class').append(html)
  });
  $('#table_class').on('click','#remove',function(){
    $(this).closest('tr').remove();
    
  });
  });
  </script>
  <!---------------table--------------->
  <script>
   $(document).ready(function(){
     $('#table').DataTable();
   });
  </script>
  <!-----------#table------------------>
  <!-----------Modal-------------->
  <script>
     $(document).ready(function(){
        $('.editbtn').on('click',function(){

            $('#editModal').modal('show');

             $tr=$(this).closest('tr');
                var data=$tr.children('td').map(function(){ 
                return $(this).text(); 
                }).get();
                    console.log(data);
                    $('#h_id').val(data[0]);
                    $('#h_name').val(data[1]);

    });
    });
</script>
