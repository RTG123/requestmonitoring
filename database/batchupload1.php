
<?php
        require_once('../connect.php'); // CONNECTION 
        session_start();
        $UR = "MC-UR";
        $userid           =$_SESSION['userid'];
        $daterequested    = $_POST['daterequested'];
        $datereceived     = $_POST['datereceived'];
        $usertype         = "View only";
        $dateregistered   = $_POST['datereg'];
        $infocard         = " ";
        $remarks          = $_POST['remarks1'];
        $requestor        =$_POST['requestor1'];
         //file 
         $attachment       = $_FILES['atta']['name'];
         $attachment1      =$_FILES['atta']['tmp_name'];
         $fileext = $_FILES["atta"]["type"];
        $fileext1 = $_FILES["atta"]["size"];
         $target = "../images/".basename($attachment);
         if($fileext=="image/png" || $fileext=="image/jpeg" || $fileext=="image/jpg" || 
       $fileext=="application/pdf" and $_FILES['atta']['size']<400000 ){
         if (move_uploaded_file($attachment1 , $target)) {
           $_SESSION['newstatus'] = 'success()'; 
         // header("Location: http://localhost/FORMS/addform.php");
        }else{
          $msg = "Failed to upload image";
          echo $msg;
          $_SESSION['newstatus'] = 'invalid()'; 
          header("Location: ../admin1.php");
        }
       }else{
         $_SESSION['newstatus'] = 'invalid()'; 
         header("Location: ../admin1.php");
       }
        date_default_timezone_set('Singapore');
        $dateprocessed = date("m/d/Y");
        $refyear = date("y");
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
                             $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcnewuser "; // sql for server
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
                            echo $extensionnumber."<br/>";
                          $requestnumber=$UR."-".$refyear."-".$extensionnumber;
                          echo $requestnumber;
            // EXCEL FILE
            include "../xlsx.php";
            $filedata = $_FILES['batch']['type'];
            // .xls      application/vnd.ms-excel
            // .xlt      application/vnd.ms-excel
            // .xla      application/vnd.ms-excel
            // .xlsx     application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
            // .xltx     application/vnd.openxmlformats-officedocument.spreadsheetml.template
            // .xlsm     application/vnd.ms-excel.sheet.macroEnabled.12
            // .xltm     application/vnd.ms-excel.template.macroEnabled.12
            // .xlam     application/vnd.ms-excel.addin.macroEnabled.12
            // .xlsb     application/vnd.ms-excel.sheet.binary.macroEnabled.12
            if($filedata=="application/vnd.ms-excel" || $filedata=="application/vnd.ms-excel" || 
                $filedata=="application/vnd.ms-excel" 
                || $filedata=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" 
                || $filedata=="application/vnd.openxmlformats-officedocument.spreadsheetml.template" 
                || $filedata=="application/vnd.ms-excel.sheet.macroEnabled.12" 
                || $filedata=="application/vnd.ms-excel.template.macroEnabled.12" 
                || $filedata=="application/vnd.ms-excel.addin.macroEnabled.12" 
                || $filedata=="application/vnd.ms-excel.sheet.binary.macroEnabled.12" 
                and $_FILES['batch']['size']<400000 ){
                echo "data okay";
                        $excel=SimpleXLSX::parse($_FILES['batch']['tmp_name']);
                        for ($sheet=0; $sheet < sizeof($excel->sheetNames()) ; $sheet++) { 
                            $rowcol=$excel->dimension($sheet);
                            $i=0;
                            if($rowcol[0]!=1 &&$rowcol[1]!=1){
                            foreach ($excel->rows($sheet) as $key => $row) {
                                //print_r($row);
                                $q="";$a=array();
                                // array_push($a,"blue","yellow");
                                // print_r($a);
                                foreach ($row as $key => $cell) {
                                    //print_r($cell);echo "<br>";
                                    if($i==0){
                                        // $q.=$cell. " varchar(50),";
                                    }else{
                                        // $q.="'".$cell. "',";
                                        array_push($a,$cell);
                                    }//if else $i==0;
                                    echo "<br>";
                                }// foreach $row 
                                if(!empty($a)) { 
                                    // print_r($a);
                                    $systemuser = $a[3]." ".$a[2];
                                    if($a[1]=="" && $a[2]=="" && $a[3]==""){
                                        $msg = "no data";
                                    }else{
                     $sql = "INSERT INTO requestmonitoring.dbo.mcnewuser (userid, extensionnumber, requestnumber, 
                        daterequested, datereceived, [department-section],systemusername,systemuser,usertype,dateregistered,infocard,
                        remarks,requestor,attachment,refyear,dateprocessed) VALUES ('$userid', '$extensionnumber', '$requestnumber','$daterequested ',
                        '$datereceived ', '$a[8]','$a[1]','$systemuser','$usertype','$dateregistered',
                        '$infocard','$remarks','$requestor','$attachment','$refyear','$dateprocessed')";
                    $stmt = sqlsrv_query( $conn, $sql);
                    if ( $stmt ){    
                    $something = "Submission successful.";
                     }else{    
                    $something = "Submission unsuccessful.";
                    die( print_r( sqlsrv_errors(), true));    
                    }//else stmt
                    // if of pad
                                    }
                                } 
                                
                                echo "<br>";
                                $i++;
                            }// for each excel
                            echo $a[4];
                        }// if row
                    }//for sheet
                    date_default_timezone_set('Singapore');
                    $userid = $_SESSION['userid'];
                    $username = $_SESSION['username']; 
                    $firstname = $_SESSION['firstname'];
                    $lastname = $_SESSION['lastname'];
                    $position = $_SESSION['position'];
                    $activitydate = date("m/d/Y");  
                    $activitytime = date("g:i a");
                    $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has added an MC New User Registration. ";
                    $activitystatus = "success";
                    $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                        VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                    $stmt = sqlsrv_query( $conn, $sql);
                    $_SESSION['newstatus'] = 'success()'; 
                    header("Location: ../admin1.php");
                }//if
                else{
                  $_SESSION['newstatus'] = 'unsuccess()'; 
                    header("Location: ../admin1.php");
                  date_default_timezone_set('Singapore');
                  $userid = $_SESSION['userid'];
                  $username = $_SESSION['username']; 
                  $firstname = $_SESSION['firstname'];
                  $lastname = $_SESSION['lastname'];
                  $position = $_SESSION['position'];
                  $activitydate = date("m/d/Y");  
                  $activitytime = date("g:i a");
                  $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has failed to add an MC New User Registration. ";
                  $activitystatus = "failed";
                  $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                      VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                  $stmt = sqlsrv_query( $conn, $sql);
                  $_SESSION['newstatus'] = 'unsuccess()'; 
                  header("Location: ../admin1.php");
                }
?>