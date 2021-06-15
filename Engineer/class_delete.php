<?php
require 'inclu/config.php';
if(isset($_GET['delete_id'])){

     $class=$_GET['delete_id'];

     $remove=mysqli_query($connect,"DELETE FROM `class` WHERE `c_id`='$class'");
     if($remove){
          echo'<script>alert("has remove")</script>';
          header("location:class.php");
          
     }
}

/*==============bed number delete===============*/
if(isset($_GET['bedRemove'])){

     $b_id=$_GET['bedRemove'];
      
     $delete=mysqli_query($connect,"DELETE FROM `bed_number` WHERE `b_id`='$b_id'");

     if($delete){
          header("location:bed.php?remove_ok");
     }
}
/*==============#bed number delete===============*/
/*==============catalog delete===============*/
if(isset($_GET['catalog'])){

     $ta_id=$_GET['catalog'];
      
     $dele=mysqli_query($connect,"DELETE FROM `catalog` WHERE `ta_id`='$ta_id'");

     if($dele){
          header("location:catalog.php?remove_ok");
     }
}
/*==============#catalog delete===============*/
?>
?>
