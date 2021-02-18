<?php
    require_once('../connect.php'); // CONNECTION 
    session_start();

        $userid           =$_SESSION['userid'];
        $name           = $_POST['name'];
        $UID            = $_POST['UID'];
        $details        = $_POST['details'];
        echo $name;
        
        $sql = "SELECT * FROM requestmonitoring.dbo.users WHERE accomplishedby='$name'"; 
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
          die( print_r( sqlsrv_errors(), true) );
        }else{ 
          if($row_count = sqlsrv_has_rows( $stmt )>0){
                    date_default_timezone_set('Singapore');
                    $userid = $_SESSION['userid'];
                    $username = $_SESSION['username']; 
                    $firstname = $_SESSION['firstname'];
                    $lastname = $_SESSION['lastname'];
                    $position = $_SESSION['position'];
                    $activitydate = date("m/d/Y");  
                    $activitytime = date("g:i a");
                    $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add a person or the person are already on the list to accomplish the request. ";
                    $activitystatus = "failed";
                    $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                        VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                    $stmt = sqlsrv_query( $conn, $sql);
                    if($_SESSION['usertype']=='admin'){
                      $_SESSION['newstatus'] = 'unsuccess()'; 
                      header("Location: ../admin1.php");
                    }else{
                      $_SESSION['status'] = 'unsuccess()'; 
                      header("Location: ../index1.php");
                    }
           
       
          }
          else{
            $sql = "INSERT INTO [requestmonitoring].[dbo].[users] (accomplishedby, Details, UserID, Addedby) 
                VALUES ('$name','$details','$UID','$userid')";
              $stmt = sqlsrv_query( $conn, $sql);
              if ( $stmt ){   
                date_default_timezone_set('Singapore');
                    $userid = $_SESSION['userid'];
                    $username = $_SESSION['username']; 
                    $firstname = $_SESSION['firstname'];
                    $lastname = $_SESSION['lastname'];
                    $position = $_SESSION['position'];
                    $activitydate = date("m/d/Y");  
                    $activitytime = date("g:i a");
                    $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has add a new person to accomplished a request. ";
                    $activitystatus = "success";
                    $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                        VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                    $stmt = sqlsrv_query( $conn, $sql); 
                    if($_SESSION['usertype']=='admin'){
                      $_SESSION['newstatus'] = 'success()'; 
                      header("Location: ../admin1.php");
                    }else{
                      $_SESSION['status'] = 'success()'; 
                      header("Location: ../index1.php");
                    }
                $extensionnumber=0;
                }else{    
                  $something = "Submission unsuccessful.";
                  die( print_r( sqlsrv_errors(), true));    
            }//else stmt
          }
        }

   
?>