<?php
require 'inclu/config.php';

if(isset($_GET['s_id'])){

     $st_id=$_GET['s_id'];  /* get "s_id from st_all.php  the button delete"*/

     $delete=mysqli_query($connect,"DELETE FROM `students` WHERE `st_id`='$st_id'");
     
     if($delete){
          header("location:st_all.php?deleted");
     }

}

/* user delete */
if(isset($_GET['emp_id'])){

     $em_id=$_GET['emp_id'];

     $user_delete=mysqli_query($connect,"DELETE FROM `employees` WHERE `em_id`='$em_id'");

     if($user_delete){
          header("location: user_infor.php?user_deleted");
     }
}
/*#### user delete */
/* payment delete */
if(isset($_GET['pay'])){

     $pay=$_GET['pay'];

     $payment=mysqli_query($connect,"DELETE FROM `payment` WHERE `p_id`='$pay'");

     if($payment){
          header("location: st_register.php?pay_deleted");
     }
}
/*#### user delete */

?>