<div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
              <!-- Page Heading -->
             
          </div>
        </div>
        <div class="col-md-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><?=$_SESSION['username']?></a></li>
                    <li class="breadcrumb-item"><a href="#">ຫໍພັກຊາຍ ຄວສ</a></li>
                    <?php 
                     $query=mysqli_query($connect,"SELECT*FROM `employees`");
                     $user=mysqli_num_rows($query);
                    ?>
                    <li class="breadcrumb-item active" aria-current="page" >ພະນັກງານທັງຫມົດ: <?=$user?> ຄົນ</li>
                    <?php 
                     $select=mysqli_query($connect,"SELECT*FROM `students`");
                     $all=mysqli_num_rows($select);
                    ?>
                     
                    <li class="breadcrumb-item active" aria-current="page">ນັກສຶກສາທັງຫມົດ: <?=$all?> ຄົນ</li>
                  </ol>
                </nav>
                <div class="row">
                      <div class="col-sm-3">
                        <div class="card">
                          <div class="card-body">
                            <?php 
                            
                           $count=mysqli_query($connect,"SELECT*FROM `payment` where `p_name`='290000'");
                           $pay=mysqli_num_rows($count);
                             
                          
                            ?>
                            <h5 class="card-title mb-4">ນັກສຶກສາທັງຫມົດ:</h5>
                            <div class="mb-1">
                              <span class="text-dart"> ທີ່ຈ່າຍຄ່າແລ້ວ: <i class="mdi mdi-arrow-bottom-right text-danger"><?=$pay?></i> ຄົນ</span>
                              
                            </div>
                          </div>
                        </div>	
                      </div>
                      <div class="col-sm-3">
                        <div class="card">
                          <div class="card-body">
                          <?php 
                            
                            $count1=mysqli_query($connect,"SELECT*FROM `payment` where `p_name`<'290000'");
                            $pay1=mysqli_num_rows($count1);
                              
                           
                             ?>
                             <h5 class="card-title mb-4">ນັກສຶກສາທັງຫມົດ:</h5>
                             <div class="mb-1">
                               <span class="text-dart"> ທີ່ຍັງບໍ່ຈ່າຍຄ່າ: <i class="mdi mdi-arrow-bottom-right text-danger"><?=$pay1?></i> ຄົນ</span>
                            
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <div class="col-sm-3">
                        <div class="card">
                          <div class="card-body">
                          <?php 
                            $sql1=mysqli_query($connect,"SELECT*FROM `home`");
                            $c3=mysqli_num_rows($sql1);
                            ?>
                            <h5 class="card-title mb-4">ຈໍານວນຕຶກທັງຫມົດ:</h5>
                            <div class="mb-1">
                              <span class="text-dart"> ມີ: <i class="mdi mdi-arrow-bottom-right text-danger"><?=$c3?></i> ຕຶກ</span>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <div class="col-sm-3">
                        <div class="card">
                          <div class="card-body">
                          <?php 
                            $sql2=mysqli_query($connect,"SELECT*FROM `class`");
                            $c4=mysqli_num_rows($sql2);
                            ?>
                            <h5 class="card-title mb-4">ຈໍານວນຫ້ອງທັງໝົດ:</h5>
                            <div class="mb-1">
                              <span class="text-dart"> ມີ: <i class="mdi mdi-arrow-bottom-right text-danger"><?=$c4?></i> ຫ້ອງ</span>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
        </div>
      </div>

      </div>
            <!-- /.container-fluid -->

          