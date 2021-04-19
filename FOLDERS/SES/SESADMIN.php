<?php
    // Used to redirect data through the user admin
    session_start();
    if(empty($_SESSION['User_type']))
    {
      header("Location:login.php");
    }else if ($_SESSION['User_type']=='user')
    {
      header("Location:index.php");
    }
?>