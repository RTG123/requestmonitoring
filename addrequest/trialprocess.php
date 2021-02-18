<?php
  require_once('../connect.php'); // CONNECTION 
  session_start();

  // $selector         = $_POST['selector'];
  // $requestor        =$_POST['requestor'];
  // $section          = $_POST['section'];
  // $department       = $_POST['department'];
  // $natureofrequest  = $_POST['nor'];
  // $daterequested    = $_POST['daterequested'];
  // $datereceived     = $_POST['datereceived'];
  // $details          = $_POST['details'];

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
        
        $requestnumber    ="S-PAD-20-0001";
        $selector         = $_POST['selector'];
        $requestor        =$_POST['requestor'];
        $section          = $_POST['section'];
        $department       = $_POST['department'];
        $natureofrequest  = $_POST['nor'];
        $daterequested    = $_POST['daterequested'];
        $datereceived     = $_POST['datereceived'];
        $details          = $_POST['details'];

        $systemusername   = $_POST['sysusername'];
        $usertype         = $_POST['usertype'];
        $dateregistered   = $_POST['datereg'];
        $infocard         = $_POST['infocard'];
        $reasonforapplication   = $_POST['reasonforapp'];
        $datechange       = $_POST['datecan'];
        $information      = $_POST['information'];
        $implementationdate   = $_POST['impdate'];
        $dateapproved     = $_POST['dateapproved'];
        $datedone         = $_POST['datedone'];
        $accomplished     = $_POST['accb'];
        $remarks          = $_POST['remarks'];
        $candel           = $_POST['canc'];
        $attachment       = $_POST['atta'];
        $refyear = date("y");

  


        if($selector == 'QAD' ){
          
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
                       $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.qadlog "; // sql for server
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
              datereceived, section,department,natureofrequest,details,requestor,dateapproved,accomplishedby,datedone,
                remarks,ifcanceldelay,attachment,refyear) VALUES ('$userid', '$extensionnumber', '$requestnumber',
                '$daterequested ','$datereceived ', '$section','$department','$natureofrequest','$details','$requestor',
                '$dateapproved','$accomplished','$datedone','$remarks','$candel','$attachment','$refyear')";
                $stmt = sqlsrv_query( $conn, $sql);
                if ( $stmt ){    
                  $something = "Submission successful.";
                  }else{    
                    $something = "Submission unsuccessful.";
                    die( print_r( sqlsrv_errors(), true));    
              }//else stmt
           // if of qad   
           $_SESSION['status'] = 'success()'; 
                header("Location: http://localhost/FORMS/addform.php");
                $extensionnumber=0;
        }//*********QAD SELECTOR ********//
    else if ($selector == 'LAS' ){ 
            // for selection
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
                       $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.lasyslog "; // sql for server
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
           datereceived, section,department,natureofrequest,details,requestor,dateapproved,accomplishedby,datedone,
             remarks,ifcanceldelay,attachment,refyear) VALUES ('$userid', '$extensionnumber', '$requestnumber',
             '$daterequested ','$datereceived ', '$section','$department','$natureofrequest','$details','$requestor',
             '$dateapproved','$accomplished','$datedone','$remarks','$candel','$attachment','$refyear')";
                $stmt = sqlsrv_query( $conn, $sql);
                if ( $stmt ){    
                    $something = "Submission successful.";
                }else{    
                   $something = "Submission unsuccessful.";
                  die( print_r( sqlsrv_errors(), true));    
                }//else stmt
            // if of las 
                  $_SESSION['status'] = 'success()'; 
                header("Location: http://localhost/FORMS/addform.php");
          }//*********LAS SELECTOR ********//
   else if ($selector == 'NON' ){
              // auto increment
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
                       $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.nonlasyslog "; // sql for server
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
                  datereceived, section,department,natureofrequest,details,requestor,dateapproved,accomplishedby,datedone,
                    remarks,ifcanceldelay,attachment,refyear) VALUES ('$userid', '$extensionnumber', '$requestnumber',
                    '$daterequested ','$datereceived ', '$section','$department','$natureofrequest','$details','$requestor',
                    '$dateapproved','$accomplished','$datedone','$remarks','$candel','$attachment','$refyear')";
                        $stmt = sqlsrv_query( $conn, $sql);
                       if ( $stmt ){    
                          $something = "Submission successful.";
                        }else{    
                           $something = "Submission unsuccessful.";
                            die( print_r( sqlsrv_errors(), true));    
                           }//else stmt
              // if of non 
                          $_SESSION['status'] = 'success()'; 
                            header("Location: http://localhost/FORMS/addform.php");
          }//*********NON SELECTOR ********//
    else if ($selector == 'PAD' ){

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
                       $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.padlog "; // sql for server
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
                    datereceived, section,department,natureofrequest,details,requestor,dateapproved,accomplishedby,datedone,
                    remarks,ifcanceldelay,attachment,refyear) VALUES ('$userid', '$extensionnumber', '$requestnumber',
                    '$daterequested ','$datereceived ', '$section','$department','$natureofrequest','$details','$requestor',
                    '$dateapproved','$accomplished','$datedone','$remarks','$candel','$attachment','$refyear')";
                    $stmt = sqlsrv_query( $conn, $sql);
                    if ( $stmt ){    
                      $something = "Submission successful.";
                   }else{    
                      $something = "Submission unsuccessful.";
                      die( print_r( sqlsrv_errors(), true));    
                    }//else stmt
                // if of pad 
                $_SESSION['status'] = 'success()'; 
                header("Location: http://localhost/FORMS/addform.php");
            }//*********PAD SELECTOR ********//
       else if ($selector == 'MCUR'){

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
                daterequested, datereceived, section,department,systemusername,usertype,dateregistered,infocard,
                remarks,requestor,attachment,refyear) VALUES ('$userid', '$extensionnumber', '$requestnumber','$daterequested ',
                '$datereceived ', '$section','$department','$systemusername','$usertype','$dateregistered',
                '$infocard','$remarks','$requestor','$attachment','$refyear')";
                $stmt = sqlsrv_query( $conn, $sql);
                
                if ( $stmt ){    
                  $something = "Submission successful.";
               }else{    
                  $something = "Submission unsuccessful.";
                  die( print_r( sqlsrv_errors(), true));    
                }//else stmt
            // if of pad
            $_SESSION['status'] = 'success()'; 
            header("Location: http://localhost/FORMS/addform.php");

      }else if ($selector == 'MCRC' ){//registration change

                  
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
                             $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcregistrationchange  "; // sql for server
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
                  daterequested, datereceived, section,department,systemusername,reasonforapplication,
                  datachangecancelled,requestor,attachment,refyear) VALUES ('$userid', '$extensionnumber', '$requestnumber',
                  '$daterequested ','$datereceived ', '$section','$department','$systemusername','$reasonforapplication',
                  '$datechange','$requestor','$attachment','$refyear')";
                  $stmt = sqlsrv_query( $conn, $sql);
                  
                  if ( $stmt ){    
                    $something = "Submission successful.";
                 }else{    
                    $something = "Submission unsuccessful.";
                    die( print_r( sqlsrv_errors(), true));    
                  }//else stmt
              // if of pad
              $_SESSION['status'] = 'success()'; 
              header("Location: http://localhost/FORMS/addform.php");
   
     }else if ($selector == 'MCRR' ){//request record
                      
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
                             $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcrequestrecord "; // sql for server
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
                  daterequested, datereceived, section,department,information,implementationdate,attachment,refyear)
                   VALUES ('$userid', '$extensionnumber', '$requestnumber',
                  '$daterequested ','$datereceived ', '$section','$department','$information','$implementationdate ',
                  '$attachment',$refyear)";
                  $stmt = sqlsrv_query( $conn, $sql);
                  
                  if ( $stmt ){    
                    $something = "Submission successful.";
                 }else{    
                    $something = "Submission unsuccessful.";
                    die( print_r( sqlsrv_errors(), true));    
                  }//else stmt
              // if of pad
              $_SESSION['status'] = 'success()'; 
              header("Location: http://localhost/FORMS/addform.php");
                 
  }else if ($selector == 'MCPR' ){//password request
                        
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
                             $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcpasswordrequest "; // sql for server
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
                  daterequested, datereceived, section,department,systemusername,reasonforapplication,
                  datereset,requestor,attachment,refyear) VALUES ('$userid', '$extensionnumber', '$requestnumber',
                  '$daterequested ','$datereceived ', '$section','$department','$systemusername','$reasonforapplication',
                  '$datechange','$requestor','$attachment','$refyear')";
                  $stmt = sqlsrv_query( $conn, $sql);
                  
                  if ( $stmt ){    
                    $something = "Submission successful.";
                 }else{    
                    $something = "Submission unsuccessful.";
                    die( print_r( sqlsrv_errors(), true));    
                  }//else stmt
              // if of pad
              $_SESSION['status'] = 'success()'; 
              header("Location: http://localhost/FORMS/addform.php");
                    echo "requestor:".$requestor." :) <br/>";
                    echo "section:".$section." :)<br/>";
                    echo "department:".$department." :)<br/>";
                    echo "System Username:".$systemusername." :)<br/>";
                    echo "Date Requested:".$daterequested." :)<br/>";
                    echo "Date Received:".$datereceived." :)<br/>";
                    echo "Reason for Application:".$reasonforapplication." :)<br/>";
                    echo "Date Change/Cancelled:".$datechange." :)<br/>";
                    echo "Attachment:".$attachment." :)<br/>";
  
                            echo "password request";
                    }else{
                      $_SESSION['status'] = 'unsuccess()'; 
                      header("Location: http://localhost/FORMS/addform.php");
                    }
    
      }else{
        $_SESSION['status'] = 'unsuccess()'; 
          header("Location: http://localhost/FORMS/addform.php");
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
