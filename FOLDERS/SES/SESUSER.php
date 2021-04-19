
<?php
    // Used to redirect data through the user page
     session_start();
    if ($_SESSION['User_type']=='admin')
    {
        header("Location:admin.php");
    }else if(empty($_SESSION['User_type']))
    {
        header("Location:login.php");
    }
  ?>
