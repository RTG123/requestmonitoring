<?php
require_once('../connect.php'); // CONNECTION 
session_start();
    $userid           =$_SESSION['userid'];
    $natureofrequest       = $_POST['nature'];
    $date1            = date("m/d/y");
    

    $sql = "SELECT * FROM requestmonitoring.dbo.natureofrequest WHERE Natureofrequest='$natureofrequest'"; 
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
                $activitytime = date("H:i:s");
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add a nature of request or the nature of request was already on the list. ";
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
        $sql = "INSERT INTO [requestmonitoring].[dbo].[natureofrequest] (Natureofrequest, Addedby, Dateaddded) 
        VALUES ('$natureofrequest','$userid','$date1')";
          $stmt = sqlsrv_query( $conn, $sql);
          if ( $stmt ){    
                date_default_timezone_set('Singapore');
                $userid = $_SESSION['userid'];
                $username = $_SESSION['username']; 
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                $position = $_SESSION['position'];
                $activitydate = date("m/d/Y");  
                $activitytime = date("H:i:s");
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has added a new nature of request . ";
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