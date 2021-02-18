<?php
require_once('connect.php'); // CONNECTION 
   $refyear = date("y");
   echo $refyear."</br>";
   $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.qadlog WHERE refyear=$refyear"; // sql for server
     $stmt = sqlsrv_query( $conn, $sql );
    
      if($row_count = sqlsrv_has_rows( $stmt )>0){
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
           $count=$row['count'];
         }// end of while $row
        if($count>0){
           $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.qadlog where refyear=$refyear"; // sql for server
           $stmt = sqlsrv_query( $conn, $sql ); 
           if($row_count = sqlsrv_has_rows( $stmt )>0){
           while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
           $ext=$row['extnum'];
           }
           $extensionnumber=$ext+1;
         }//another row count
    
      } // if $session for numbering
           else{// the number of extension number should be 0;
         $extensionnumber=1;
              }//end of if row count
     }else{//no data available
  }//else of $row count

if($extensionnumber<10){
  $extensionnumber="000".$extensionnumber;
}elseif($extensionnumber>9 & $extensionnumber <100){
  $extensionnumber="00".$extensionnumber;
}elseif($extensionnumber>99 & $extensionnumber <1000){
  $extensionnumber="0".$extensionnumber;          
}
$ext="S-QAD-".$refyear."-".$extensionnumber;
$extensionnumber="";
echo $ext;
//    //***************** */