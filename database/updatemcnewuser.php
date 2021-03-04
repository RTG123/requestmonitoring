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
        $usertype         =$_POST['usertype'];
        $dateregistered   =$_POST['dateregistered'];
        $infocard         =$_POST['infocard'];
        $remarks          =$_POST['remarks'];
        //attachments
        $attachment       = $_FILES['attachment']['name'];
        $attachment1      =$_FILES['attachment']['tmp_name'];
        $fileext          = $_FILES["attachment"]["type"];
        $fileext1         = $_FILES["attachment"]["size"];
        $target = "../images/".basename($attachment);
                if($fileext=="image/png" || $fileext=="image/jpeg" || $fileext=="image/jpg" || 
                    $fileext=="application/pdf" and $_FILES['attachment']['size']<4000000 ){
                if (move_uploaded_file($attachment1 , $target)) {
                //   $msg = "Image uploaded successfully";
                //   echo $msg;
                  $_SESSION['status'] = 'success()'; 
                // header("Location: http://localhost/FORMS/addform.php");
               }else{
                 $msg = "Failed to upload image";
                 echo $msg;
                 $_SESSION['status'] = 'invalid()'; 
                 header("Location: http://localhost/FORMS/addform.php");
               }
              }else{
                $_SESSION['status'] = 'invalid()'; 
                header("Location: http://localhost/FORMS/addform.php");
              }
        // echo "request number :" .$requestnumber."<br/>";            
        // echo "addedby :".$addedby."<br/>";
        // echo "requestor :".$requestor."<br/>";
        // echo "department-section :".$deptsect."<br/>";
        // echo "systemusername :".$systemusername."<br/>";
        // echo "systemuser :".$systemuser."<br/>";
        // echo "date requested :".$daterequested."<br/>";
        // echo "date received :".$datereceived."<br/>";
        // echo "usertype :".$usertype."<br/>";
        // echo "date registered :".$dateregistered."<br/>";
        // echo "infocard :".$infocard."<br/>";
        // echo "remarks :".$remarks."<br/>";
        // echo "attachment :".$attachment."<br/>";
        // echo "<br/><br/>";
        $sql = "SELECT * FROM [requestmonitoring].[dbo].[mcnewuser] WHERE requestnumber = '$requestnumber' "; // sql for server
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
        $sql = "UPDATE requestmonitoring.dbo.mcnewuser
        SET userid = '$addedby' ,requestor='$requestor' ,[department-section] = '$deptsect' , systemusername='$systemusername',
        systemuser='$systemuser',usertype='$usertype',daterequested='$daterequested',datereceived='$datereceived',
        dateregistered='$dateregistered',infocard='$infocard',remarks='$remarks',attachment='$attachment' 
        WHERE requestnumber = '$requestnumber' ";
        $stmt = sqlsrv_query( $conn, $sql);
        if($_SESSION['usertype']=='admin'){
          $_SESSION['confirmation'] = 'success()';
          header("location:../searchandupdate/adminMCNewUser_Requests.php");
        }else{
          $_SESSION['confirmation'] = 'success()';
          header("location:../searchandupdate/MCNewUser_Requests.php");
        }
        if ( $stmt ){    
        $something = "Submission successful.";

        }else{    
        $something = "Submission unsuccessful.";
        die( print_r( sqlsrv_errors(), true));    
        }//else stmt

?>
