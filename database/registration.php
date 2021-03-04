<?php
 require_once('../connect.php'); // CONNECTION 
 session_start();
 $userid             = $_POST['user_id'];
 $usertype           = $_POST['user_type'];
//  $username           = $_POST['user_name'];
 $firstname          = $_POST['first_name'];
 $middlename         = $_POST['middle_name'];
 $lastname           = $_POST['last_name'];
 $position           = $_POST['position'];
 $sectiondepartment  = $_POST['section_department'];
 $password1           = md5($_POST['pass_word']);
 $compassword        = md5($_POST['conpass_word']);
    $attachment       = $_FILES['user_image']['name'];
    $attachment1      =$_FILES['user_image']['tmp_name'];
    $fileext = $_FILES["user_image"]["type"];
        $fileext1 = $_FILES["user_image"]["size"];
                $target = "../images/".basename($attachment);
                if($fileext=="image/png" || $fileext=="image/jpeg" || $fileext=="image/jpg" || 
                $fileext=="application/pdf" and $_FILES['user_image']['size']<400000 ){
                if (move_uploaded_file($attachment1 , $target)) {
                  $msg = "Image uploaded successfully";
                //   echo $msg;
                // $_SESSION['status'] = 'success()'; 
                // header("Location: http://localhost/FORMS/addform.php");
                }else{
                $msg = "Failed to upload image";
                // echo $msg;
                // $_SESSION['status'] = 'invalid()'; 
                // header("Location: ../adminaccountsetting.php");
                }
                }else{
                  $msg = "Failed to upload image";
                // $_SESSION['status'] = 'invalid()'; 
                // header("Location: ../adminaccountsetting.php");
                }
                if(empty($attachment)){
                  $attachment="test1.png";
                }

            $sql = "SELECT * FROM logindata WHERE userid = '$userid'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0){
              $_SESSION['status'] = 'fa123()';
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add a new account";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              header("Location: ../adminaccountsetting.php");
              // echo "Error";
            }else if($password1 != $compassword){
              $_SESSION['status'] = 'fa456()';
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add a new account";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              header("Location: ../adminaccountsetting.php");
              echo "Error 2";
            }else{
                    $sql1 = "INSERT INTO requestmonitoring.dbo.logindata (userid,usertype,firstname,middlename,lastname,position,[section-department],password1,profpic) 
                    VALUES ('$userid','$usertype','$firstname','$middlename','$lastname','$position','$sectiondepartment','$password1','$attachment')";
                        $stmt = sqlsrv_query( $conn, $sql1);
                           //         // for attachment handling
                    date_default_timezone_set('Singapore');
                    $userid = $_SESSION['userid'];
                    $username = $_SESSION['username']; 
                    $firstname = $_SESSION['firstname'];
                    $lastname = $_SESSION['lastname'];
                    $position = $_SESSION['position'];
                    $activitydate = date("m/d/Y");  
                    $activitytime = date("H:i:s");
                    $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has added a New Account";
                    $activitystatus = "success";
                    $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                        VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                    $stmt = sqlsrv_query( $conn, $sql);
                      $_SESSION['status'] = 'success123()';
                      header("Location: ../adminaccountsetting.php");
                  //   $refyear = date("y");
                  //   date_default_timezone_set('Singapore');
                  //   $dateprocessed = date("m/d/Y");
                  //     echo $userid."</br>";
                  //     echo $username."</br>";
                  //     echo $position."</br>";
                  //     echo $usertype."</br>";
                  //     echo $firstname."</br>";
                  //     echo $middlename."</br>";
                  //     echo $lastname."</br>";
                  //     echo $sectiondepartment."</br>";
                  //     echo $password."</br>";
                  //     echo $compassword."</br>";
                  }

?>