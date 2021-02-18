<?php
    session_start();
    require_once('connect.php'); // CONNECTION 
            date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has log out. ";
              $activitystatus = "success";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
    $_SESSION['e']="";
    session_destroy();
    header('location:login.php');
?>