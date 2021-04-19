<?PHP
   require_once('connect.php'); // Connection to the database
      //QAD Request Number Generation
   date_default_timezone_set('Singapore');
   $reference_year = date("y");
   $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.qadlog WHERE refyear=$reference_year"; // sql for server
   $stmt = sqlsrv_query( $conn, $sql );
   if( $stmt === false)
   {
      die( print_r( sqlsrv_errors(), true) );
   }else
   { 
      if($row_count = sqlsrv_has_rows( $stmt )>0)
      {
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
         {
            $count=$row['count'];
         }// end of while $row
         if($count>0)
         {
            $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.qadlog WHERE refyear=$reference_year "; // sql for server
            $stmt = sqlsrv_query( $conn, $sql ); 
            if( $stmt === false)
            {
               die( print_r( sqlsrv_errors(), true) );
            }else
            { 
               if($row_count = sqlsrv_has_rows( $stmt )>0)
               {
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                  {
                     $extension=$row['extnum'];
                  }
                     $extension_number=$extension+1;
               }//another row count
            }
         }else
         {// the number of extension number should be 0;
            $extension_number=1;
         }//end of if row count
      }else
      {//no data available
         $extension_number=1;
      }//else of $row count
   }//else of $stmt 
   if($extension_number<10)
   {
      $extension_number="000".$extension_number;
   }elseif($extension_number>9 & $extension_number <100)
   {
      $extension_number="00".$extension_number;
   }elseif($extension_number>99 & $extension_number <1000)
   {
      $extension_number="0".$extension_number;          
   }
   $_SESSION['Referencenum_qad']="S-QAD-".$reference_year."-".$extension_number;
   $extension_number="";
      //   Lasys Request Number Generation
   $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.lasyslog WHERE refyear=$reference_year"; // sql for server
   $stmt = sqlsrv_query( $conn, $sql );
   if( $stmt === false) 
   {
      die( print_r( sqlsrv_errors(), true) );
   }else
   { 
      if($row_count = sqlsrv_has_rows( $stmt )>0)
      {
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
         {
            $count=$row['count'];
         }// end of while $row
         if($count>0)
         {
            $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.lasyslog WHERE refyear=$reference_year "; // sql for server
            $stmt = sqlsrv_query( $conn, $sql ); 
            if( $stmt === false) 
            {
               die( print_r( sqlsrv_errors(), true) );
            }else
            { 
               if($row_count = sqlsrv_has_rows( $stmt )>0)
               {
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                  {
                     $extension=$row['extnum'];
                  }
                     $extension_number=$extension+1;
               //  echo $extension_number."<br/>";
               }//another row count
            }
         }else
         {// the number of extension number should be 0;
            $extension_number=1;
         }//end of if row count
      }else
      {//no data available year transition
         $extension_number=1;
      }//else of $row count
   }//else of $stmt 
   if($extension_number<10)
   {
      $extension_number="000".$extension_number;
   }elseif($extension_number>9 & $extension_number <100)
   {
      $extension_number="00".$extension_number;
   }elseif($extension_number>99 & $extension_number <1000)
   {
      $extension_number="0".$extension_number;          
   }
   $_SESSION['Referencenum_las']="S-LA-".$reference_year."-".$extension_number;  
      // End Non-Lasys
      //   Non-Lasys Request Number Generation
   $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.nonlasyslog WHERE refyear=$reference_year"; // sql for server
   $stmt = sqlsrv_query( $conn, $sql );
   if( $stmt === false)
   {
      die( print_r( sqlsrv_errors(), true) );
   }else
   { 
      if($row_count = sqlsrv_has_rows( $stmt )>0)
      {
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
         {
            $count=$row['count'];
         }// end of while $row
         if($count>0)
         {
            $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.nonlasyslog WHERE refyear=$reference_year  "; // sql for server
            $stmt = sqlsrv_query( $conn, $sql ); 
            if( $stmt === false) 
            {
               die( print_r( sqlsrv_errors(), true) );
            }else
            { 
               if($row_count = sqlsrv_has_rows( $stmt )>0)
               {
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                  {
                     $extension=$row['extnum'];
                  }
                     $extension_number=$extension+1;
                     //  echo $extension_number."<br/>";
               }//another row count
            }
         } else
         {// the number of extension number should be 0;
            $extension_number=1;
         }//end of if row count
      }else
      {//no data available
         $extension_number=1;
      }//else of $row count
   }//else of $stmt 
   if($extension_number<10)
   {
      $extension_number="000".$extension_number;
   }elseif($extension_number>9 & $extension_number <100)
   {
      $extension_number="00".$extension_number;
   }elseif($extension_number>99 & $extension_number <1000)
   {
      $extension_number="0".$extension_number;          
   }
   $_SESSION['Referencenum_non']="S-NL-".$reference_year."-".$extension_number;  
            //End Non-Lasys
            //Pad Request Number Generation
   $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.padlog WHERE refyear=$reference_year"; // sql for server
   $stmt = sqlsrv_query( $conn, $sql );
   if( $stmt === false)
   {
      die( print_r( sqlsrv_errors(), true) );
   }else
   { 
      if($row_count = sqlsrv_has_rows( $stmt )>0)
      {
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
         {
            $count=$row['count'];
         }// end of while $row
         if($count>0)
         {
            $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.padlog WHERE refyear=$reference_year  "; // sql for server
            $stmt = sqlsrv_query( $conn, $sql ); 
            if( $stmt === false) 
            {
               die( print_r( sqlsrv_errors(), true) );
            }else
            { 
               if($row_count = sqlsrv_has_rows( $stmt )>0)
               {
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                  {
                     $extension=$row['extnum'];
                  }
                     $extension_number=$extension+1;
                     //  echo $extension_number."<br/>";
               }//another row count
            }
         }else
         {// the number of extension number should be 0;
            $extension_number=1;
         }//end of if row count
      }else
      {//no data available
         $extension_number=1;
      }//else of $row count
   }//else of $stmt 
   if($extension_number<10)
   {
      $extension_number="000".$extension_number;
   }elseif($extension_number>9 & $extension_number <100)
   {
      $extension_number="00".$extension_number;
   }elseif($extension_number>99 & $extension_number <1000)
   {
      $extension_number="0".$extension_number;          
   }
   $_SESSION['Referencenum_pad']="S-PAD-".$reference_year."-".$extension_number;  
            //End Pad
            // Master Control New User Request Number Generation
   $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.mcnewuser WHERE refyear=$reference_year"; // sql for server
   $stmt = sqlsrv_query( $conn, $sql );
   if( $stmt === false)
   {
      die( print_r( sqlsrv_errors(), true) );
   }else
   { 
      if($row_count = sqlsrv_has_rows( $stmt )>0)
      {
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
         {
            $count=$row['count'];
         }// end of while $row
         if($count>0)
         {
            $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcnewuser WHERE refyear=$reference_year  "; // sql for server
            $stmt = sqlsrv_query( $conn, $sql ); 
            if( $stmt === false) 
            {
               die( print_r( sqlsrv_errors(), true) );
            }else
            { 
               if($row_count = sqlsrv_has_rows( $stmt )>0)
               {
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
                  {
                     $extension=$row['extnum'];
                  }
                     $extension_number=$extension+1;
               }//another row count
            }
         }else
         {// the number of extension number should be 0;
            $extension_number=1;
         }//end of if row count
      }else
      {//no data available
         $extension_number=1;
      }//else of $row count
   }//else of $stmt 
   if($extension_number<10)
   {
      $extension_number="000".$extension_number;
   }elseif($extension_number>9 & $extension_number <100)
   {
      $extension_number="00".$extension_number;
   }elseif($extension_number>99 & $extension_number <1000)
   {
      $extension_number="0".$extension_number;          
   }
   $_SESSION['Referencenum_mcur']="MC-UR-".$reference_year."-".$extension_number;  
            //End Master Control New User 
            //Master Control Change Registration  Request Number Generation
   $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.mcregistrationchange WHERE refyear=$reference_year"; // sql for server
   $stmt = sqlsrv_query( $conn, $sql );
   if( $stmt === false)
   {
      die( print_r( sqlsrv_errors(), true) );
   }else
   { 
      if($row_count = sqlsrv_has_rows( $stmt )>0)
      {
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
         {
            $count=$row['count'];
         }// end of while $row
         if($count>0)
         {
            $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcregistrationchange WHERE refyear=$reference_year "; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false)
            {
               die( print_r( sqlsrv_errors(), true) );
            }else
            { 
               if($row_count = sqlsrv_has_rows( $stmt )>0)
               {
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                  {
                     $extension=$row['extnum'];
                  }
                     $extension_number=$extension+1;
               }//another row count
            }
         }else
         {// the number of extension number should be 0;
            $extension_number=1;
         }//end of if row count
      }else
      {//no data available
         $extension_number=1;
      }//else of $row count
   }//else of $stmt 
   if($extension_number<10)
   {
      $extension_number="000".$extension_number;
   }elseif($extension_number>9 & $extension_number <100)
   {
      $extension_number="00".$extension_number;
   }elseif($extension_number>99 & $extension_number <1000)
   {
      $extension_number="0".$extension_number;          
   }
   $_SESSION['Referencenum_mcrc']="MC-RC-".$reference_year."-".$extension_number;  
            //End Master Control Change Registration
            //Master Control Reset Password Request Number Generation
   $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.mcpasswordrequest WHERE refyear=$reference_year"; // sql for server
   $stmt = sqlsrv_query( $conn, $sql );
   if( $stmt === false)
   {
      die( print_r( sqlsrv_errors(), true) );
   }else
   { 
      if($row_count = sqlsrv_has_rows( $stmt )>0)
      {
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
         {
            $count=$row['count'];
         }// end of while $row
         if($count>0)
         {
            $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcpasswordrequest WHERE refyear=$reference_year  "; // sql for server
            $stmt = sqlsrv_query( $conn, $sql ); 
            if( $stmt === false) 
            {
               die( print_r( sqlsrv_errors(), true) );
            }else
            { 
               if($row_count = sqlsrv_has_rows( $stmt )>0)
               {
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                  {
                     $extension=$row['extnum'];
                  }
                     $extension_number=$extension+1;
                     //  echo $extension_number."<br/>";
               }//another row count
            }
         }else
         {// the number of extension number should be 0;
            $extension_number=1;
         }//end of if row count
      }else
      {//no data available
         $extension_number=1;
      }//else of $row count
   }//else of $stmt 
   if($extension_number<10)
   {
      $extension_number="000".$extension_number;
   }elseif($extension_number>9 & $extension_number <100)
   {
      $extension_number="00".$extension_number;
   }elseif($extension_number>99 & $extension_number <1000)
   {
      $extension_number="0".$extension_number;          
   }
   $_SESSION['Referencenum_mcpr']="MC-PR-".$reference_year."-".$extension_number;  
            //End Password Request
              //***************** */
               // Master Control Request Record Request Number Generation
               //***************** */
   $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.mcrequestrecord WHERE refyear=$reference_year"; // sql for server
   $stmt = sqlsrv_query( $conn, $sql );
   if( $stmt === false) 
   {
      die( print_r( sqlsrv_errors(), true) );
   }else
   { 
      if($row_count = sqlsrv_has_rows( $stmt )>0)
      {
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
         {
            $count=$row['count'];
         }// end of while $row
         if($count>0)
         {
            $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.mcrequestrecord WHERE refyear=$reference_year "; // sql for server
            $stmt = sqlsrv_query( $conn, $sql ); 
            if( $stmt === false) 
            {
               die( print_r( sqlsrv_errors(), true) );
            }else
            { 
               if($row_count = sqlsrv_has_rows( $stmt )>0)
               {
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                  {
                     $extension=$row['extnum'];
                  }
                     $extension_number=$extension+1;
               }//another row count
            }
         }else
         {// the number of extension number should be 0;
            $extension_number=1;
         }//end of if row count
      }else
      {//no data available
         $extension_number=1;
      }//else of $row count
   }//else of $stmt 
   if($extension_number<10)
   {
      $extension_number="000".$extension_number;
   }elseif($extension_number>9 & $extension_number <100)
   {
      $extension_number="00".$extension_number;
   }elseif($extension_number>99 & $extension_number <1000)
   {
      $extension_number="0".$extension_number;          
   }
   $_SESSION['Referencenum_mcrr']="MC-RR-".$reference_year."-".$extension_number;  
            //END REQUEST RECORD
    ?>