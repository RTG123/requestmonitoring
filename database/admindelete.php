<?php
require_once('../connect.php'); // CONNECTION 
session_start();
    if(isset($_POST['submit'])){
        $userid          = $_SESSION['userid'];
        $requestnumber   = $_POST['request_num'];
        $requestor       = $_POST['requestor'];
        $datecreated     = $_POST['date_processed'];
        $password        = $_POST['pass_word'];
        $hashpassword    = md5($password);
        $requestnumber   = $_POST['request_num'];
        date_default_timezone_set('Singapore');
            $activitydate = date("m/d/Y");  
            $activitytime = date("H:i:s");
        if(empty($password)){
            echo "password empty";
        }else if($hashpassword==$_SESSION['password']){
            echo $requestnumber."</br>";
            echo $_SESSION['password']."</br>";
            echo $hashpassword. "</br>";
            $sql = "SELECT * FROM requestmonitoring.dbo.qadlog WHERE requestnumber ='$requestnumber'";// sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0){
                $sql = "DELETE FROM requestmonitoring.dbo.qadlog WHERE requestnumber ='$requestnumber'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activitydate', '$userid' , '$requestnumber','$datecreated','$activitytime','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $userid = $_SESSION['userid'];
                $username = $_SESSION['username']; 
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                $position = $_SESSION['position'];
                $activitydate = date("m/d/Y");  
                $activitytime = date("H:i:s");
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has deleted an QAD request with reference number ".$requestnumber ;
                $activitystatus = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminSRR_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.lasyslog WHERE requestnumber ='$requestnumber'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0){
                $sql = "DELETE FROM requestmonitoring.dbo.lasyslog WHERE requestnumber ='$requestnumber'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activitydate', '$userid' , '$requestnumber','$datecreated','$activitytime','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $userid = $_SESSION['userid'];
                $username = $_SESSION['username']; 
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                $position = $_SESSION['position'];
                $activitydate = date("m/d/Y");  
                $activitytime = date("H:i:s");
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has deleted an Lasys request with reference number ".$requestnumber ;
                $activitystatus = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminSRR_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.nonlasyslog WHERE requestnumber ='$requestnumber'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0){
                $sql = "DELETE FROM requestmonitoring.dbo.nonlasyslog WHERE requestnumber ='$requestnumber'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activitydate', '$userid' , '$requestnumber','$datecreated','$activitytime','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $userid = $_SESSION['userid'];
                $username = $_SESSION['username']; 
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                $position = $_SESSION['position'];
                $activitydate = date("m/d/Y");  
                $activitytime = date("H:i:s");
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has deleted an Non-Lasys request with reference number ".$requestnumber ;
                $activitystatus = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminSRR_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.padlog WHERE requestnumber ='$requestnumber'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0){
                $sql = "DELETE FROM requestmonitoring.dbo.padlog WHERE requestnumber ='$requestnumber'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activitydate', '$userid' , '$requestnumber','$datecreated','$activitytime','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $userid = $_SESSION['userid'];
                $username = $_SESSION['username']; 
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                $position = $_SESSION['position'];
                $activitydate = date("m/d/Y");  
                $activitytime = date("H:i:s");
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has deleted an Pad request with reference number ".$requestnumber ;
                $activitystatus = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminSRR_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.mcnewuser WHERE requestnumber ='$requestnumber'";// sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0){
                $sql = "DELETE FROM requestmonitoring.dbo.mcnewuser WHERE requestnumber ='$requestnumber'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activitydate', '$userid' , '$requestnumber','$datecreated','$activitytime','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $userid = $_SESSION['userid'];
                $username = $_SESSION['username']; 
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                $position = $_SESSION['position'];
                $activitydate = date("m/d/Y");  
                $activitytime = date("H:i:s");
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has deleted an MC New User request with reference number ".$requestnumber ;
                $activitystatus = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminMCNewuser_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.mcpasswordrequest WHERE requestnumber ='$requestnumber'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0){
                $sql = "DELETE FROM requestmonitoring.dbo.mcpasswordrequest WHERE requestnumber ='$requestnumber'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activitydate', '$userid' , '$requestnumber','$datecreated','$activitytime','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $userid = $_SESSION['userid'];
                $username = $_SESSION['username']; 
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                $position = $_SESSION['position'];
                $activitydate = date("m/d/Y");  
                $activitytime = date("H:i:s");
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has deleted an MC Reset Password request with reference number ".$requestnumber ;
                $activitystatus = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminMCPassword_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.mcregistrationchange WHERE requestnumber ='$requestnumber'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0){
                $sql = "DELETE FROM requestmonitoring.dbo.mcregistrationchange WHERE requestnumber ='$requestnumber'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activitydate', '$userid' , '$requestnumber','$datecreated','$activitytime','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $userid = $_SESSION['userid'];
                $username = $_SESSION['username']; 
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                $position = $_SESSION['position'];
                $activitydate = date("m/d/Y");  
                $activitytime = date("H:i:s");
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has deleted an MCRequest Registartion request with reference number ".$requestnumber ;
                $activitystatus = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminMCChange_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.mcrequestrecord WHERE requestnumber ='$requestnumber'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if($row_count = sqlsrv_has_rows( $stmt )>0){
                $sql = "DELETE FROM requestmonitoring.dbo.mcrequestrecord WHERE requestnumber ='$requestnumber'";// sql for server
                $stmt = sqlsrv_query( $conn, $sql );
                $sql1="INSERT INTO requestmonitoring.dbo.datadeleted(dateofdeletion, deletedby, requestnumberdetails, daterequested,timeofdeletion,nameofrequestor)
                VALUES ('$activitydate', '$userid' , '$requestnumber','$datecreated','$activitytime','$requestor');";
                $stmt1 = sqlsrv_query( $conn, $sql1 );
                date_default_timezone_set('Singapore');
                $userid = $_SESSION['userid'];
                $username = $_SESSION['username']; 
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                $position = $_SESSION['position'];
                $activitydate = date("m/d/Y");  
                $activitytime = date("H:i:s");
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has deleted an MCRequest Record request with reference number ".$requestnumber ;
                $activitystatus = "success";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'deleted()';
                header("Location: ../searchandupdate/adminMCRequest_Requests.php");
            }

        }else{
            $sql = "SELECT * FROM requestmonitoring.dbo.qadlog WHERE requestnumber ='$requestnumber'";// sql for server
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
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has attempted to delete an QAD request with reference number ".$requestnumber ;
                $activitystatus = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCRequest_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.lasyslog WHERE requestnumber ='$requestnumber'"; // sql for server
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
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has attempted to delete an LASYS request with reference number ".$requestnumber ;
                $activitystatus = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCRequest_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.nonlasyslog WHERE requestnumber ='$requestnumber'"; // sql for server
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
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has attempted to delete an NON-LASYS request with reference number ".$requestnumber ;
                $activitystatus = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCRequest_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.padlog WHERE requestnumber ='$requestnumber'"; // sql for server
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
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has attempted to delete an PAD request with reference number ".$requestnumber ;
                $activitystatus = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCRequest_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.mcnewuser WHERE requestnumber ='$requestnumber'";// sql for server
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
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has attempted to delete an MC NEW USER request with reference number ".$requestnumber ;
                $activitystatus = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCNewuser_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.mcpasswordrequest WHERE requestnumber ='$requestnumber'"; // sql for server
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
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has attempted to delete an MC Password Request request with reference number ".$requestnumber ;
                $activitystatus = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCPassword_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.mcregistrationchange WHERE requestnumber ='$requestnumber'"; // sql for server
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
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has attempted to delete an MC Registration Change request with reference number ".$requestnumber ;
                $activitystatus = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCChange_Requests.php");
            }

            $sql = "SELECT * FROM requestmonitoring.dbo.mcrequestrecord WHERE requestnumber ='$requestnumber'"; // sql for server
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
                $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has attempted to delete an MC Request Record request with reference number ".$requestnumber ;
                $activitystatus = "failed";
                $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                    VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                $stmt = sqlsrv_query( $conn, $sql);
                $_SESSION['confirmation'] = 'incorrect()';
                header("Location: ../searchandupdate/adminMCRequest_Requests.php");
            }
        }
    }else{
            echo "ERROR";
        }






















?>