<?php
    // Name of the module : connect.php
    // Module creation date : 11/24/20
    // Author of the Module : Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : Displays the all the on the dashboard for User as Usertype
    // Done aligning in module to PHQD020
    $serverName = "TPC-ICT21\MSSQLSERVER01";//servername 
    $connectionInfo = array("Database"=>"requestmonitoring"); // TABLE NAME 
    $conn = sqlsrv_connect($serverName,$connectionInfo); // CONNECTION DETAILS 
    $additional = "p@55w0rd";
    if( !$conn )
    {
        echo " Connection Not Established. </br>";
        die(print_r( sqlsrv_errors(), true));
    }// IF CONNECTION IS NOT ESTABLSIHED 
?>