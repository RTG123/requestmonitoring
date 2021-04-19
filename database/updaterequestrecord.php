<?php
    // Name of the module : updatedata.php
    // Module creation date : 01/20/21
    // Author of the Module : Engr. Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : This module is created to update the current request in Master Control Request Record.
    // Done aligning in module to PHQD020
    require_once('../connect.php'); // CONNECTION 
    session_start();
    $request_number     =$_POST['requestnum'];
    $added_by          =$_SESSION['User_id'];
    $department_section         =$_POST['deptsect'];
    $date_requested    =$_POST['daterequested'];
    $date_received     =$_POST['datereceived'];
    $information      =$_POST['information'];
    $implementation_date          =$_POST['impdate'];
    $remarks          =$_POST['remarks'];
    // attachment checking 
    $attachment       = $_FILES['attachment']['name'];
    $attachment_name      =$_FILES['attachment']['tmp_name'];
    $file_extension          = $_FILES["attachment"]["type"];
    $file_size       = $_FILES["attachment"]["size"];
    $target = "../images/".basename($attachment);
    if($file_extension=="image/png" || $file_extension=="image/jpeg" || $file_extension=="image/jpg" || 
        $file_extension=="application/pdf" and $file_size<4000000 )
    {
      if (move_uploaded_file($attachment_name , $target))
      {
        $_SESSION['Status'] = 'success()';
      }else
      {
        $msg = "Failed to upload image";
        echo $msg;
        $_SESSION['Status'] = 'invalid()'; 
      }
    }else
    {
    $_SESSION['Status'] = 'invalid()'; 
    }
    // update the currennt request with the equivalent request number 
    $sql = "SELECT * FROM [requestmonitoring].[dbo].[mcrequestrecord] WHERE requestnumber = '$request_number' "; // sql for server
    $stmt = sqlsrv_query( $conn, $sql ); 
    if($row_count = sqlsrv_has_rows( $stmt )>0)
    {
      date_default_timezone_set('Singapore');
      $user_id = $_SESSION['User_id'];
      $username = $_SESSION['username']; 
      $first_name = $_SESSION['First_name'];
      $last_name = $_SESSION['Last_name'];
      $position = $_SESSION['Position'];
      $activity_date = date("m/d/Y");  
      $activity_time = date("H:i:s");
      $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " updated the request with request number $request_number. ";
      $activity_status = "success";
      $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
            VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
      $stmt = sqlsrv_query( $conn, $sql);
    }
    $sql = "UPDATE requestmonitoring.dbo.mcrequestrecord
            SET userid = '$added_by' , [department-section] = '$department_section' , information='$information',implementationdate='$implementation_date',
            daterequested='$date_requested',datereceived='$date_received',remarks='$remarks',attachment='$attachment' 
            WHERE requestnumber = '$request_number' ";
    $stmt = sqlsrv_query( $conn, $sql);
    if($_SESSION['User_type']=='admin')
    {
      $_SESSION['Confirmation'] = 'success()';
      header("location:../searchandupdate/adminMCRequest_Requests.php");
    }else
    {
      $_SESSION['Confirmation'] = 'success()';
      header("location:../searchandupdate/MCRequest_Requests.php");
    }
    if ( $stmt )
    {    
    $something = "Submission successful.";
    }else{    
    $something = "Submission unsuccessful.";
    die( print_r( sqlsrv_errors(), true));    
    }
?>