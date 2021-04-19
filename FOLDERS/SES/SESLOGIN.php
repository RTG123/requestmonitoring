<?php
    session_start();// This will start the Session for accessing $_SESSION datas
    // $_SESSION CLASSIFICATION
    if(!(empty($_SESSION['User_id']))){
        if($_SESSION['User_type']=='admin'){
            header("Location:admin.php");
        }else{
        header("Location:index1.php");
        }
    }
    //END OF SESSION CLASSSIFICATION
?>