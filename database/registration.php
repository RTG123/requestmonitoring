<?php
    // Name of the module : registration.php
    // Module creation date : 02/10/21
    // Author of the Module : Engr. Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : Deletion of data for admin functions.
    // Done aligning in module to PHQD020
    require_once('../connect.php'); // CONNECTION 
    session_start();
    $user_id             = $_POST['user_id'];
    $user_type           = $_POST['user_type'];
    $first_name          = $_POST['first_name'];
    $middle_name         = $_POST['middle_name'];
    $last_name           = $_POST['last_name'];
    $position           = $_POST['position'];
    $section_department  = $_POST['section_department'];
    $password          = md5($_POST['pass_word']);
    $confirm_password        = md5($_POST['conpass_word']);
    $attachment         = $_FILES['user_image']['name'];
    $attachment_name        = $_FILES['user_image']['tmp_name'];
    $file_extension            = $_FILES["user_image"]["type"];
    $file_size           = $_FILES["user_image"]["size"];
    $target             = "../images/".basename($attachment);
    if($file_extension=="image/png" || $file_extension=="image/jpeg" || $file_extension=="image/jpg" || 
      $file_extension=="application/pdf" and $_FILES['user_image']['size']<400000 )
    {
      if (move_uploaded_file($attachment_name , $target))
      {
        $msg = "Image uploaded successfully";
      }else
      {
        $msg = "Failed to upload image";
      }
    }else
    {
      $msg = "Failed to upload image";
    }
    if(empty($attachment))
    {// for the profile picture this is attachment is the default profiel picture 
     $attachment="test1.png";
    }
    $sql = "SELECT * FROM logindata WHERE userid = '$user_id'"; // sql for server
    $stmt = sqlsrv_query( $conn, $sql );
    if($row_count = sqlsrv_has_rows( $stmt )>0)
    {// to check if theres an existing data in our database
      $_SESSION['Status'] = 'fa123()';
      date_default_timezone_set('Singapore');
      $user_id = $_SESSION['User_id'];
      $username = $_SESSION['username']; 
      $first_name = $_SESSION['First_name'];
      $last_name = $_SESSION['Last_name'];
      $position = $_SESSION['Position'];
      $activity_date = date("m/d/Y");  
      $activity_time = date("H:i:s");
      $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add a new account";
      $activity_status = "failed";
      $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
            VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
      $stmt = sqlsrv_query( $conn, $sql);
      header("Location: ../adminaccountsetting.php");
      // echo "Error";
    }else if($password != $confirm_password)
    { //compare the if the new password field and the confirm password field 
      $_SESSION['Status'] = 'fa456()';
      date_default_timezone_set('Singapore');
      $user_id = $_SESSION['User_id'];
      $username = $_SESSION['username']; 
      $first_name = $_SESSION['First_name'];
      $last_name = $_SESSION['Last_name'];
      $position = $_SESSION['Position'];
      $activity_date = date("m/d/Y");  
      $activity_time = date("H:i:s");
      $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add a new account";
      $activity_status = "failed";
      $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
          VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
      $stmt = sqlsrv_query( $conn, $sql);
      header("Location: ../adminaccountsetting.php");
      echo "Error 2";
    }else
    {// all the data as a new user for the system 
      $sql1 = "INSERT INTO requestmonitoring.dbo.logindata (userid,usertype,firstname,middlename,lastname,position,[section-department],password1,profpic) 
      VALUES ('$user_id','$user_type','$first_name','$middle_name','$last_name','$position','$section_department','$password','$attachment')";
      $stmt = sqlsrv_query( $conn, $sql1);
      date_default_timezone_set('Singapore');
      $user_id = $_SESSION['User_id'];
      $username = $_SESSION['username']; 
      $first_name = $_SESSION['First_name'];
      $last_name = $_SESSION['Last_name'];
      $position = $_SESSION['Position'];
      $activity_date = date("m/d/Y");  
      $activity_time = date("H:i:s");
      $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has added a New Account";
      $activity_status = "success";
      $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
          VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
      $stmt = sqlsrv_query( $conn, $sql);
      $_SESSION['Status'] = 'success123()';
      header("Location: ../adminaccountsetting.php");
    }
?>