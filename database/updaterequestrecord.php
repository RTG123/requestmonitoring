<?php
        require_once('../connect.php'); // CONNECTION 
        session_start();
        
        $requestnumber     =$_POST['requestnum'];
        $addedby          =$_SESSION['userid'];

        $deptsect         =$_POST['deptsect'];
        $daterequested    =$_POST['daterequested'];
        $datereceived     =$_POST['datereceived'];
        $information      =$_POST['information'];
        $impdate          =$_POST['impdate'];
        $remarks          =$_POST['remarks'];

        $attachment       = $_FILES['attachment']['name'];

        $attachment1      =$_FILES['attachment']['tmp_name'];
        $fileext          = $_FILES["attachment"]["type"];
        $filesize       = $_FILES["attachment"]["size"];
                $target = "../images/".basename($attachment);
                if($fileext=="image/png" || $fileext=="image/jpeg" || $fileext=="image/jpg" || 
                    $fileext=="application/pdf" and $filesize<4000000 ){
                if (move_uploaded_file($attachment1 , $target)) {
                //   $msg = "Image uploaded successfully";
                //   echo $msg;
                  $_SESSION['status'] = 'success()'; 
                // header("Location: ../searchandupdate/MCRequest_Requests.php");
               }else{
                 $msg = "Failed to upload image";
                 echo $msg;
                 $_SESSION['status'] = 'invalid()'; 
                //  header("Location: ../searchandupdate/MCRequest_Requests.php");
               }
              }else{
                $_SESSION['status'] = 'invalid()'; 
                // header("Location: ../searchandupdate/MCRequest_Requests.php");
              }
        // echo "requestnumber :".$requestnum."<br/>";
        // echo $addedby."<br/>";
        // echo $deptsect."<br/>";
        // echo $information."<br/>";
        // echo $impdate."<br/>";
        // // echo $systemusername."<br/>";
        // echo $daterequested."<br/>";
        // echo $datereceived."<br/>";
        // echo $remarks."<br/>";
        // echo "<br/><br/>";
        $sql = "SELECT * FROM [requestmonitoring].[dbo].[mcrequestrecord] WHERE requestnumber = '$requestnumber' "; // sql for server
        $stmt = sqlsrv_query( $conn, $sql ); 
         if($row_count = sqlsrv_has_rows( $stmt )>0){
                 date_default_timezone_set('Singapore');
                     $userid = $_SESSION['userid'];
                     $username = $_SESSION['username']; 
                     $firstname = $_SESSION['firstname'];
                     $lastname = $_SESSION['lastname'];
                     $position = $_SESSION['position'];
                     $activitydate = date("m/d/Y");  
                     $activitytime = date("H:i:s");
                     $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " updated the request with request number $requestnumber. ";
                     $activitystatus = "success";
                     $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                         VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                     $stmt = sqlsrv_query( $conn, $sql);
         }
        $sql = "UPDATE requestmonitoring.dbo.mcrequestrecord
        SET userid = '$addedby' , [department-section] = '$deptsect' , information='$information',implementationdate='$impdate',
        daterequested='$daterequested',datereceived='$datereceived',remarks='$remarks',attachment='$attachment' 
        WHERE requestnumber = '$requestnumber' ";
        $stmt = sqlsrv_query( $conn, $sql);
        if($_SESSION['usertype']=='admin'){
          header("location:../searchandupdate/adminMCRequest_Requests.php");
        }else{
          header("location:../searchandupdate/MCRequest_Requests.php");
        }
        if ( $stmt ){    
        $something = "Submission successful.";

        }else{    
        $something = "Submission unsuccessful.";
        die( print_r( sqlsrv_errors(), true));    
        }//else stmt


        // if of qad   
?>