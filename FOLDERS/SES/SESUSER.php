
<?php
     session_start();
     if ($_SESSION['usertype']=='admin'){
      header("Location:admin.php");
    }else if(empty($_SESSION['usertype'])){
      header("Location:login.php");
    }
  ?>
