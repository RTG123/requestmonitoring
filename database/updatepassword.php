<?php
    // Name of the module : updatedata.php
    // Module creation date : 01/21/21
    // Author of the Module : Engr. Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : This module is created to update the current request in Master Control Paassword request .
    // Done aligning in module to PHQD020
    require_once('../connect.php'); // CONNECTION 
    session_start();
    $request_number    =$_POST['requestnum'];
    $added_by          =$_SESSION['User_id'];
    $requestor        =$_POST['requestor'];
    $department_section         =$_POST['deptsect'];
    $system_username   =$_POST['systemusername'];
    $system_user       =$_POST['systemuser'];
    $date_requested    =$_POST['daterequested'];
    $date_received     =$_POST['datereceived'];
    $reason_for_application     =$_POST['reasonforapp'];
    $date_reset        =$_POST['datereset'];
    $remarks          =$_POST['remarks'];
    //attachments
    $attachment       = $_FILES['attachment']['name'];
    $attachment_name      =$_FILES['attachment']['tmp_name'];
    $file_extension          = $_FILES["attachment"]["type"];
    $file_size         = $_FILES["attachment"]["size"];
    $target = "../images/".basename($attachment); // the if statements will filter the image file extension
    if($file_extension=="image/png" || $file_extension=="image/jpeg" || $file_extension=="image/jpg" || 
        $file_extension=="application/pdf" and $file_size<400000 )
    {
      if (move_uploaded_file($attachment_name , $target)) 
      {
        $_SESSION['Status'] = 'success()'; 
      }else
      {
        $msg = "Failed to upload image";
        echo $msg;
        $_SESSION['Status'] = 'invalid()'; 
        header("Location: ../searchandupdate/MCPassword_Requests.php");
      }
    }else
    {
    $_SESSION['Status'] = 'invalid()'; 
    header("Location: ../searchandupdate/MCPassword_Requests.php");
    }
    //select the data need to be updated
    $sql = "SELECT * FROM [requestmonitoring].[dbo].[mcpasswordrequest] WHERE requestnumber = '$request_number' "; // sql for server
    $stmt = sqlsrv_query( $conn, $sql ); 
    if($row_count = sqlsrv_has_rows( $stmt )>0)
    {// if the request number matches, the data will be updated
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
    $sql = "UPDATE requestmonitoring.dbo.mcpasswordrequest
            SET userid = '$added_by' ,requestor='$requestor' ,[department-section] = '$department_section' , systemusername='$system_username',
            systemuser='$system_user',datereset='$date_reset',daterequested='$date_requested',datereceived='$date_received',
            reasonforapplication='$reason_for_application',remarks='$remarks',attachment='$attachment' 
            WHERE requestnumber = '$request_number' ";
    $stmt = sqlsrv_query( $conn, $sql);
    if($_SESSION['User_type']=='admin')
    {
      $_SESSION['Confirmation'] = 'success()';
      header("location:../searchandupdate/adminMCPassword_Requests.php");
    }else
    {
      $_SESSION['Confirmation'] = 'success()';
      header("location:../searchandupdate/MCPassword_Requests.php");
    }
    if ( $stmt )
    {    
    $something = "Submission successful."; 

    }else{    
    $something = "Submission unsuccessful.";
    die( print_r( sqlsrv_errors(), true));    
    }//else stmt

?>