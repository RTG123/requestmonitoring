<?php
  require_once('../connect.php'); // CONNECTION 
  session_start();
$userid                 = $_SESSION['userid']; 
$username               = $_POST['user_name'];
$firstname              = $_POST['first_name'];
$middlename             = $_POST['middle_name'];
$lastname               = $_POST['last_name'];
$section_department     = $_POST['user_team'];
$currentpassword        = $_POST['currentpass_word'];
$currentpassword2       = md5($currentpassword);
$newpassword            = $_POST['newpass_word'];
$confirmpassword        = $_POST['confirmpass_word'];
      $attachment       = $_FILES['user_image']['name'];
      $attachment1      = $_FILES['user_image']['tmp_name'];
      $fileext          = $_FILES['user_image']['type'];
      $fileext1         = $_FILES['user_image']['size'];
      $target           = "../images/".basename($attachment);
      if (move_uploaded_file($attachment1 , $target)) {
        $msg = "Image uploaded successfully";
      }else{
      $msg = "Failed to upload image";
      $attachment=$_SESSION['profpic'];
      }
      // echo $currentpassword2."</br>";
     if(empty($currentpassword)){
       if(empty($newpassword)){
        if(empty($confirmpassword)){
            $password1 = $_SESSION['password'];
            $sql = "UPDATE requestmonitoring.dbo.logindata
                    SET userid = '$userid' ,username='$username',firstname='$firstname',
                    middlename='$middlename', lastname='$lastname',[section-department]='$section_department',
                    password1='$password1',profpic='$attachment' WHERE userid='$userid' ";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['password'] = $password1;
            $_SESSION['profpic']  = $attachment;
            $_SESSION['firstname']  = $firstname;
            $_SESSION['middlename']  = $middlename;
            $_SESSION['lastname']  = $lastname;
            $_SESSION['section-department']  = $section_department;
            $_SESSION['username']  = $username;
            date_default_timezone_set('Singapore');
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has updated his profile. ";
            $activitystatus = "success";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql); 
            if($_SESSION['usertype']=='admin'){
              $_SESSION['status'] = 'success()';
            header("Location: ../adminaccountsetting.php");
            }else{
              $_SESSION['status'] = 'success()';
            header("Location: ../accountsetting.php");
            } 
        }else{//invalid because of emptiness
             date_default_timezone_set('Singapore');
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to update his profile. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              if($_SESSION['usertype']=='admin'){
                $_SESSION['status'] = 'invaliddata1()';
              header("Location: ../adminaccountsetting.php");
              }else{
                $_SESSION['status'] = 'invaliddata1()';
              header("Location: ../accountsetting.php");
              } 
        }
       }else{//invalid because of emptiness
              date_default_timezone_set('Singapore');
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to update his profile. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              if($_SESSION['usertype']=='admin'){
                $_SESSION['status'] = 'invaliddata1()';
              header("Location: ../adminaccountsetting.php");
              }else{
                $_SESSION['status'] = 'invaliddata1()';
              header("Location: ../accountsetting.php");
              }
       }
     }else if($currentpassword2==$_SESSION['password']){
          if(empty($newpassword) || $newpassword==" "){
               date_default_timezone_set('Singapore');
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to update his profile. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              if($_SESSION['usertype']=='admin'){
                $_SESSION['status'] = 'invaliddata3()';
              header("Location: ../adminaccountsetting.php");
              }else{
                $_SESSION['status'] = 'invaliddata3()';
              header("Location: ../accountsetting.php");
              } 
          }else{
            if($newpassword==$confirmpassword){
              $password1 = md5($newpassword);
              $sql = "UPDATE requestmonitoring.dbo.logindata
                      SET userid = '$userid' ,username='$username',firstname='$firstname',
                      middlename='$middlename', lastname='$lastname',[section-department]='$section_department',
                      password1='$password1',profpic='$attachment' WHERE userid='$userid' ";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['password'] = $password1;
              $_SESSION['profpic']  = $attachment;
              $_SESSION['firstname']  = $firstname;
              $_SESSION['middlename']  = $middlename;
              $_SESSION['lastname']  = $lastname;
              $_SESSION['section-department']  = $section_department;
              $_SESSION['username']  = $username;
              date_default_timezone_set('Singapore');
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has updated his profile. ";
              $activitystatus = "success";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);  
              if($_SESSION['usertype']=='admin'){
                $_SESSION['status'] = 'success()';
              header("Location: ../adminaccountsetting.php");
              }else{
                $_SESSION['status'] = 'success()';
              header("Location: ../accountsetting.php");
              } 
            }else{
              date_default_timezone_set('Singapore');
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to update his profile. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              if($_SESSION['usertype']=='admin'){
                $_SESSION['status'] = 'invaliddata4()';
              header("Location: ../adminaccountsetting.php");
              }else{
                $_SESSION['status'] = 'invaliddata4()';
              header("Location: ../accountsetting.php");
              } 
            }
          }
     }else{
          date_default_timezone_set('Singapore');
          $position = $_SESSION['position'];
          $activitydate = date("m/d/Y");  
          $activitytime = date("H:i:s");
          $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to update his profile. ";
          $activitystatus = "failed";
          $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
              VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
          $stmt = sqlsrv_query( $conn, $sql);
          if($_SESSION['usertype']=='admin'){
            $_SESSION['status'] = 'invaliddata2()';
          header("Location: ../adminaccountsetting.php");
          }else{
            $_SESSION['status'] = 'invaliddata2()';
          header("Location: ../accountsetting.php");
          } 
     }
      // if(empty($currentpassword)){
      //   if(empty($newpassword)){
      //     $password = $_SESSION['password'];
      //     $_SESSION['password'] = $password;
      //   $sql = "UPDATE requestmonitoring.dbo.logindata
      //           SET userid = '$userid' ,username='$username',firstname='$firstname',
      //           middlename='$middlename', lastname='$lastname',[section-department]='$section_department',
      //           password1='$password1',profpic='$attachment' WHERE userid='$userid' ";
      //   $stmt = sqlsrv_query( $conn, $sql);
      //   // echo "SUCCESSSFUL";
      //   // $_SESSION['password'] = $password;
      //   $_SESSION['profpic']  = $attachment;
      //   $_SESSION['firstname']  = $firstname;
      //   $_SESSION['middlename']  = $middlename;
      //   $_SESSION['lastname']  = $lastname;
      //   $_SESSION['section-department']  = $section_department;
      //   $_SESSION['username']  = $username;
      //   date_default_timezone_set('Singapore');
      //   $position = $_SESSION['position'];
      //   $activitydate = date("m/d/Y");  
      //   $activitytime = date("H:i:s");
      //   $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has updated his profile. ";
      //   $activitystatus = "success";
      //   $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
      //       VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
      //   $stmt = sqlsrv_query( $conn, $sql);  
      //   $_SESSION['status'] = 'success()';
      //   header("Location: ../accountsetting.php");
      //   }
      // }else if($currentpassword2 == $_SESSION['password']){
      //   if(empty($newpassword)){
      //     date_default_timezone_set('Singapore');
      //   $position = $_SESSION['position'];
      //   $activitydate = date("m/d/Y");  
      //   $activitytime = date("H:i:s");
      //   $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to update his profile. ";
      //   $activitystatus = "success";
      //   $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
      //       VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
      //   $stmt = sqlsrv_query( $conn, $sql);
      //     $_SESSION['status'] = 'invalid()';
      //     header("Location: ../accountsetting.php");
      //   }else if($newpassword==$confirmpassword){
      //       $password = md5($newpassword);
      //       $_SESSION['password'] = $password;
      //   $sql = "UPDATE requestmonitoring.dbo.logindata
      //           SET userid = '$userid' ,username='$username',firstname='$firstname',
      //           middlename='$middlename', lastname='$lastname',[section-department]='$section_department',
      //           password1='$password',profpic='$attachment' WHERE userid='$userid' ";
      //   $stmt = sqlsrv_query( $conn, $sql);
      //   // echo "SUCCESSSFUL";
      //   // $_SESSION['password'] = $password;
      //   $_SESSION['profpic']  = $attachment;
      //   $_SESSION['firstname']  = $firstname;
      //   $_SESSION['middlename']  = $middlename;
      //   $_SESSION['lastname']  = $lastname;
      //   $_SESSION['section-department']  = $section_department;
      //   $_SESSION['username']  = $username;
      //   date_default_timezone_set('Singapore');
      //   $position = $_SESSION['position'];
      //   $activitydate = date("m/d/Y");  
      //   $activitytime = date("H:i:s");
      //   $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has updated his profile. ";
      //   $activitystatus = "success";
      //   $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
      //       VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
      //   $stmt = sqlsrv_query( $conn, $sql);  
      //   $_SESSION['status'] = 'success()';
      //   header("Location: ../accountsetting.php");
      //   }else{
      //     date_default_timezone_set('Singapore');
      //   $position = $_SESSION['position'];
      //   $activitydate = date("m/d/Y");  
      //   $activitytime = date("H:i:s");
      //   $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to update his profile. ";
      //   $activitystatus = "success";
      //   $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
      //       VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
      //   $stmt = sqlsrv_query( $conn, $sql);
      //     $_SESSION['status'] = 'invalid2()';
      //   header("Location: ../accountsetting.php");
      //   }
      // }else{
      //   date_default_timezone_set('Singapore');
      //   $position = $_SESSION['position'];
      //   $activitydate = date("m/d/Y");  
      //   $activitytime = date("H:i:s");
      //   $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to update his profile. ";
      //   $activitystatus = "success";
      //   $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
      //       VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
      //   $stmt = sqlsrv_query( $conn, $sql);
      //   $_SESSION['status'] = 'invalid1()';
      //   header("Location: ../accountsetting.php");
      // }
        
    //   if($currentpassword2 != $_SESSION['password']){
    //     if(empty($currentpassword)){
    //       $password = $_SESSION['password'];
    //     }else if(empty($newpassword)){
    //         $password = $_SESSION['password'];
    //       }
    // }else{
    //   echo "correct password";
    // }
      // echo $password;
      //   $_SESSION['status'] = 'invalid1()';
      //    header("Location: ../accountsetting.php");
      // }else if(empty($newpassword)){
      //   $password = $_SESSION['password'];
      // }else if(empty($confirmpassword)){
      //   $password = $_SESSION['password'];
      // }else if($newpassword != $confirmpassword){
      //   $_SESSION['status'] = 'invalid2()';
      //    header("Location: ../accountsetting.php");
      // }else{
      //   $password = md5($newpassword);
      // }
      // echo $password."</br>";
      // echo $currentpassword2;

      // $password1=md5(2009011);
