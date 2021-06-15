<?php
session_start();
require 'inclu/header.php';
require 'inclu/config.php';

if(isset($_POST['login'])){
    
     $admin=$_POST['admin'];
     $ad_pass=$_POST['ad_pass'];

     $sql="SELECT * FROM `admin` WHERE `user`='$admin' and `password`='$ad_pass'";
     $result=mysqli_query($connect,$sql);
     if(mysqli_num_rows($result)){

          $_SESSION['username']=$admin;
       
          header("location:dash.php");
     }else{
          echo'<script> alert("Your name or password is incorrect try again!")</script>';
     }
}

?>

        
        <!--------------content-------------------------->
     <div class="container">
     <div class="row justify-content-center">
   
<style>
.login-form{
     width:400px;
     border-radius: 10px;
     box-shadow: 0px 0px 5px 0px rgb(143, 142, 142);
     position: relative;
     height: 350px;
     text-align:center;padding: 30px;
}
input{
     text-align:center;
}
h1{
     text-align:center;
     text-transform: capitalize;
     font-weight: bold;
}
label{
     text-align:center;
}
button{
     margin-left: 250px;
}
</style>
          <form method="post" class="login-form mt-5">
              
                    <div class="mb-3 form-group">
                    <h1 class="mt-2">login</h1>
                         <label>Username:</label>
                         <input type="text" class="form-control" name="admin" placeholder="Admin Username" require>
                    </div>
                    <div class="mb-3 form-group">
                         <label>Password:</label>
                         <input type="password" class="form-control" name="ad_pass"  placeholder="********" require>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Submit</button>
          </form>
     </div>
     </div>
        <!--------------#content-------------------------->
     
    
  <?php
  require 'inclu/footer.php';
  ?>