<?php
  require_once('../connect.php'); // CONNECTION 
  session_start();

      if(isset($_POST['submit'])){
        $UR = "MC-UR";
        $PR = "MC-PR";
        $RR = "MC-RR";
        $RC = "MC-RC";
        $QAD = "S-QAD";
        $LA = "S-LA";
        $NL = "S-NL";
        $PAD = "S-PAD";

        $userid           =$_SESSION['userid'];
        $requestnumber    ="";
        $selector         = $_POST['selector'];
        $requestor        =$_POST['requestor'];
        // $section          = $_POST['section'];
        $department       = $_POST['department'];
        $natureofrequest  = $_POST['nor'];
        $daterequested    = $_POST['daterequested'];
        $datereceived     = $_POST['datereceived'];
        $details          = $_POST['details'];

        $systemusername   = $_POST['sysusername'];
        $systemuser       = $_POST['sysuser'];
        $usertype         = $_POST['usertype'];
        $dateregistered   = $_POST['inputdatereg'];
        $infocard         = $_POST['infocard'];
        $reasonforapplication   = $_POST['reasonforapp'];
        $datechange       = $_POST['datecan'];
        $datereset      = $_POST['datereset'];
        $information      = $_POST['information'];
        $implementationdate   = $_POST['impdate'];
        $dateapproved     = $_POST['dateapproved'];
        $datedone         = $_POST['datedone'];
        $accomplished     = $_POST['accb'];
        $remarks          = $_POST['remarks'];
        $candel           = $_POST['canc'];
        // for attachment handling
        $attachment       = $_FILES['atta']['name'];
        $attachment1      =$_FILES['atta']['tmp_name'];
        $fileext = $_FILES["atta"]["type"];
		    $fileext1 = $_FILES["atta"]["size"];
        $target = "../images/".basename($attachment);
        if($fileext=="image/png" || $fileext=="image/jpeg" || $fileext=="image/jpg" || 
      $fileext=="application/pdf" and $_FILES['atta']['size']<400000 ){
        if (move_uploaded_file($attachment1 , $target)) {
        //   $msg = "Image uploaded successfully";
        //   echo $msg;
          $_SESSION['newstatus'] = 'success()'; 
        // header("Location: http://localhost/FORMS/addform.php");
       }else{
         $msg = "Failed to upload image";
         echo $msg;
        //  $_SESSION['newstatus'] = 'invalid()'; 
        //  header("Location: ../admin1.php");
       }
      }else{
        // $_SESSION['newstatus'] = 'invalid()'; 
        // header("Location: ../admin1.php");
      }
        $refyear = date("y");
        date_default_timezone_set('Singapore');
        $dateprocessed = date("m/d/Y");
    

        if($selector == 'QAD' ){
          if(empty($requestor)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an QAD Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'lack()'; 
            header("Location: ../admin1.php");
        }else if(empty($department)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an QAD Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
        }else if(empty($natureofrequest)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an QAD Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
        }else if(empty($daterequested)){
            date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an QAD Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
        }else if(empty($datereceived)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an QAD Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
        }else{
          $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.qadlog WHERE refyear=$refyear"; // sql for server
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false) {
              die( print_r( sqlsrv_errors(), true) );
            }else{ 
                if($row_count = sqlsrv_has_rows( $stmt )>0){
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                      $count=$row['count'];
                   }// end of while $row
                     if($count>0){
                       $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.qadlog WHERE refyear=$refyear"; // sql for server
                         $stmt = sqlsrv_query( $conn, $sql ); 
                        if( $stmt === false) {
                           die( print_r( sqlsrv_errors(), true) );
                        }else{ 
                        if($row_count = sqlsrv_has_rows( $stmt )>0){
                            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                            $ext=$row['extnum'];
                                }
                             $extensionnumber=$ext+1;
                             
                              }//another row count
                           }
                    
                        } // if $session for numbering
                        else{
                          // the number of extension number should be 0;
                      $extensionnumber=1;
                       }
              //end of if row count
                  }else{//no data available
                }//else of $row count
          }//else of $stmt 
              if($extensionnumber<10){
                  $extensionnumber="000".$extensionnumber;
                }elseif($extensionnumber>9 & $extensionnumber <100){
                  $extensionnumber="00".$extensionnumber;
                  }elseif($extensionnumber>99 & $extensionnumber <1000){
                  $extensionnumber="0".$extensionnumber;
                        }
                    $requestnumber=$QAD."-".$refyear."-".$extensionnumber;

          //** INSERTION **
            $sql = "INSERT INTO requestmonitoring.dbo.qadlog (userid, extensionnumber, requestnumber, daterequested,
              datereceived, [department-section],natureofrequest,details,requestor,dateapproved,accomplishedby,datedone,
                remarks,ifcanceldelay,attachment,refyear,dateprocessed) VALUES ('$userid', '$extensionnumber', '$requestnumber',
                '$daterequested ','$datereceived ', '$department','$natureofrequest','$details','$requestor',
                '$dateapproved','$accomplished','$datedone','$remarks','$candel','$attachment','$refyear','$dateprocessed')";
                $stmt = sqlsrv_query( $conn, $sql);
                if ( $stmt ){    
                  $something = "Submission successful.";
                  }else{    
                    $something = "Submission unsuccessful.";
                    die( print_r( sqlsrv_errors(), true));    
              }//else stmt
           // if of qad 
           date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has added an QAD Request. ";
              $activitystatus = "success";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);  
           $_SESSION['newstatus'] = 'success()'; 
                header("Location: ../admin1.php");
                $extensionnumber=0;
            } // else for error checking
        }//*********QAD SELECTOR ********//
    else if ($selector == 'LAS' ){ 
            // for selection
            if(empty($requestor)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an LASYS Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'invalid()'; 
              header("Location: ../admin1.php");
          }else if(empty($department)){
            date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an LASYS Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else if(empty($natureofrequest)){
            date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an LASYS Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else if(empty($daterequested)){
            date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an LASYS Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else if(empty($datereceived)){
            date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an LASYS Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else{
          $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.lasyslog WHERE refyear=$refyear"; // sql for server
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false) {
              die( print_r( sqlsrv_errors(), true) );
            }else{ 
                if($row_count = sqlsrv_has_rows( $stmt )>0){
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                      $count=$row['count'];
                   }// end of while $row
                     if($count>0){
                       $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.lasyslog WHERE refyear=$refyear "; // sql for server
                         $stmt = sqlsrv_query( $conn, $sql ); 
                        if( $stmt === false) {
                           die( print_r( sqlsrv_errors(), true) );
                        }else{ 
                        if($row_count = sqlsrv_has_rows( $stmt )>0){
                            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                            $ext=$row['extnum'];
                                }
                             $extensionnumber=$ext+1;
                              echo $extensionnumber;
                              }//another row count
                           }
                        } // if $session for numbering
                        else{
                          // the number of extension number should be 0;
                      $extensionnumber=1;
                 }
              //end of if row count
                    }else{//no data available
                   $extensionnumber=1;
                }//else of $row count
            }     //else of $stmt 
                  if($extensionnumber<10){
                    $extensionnumber="000".$extensionnumber;
                    }elseif($extensionnumber>9 & $extensionnumber <100){
                    $extensionnumber="00".$extensionnumber;
                    }elseif($extensionnumber>99 & $extensionnumber <1000){
                    $extensionnumber="0".$extensionnumber;
                      }
                    $requestnumber=$LA."-".$refyear."-".$extensionnumber;

           $sql = "INSERT INTO requestmonitoring.dbo.lasyslog (userid, extensionnumber, requestnumber, daterequested,
           datereceived, [department-section],natureofrequest,details,requestor,dateapproved,accomplishedby,datedone,
           remarks,ifcanceldelay,attachment,refyear,dateprocessed) VALUES ('$userid', '$extensionnumber', '$requestnumber',
           '$daterequested ','$datereceived ', '$department','$natureofrequest','$details','$requestor',
           '$dateapproved','$accomplished','$datedone','$remarks','$candel','$attachment','$refyear','$dateprocessed')";
            $stmt = sqlsrv_query( $conn, $sql);
                if ( $stmt ){    
                    $something = "Submission successful.";
                }else{    
                   $something = "Submission unsuccessful.";
                  die( print_r( sqlsrv_errors(), true));    
                }//else stmt
            // if of las 
            date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has added an LASYS Request. ";
              $activitystatus = "success";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
                  $_SESSION['newstatus'] = 'success()'; 
                header("Location: ../admin1.php");
              }
          }//*********LAS SELECTOR ********//
   else if ($selector == 'NON' ){
              // auto increment
              if(empty($requestor)){
                date_default_timezone_set('Singapore');
                $userid = $_SESSION['userid'];
                $username = $_SESSION['username']; 
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                $position = $_SESSION['position'];
                $activitydate = date("m/d/Y");  
                $activitytime = date("H:i:s");
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an NON-LASYS Request. ";
                $activitystatus = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['newstatus'] = 'invalid()'; 
                header("Location: ../admin1.php");
            }else if(empty($department)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an NON-LASYS Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'invalid()'; 
              header("Location: ../admin1.php");
            }else if(empty($natureofrequest)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an NON-LASYS Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'invalid()'; 
              header("Location: ../admin1.php");
            }else if(empty($daterequested)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an NON-LASYS Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'invalid()'; 
              header("Location: ../admin1.php");
            }else if(empty($datereceived)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an NON-LASYS Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'invalid()'; 
              header("Location: ../admin1.php");
            }else{
              $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.nonlasyslog WHERE refyear=$refyear"; // sql for server
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false) {
              die( print_r( sqlsrv_errors(), true) );
            }else{ 
                if($row_count = sqlsrv_has_rows( $stmt )>0){
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                      $count=$row['count'];
                   }// end of while $row
                     if($count>0){
                       $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.nonlasyslog WHERE refyear=$refyear "; // sql for server
                         $stmt = sqlsrv_query( $conn, $sql ); 
                        if( $stmt === false) {
                           die( print_r( sqlsrv_errors(), true) );
                        }else{ 
                        if($row_count = sqlsrv_has_rows( $stmt )>0){
                            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                            $ext=$row['extnum'];
                                }
                             $extensionnumber=$ext+1;
                              echo $extensionnumber;
                              }//another row count
                           }
                        } // if $session for numbering
                        else{
                          // the number of extension number should be 0;
                      $extensionnumber=1;
                 }
              //end of if row count
                    }else{//no data available
                   $extensionnumber=1;
                }//else of $row count
            }     //else of $stmt 
                  if($extensionnumber<10){
                    $extensionnumber="000".$extensionnumber;
                    }elseif($extensionnumber>9 & $extensionnumber <100){
                    $extensionnumber="00".$extensionnumber;
                    }elseif($extensionnumber>99 & $extensionnumber <1000){
                    $extensionnumber="0".$extensionnumber;
                      }
                    $requestnumber=$NL."-".$refyear."-".$extensionnumber;
                      // INSERT INTO
                $sql = "INSERT INTO requestmonitoring.dbo.nonlasyslog (userid, extensionnumber, requestnumber, daterequested,
                  datereceived, [department-section],natureofrequest,details,requestor,dateapproved,accomplishedby,datedone,
                    remarks,ifcanceldelay,attachment,refyear,dateprocessed) VALUES ('$userid', '$extensionnumber', '$requestnumber',
                    '$daterequested ','$datereceived ', '$department','$natureofrequest','$details','$requestor',
                    '$dateapproved','$accomplished','$datedone','$remarks','$candel','$attachment','$refyear','$dateprocessed')";
                        $stmt = sqlsrv_query( $conn, $sql);
                       if ( $stmt ){    
                          $something = "Submission successful.";
                        }else{    
                           $something = "Submission unsuccessful.";
                            die( print_r( sqlsrv_errors(), true));    
                           }//else stmt
              // if of non 
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has added an NON-LASYS Request. ";
              $activitystatus = "success";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
                          $_SESSION['newstatus'] = 'success()'; 
                            header("Location: ../admin1.php");
            }
          }//*********NON SELECTOR ********//
    else if ($selector == 'PAD' ){
          if(empty($requestor)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an PAD Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
        }else if(empty($department)){
          date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an PAD Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
        }else if(empty($natureofrequest)){
          date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an PAD Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
        }else if(empty($daterequested)){
          date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an PAD Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
        }else if(empty($datereceived)){
          date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an PAD Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
        }else{
              // auto increment
              $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.padlog WHERE refyear=$refyear"; // sql for server
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false) {
              die( print_r( sqlsrv_errors(), true) );
            }else{ 
                if($row_count = sqlsrv_has_rows( $stmt )>0){
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                      $count=$row['count'];
                   }// end of while $row
                     if($count>0){
                       $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.padlog WHERE refyear=$refyear "; // sql for server
                         $stmt = sqlsrv_query( $conn, $sql );  
                        if( $stmt === false) {
                           die( print_r( sqlsrv_errors(), true) );
                        }else{ 
                        if($row_count = sqlsrv_has_rows( $stmt )>0){
                            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                            $ext=$row['extnum'];
                                }
                             $extensionnumber=$ext+1;
                              echo $extensionnumber;
                              }//another row count
                           }
                        } // if $session for numbering
                        else{
                          // the number of extension number should be 0;
                      $extensionnumber=1;
                 }
              //end of if row count
                    }else{//no data available
                   $extensionnumber=1;
                }//else of $row count
            }     //else of $stmt 
                  if($extensionnumber<10){
                    $extensionnumber="000".$extensionnumber;
                    }elseif($extensionnumber>9 & $extensionnumber <100){
                    $extensionnumber="00".$extensionnumber;
                    }elseif($extensionnumber>99 & $extensionnumber <1000){
                    $extensionnumber="0".$extensionnumber;
                      }
                    $requestnumber=$PAD."-".$refyear."-".$extensionnumber;
                      // INSERT INTO
                  $sql = "INSERT INTO requestmonitoring.dbo.padlog (userid, extensionnumber, requestnumber, daterequested,
                    datereceived, [department-section],natureofrequest,details,requestor,dateapproved,accomplishedby,datedone,
                    remarks,ifcanceldelay,attachment,refyear,dateprocessed) VALUES ('$userid', '$extensionnumber', '$requestnumber',
                    '$daterequested ','$datereceived ', '$department','$natureofrequest','$details','$requestor',
                    '$dateapproved','$accomplished','$datedone','$remarks','$candel','$attachment','$refyear','$dateprocessed')";
                    $stmt = sqlsrv_query( $conn, $sql);
                    if ( $stmt ){    
                      $something = "Submission successful.";
                   }else{    
                      $something = "Submission unsuccessful.";
                      die( print_r( sqlsrv_errors(), true));    
                    }//else stmt
                // if of pad 
                date_default_timezone_set('Singapore');
                $userid = $_SESSION['userid'];
                $username = $_SESSION['username']; 
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                $position = $_SESSION['position'];
                $activitydate = date("m/d/Y");  
                $activitytime = date("H:i:s");
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has added an PAD Request. ";
                $activitystatus = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                    $_SESSION['newstatus'] = 'success()'; 
                    header("Location: ../admin1.php");
                  }//else
            }//*********PAD SELECTOR ********//
       else if ($selector == 'MCUR'){
          if(empty($requestor)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC New User Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
          }else if(empty($department)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC New User Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
          }else if(empty($systemusername)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC New User Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
          } else if(empty($systemuser)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC New User Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else if(empty($daterequested)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC New User Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else if(empty($datereceived)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC New User Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else if(empty($usertype)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC New User Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else if(empty($dateregistered)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC New User Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else{
                $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.mcnewuser WHERE refyear=$refyear"; // sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                if( $stmt === false) {
                    die( print_r( sqlsrv_errors(), true) );
                  }else{ 
                      if($row_count = sqlsrv_has_rows( $stmt )>0){
                        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                            $count=$row['count'];
                         }// end of while $row
                           if($count>0){
                             $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcnewuser WHERE refyear=$refyear"; // sql for server
                               $stmt = sqlsrv_query( $conn, $sql ); 
                              if( $stmt === false) {
                                 die( print_r( sqlsrv_errors(), true) );
                              }else{ 
                              if($row_count = sqlsrv_has_rows( $stmt )>0){
                                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                                  $ext=$row['extnum'];
                                      }
                                   $extensionnumber=$ext+1;
                                    echo $extensionnumber;
                                    }//another row count
                                 }
                              } // if $session for numbering
                              else{
                                // the number of extension number should be 0;
                            $extensionnumber=1;
                       }
                    //end of if row count
                          }else{//no data available
                         $extensionnumber=1;
                      }//else of $row count
                  }     //else of $stmt 
                        if($extensionnumber<10){
                          $extensionnumber="000".$extensionnumber;
                          }elseif($extensionnumber>9 & $extensionnumber <100){
                          $extensionnumber="00".$extensionnumber;
                          }elseif($extensionnumber>99 & $extensionnumber <1000){
                          $extensionnumber="0".$extensionnumber;
                            }
                          $requestnumber=$UR."-".$refyear."-".$extensionnumber;
                            // INSERT INTO
                $sql = "INSERT INTO requestmonitoring.dbo.mcnewuser (userid, extensionnumber, requestnumber, 
                daterequested, datereceived, [department-section],systemusername,systemuser,usertype,dateregistered,infocard,
                remarks,requestor,attachment,refyear,dateprocessed) VALUES ('$userid', '$extensionnumber', '$requestnumber','$daterequested ',
                '$datereceived ', '$department','$systemusername','$systemuser','$usertype','$dateregistered',
                '$infocard','$remarks','$requestor','$attachment','$refyear','$dateprocessed')";
                $stmt = sqlsrv_query( $conn, $sql);
                
                if ( $stmt ){    
                  $something = "Submission successful.";
               }else{    
                  $something = "Submission unsuccessful.";
                  die( print_r( sqlsrv_errors(), true));    
                }//else stmt
            // if of mcur
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has added an MC New User Request. ";
            $activitystatus = "success";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'success()'; 
            header("Location: ../admin1.php");
              }
      }else if ($selector == 'MCRC' ){//registration change
        if(empty($requestor)){
          date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Registration Change Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
          }else if(empty($department)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Registration Change Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
          }else if(empty($systemusername)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Registration Change Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
          } else if(empty($systemuser)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Registration Change Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else if(empty($daterequested)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Registration Change Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else if(empty($datereceived)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Registration Change Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else if(empty($reasonforapplication)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Registration Change Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else if(empty($datechange)){
            date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Registration Change Request. ";
            $activitystatus = "failed";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
          }else{
                $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.mcregistrationchange  WHERE refyear=$refyear"; // sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                if( $stmt === false) {
                    die( print_r( sqlsrv_errors(), true) );
                  }else{ 
                      if($row_count = sqlsrv_has_rows( $stmt )>0){
                        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                            $count=$row['count'];
                         }// end of while $row
                           if($count>0){
                             $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcregistrationchange WHERE refyear=$refyear "; // sql for server
                               $stmt = sqlsrv_query( $conn, $sql ); 
                              if( $stmt === false) {
                                 die( print_r( sqlsrv_errors(), true) );
                              }else{ 
                              if($row_count = sqlsrv_has_rows( $stmt )>0){
                                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                                  $ext=$row['extnum'];
                                      }
                                   $extensionnumber=$ext+1;
                                    echo $extensionnumber;
                                    }//another row count
                                 }
                              } // if $session for numbering
                              else{
                                // the number of extension number should be 0;
                            $extensionnumber=1;
                       }
                    //end of if row count
                          }else{//no data available
                         $extensionnumber=1;
                      }//else of $row count
                  }     //else of $stmt 
                        if($extensionnumber<10){
                          $extensionnumber="000".$extensionnumber;
                          }elseif($extensionnumber>9 & $extensionnumber <100){
                          $extensionnumber="00".$extensionnumber;
                          }elseif($extensionnumber>99 & $extensionnumber <1000){
                          $extensionnumber="0".$extensionnumber;
                            }
                          $requestnumber=$RC."-".$refyear."-".$extensionnumber;
                            // INSERT INTO
                  $sql = "INSERT INTO requestmonitoring.dbo.mcregistrationchange (userid, extensionnumber, requestnumber, 
                  daterequested, datereceived, [department-section],systemusername,systemuser,reasonforapplication,
                  datechangecancelled,requestor,attachment,refyear,remarks,dateprocessed) VALUES ('$userid', '$extensionnumber', '$requestnumber',
                  '$daterequested ','$datereceived ','$department','$systemusername','$systemuser','$reasonforapplication',
                  '$datechange','$requestor','$attachment','$refyear','$remarks','$dateprocessed')";
                  $stmt = sqlsrv_query( $conn, $sql);
                  
                  if ( $stmt ){    
                    $something = "Submission successful.";
                 }else{    
                    $something = "Submission unsuccessful.";
                    die( print_r( sqlsrv_errors(), true));    
                  }//else stmt
              // if of mcrc
              date_default_timezone_set('Singapore');
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username']; 
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $position = $_SESSION['position'];
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
            $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has added an MC Registration Change Request. ";
            $activitystatus = "success";
            $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
            $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'success()'; 
              header("Location: ../admin1.php");
                }
     }else if ($selector == 'MCRR' ){//request record
             if(empty($department)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Request Record Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'invalid()'; 
              header("Location: ../admin1.php");
              }else if(empty($daterequested)){
                date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Request Record Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['newstatus'] = 'invalid()'; 
                header("Location: ../admin1.php");
              }else if(empty($datereceived)){
                date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Request Record Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['newstatus'] = 'invalid()'; 
                header("Location: ../admin1.php");
              }else if(empty($information)){
                date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Request Record Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['newstatus'] = 'invalid()'; 
                header("Location: ../admin1.php");
              }else{          
                $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.mcrequestrecord WHERE refyear=$refyear"; // sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                if( $stmt === false) {
                    die( print_r( sqlsrv_errors(), true) );
                  }else{ 
                      if($row_count = sqlsrv_has_rows( $stmt )>0){
                        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                            $count=$row['count'];
                         }// end of while $row
                           if($count>0){
                             $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcrequestrecord WHERE refyear=$refyear "; // sql for server
                               $stmt = sqlsrv_query( $conn, $sql ); 
                              if( $stmt === false) {
                                 die( print_r( sqlsrv_errors(), true) );
                              }else{ 
                              if($row_count = sqlsrv_has_rows( $stmt )>0){
                                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                                  $ext=$row['extnum'];
                                      }
                                   $extensionnumber=$ext+1;
                                    echo $extensionnumber;
                                    }//another row count
                                 }
                              } // if $session for numbering
                              else{
                                // the number of extension number should be 0;
                            $extensionnumber=1;
                       }
                    //end of if row count
                          }else{//no data available
                         $extensionnumber=1;
                      }//else of $row count
                  }     //else of $stmt 
                        if($extensionnumber<10){
                          $extensionnumber="000".$extensionnumber;
                          }elseif($extensionnumber>9 & $extensionnumber <100){
                          $extensionnumber="00".$extensionnumber;
                          }elseif($extensionnumber>99 & $extensionnumber <1000){
                          $extensionnumber="0".$extensionnumber;
                            }
                          $requestnumber=$RR."-".$refyear."-".$extensionnumber;
                            // INSERT INTO
                  $sql = "INSERT INTO requestmonitoring.dbo.mcrequestrecord (userid, extensionnumber, requestnumber, 
                  daterequested, datereceived, [department-section],information,implementationdate,attachment,refyear,dateprocessed)
                   VALUES ('$userid', '$extensionnumber', '$requestnumber',
                  '$daterequested ','$datereceived ', '$department','$information','$implementationdate ',
                  '$attachment','$refyear','$dateprocessed')";
                  $stmt = sqlsrv_query( $conn, $sql);
                  if ( $stmt ){    
                    $something = "Submission successful.";
                 }else{    
                    $something = "Submission unsuccessful.";
                    die( print_r( sqlsrv_errors(), true));    
                  }//else stmt
              // if of mcrr
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has added an MC Request Record Request. ";
              $activitystatus = "success";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'success()'; 
              header("Location: ../admin1.php");
              } 
  }else if ($selector == 'MCPR' ){//password request
          if(empty($requestor)){
            date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Reset Password Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
            }else if(empty($department)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Reset Password Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
            }else if(empty($systemusername)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Reset Password Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
            $_SESSION['newstatus'] = 'invalid()'; 
            header("Location: ../admin1.php");
            } else if(empty($systemuser)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Reset Password Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'invalid()'; 
              header("Location: ../admin1.php");
            }else if(empty($daterequested)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Reset Password Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'invalid()'; 
              header("Location: ../admin1.php");
            }else if(empty($datereceived)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Reset Password Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'invalid()'; 
              header("Location: ../admin1.php");
            }else if(empty($reasonforapplication)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Reset Password Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'invalid()'; 
              header("Location: ../admin1.php");
            }else if(empty($datereset)){
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC Reset Password Request. ";
              $activitystatus = "failed";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'invalid()'; 
              header("Location: ../admin1.php");
            }else{        
                $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.mcpasswordrequest WHERE refyear=$refyear"; // sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                if( $stmt === false) {
                    die( print_r( sqlsrv_errors(), true) );
                  }else{ 
                      if($row_count = sqlsrv_has_rows( $stmt )>0){
                        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                            $count=$row['count'];
                         }// end of while $row
                           if($count>0){
                             $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcpasswordrequest WHERE refyear=$refyear "; // sql for server
                               $stmt = sqlsrv_query( $conn, $sql ); 
                              if( $stmt === false) {
                                 die( print_r( sqlsrv_errors(), true) );
                              }else{ 
                              if($row_count = sqlsrv_has_rows( $stmt )>0){
                                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                                  $ext=$row['extnum'];
                                      }
                                   $extensionnumber=$ext+1;
                                    echo $extensionnumber;
                                    }//another row count
                                 }
                              } // if $session for numbering
                              else{
                                // the number of extension number should be 0;
                            $extensionnumber=1;
                       }
                    //end of if row count
                          }else{//no data available
                         $extensionnumber=1;
                      }//else of $row count
                  }     //else of $stmt 
                        if($extensionnumber<10){
                          $extensionnumber="000".$extensionnumber;
                          }elseif($extensionnumber>9 & $extensionnumber <100){
                          $extensionnumber="00".$extensionnumber;
                          }elseif($extensionnumber>99 & $extensionnumber <1000){
                          $extensionnumber="0".$extensionnumber;
                            }
                          $requestnumber=$PR."-".$refyear."-".$extensionnumber;
                            // INSERT INTO
                    $sql = "INSERT INTO requestmonitoring.dbo.mcpasswordrequest (userid, extensionnumber, requestnumber, 
                  daterequested, datereceived, [department-section],systemusername,systemuser,reasonforapplication,
                  datereset,requestor,attachment,refyear,remarks,dateprocessed) VALUES ('$userid', '$extensionnumber', '$requestnumber',
                  '$daterequested ','$datereceived ', '$department','$systemusername','$systemuser','$reasonforapplication',
                  '$datereset','$requestor','$attachment','$refyear','$remarks','$dateprocessed')";
                  $stmt = sqlsrv_query( $conn, $sql);
                  
                  if ( $stmt ){    
                    $something = "Submission successful.";
                 }else{    
                    $something = "Submission unsuccessful.";
                    die( print_r( sqlsrv_errors(), true));    
                  }//else stmt
              // if of mcpr
              date_default_timezone_set('Singapore');
              $userid = $_SESSION['userid'];
              $username = $_SESSION['username']; 
              $firstname = $_SESSION['firstname'];
              $lastname = $_SESSION['lastname'];
              $position = $_SESSION['position'];
              $activitydate = date("m/d/Y");  
              $activitytime = date("H:i:s");
              $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has added an MC Reset Password Request. ";
              $activitystatus = "success";
              $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
              $stmt = sqlsrv_query( $conn, $sql);
              $_SESSION['newstatus'] = 'success()'; 
              header("Location: ../admin1.php");
            }
        }else{
       $_SESSION['newstatus'] = 'unsuccess()'; 
      header("Location: ../admin1.php");
     }
    
      }else{
        $_SESSION['newstatus'] = 'unsuccess()'; 
          header("Location: ../admin1.php");
        // $sql = "SELECT MAX(extensionnumber) as extensionnumber FROM requestmonitoring.dbo.padlog"; // sql for server
        // $stmt = sqlsrv_query( $conn, $sql );
        // if( $stmt === false) {
        //   die( print_r( sqlsrv_errors(), true) );
        //   }else{ 
        //   if($row_count = sqlsrv_has_rows( $stmt )>0){
        //       while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        //       $_SESSION['extnum']=$row['extensionnumber'];
        //       $_SESSION['extnum']+=1;
        //       echo $_SESSION['extnum'];
        //     }// end of while $row
        //   }//if row count
        // }//else of $stmt 
      }//else of isset
    
?>