//       echo  $newpassword. "</br>";
//       echo  $confirmpassword. "</br>";
// echo  "Profile Picture : ".$attachment. "</br>";
// echo  "User ID : ".$userid. "</br>";
// echo  "Firstname  : ".$firstname ."</br>";
// echo  "Middle name : ".$middlename ."</br>";
// echo  "Lastname : ".$lastname ."</br>";
// echo  "Section - Department : ".$section_department ."</br>";
// echo  "Username : ".$username ."</br>";
// echo  "Password : ".$password ."</br>";
// $_SESSION['password'] = $password;
// $sql = "UPDATE requestmonitoring.dbo.logindata
//                 SET userid = '$userid' ,username='$username',firstname='$firstname',
//                 middlename='$middlename', lastname='$lastname',[section-department]='$section_department',
//                 password1='$password1',profpic='$attachment' WHERE userid='$userid' ";
//         $stmt = sqlsrv_query( $conn, $sql);
//         // echo "SUCCESSSFUL";
//         // $_SESSION['password'] = $password;
//         $_SESSION['profpic']  = $attachment;
//         $_SESSION['firstname']  = $firstname;
//         $_SESSION['middlename']  = $middlename;
//         $_SESSION['lastname']  = $lastname;
//         $_SESSION['section-department']  = $section_department;
//         $_SESSION['username']  = $username;
//         date_default_timezone_set('Singapore');
//         $position = $_SESSION['position'];
//         $activitydate = date("m/d/Y");  
//         $activitytime = date("H:i:s");
//         $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has updated his profile. ";
//         $activitystatus = "success";
//         $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
//             VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
//         // $stmt = sqlsrv_query( $conn, $sql);  
//         $_SESSION['status'] = 'success()';
//         header("Location: ../accountsetting.php");
// ?>