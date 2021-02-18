<?php
// CONNECT TO SQL SERVER 
$serverName = "TPC-ICT21\MSSQLSERVER01";//servername 
$connectionInfo = array("Database"=>"requestmonitoring"); // TABLE NAME 
$conn = sqlsrv_connect($serverName,$connectionInfo); // CONNECTION DETAILS 
$additional = "p@55w0rd";
date_default_timezone_set('Singapore');
if( !$conn ){
    echo " Connection Not Established. </br>";
    die(print_r( sqlsrv_errors(), true));
}// IF CONNECTION IS NOT ESTABLSIHED 
?>