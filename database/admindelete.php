<?php
   // Name of the module : adddelete.php
    // Module creation date : 01/14/21
    // Author of the Module : Engr. Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : Deletion of data for admin functions.
    // Done aligning in module to PHQD020
    require_once('../connect.php'); // CONNECTION 
    session_start();
    if(isset($_POST['submit']))
    {
        $user_id          = $_SESSION['User_id'];
        $request_number   = $_POST['request_num'];
        $requestor       = $_POST['requestor'];
        $date_created     = $_POST['date_processed'];
        $password        = $_POST['pass_word'];
        $hashed_password    = md5($password);
        $request_number   = $_POST['request_num'];
        date_default_timezone_set('Singapore');
        $activity_date = date("m/d/Y");  
        $activity_time = date("H:i:s");
        if(empty($password))
        {
            echo "password empty";
        }else if($hashed_password==$_SESSION['Password'])
        {   // to
            $sql = "SELECT * FROM requestmonitoring.dbo.qadlog WHERE requestnumber ='$request_number'";// sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                $sql = "DELETE FROM requestmonitoring.dbo.qadlog WHERE requestnumber ='$request_number'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activity_date', '$user_id' , '$request_number','$date_created','$activity_time','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has deleted an QAD request with reference number ".$request_number ;
                $activity_status = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminSRR_Requests.php");
            }
            $sql = "SELECT * FROM requestmonitoring.dbo.lasyslog WHERE requestnumber ='$request_number'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                $sql = "DELETE FROM requestmonitoring.dbo.lasyslog WHERE requestnumber ='$request_number'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activity_date', '$user_id' , '$request_number','$date_created','$activity_time','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has deleted an Lasys request with reference number ".$request_number ;
                $activity_status = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                      VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminSRR_Requests.php");
            }
            $sql = "SELECT * FROM requestmonitoring.dbo.nonlasyslog WHERE requestnumber ='$request_number'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                $sql = "DELETE FROM requestmonitoring.dbo.nonlasyslog WHERE requestnumber ='$request_number'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                        VALUES ('$activity_date', '$user_id' , '$request_number','$date_created','$activity_time','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has deleted an Non-Lasys request with reference number ".$request_number ;
                $activity_status = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminSRR_Requests.php");
            }
            $sql = "SELECT * FROM requestmonitoring.dbo.padlog WHERE requestnumber ='$request_number'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                $sql = "DELETE FROM requestmonitoring.dbo.padlog WHERE requestnumber ='$request_number'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                       VALUES ('$activity_date', '$user_id' , '$request_number','$date_created','$activity_time','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has deleted an Pad request with reference number ".$request_number ;
                $activity_status = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminSRR_Requests.php");
            }
            $sql = "SELECT * FROM requestmonitoring.dbo.mcnewuser WHERE requestnumber ='$request_number'";// sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                $sql = "DELETE FROM requestmonitoring.dbo.mcnewuser WHERE requestnumber ='$request_number'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activity_date', '$user_id' , '$request_number','$date_created','$activity_time','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has deleted an MC New User request with reference number ".$request_number ;
                $activity_status = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                      VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminMCNewuser_Requests.php");
            }
            $sql = "SELECT * FROM requestmonitoring.dbo.mcpasswordrequest WHERE requestnumber ='$request_number'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                $sql = "DELETE FROM requestmonitoring.dbo.mcpasswordrequest WHERE requestnumber ='$request_number'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activity_date', '$user_id' , '$request_number','$date_created','$activity_time','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has deleted an MC Reset Password request with reference number ".$request_number ;
                $activity_status = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminMCPassword_Requests.php");
            }
            $sql = "SELECT * FROM requestmonitoring.dbo.mcregistrationchange WHERE requestnumber ='$request_number'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                $sql = "DELETE FROM requestmonitoring.dbo.mcregistrationchange WHERE requestnumber ='$request_number'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activity_date', '$user_id' , '$request_number','$date_created','$activity_time','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has deleted an MCRequest Registartion request with reference number ".$request_number ;
                $activity_status = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminMCChange_Requests.php");
            }
            $sql = "SELECT * FROM requestmonitoring.dbo.mcrequestrecord WHERE requestnumber ='$request_number'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                $sql = "DELETE FROM requestmonitoring.dbo.mcrequestrecord WHERE requestnumber ='$request_number'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activity_date', '$user_id' , '$request_number','$date_created','$activity_time','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has deleted an MCRequest Record request with reference number ".$request_number ;
                $activity_status = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminMCRequest_Requests.php");
            }
        }else
        {
            $sql = "SELECT * FROM requestmonitoring.dbo.qadlog WHERE requestnumber ='$request_number'";// sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has attempted to delete an QAD request with reference number ".$request_number ;
                $activity_status = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCRequest_Requests.php");
            }
            $sql = "SELECT * FROM requestmonitoring.dbo.lasyslog WHERE requestnumber ='$request_number'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has attempted to delete an LASYS request with reference number ".$request_number ;
                $activity_status = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCRequest_Requests.php");
            }
            $sql = "SELECT * FROM requestmonitoring.dbo.nonlasyslog WHERE requestnumber ='$request_number'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has attempted to delete an NON-LASYS request with reference number ".$request_number ;
                $activity_status = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCRequest_Requests.php");
            }
            $sql = "SELECT * FROM requestmonitoring.dbo.padlog WHERE requestnumber ='$request_number'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has attempted to delete an PAD request with reference number ".$request_number ;
                $activity_status = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCRequest_Requests.php");
            }
            $sql = "SELECT * FROM requestmonitoring.dbo.mcnewuser WHERE requestnumber ='$request_number'";// sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has attempted to delete an MC NEW USER request with reference number ".$request_number ;
                $activity_status = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCNewuser_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.mcpasswordrequest WHERE requestnumber ='$request_number'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has attempted to delete an MC Password Request request with reference number ".$request_number ;
                $activity_status = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCPassword_Requests.php");
            }
            $sql = "SELECT * FROM requestmonitoring.dbo.mcregistrationchange WHERE requestnumber ='$request_number'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has attempted to delete an MC Registration Change request with reference number ".$request_number ;
                $activity_status = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCChange_Requests.php");
            }
            $sql = "SELECT * FROM requestmonitoring.dbo.mcrequestrecord WHERE requestnumber ='$request_number'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
                date_default_timezone_set('Singapore');
                $user_id = $_SESSION['User_id'];
                $username = $_SESSION['username']; 
                $first_name = $_SESSION['First_name'];
                $last_name = $_SESSION['Last_name'];
                $position = $_SESSION['Position'];
                $activity_date = date("m/d/Y");  
                $activity_time = date("H:i:s");
                $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has attempted to delete an MC Request Record request with reference number ".$request_number ;
                $activity_status = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$user_id', '$username' , '$first_name','$last_name','$position','$activity_date','$activity_time','$activity_details','$activity_status');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['Confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCRequest_Requests.php");
            }
        }
    }else{
            echo "404";
            // need to create a web page for web page not found
    }
?>