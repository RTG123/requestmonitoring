<?PHP
    require_once('connect.php'); // CONNECTION 
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
                 $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcnewuser WHERE refyear=$refyear "; // sql for server
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
              $_SESSION['MCNUR']="MC-UR-".$refyear."-".$extensionnumber;
             
              // FIRST DAtA
   
     $refyear = date("y");
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
                           $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.qadlog WHERE refyear=$refyear "; // sql for server
                           $stmt = sqlsrv_query( $conn, $sql ); 
                        if( $stmt === false) {
                           die( print_r( sqlsrv_errors(), true) );
                        }else{ 
                           if($row_count = sqlsrv_has_rows( $stmt )>0){
                           while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                           $ext=$row['extnum'];
                           }
                           $extensionnumber=$ext+1;
                              //  echo $extensionnumber."<br/>";
                         }//another row count
                        }
                      } // if $session for numbering
                           else{// the number of extension number should be 0;
                         $extensionnumber=1;
                              }//end of if row count
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
               $_SESSION['REFQAD']="S-QAD-".$refyear."-".$extensionnumber;
               $extensionnumber="";
            //    //***************** */
            //    //     LASYS
            //    //***************** */
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
                     //  echo $extensionnumber."<br/>";
                }//another row count
               }
             } // if $session for numbering
                  else{// the number of extension number should be 0;
                $extensionnumber=1;
                     }//end of if row count
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
      $_SESSION['REFLA']="S-LA-".$refyear."-".$extensionnumber;  
          
            // $_SESSION['REFLA']="S-LA-".$refyear."-".$extensionnumber1;  
            // //END LASYS
               //***************** */
               //     NON LASYS
               //***************** */
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
                  $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.nonlasyslog WHERE refyear=$refyear  "; // sql for server
                  $stmt = sqlsrv_query( $conn, $sql ); 
               if( $stmt === false) {
                  die( print_r( sqlsrv_errors(), true) );
               }else{ 
                  if($row_count = sqlsrv_has_rows( $stmt )>0){
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                  $ext=$row['extnum'];
                  }
                  $extensionnumber=$ext+1;
                     //  echo $extensionnumber."<br/>";
                }//another row count
               }
             } // if $session for numbering
                  else{// the number of extension number should be 0;
                $extensionnumber=1;
                     }//end of if row count
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
            $_SESSION['REFNON']="S-NL-".$refyear."-".$extensionnumber;  
            //END NONLASYS
             //***************** */
               //     PAD
               //***************** */
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
                  $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.padlog WHERE refyear=$refyear  "; // sql for server
                  $stmt = sqlsrv_query( $conn, $sql ); 
               if( $stmt === false) {
                  die( print_r( sqlsrv_errors(), true) );
               }else{ 
                  if($row_count = sqlsrv_has_rows( $stmt )>0){
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                  $ext=$row['extnum'];
                  }
                  $extensionnumber=$ext+1;
                     //  echo $extensionnumber."<br/>";
                }//another row count
               }
             } // if $session for numbering
                  else{// the number of extension number should be 0;
                $extensionnumber=1;
                     }//end of if row count
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
            $_SESSION['REFPAD']="S-PAD-".$refyear."-".$extensionnumber;  
            //END PAD
              //***************** */
               //     MC NEW USER REGISTRATION
               //***************** */
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
                  $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcnewuser WHERE refyear=$refyear  "; // sql for server
                  $stmt = sqlsrv_query( $conn, $sql ); 
               if( $stmt === false) {
                  die( print_r( sqlsrv_errors(), true) );
               }else{ 
                  if($row_count = sqlsrv_has_rows( $stmt )>0){
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                  $ext=$row['extnum'];
                  }
                  $extensionnumber=$ext+1;
                     //  echo $extensionnumber."<br/>";
                }//another row count
               }
             } // if $session for numbering
                  else{// the number of extension number should be 0;
                $extensionnumber=1;
                     }//end of if row count
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
            $_SESSION['REFNEW']="MC-UR-".$refyear."-".$extensionnumber;  
            //END new user
            //***************** */
               //     MC REGISTRATION CHANGE
               //***************** */
               $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.mcregistrationchange WHERE refyear=$refyear"; // sql for server
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
                     //  echo $extensionnumber."<br/>";
                }//another row count
               }
             } // if $session for numbering
                  else{// the number of extension number should be 0;
                $extensionnumber=1;
                     }//end of if row count
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
            $_SESSION['REFREGCHA']="MC-RC-".$refyear."-".$extensionnumber;  
            //END REGCHANGE
            //***************** */
               //     MC PASSWORD REQUEST
               //***************** */
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
                  $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcpasswordrequest WHERE refyear=$refyear  "; // sql for server
                  $stmt = sqlsrv_query( $conn, $sql ); 
               if( $stmt === false) {
                  die( print_r( sqlsrv_errors(), true) );
               }else{ 
                  if($row_count = sqlsrv_has_rows( $stmt )>0){
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                  $ext=$row['extnum'];
                  }
                  $extensionnumber=$ext+1;
                     //  echo $extensionnumber."<br/>";
                }//another row count
               }
             } // if $session for numbering
                  else{// the number of extension number should be 0;
                $extensionnumber=1;
                     }//end of if row count
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
            $_SESSION['REFPAS']="MC-PR-".$refyear."-".$extensionnumber;  
            //END PASSWORD REQUEST
              //***************** */
               //     MC REQUESTRECORD
               //***************** */
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
                     //  echo $extensionnumber."<br/>";
                }//another row count
               }
             } // if $session for numbering
                  else{// the number of extension number should be 0;
                $extensionnumber=1;
                     }//end of if row count
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
            $_SESSION['REFREQ']="MC-RR-".$refyear."-".$extensionnumber;  
            //END REQUEST RECORD
    ?>