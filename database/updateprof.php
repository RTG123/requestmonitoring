<?php
    // Name of the module : updatedata.php
    // Module creation date : 02/10/21
    // Author of the Module : Engr. Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : This module is created to update the current request in Master Control Paassword request .
    // Done aligning in module to PHQD020
  require_once('../connect.php'); // CONNECTION 
  session_start();
  $user_id                 = $_SESSION['User_id']; 
  $first_name              = $_POST['first_name'];
  $middle_name             = $_POST['middle_name'];
  $last_name               = $_POST['last_name'];
  $section_department     = $_POST['user_team'];
  $current_password        = $_POST['currentpass_word'];
  $current_password_hashed       = md5($current_password);
  $new_password            = $_POST['newpass_word'];
  $confirm_password        = $_POST['confirmpass_word'];
  // attachment cheking 
  $attachment       = $_FILES['user_image']['name'];
  $attachment_name      = $_FILES['user_image']['tmp_name'];
  $file_extension          = $_FILES['user_image']['type'];
  $file_size         = $_FILES['user_image']['size'];
  $target           = "../images/".basename($attachment);
  if (move_uploaded_file($attachment_name , $target))
  {
    $msg = "Image uploaded successfully";
  }else
  {
    $msg = "Failed to upload image";
    $attachment=$_SESSION['Profile_pic'];
  } // if all the password data is empty 
     if(empty($current_password))
     {
       if(empty($new_password))
       {
        if(empty($confirm_password))
        {
            $password1 = $_SESSION['Password'];
            $sql = "UPDATE requestmonitoring.dbo.logindata
                    SET userid = '$user_id' , firstname='$first_name',
                    middlename='$middle_name', lastname='$last_name',[section-department]='$section_department',
                    password1='$password1',profpic='$attachment' WHERE userid='$user_id' ";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['Password'] = $password1;
            $_SESSION['Profile_pic']  = $attachment;
            $_SESSION['First_name']  = $first_name;
            $_SESSION['Middle_name']  = $middle_name;
            $_SESSION['Last_name']  = $last_name;
            $_SESSION['Section_department']  = $section_department;
            date_default_timezone_set('Singapore');
            $position = $_SESSION['Position'];
            $activity_date = date("m/d/Y");  
            $activity_time = date("H:i:s");
            $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has updated his profile. ";
            $activity_status = "success";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$user_id', '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
            $stmt = sqlsrv_query( $conn, $sql); 
            if($_SESSION['User_type']=='admin')
            {
              $_SESSION['Status'] = 'success()';
              header("Location: ../adminaccountsetting.php");
            }else
            {
              $_SESSION['Status'] = 'success()';
              header("Location: ../accountsetting.php");
            } 
        }else
        {//invalid because of lack of data needde for password update
          date_default_timezone_set('Singapore');
          $position = $_SESSION['Position'];
          $activity_date = date("m/d/Y");  
          $activity_time = date("H:i:s");
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to update his profile. ";
          $activity_status = "failed";
          $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
              VALUES ('$user_id', '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
          $stmt = sqlsrv_query( $conn, $sql);
          if($_SESSION['User_type']=='admin')
          {
            $_SESSION['Status'] = 'invaliddata1()';
            header("Location: ../adminaccountsetting.php");
          }else
          {
            $_SESSION['Status'] = 'invaliddata1()';
            header("Location: ../accountsetting.php");
          } 
        }
      }else
      {//invalid because of lack of data needde for password update
          date_default_timezone_set('Singapore');
          $position = $_SESSION['Position'];
          $activity_date = date("m/d/Y");  
          $activity_time = date("H:i:s");
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to update his profile. ";
          $activity_status = "failed";
          $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
              VALUES ('$user_id', '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
          $stmt = sqlsrv_query( $conn, $sql);
          if($_SESSION['User_type']=='admin')
          {
            $_SESSION['Status'] = 'invaliddata1()';
            header("Location: ../adminaccountsetting.php");
          }else
          {
            $_SESSION['Status'] = 'invaliddata1()';
          header("Location: ../accountsetting.php");
          }
       }
    }else if($current_password_hashed==$_SESSION['Password'])
    {//check of the password
      if(empty($new_password) || $new_password==" ")
      {
        date_default_timezone_set('Singapore');
        $position = $_SESSION['Position'];
        $activity_date = date("m/d/Y");  
        $activity_time = date("H:i:s");
        $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to update his profile. ";
        $activity_status = "failed";
        $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
            VALUES ('$user_id', '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
        $stmt = sqlsrv_query( $conn, $sql);
        if($_SESSION['User_type']=='admin')
        {
          $_SESSION['Status'] = 'invaliddata3()';
          header("Location: ../adminaccountsetting.php");
        }else
        {
          $_SESSION['Status'] = 'invaliddata3()';
          header("Location: ../accountsetting.php");
        } 
      }else
      {
        if($new_password==$confirm_password)
        {
          $password1 = md5($new_password);
          // echo $password1 ." == ". md5($confirm_password); 
          // $password1 = md5($new_password);
          $sql = "UPDATE requestmonitoring.dbo.logindata
                  SET userid = '$user_id' ,firstname='$first_name',
                  middlename='$middle_name', lastname='$last_name',[section-department]='$section_department',
                  password1='$password1',profpic='$attachment' WHERE userid='$user_id' ";
          $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['Password'] = $password1;
          $_SESSION['Profile_pic']  = $attachment;
          $_SESSION['First_name']  = $first_name;
          $_SESSION['Middle_name']  = $middle_name;
          $_SESSION['Last_name']  = $last_name;
          $_SESSION['Section_department']  = $section_department;
          date_default_timezone_set('Singapore');
          $position = $_SESSION['Position'];
          $activity_date = date("m/d/Y");  
          $activity_time = date("H:i:s");
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has updated his profile. ";
          $activity_status = "success";
          $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
              VALUES ('$user_id' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
          $stmt = sqlsrv_query( $conn, $sql);  
          if($_SESSION['User_type']=='admin')
          {
            $_SESSION['Status'] = 'success()';
          header("Location: ../adminaccountsetting.php");
          }else
          {
            $_SESSION['Status'] = 'success()';
          header("Location: ../accountsetting.php");
          } 
        }else
        {
          date_default_timezone_set('Singapore');
          $position = $_SESSION['Position'];
          $activity_date = date("m/d/Y");  
          $activity_time = date("H:i:s");
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to update his profile. ";
          $activity_status = "failed";
          $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
              VALUES ('$user_id', '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
          $stmt = sqlsrv_query( $conn, $sql);
          if($_SESSION['User_type']=='admin')
          {
            $_SESSION['Status'] = 'invaliddata4()';
            header("Location: ../adminaccountsetting.php");
          }else
          {
            $_SESSION['Status'] = 'invaliddata4()';
            header("Location: ../accountsetting.php");
          } 
        }
      }
     }else{// update data
          date_default_timezone_set('Singapore');
          $position = $_SESSION['Position'];
          $activity_date = date("m/d/Y");  
          $activity_time = date("H:i:s");
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to update his profile. ";
          $activity_status = "failed";
          $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
              VALUES ('$user_id', '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
          $stmt = sqlsrv_query( $conn, $sql);
          if($_SESSION['User_type']=='admin')
          {
            $_SESSION['Status'] = 'invaliddata2()';
            header("Location: ../adminaccountsetting.php");
          }else
          {
            $_SESSION['Status'] = 'invaliddata2()';
            header("Location: ../accountsetting.php");
          } 
     }
?>