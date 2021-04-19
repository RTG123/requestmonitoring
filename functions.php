<?php
    function qad_notification()
    {   
        // require_once('connect.php'); // CONNECTION 
        $serverName = "TPC-ICT21\MSSQLSERVER01";//servername 
        $connectionInfo = array("Database"=>"requestmonitoring"); // TABLE NAME 
        $conn = sqlsrv_connect($serverName,$connectionInfo); // CONNECTION DETAILS 
        date_default_timezone_set('Singapore');
        $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an QAD Request. ";
        $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
            VALUES (".$_SESSION['User_id'].",'".$_SESSION['First_name']."','".$_SESSION['Last_name']."','".$_SESSION['Position']."',
            '".date("m/d/Y")."','".date("H:i:s")."','$activity_details','failed');";
        $stmt = sqlsrv_query( $conn, $sql); 
        // if($_SESSION['User_type']=='admin')
        //   {
        //     $_SESSION['New_status'] = 'lack()'; 
        //     header("Location: ../admin1.php");
        //   }else
        //   {
        //     $_SESSION['Status'] = 'lack()'; 
        //     header("Location: ../index1.php");
        //   } 
    }
    // function qad_notification()
    // {   
    //     $serverName = "TPC-ICT21\MSSQLSERVER01";//servername 
    //     $connectionInfo = array("Database"=>"requestmonitoring"); // TABLE NAME 
    //     $conn = sqlsrv_connect($serverName,$connectionInfo); // CONNECTION DETAILS 
    //     $additional = "p@55w0rd";
    //     date_default_timezone_set('Singapore');
    //     $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an QAD Request. ";
    //     $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
    //         VALUES (".$_SESSION['User_id'].",'".$_SESSION['First_name']."','".$_SESSION['Last_name']."','".$_SESSION['Position']."',
    //         '".date("m/d/Y")."','".date("H:i:s")."','$activity_details','failed');";
    //     $stmt = sqlsrv_query( $conn, $sql); 
    //     if($_SESSION['User_type']=='admin')
    //       {
    //         $_SESSION['New_status'] = 'lack()'; 
    //         header("Location: ../admin1.php");
    //       }else
    //       {
    //         $_SESSION['Status'] = 'lack()'; 
    //         header("Location: ../index1.php");
    //       } 
    // }


?>
