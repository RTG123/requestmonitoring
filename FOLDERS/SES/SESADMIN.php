<?php
    session_start();
    if(empty($_SESSION['usertype'])){
      header("Location:login.php");
    }else if ($_SESSION['usertype']=='user'){
      header("Location:index.php");
    }
  ?>