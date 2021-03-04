<?php
        require_once('../connect.php'); // CONNECTION 
        session_start();
        $requestnumber    =$_POST['requestnumber'];
        $addedby          =$_SESSION['userid'];
        $requestor        =$_POST['requestor'];
        $deptsect         =$_POST['deptsect'];
        $systemusername   =$_POST['systemusername'];
        $systemuser       =$_POST['systemuser'];
        $daterequested    =$_POST['daterequested'];
        $datereceived     =$_POST['datereceived'];
        $reasonforapp     =$_POST['reasonforapp'];
        $datechange       =$_POST['datechange'];
        $remarks          =$_POST['remarks'];
        //attachments
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
                // header("Location: http://localhost/FORMS/addform.php");
               }else{
                 $msg = "Failed to upload image";
                 echo $msg;
                 $_SESSION['status'] = 'invalid()'; 
                 header("Location: ../searchandupdate/MCChange_Requests.php");
               }
              }else{
                $_SESSION['status'] = 'invalid()'; 
                header("Location: ../searchandupdate/MCChange_Requests.php");
              }
        // echo $requestnumber."<br/>";            
        // echo $addedby."<br/>";
        // echo $requestor."sd <br/>";
        // echo $deptsect." sdf <br/>";
        // echo $systemusername."<br/>";
        // echo $systemuser."<br/>";
        // echo $datechange."<br/>";
        // echo $daterequested."<br/>";
        // echo $datereceived."<br/>";
        // echo $reasonforapp."<br/>";
        // echo $remarks."<br/>";
        // echo $attachment."<br/>";
        // echo "<br/><br/>";
        $sql = "SELECT * FROM [requestmonitoring].[dbo].[mcregistrationchange] WHERE requestnumber = '$requestnumber' "; // sql for server
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
        $sql = "UPDATE requestmonitoring.dbo.mcregistrationchange
        SET userid = '$addedby' ,requestor='$requestor' ,[department-section] = '$deptsect' , systemusername='$systemusername',
        systemuser='$systemuser',datechangecancelled='$datechange',daterequested='$daterequested',datereceived='$datereceived',
        reasonforapplication='$reasonforapp',remarks='$remarks',attachment='$attachment' 
        WHERE requestnumber = '$requestnumber' ";
        $stmt = sqlsrv_query( $conn, $sql);
        if($_SESSION['usertype']=='admin'){
          $_SESSION['confirmation'] = 'success()';
          header("location:../searchandupdate/adminMCChange_Requests.php");
        }else{
          $_SESSION['confirmation'] = 'success()';
          header("location:../searchandupdate/MCChange_Requests.php");
        }
        
        if ( $stmt ){    
        $something = "Submission successful.";

        }else{    
        $something = "Submission unsuccessful.";
        die( print_r( sqlsrv_errors(), true));    
        }//else stmt

?>