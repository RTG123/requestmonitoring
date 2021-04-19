<?php
    // Name of the module : logout.php
    // Module creation date : 11/24/20
    // Author of the Module : Engr. Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : This module clears the session and redirect its page to the login page
    // Done aligning in module to PHQD020
    session_start();
    require_once('connect.php'); // CONNECTION 
            date_default_timezone_set('Singapore');
            //**** */
            $user_id         = $_SESSION['User_id'];
            $first_name      = $_SESSION['First_name'];
            $last_name       = $_SESSION['Last_name'];
            $position        = $_SESSION['Position'];
            //**** */
            $activity_date   = date("m/d/Y");  
            $activity_time   = date("H:i:s");
            $activity_details= $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has logged out. ";
            $activity_status = "success";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, firstname, lastname, position, activitydate, activitytime, activitydetails, activitystatus)
                  VALUES ('$user_id', '$first_name', '$last_name', '$position', '$activity_date', '$activity_time', '$activity_details', '$activity_status');";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['e']="";
            session_destroy();
            header('location:login.php');
?>